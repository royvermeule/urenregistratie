<?php
require __DIR__ . '/../require.php';


$html = '<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<script src="../src/packages/htmx.min.js"></script>
<link rel="stylesheet" href="./styles/style.css">
  <title>{sitename} - {dag}</title>
</head>
<body>
    <div class="main__container">
        <div class="app__container">
        <h2 class="dag__titel">{dag}</h2>
            <a href="" class="taak__toevoegen--link"><button class="taak__toevoegen">Voeg een taak toe </button></a>
            <div class="taken__collectie">
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
  'taken' => $dagController->getTakenByDagId($_GET['dagId'])
]);
echo $pageFilter->filter();