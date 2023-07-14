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
  <script>
    function handleVerwijderSubmission() {
        var form = document.getElementById("verwijderTaak");
        form.addEventListener("submit", function(event) {
          event.preventDefault();
    
          var formData = new FormData(form);
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "verwijdertaak.php", true);
          xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                console.log("Verwijder form submitted successfully.");
              } else {
                console.error("Error in handleVerwijderSubmission xhr.status: " + xhr.status);
              }
            }
          };
          xhr.send(formData);
          window.location.reload()
        });
      }
      
    function handleBewerkSubmission() {
        var form = document.getElementById("taakBewerkSave");
        form.addEventListener("submit", function(event) {
          event.preventDefault();
          
          var formData = new FormData(form);
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "bewerktaak.php", true);
          xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                console.log("Bewerk form submitted succesfully.");
              } else {
                console.log("Error in handleVerwijderSubmission xhr.status: " + xhr.status);
              }
            }
          };
          xhr.send(formData);
          window.location.reload();
        });
    }
</script>
</head>
<body>
    <div class="main__container">
        <div class="app__container">
        <h2 class="dag__titel">{dag}</h2>
            <a href="" class="taak__toevoegen--link"><button class="taak__toevoegen">Voeg een taak toe </button></a>
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