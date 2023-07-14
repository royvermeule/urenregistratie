<?php

declare(strict_types=1);

namespace Controllers;

use Models\TaakModel as TaakModel;

class TaakController
{
  private TaakModel $taakModel;

  public function __construct()
  {
    $this->taakModel = new TaakModel();
  }

  /**
   * @param mixed $dagId
   * @return array
   */
  public function getTaakById(mixed $taakId): array
  {
    $taak = $this->taakModel->getTaakById($taakId);
    foreach ($taak as $value) {
      $taakData = [
        'id' => $value['taa_id'],
        'naam' => $value['taa_naam'],
        'omschrijving' => $value['taa_omschrijving'],
        'gekoppeldeDag' => $value['taa_dag_id'],
        'duur' => $value['taa_tijd']
      ];
    }
    return $taakData;
  }

  /**
   * @param $post
   * @return string[]
   */
  public function createTaak($post): array
  {
    $errors = [
      'taaknaam' => '',
      'taakbeschrijving' => ''
    ];

    if ($post['taaknaam'] === '') {
      $errors['taaknaam'] = 'Een taak naam is verplicht!';
    }

    if ($post['taakbeschrijving'] === '') {
      $errors['taakbeschrijving'] = 'Een beschrijving is verplicht!';
    }

    if ($post['taaknaam'] !== '' && $post['taakbeschrijving'] !== '') {
      $this->taakModel->createTaak($post);
    }
    return $errors;
  }
}