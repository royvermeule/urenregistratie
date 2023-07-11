<?php

declare(strict_types=1);

namespace Elements;

class GetButton
{
  private string $html;

  /**
   * @param string $html
   */
  public function __construct(string $html)
  {
    $this->html = $html;
  }

  public function getButton(): string
  {
    $this->html = preg_replace_callback(
      '/<getButton\s+([\w\s="-\/]+)>(.*?)<\/getButton>/s',
      static function ($match) use (&$errors) {
        $attributes = array();
        if (preg_match_all('/(\w+)\s*=\s*"([^"]+)"/', $match[1], $attributeMatches, PREG_SET_ORDER)) {
          foreach ($attributeMatches as $attributeMatch) {
            $attributeName = $attributeMatch[1];
            $attributeValue = $attributeMatch[2];
            $attributes[$attributeName] = $attributeValue;
          }
        }

        if (isset($attributes['id']) && isset($attributes['file']) && isset($attributes['responseId'])) {
          $buttonId = $attributes['id'];
          $buttonPage = $attributes['file'];
          $responseId = $attributes['responseId'];

          $buttonContent = $match[2];
          $buttonClass = isset($attributes['class']) ? $attributes['class'] : '';

          // Create the button element with provided attributes and content
          $buttonElement = '<button id="' . $buttonId . '" class="' . $buttonClass . '">' . $buttonContent . '</button>';

          // Generate the JavaScript code with the AJAX GET request (without whitespace)
          $javascriptCode = '
                    <script>
                        document.getElementById("' . $buttonId . '").addEventListener("click", function() {
                            var xhr = new XMLHttpRequest();
                            xhr.open("GET", \'' . $buttonPage . '\', true);

                            xhr.onreadystatechange = function() {
                                if (xhr.readyState === 4 && xhr.status === 200) {
                                    var response = xhr.responseText;
                                    document.getElementById("' . $responseId . '").innerHTML = response;
                                }
                            };

                            xhr.send();
                        });
                    </script>
                ';

          // Replace the <getButton> element with the button element, response container div, and JavaScript code
          $replacement = $buttonElement . $javascriptCode;
          return $replacement;
        }

        return $match[0]; // Return the original match if attributes are missing
      },
      $this->html
    );

    return $this->html;
  }

}