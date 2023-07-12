<?php

declare(strict_types=1);

namespace Models;

use Libraries\BaseModel;

class DagModel extends BaseModel
{
  /**
   * @return array
   */
  public function getDagen(): array
  {
    $queryBuilder = $this->db->createQueryBuilder();

    $queryBuilder
      ->select('dag_id', 'dag_naam')
      ->from('dag');

    $statement = $queryBuilder->execute();
    $dagen = $statement->fetchAll();

    return $dagen;
  }
}