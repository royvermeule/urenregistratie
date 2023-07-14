<?php

require __DIR__ . '/../../require.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $taakController = new \Controllers\TaakController();
  $errors = $taakController->createTaak($_POST);
  echo $errors['taaknaam'] . "\n" . $errors['taakbeschrijving'];
}