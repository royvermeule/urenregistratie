<?php
require __DIR__ . '/../require.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $html = '<div class="form__container">
  <div class="taakForm">
    <form id="taakCreateSave">
        <div class="taaknaam">
            <label for="taaknaam">Taak naam</label>
            <div class="formError" id="taaknaamError"></div>
            <input id="taaknaam" type="text" name="taaknaam">
        </div>
        <input type="hidden" name="dagId" value="{dagId}">
        <div class="taakduur">
           <label for="taakduur">Taak duur</label>
           <input id="taakduur" type="text" name="taakduur">
        </div>
        <div class="taakbeschrijving">
            <label for="taakbeschrijving">Taak beschrijving</label>
            <div class="formError" id="taakbeschrijvingError"></div>
            <textarea name="taakbeschrijving" id="taakbeschrijving" cols="30" rows="10"></textarea>
        </div>
        <div class="buttons">
            <button type="submit" class="taakFormSave">Toevoegen</button>
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
    'dagId' => $_POST['dagId']
  ]);
  echo $pageFilter->filter();
}