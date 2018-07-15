<?php

namespace Api\Domain\Repository;


/**
 * Interface RepositoryInterface
 * @package Api\Domain\Repository
 *
 * @author Remon Adel <r.naeem.fcih@gmail.com>
 */
interface RepositoryInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id);

    /**
     * @return mixed
     */
    public function findAll();

    /**
     * @param $entity
     * @return mixed
     */
    public function create($entity);

    /**
     * @param $entity
     * @return mixed
     */
    public function delete($entity);
}
