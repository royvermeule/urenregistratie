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
  <title>{sitename} - Home</title>
</head>
<body>
    <div class="main__container">
        <div class="app__container">
            <div class="option__menu">
                <label for="weken">Kies een week</label>
                <a href=""><button class="weken__button">Vorrige</button></a>
                <select id="weken" name="">
                    <option value="">Week1</option>
                </select>
                <a href=""><button class="weken__button">Volgende</button></a>
                <a class="velden__button--link" href=""><button class="velden__button">Maak week leeg</button></a>
            </div>
            <div class="dagen">
                <div class="dag">
                    <h3>Maandag</h3>
                    <a class="edit__button--link" href="dag.php?dag=Maandag"><button class="edit__button">{dayButtonName}</button></a>
                </div>
                <div class="dag">
                    <h3>Dinsdag</h3>
                    <a class="edit__button--link" href="dag.php?dag=Dinsdag"><button class="edit__button">{dayButtonName}</button></a>
                </div>
                <div class="dag">
                    <h3>Woensdag</h3>
                    <a class="edit__button--link" href="dag.php?dag=Woensdag"><button class="edit__button">{dayButtonName}</button></a>
                </div>
                <div class="dag">
                    <h3>Donderdag</h3>
                    <a class="edit__button--link" href="dag.php?dag=Donderdag"><button class="edit__button">{dayButtonName}</button></a>
                </div>
                <div class="dag">
                    <h3>Vrijdag</h3>
                    <a class="edit__button--link" href="dag.php?dag=Vrijdag"><button class="edit__button">{dayButtonName}</button></a>
                </div>
                <div class="dag">
                    <h3>Zaterdag</h3>
                    <a class="edit__button--link" href="dag.php?dag=Zaterdag"><button class="edit__button">{dayButtonName}</button></a>
                </div>
                <div class="dag">
                    <h3>Zondag</h3>
                    <a class="edit__button--link" href="dag.php?dag=Zondag"><button class="edit__button">{dayButtonName}</button></a>
                </div>
                <div class="generate">
                    <a href=""><button class="generate__button">Genereer week rapport</button></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>';

$pageFilter = new \Elements\PageFilter($html);
$pageFilter->addGlobalVars([
  'dayButtonName' => 'Bekijk'
]);
echo $pageFilter->filter();

