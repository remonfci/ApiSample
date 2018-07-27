<?php
declare(strict_types=1);

namespace Api;

use Api\Domain\Repository\TransactionRepository;
use Api\Infrastructure\Service\Mysqli;
use Api\Domain\Service\RequestProcessor;

/**
 * Class Bootstrap
 * This class is used for initializing the api
 *
 * @author Remon Adel <r.naeem.fcih@gmail.com>
 */
class Bootstrap
{
    /**
     * @param array $configuration
     */
    public static function init(array $configuration)
    {
        $klein = new \Klein\Klein();

        $klein->respond('GET', '/api', function ($request, $response) use ($configuration) {
            $mysqli = new Mysqli();
            $mysqli->connect($configuration);

            $transactionRepository = new TransactionRepository($mysqli);

            $requestProcessor = new RequestProcessor(
                $transactionRepository,
                $response
            );
            return $requestProcessor->process();
        });

        $klein->dispatch();
    }
}
