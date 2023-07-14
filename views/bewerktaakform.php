<?php
require __DIR__ . '/../require.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $html = '<div class="bewerk__container">
  <div class="bewerkForm">
    <form id="taakBewerkSave">
        <div class="taaknaam">
            <label for="taaknaam">Taak naam</label>
            <input id="taaknaam" type="text" name="taaknaam">
        </div>
        <div class="taakdag">
            <label for="taakdag">Dag</label>
            <select name="taakdag" id="taakdag">
            </select>
        </div>
        <div class="taakduur">
           <label for="taakduur">Taak duur</label>
           <input id="taakduur" type="number" name="taakduur">
        </div>
        <div class="taakbeschrijving">
            <label for="taakbeschrijving">Taak beschrijving</label>
            <textarea name="taakbeschrijving" id="taakbeschrijving" cols="30" rows="10"></textarea>
        </div>
        <div class="buttons">
            <button class="taakBewerkSave">Opslaan</button>
            <button onclick="window.location.reload()" class="annuleer">Annuleer</button>
        </div>
    </form>
  </div>
</div>
<style>
            .taaknaam, .taakdag, .taakduur, .taakbeschrijving {
                display: flex;
                justify-content: center;
                flex-direction: column;
            }
            
            .taaknaam input, .taakduur input {
                padding: 5px;
            }
            
            .taakbeschrijving textarea {
                padding: 5px;
            }
            
            .taakdag select {
                padding: 5px;
            }
            
            .bewerk__container {
              position: fixed;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              display: flex;
              align-items: center;
              justify-content: center;
              z-index: 9999;
              background-color: rgba(0, 0, 0, 0.5);
            }

            .bewerkForm {
              display: flex;
              justify-content: center;
              background-color: #fff;
              width: 60%;
              max-width: 300px;
              padding: 20px;
              border-radius: 8px;
              box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
              display: flex;
            }
            
            #TaakBewerkSave {
                padding: 1rem;
            }
            
            .buttons {
                margin-top: 10px;
                display: flex;
                flex-direction: row;
                justify-content: center;
                gap: 1rem;
            }
            
            .buttons button {
              padding: 8px 16px;
              border: none;
              border-radius: 4px;
              cursor: pointer;
            }
            
            .buttons button:hover {
                opacity: 0.8;
            }
            
            .taakBewerkSave {
                background-color: #5cbedb;
            }
            
            .annuleer {
              background-color: #dc3545;
              color: #fff;
            }
           </style>';

  $pageFilter = new \Elements\PageFilter($html);
  $pageFilter->addGlobalVars([
    'taakId' => $_POST['taakId']
  ]);
  echo $pageFilter->filter();
}