<?php
/**
 * This file is part of the Igitt package.
 *
 * (c) Hiren Chhatbar <hc.rajkot@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

 namespace Hiren\Igitt\Validators;

 /**
  * AbstractValidator class
  *
  * @author Hiren Chhatbar <hc.rajkot@gmail.com>
  */
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