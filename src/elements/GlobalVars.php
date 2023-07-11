<?php

declare(strict_types=1);

namespace Elements;

class GlobalVars
{
  private string $html;
  private array|null $data;

  /**
   * @param string $html
   */
  public function __construct(string $html, ?array $data = null)
  {
    $this->html = $html;
    $this->data = $data;
  }

  /**
   * @return string
   */
  public function globalVarElement(): string
  {
    $globalVars = $this->globalVars();

    return preg_replace_callback(
      '/{(\w+)}/',
      static function ($match) use ($globalVars, &$errors) {
        if (array_key_exists($match[1], $globalVars)) {
          return $globalVars[$match[1]];
        } else {
          $errors[] = '"' . $match[1] . '" is not included in the dataRegistry().';
          return '';
        }
      },
      $this->html
    );
  }

  /**
   * @return array
   */
  public function globalVars(): array
  {
    $globalVars = [
      'urlroot' => URLROOT,
      'approot' => APPROOT,
      '__DIR' => __DIR__,
      '__FILE' => __FILE__
    ];

    if ($this->data) {
      return array_merge_recursive($this->data, $globalVars);
    }
    return $globalVars;
  }
}