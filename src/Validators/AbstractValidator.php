<?php

namespace Hiren\Igitt\Validators;

abstract class AbstractValidator implements ValidatorInterface
{
    /**
     * Entity ID
     *
     * @var int
     */
    protected int $id = 0;

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
}