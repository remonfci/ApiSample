<?php

namespace Api\Domain\Service;

use Api\Domain\Repository\TransactionRepository;
use Klein\Response;

/**
 * Class RequestProcessor
 * @package Api\Domain\Service
 */
class RequestProcessor
{
    /**
     * @var $transactionRepository
     */
    protected $transactionRepository;

    /**
     * @var Response
     */
    protected $response;

    /**
     * Constructor
     *
     * @param TransactionRepository $transactionRepository
     * @param Response $response
     */
    public function __construct(
        TransactionRepository $transactionRepository,
        Response $response
    ) {
        $this->transactionRepository = $transactionRepository;
        $this->response = $response;
    }

    /**
     * process Api requests
     *
     * @return Response
     */
    public function process(): Response
    {
        $transactions = $this->transactionRepository->getRandom();

        $transactionsArray = array_map(
            function ($t) {
                return [
                    'latitude' => $t->getLatitude(),
                    'longitude' => $t->getLongitude(),
                    'id' => $t->getId()];
            },
            $transactions
        );

        return $this->response->json($transactionsArray);
    }
}
