<?php
require __DIR__ . '/../require.php';


$html = '<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="./styles/style.css">
  <title>{sitename} - {dag}</title>
  <script src="js/PostRequests.js"></script>
</head>
<body>
    <div class="main__container">
        <div class="app__container">
        <h2 class="dag__titel">{dag}</h2>
            <button id="createTaak" class="taak__toevoegen">Toevoegen</button>
              <script>
                  document.getElementById("createTaak").addEventListener("click", function() {
                  var dagId = '.$_GET['dagId'].';
                  
                  var xhr = new XMLHttpRequest();
                  xhr.open("POST", "createtaakform.php", true);
                  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                  xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                      var taakBewerkForm = document.getElementById("optieResponse");
                      taakBewerkForm.innerHTML = xhr.responseText;
                      handleCreateSubmission();
                    }
                  };
                  var data = "dagId=" + encodeURIComponent(dagId);
                  xhr.send(data);
                });
              </script>
            <div class="taken__collectie">
            <div id="optieResponse"></div>
                {taken}
            </div>
        </div>
    </div>
</body>
</html>';

$pageFilter = new \Elements\PageFilter($html);
$dagController = new \Controllers\DagController();
$pageFilter->addGlobalVars([
  'dag' => $_GET['dag'],
  'taken' => $dagController->getTakenByDagId($_GET['dagId'], $_GET['dag'])
]);
echo $pageFilter->filter();