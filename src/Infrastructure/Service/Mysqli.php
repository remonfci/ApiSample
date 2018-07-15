<?php

namespace Api\Infrastructure\Service;


/**
 * Class Mysqli
 * @package Api\Infrastructure\Service
 *
 * @author Remon Adel <r.naeem.fcih@gmail.com>
 */
class Mysqli implements DatabaseAdapterInterface
{
    /**
     * @var \mysqli
     */
    private $connection;

    /**
     * @param array $config
     * @return mixed|void
     */
    public function connect(array $config)
    {
        $con = new \mysqli($config['dbhost'], $config['dbuser'], $config['dbpassword'], $config['dbname']);

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $this->connection = $con;
    }

    /**
     * @param string $query
     * @return array
     */
    public function query(string $query): array
    {
        $result = $this->connection->query($query);
        $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $rows;
    }
}
