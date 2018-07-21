<?php

namespace Api\Domain\Repository;


use Api\Domain\Entity\AbstractEntity;
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
     * @param string $entity
     * @param array $row
     * @return Transaction
     */
    protected function createInstance(array $row, $entity)
    {
        try {
            return $this->map($row, new $entity($row['id'], $row['latitude'], $row['longitude']));
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * @param $row
     * @param AbstractEntity $entity
     * @return Transaction
     * @throws \Exception
     */
    protected function map($row, AbstractEntity $entity)
    {
        foreach ($row as $attribute => $value) {
            $method = 'set' . ucfirst($attribute);

            if (method_exists($entity, $method)) {
                call_user_func_array(array($entity, $method), array($value));
            } else {
                throw new \Exception("No setter method exists for '$attribute'");
            }
        }

        return $entity;
    }
}
