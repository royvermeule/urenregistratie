<?php

declare(strict_types=1);

namespace Controllers;

use Models\TaakModel as TaakModel;

class TaakController
{
  private TaakModel $taakModel;

  public function __construct()
  {
    $this->taakModel = new TaakModel();
  }
}