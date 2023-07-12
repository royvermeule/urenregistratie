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
                <div class="taken__collectie--item">
                    <div class="taak__header">
                        <h3 class="taak__titel">Taak titel</h3>
                        <a href="" class="taak__aanpas--link"><button class="taak__aanpas">Aanpasssen</button></a>
                        <a href="" class="taak__verwijder--link"><button class="taak__verwijder">Verwijderen</button></a>
                    </div>
                    <div class="taak__body">
                      <p>
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet excepturi impedit quas vero vitae! Accusantium asperiores aspernatur consequuntur culpa eos illum in ipsa, nesciunt optio perspiciatis porro quidem reprehenderit, voluptas!
                      </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>';

$pageFilter = new \Elements\PageFilter($html);
$pageFilter->addGlobalVars([
  'dag' => $_GET['dag']
]);
echo $pageFilter->filter();