<?php
require __DIR__ . '/../require.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $html = '<div class="popup__container">
  <div class="popup">
    <div class="popup__message">
      Weet je zeker dat je de taak wilt verwijderen?
    </div>
    <div class="popup__options">
      <form id="verwijderTaak">
        <input type="hidden" name="taakId" value="{taakId}" required>
        <button class="verwijder" type="submit">Verwijder</button>
      </form>
      <button onclick="window.location.reload()">Annuleer</button>
    </div>
  </div>
</div>
<style>
            .popup__container {
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

            .popup {
              background-color: #fff;
              width: 60%;
              max-width: 300px;
              padding: 20px;
              border-radius: 8px;
              box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            }

            .popup__message {
              margin-bottom: 20px;
            }

            .popup__options {
              display: flex;
              justify-content: space-between;
            }

            .popup__options a {
              text-decoration: none;
            }

            .popup__options button {
              padding: 8px 16px;
              border: none;
              border-radius: 4px;
              cursor: pointer;
            }

            .verwijder {
              background-color: #dc3545;
              color: #fff;
            }

           .annuleren {
              background-color: #6c757d;
              color: #fff;
            }

            .popup__options button:hover {
              opacity: 0.8;
            }

            .popup__options button:focus {
              outline: none;
            }

            .popup__options button + button {
              margin-left: 10px;
            }
           </style>';

  $pageFilter = new \Elements\PageFilter($html);
  $pageFilter->addGlobalVars([
    'taakId' => $_POST['taakId']
  ]);
  echo $pageFilter->filter();
}



