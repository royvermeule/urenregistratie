<?php
require __DIR__ . '/../require.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $taakController = new \Controllers\TaakController();
  $taak = $taakController->getTaakById($_POST['taakId']);

//  var_dump($_POST);


  $html = '<div class="form__container">
  <div class="taakForm">
    <form id="taakBewerkSave">
        <div class="taaknaam">
            <label for="taaknaam">Taak naam</label>
            <input id="taaknaam" type="text" name="taaknaam" value="'.$taak['naam'].'">
        </div>
        <div class="taakdag">
            <label for="taakdag">Dag</label>
            <select name="taakdag" id="taakdag">
                <option value="'.$taak['gekoppeldeDag'].'">{dag}</option>
                <option value="1">Maandag</option>
                <option value="2">Dinsdag</option>
                <option value="3">Woensdag</option>
                <option value="4">Donderdag</option>
                <option value="5">Vrijdag</option>
                <option value="6">Zaterdag</option>
                <option value="7">Zondag</option>
            </select>
        </div>
        <div class="taakduur">
           <label for="taakduur">Taak duur</label>
           <input id="taakduur" type="number" name="taakduur" value="'.$taak['duur'].'">
        </div>
        <div class="taakbeschrijving">
            <label for="taakbeschrijving">Taak beschrijving</label>
            <textarea name="taakbeschrijving" id="taakbeschrijving" cols="30" rows="10">'.$taak['omschrijving'].'</textarea>
        </div>
        <input type="hidden" name="taakId" value="'.$taak['id'].'">
        <div class="buttons">
            <button type="submit" class="taakFormSave">Opslaan</button>
            <button onclick="window.location.reload()" class="annuleer">Annuleer</button>
        </div>
    </form>
  </div>
</div>
<style>
    '.file_get_contents("styles/taakForm.css").'
</style>';
  $pageFilter = new \Elements\PageFilter($html);
  $pageFilter->addGlobalVars([
    'taakId' => $_POST['taakId'],
    'dag' => $_POST['dag']
  ]);
  echo $pageFilter->filter();
}