<?php

namespace nimble\CoreBundle\Utils\Traits\Entity;

use Doctrine\ORM\Mapping as ORM;

trait DeletedTrait
{

	/**
	 * @ORM\Column(type="boolean")
	 */
	protected $deleted;

	/**
	 * Set deleted
	 *
	 * @param boolean $deleted
	 *
	 * @return $this
	 */
	public function setDeleted($deleted)
	{
		$this->deleted = $deleted;

		return $this;
	}

	/**
	 * Get deleted
	 *
	 * @return boolean
	 */
	public function getDeleted()
	{
		return $this->deleted;
	}

	/**
	 * @ORM\PrePersist
	 */
	public function initDeletedTrait()
	{
		$this->deleted = false;
	}

}