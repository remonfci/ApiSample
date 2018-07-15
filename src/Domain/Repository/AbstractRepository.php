<?php

namespace Api\Domain\Repository;


use Api\Domain\Entity\Transaction;
use Api\Infrastructure\Service\DatabaseAdapterInterface;

/**
 * Class AbstractRepository
 * @package Api\Domain\Repository
 *
 * @author Remon Adel <r.naeem.fcih@gmail.com>
 */
abstract class AbstractRepository
{
    /**
     * @var DatabaseAdapterInterface
     */
    protected $database;

    /**
     * AbstractRepository constructor.
     * @param DatabaseAdapterInterface $database
     */
    public function __construct(DatabaseAdapterInterface $database)
    {
        $this->database = $database;
    }

    /**
     * @param array $row
     * @return Transaction
     */
    protected function createInstance(array $row) {
        try {
            return $this->map($row, new Transaction($row['id'], $row['latitude'], $row['longitude']));
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * @param $row
     * @param Transaction $transaction
     * @return Transaction
     * @throws \Exception
     */
    protected function map($row, Transaction $transaction) {
        foreach ($row as $attribute => $value) {
            $method = 'set' . ucfirst($attribute);

            if (method_exists($transaction, $method)) {
                call_user_func_array(array($transaction, $method), array($value));
            } else {
                throw new \Exception("No setter method exists for '$attribute'");
            }
        }

        return $transaction;
    }
}
