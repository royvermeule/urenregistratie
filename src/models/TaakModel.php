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
  public function getTaakById(int $taakId): array
  {
    $queryBuilder = $this->db->createQueryBuilder();

    $queryBuilder
      ->select('taa_id', 'taa_naam', 'taa_omschrijving', 'taa_tijd')
      ->from('taak')
      ->where('taa_id = :taakId')
      ->setParameter('taa_id', $taakId);

    $statement = $queryBuilder->execute();
    $taak = $statement->fetchAll();

    return $taak;
  }
}