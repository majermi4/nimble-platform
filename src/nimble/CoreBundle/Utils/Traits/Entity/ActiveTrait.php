<?php

namespace nimble\CoreBundle\Utils\Traits\Entity;

use Doctrine\ORM\Mapping as ORM;

trait ActiveTrait
{

	/**
	 * @ORM\Column(type="boolean")
	 */
	protected $active;

	/**
	 * Set active
	 *
	 * @param boolean $active
	 *
	 * @return $this
	 */
	public function setActive($active)
	{
		$this->active = $active;

		return $this;
	}

	/**
	 * Get active
	 *
	 * @return boolean
	 */
	public function getActive()
	{
		return $this->active;
	}

}