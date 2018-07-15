<?php

namespace Api\Domain\Entity;
use Api\Domain\Entity\Traits\Identifiable;


/**
 * Class TransactionEntity
 * @package Api\Domain\Entity
 *
 * @author Remon Adel <r.naeem.fcih@gmail.com>
 */
class Transaction extends AbstractEntity
{
    use Identifiable;

    /**
     * @var
     */
    private $latitude;

    /**
     * @var
     */
    private $longitude;

    /**
     * Transaction constructor.
     * @param int $id
     * @param string $latitude
     * @param string $longitude
     */
    public function __construct(int $id, string $latitude, string $longitude)
    {
        $this->id = $id;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param string $latitude
     * @return $this
     */
    public function setLatitude(string $latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param string $longitude
     * @return $this
     */
    public function setLongitude(string $longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }
}
