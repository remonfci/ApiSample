<?php

namespace Api\Domain\Repository;
use Api\Domain\Entity\Transaction;


/**
 * Class TransactionRepository
 * @package Api\Domain\Repository
 *
 * @author Remon Adel <r.naeem.fcih@gmail.com>
 */
class TransactionRepository extends AbstractRepository implements RandomEntityInterface
{
    /**
     * @return array
     */
    public function getRandom()
    {
        $query = 'SELECT id, latitude, longitude FROM transactions ORDER BY RAND() LIMIT 20';
        $transactions = $this->database->query($query);
        $randTransactions = [];
        foreach ($transactions as $transaction) {
            $randTransactions[] = $this->createInstance($transaction, Transaction::class);
        }

        return $randTransactions;
    }
}
