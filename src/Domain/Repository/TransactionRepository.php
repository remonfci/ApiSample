<?php

namespace Api\Domain\Repository;


/**
 * Class TransactionRepository
 * @package Api\Domain\Repository
 *
 * @author Remon Adel <r.naeem.fcih@gmail.com>
 */
class TransactionRepository extends AbstractRepository implements RepositoryInterface
{
    /**
     * @param int $id
     * @return mixed|void
     */
    public function find(int $id)
    {
        // TODO: Implement find() method.
    }

    /**
     * @return mixed|void
     */
    public function findAll()
    {
        // TODO: Implement findAll() method.
    }

    /**
     * @param $entity
     * @return mixed|void
     */
    public function create($entity)
    {
        // TODO: Implement create() method.
    }

    /**
     * @param $entity
     * @return mixed|void
     */
    public function delete($entity)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @return array
     */
    public function getRandomTransactions()
    {
        $query = 'SELECT id, latitude, longitude FROM transactions ORDER BY RAND() LIMIT 20';
        $transactions = $this->database->query($query);
        $randTransactions = [];
        foreach ($transactions as $transaction) {
            $randTransactions[] = $this->createInstance($transaction);
        }

        return $randTransactions;
    }
}
