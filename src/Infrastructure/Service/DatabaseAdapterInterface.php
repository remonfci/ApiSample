<?php

namespace Api\Infrastructure\Service;

/**
 * Interface DatabaseAdapterInterface
 * @package Api\Infrastructure\Service
 *
 * @author Remon Adel <r.naeem.fcih@gmail.com>
 */
interface DatabaseAdapterInterface
{
    /**
     * @param array $config
     * @return mixed
     */
    public function connect(array $config);

    /**
     * @param string $query
     * @return array
     */
    public function query(string $query): array ;
}
