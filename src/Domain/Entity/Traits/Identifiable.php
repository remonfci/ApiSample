<?php

namespace Api\Domain\Entity\Traits;


/**
 * Trait Identifiable
 * @package Api\Domain\Entity\Traits
 *
 * @author Remon Adel <r.naeem.fcih@gmail.com>
 */
trait Identifiable
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }
}
