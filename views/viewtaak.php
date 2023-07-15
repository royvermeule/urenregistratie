<?php
require __DIR__ . '/../require.php';
$taakController = new \Controllers\TaakController();
$taak = $taakController->getTaakById($_GET['taakId']);

$html = '<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="./styles/style.css">
<script src="js/PostRequests.js"></script>
  <title>Taak - '.$taak['naam'].'</title>
</head>
<body>
    <div class="main__container">
        <div class="app__container">
            <div class="taken__collectie--item">
            <div class="taak__header">
                <h3 class="taak__titel">'.$taak['naam'].'</h3>
                <button id="bewerkTaak" class="taak__aanpas">Aanpassen</button>
                <button id="verwijderTaakPopup" class="taak__verwijder">Verwijder</button>
            </div>
            <div class="taak__body">
                <p class="taak__omschrijving">
                    '.$taak['omschrijving'].'
                </p>
                <br>
                <p class="taak__tijd"> Duur: '.$taak['duur'].' uur.</p>
            </div>
            <div id="optieResponse"></div>
        </div>
    </div>
    <script>
      document.getElementById("verwijderTaakPopup").addEventListener("click", function() {
          var taakId = '.$_GET['taakId'].'
      
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "verwijdertaakPopup.php", true);
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xhr.onreadystatechange = function() {
              if (xhr.readyState === 4 && xhr.status === 200) {
                  document.getElementById("optieResponse");
                  taakVerwijderPopup.innerHTML = xhr.responseText;
                  handleVerwijderSubmission();
              }
          };
          var data = "taakId=" + encodeURIComponent(taakId)
              xhr.send(data);
        });
      
      document.getElementById("bewerkTaak").addEventListener("click", function() {
            var taakId = "'.$_GET['taakId'].'";
            var dag = "'.$_GET['dag'].'";
            
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "bewerktaakform.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
              if (xhr.readyState === 4 && xhr.status === 200) {
                var taakBewerkForm = document.getElementById("optieResponse");
                taakBewerkForm.innerHTML = xhr.responseText;
                handleBewerkSubmission();
              }
            };
            var data = "taakId=" + encodeURIComponent(taakId) +
               "&dag=" + encodeURIComponent(dag);
              xhr.send(data);
          });
    </script>
</body>
</html>';

$dagController = new \Controllers\DagController();

$pageFilter = new \Elements\PageFilter($html);
$pageFilter->addGlobalVars([
  'dagen' => $dagController->getDagen()
]);
echo $pageFilter->filter();