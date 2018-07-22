<?php

namespace Api\Domain\Entity;
use Api\Domain\Entity\Traits\Identifiable;


/**
 * Class TransactionEntity
 * @package Api\Domain\Entity
 *
 * @author Remon Adel <r.naeem.fcih@gmail.com>
 */
class Transaction extends Entity
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
