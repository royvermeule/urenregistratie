<?php

namespace Elements;

class HIddenComment
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
  public function hiddenComment(): string
  {
    return preg_replace('/<!--\*\s*([\s\S]*?)\s*\*-->/', '', $this->html);
  }
}