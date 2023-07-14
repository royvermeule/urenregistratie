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
  public function getTakenByDagId(int $dagId, string $dagNaam): string
  {
    $taken = $this->taakModel->getTakenByDagId($dagId);

    $dHtml = '';
    foreach ($taken as $taak) {
      $dHtml .= "
<div class='taken__collectie--item'>
    <div class='taak__header'>
        <h3 class='taak__titel'>{$taak['taa_naam']}</h3>
        <button id='bewerkTaak' class='taak__aanpas'>Aanpassen</button>
        <button id='verwijderTaakPopup{$taak['taa_id']}' class='taak__verwijder'>Verwijder</button>
    </div>
    <div class='taak__body'>
        <p class='taak__omschrijving'>
            {$taak['taa_omschrijving']}
        </p>
        <br>
        <p class='taak__tijd'> Duur: {$taak['taa_tijd']} uur.</p>
    </div>
    <script>
        document.getElementById(\"verwijderTaakPopup{$taak['taa_id']}\").addEventListener(\"click\", function() {
          var taakId = \"{$taak['taa_id']}\";
          var dagId = \"{$dagId}\";
          var dag = \"$dagNaam\";
        
          var xhr = new XMLHttpRequest();
          xhr.open(\"POST\", \"verwijdertaakPopup.php\", true);
          xhr.setRequestHeader(\"Content-Type\", \"application/x-www-form-urlencoded\");
          xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
               var taakVerwijderPopup = document.getElementById('optieResponse');
               taakVerwijderPopup.innerHTML = xhr.responseText;
               handleVerwijderSubmission();
            }
          };
            var data = \"taakId=\" + encodeURIComponent(taakId) +
             \"&dagId=\" + encodeURIComponent(dagId) +
             \"&dag=\" + encodeURIComponent(dag);
            xhr.send(data);
          });
            
          document.getElementById('bewerkTaak').addEventListener('click', function() {
            var taakId = \"{$taak['taa_id']}\";
            var dag = \"{$dagNaam}\";
            
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'bewerktaakform.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
              if (xhr.readyState === 4 && xhr.status === 200) {
                var taakBewerkForm = document.getElementById('optieResponse');
                taakBewerkForm.innerHTML = xhr.responseText;
                handleBewerkSubmission();
              }
            };
            var data = \"taakId=\" + encodeURIComponent(taakId) +
               \"&dag=\" + encodeURIComponent(dag);
              xhr.send(data);
          });
    </script>
</div>";
    }

    return $dHtml;
  }
}