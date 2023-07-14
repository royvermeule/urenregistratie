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
  <title>{sitename} - Home</title>
</head>
<body>
    <div class="main__container">
        <div class="app__container">
            <div class="option__menu">
                <label for="velden__button--link">Uren registratie</label>
                <a id="velden__button--link" class="velden__button--link" href=""><button class="velden__button">Maak week leeg</button></a>
            </div>
            <div class="dagen">
                {dagen}
                <div class="generate">
                    <a href=""><button class="generate__button">Genereer week rapport</button></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>';

$dagController = new \Controllers\DagController();

$pageFilter = new \Elements\PageFilter($html);
$pageFilter->addGlobalVars([
  'dagen' => $dagController->getDagen()
]);
echo $pageFilter->filter();

