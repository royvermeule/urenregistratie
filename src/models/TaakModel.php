<?php

declare(strict_types=1);

namespace Models;

use Libraries\BaseModel;

class TaakModel extends BaseModel
{
  /**
   * @param int $dagId
   * @return array
   */
  public function getTakenByDagId(int $dagId): array
  {
    $queryBuilder = $this->db->createQueryBuilder();

    $queryBuilder
      ->select('taa_id', 'taa_naam', 'taa_omschrijving', 'taa_tijd')
      ->from('taak')
      ->where('taa_dag_id = :dagId')
      ->setParameter('dagId', $dagId);

    $statement = $queryBuilder->execute();
    $taken = $statement->fetchAll();

    return $taken;
  }

  /**
   * @param int $taakId
   * @return array
   */
  public function getTaakById(mixed $taakId): array
  {
    $queryBuilder = $this->db->createQueryBuilder();

    $queryBuilder
      ->select('taa_id', 'taa_naam', 'taa_dag_id', 'taa_omschrijving', 'taa_tijd')
      ->from('taak')
      ->where('taa_id = :taakId')
      ->setParameter('taakId', $taakId);

    $statement = $queryBuilder->execute();
    $taak = $statement->fetchAll();

    return $taak;
  }

  /**
   * @param array $post
   * @return void
   */
  public function createTaak(array $post): void
  {
    $queryBuilder = $this->db->createQueryBuilder();

    try {
      $queryBuilder
        ->insert('taak')
        ->values([
          'taa_naam' => $queryBuilder->createNamedParameter($post['taaknaam']),
          'taa_dag_id' => $queryBuilder->createNamedParameter($post['dagId']),
          'taa_omschrijving' => $queryBuilder->createNamedParameter($post['taakbeschrijving']),
          'taa_tijd' => $queryBuilder->createNamedParameter($post['taakduur'])
        ]);

      $queryBuilder->execute();
    } catch (\Exception $e) {
      echo json_encode(['error' => $e->getMessage()]); // Return an error response
      // You can also log the error to a file or database for debugging purposes
    }
  }
}