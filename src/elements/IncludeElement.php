<?php

declare(strict_types=1);

namespace Elements;

class IncludeElement
{
  private string $html;

  /**
   * @param string $html
   */
  public function __construct(string $html)
  {
    $this->html = $html;
  }

  /**
   * @return string
   */
  public function include(): string
  {
    $this->html = preg_replace_callback(
        '/<include\s+([\w\/\s="]+)\>/',
        static function ($match) use (&$errors) {
          $attributes = array();
          if (preg_match_all('/(\w+)\s*=\s*"([^"]+)"/', $match[1], $attributeMatches, PREG_SET_ORDER)) {
            foreach ($attributeMatches as $attributeMatch) {
              $attributeName = $attributeMatch[1];
              $attributeValue = $attributeMatch[2];
              $attributes[$attributeName] = $attributeValue;
            }
          }

          if (isset($attributes['file'])) {
            $file = $attributes['file'];
            if (file_exists('' . APPROOT . '/' . $file . '')) {
              return file_get_contents('' . APPROOT . '/' . $file . '');
            } else {
              echo "$file cannot be found";
            }
          }

          return '';
        },
        $this->html
    );

    return $this->html;
  }
}
