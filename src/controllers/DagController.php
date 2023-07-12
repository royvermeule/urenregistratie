<?php

declare(strict_types=1);

namespace Controllers;

use Models\DagModel as DagModel;
use Models\TaakModel as TaakModel;

class DagController
{
  private DagModel $dagModel;
  private TaakModel $taakModel;

  public function __construct()
  {
    $this->dagModel = new DagModel();
    $this->taakModel = new TaakModel();
  }

  public function getDagen(): string
  {
    $dagen = $this->dagModel->getDagen();

    $dHtml = '';
    foreach ($dagen as $dag) {
      $dHtml .= "<div class='dag'>
                    <h3>{$dag['dag_naam']}</h3>
                    <a class='edit__button--link' href='dag.php?dag={$dag['dag_naam']}&dagId={$dag['dag_id']}'><button class='edit__button'>Bekijk</button></a>
                </div>";
    }
    return $dHtml;
  }

  /**
   * @param int $dagId
   * @return string
   */
  public function getTakenByDagId(int $dagId): string
  {
    $taken = $this->taakModel->getTakenByDagId($dagId);

    $dHtml = '';
    foreach ($taken as $taak) {
      $dHtml .= "<div class='taken__collectie--item'>
                    <div class='taak__header'>
                        <h3 class='taak__titel'>{$taak['taa_naam']}</h3>
                        <a href='taak.php?taak={$taak['taa_naam']}&taakId={$taak['taa_id']}' class='taak__aanpas--link'><button class='taak__aanpas'>Aanpasssen</button></a>
                        <a href='taak.php?taak={$taak['taa_naam']}&taakId={$taak['taa_id']}' class='taak__verwijder--link'><button class='taak__verwijder'>Verwijderen</button></a>
                    </div>
                    <div class='taak__body'>
                      <p class='taak__omschrijving'>
                         {$taak['taa_omschrijving']}
                      </p>
                      <br>
                      <p class='taak__tijd'> Duur: {$taak['taa_tijd']} uur.</p>
                    </div>
                </div>";
    }
    return $dHtml;
  }
}