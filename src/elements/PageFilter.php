<?php

declare(strict_types=1);

namespace Elements;

class PageFilter
{
  private string $html;
  private ?array $globalVars = null;

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
  public function filter(): string
  {
    $html = $this->html;
    $linkButton = new LinkButton($html);
    $html = $linkButton->Linkbutton();

    $includeElement = new IncludeElement($html);
    $html = $includeElement->include();

    $hiddenComment = new HIddenComment($html);
    $html = $hiddenComment->hiddenComment();

    $globalVariable = new GlobalVars($html, $this->globalVars);
    $html = $globalVariable->globalVarElement();

    $getButton = new GetButton($html);
    $html = $getButton->getButton();

    return $html;
  }

  /**
   * @param array|null $data
   * @return void
   */
  public function addGlobalVars(?array $data = null): void
  {
    $this->globalVars = $data;
  }
}