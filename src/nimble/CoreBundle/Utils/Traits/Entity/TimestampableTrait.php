<?php

namespace nimble\CoreBundle\Utils\Traits\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

trait TimestampableTrait
{
	/**
	 * @var \DateTime $createdAt Created at
	 *
	 * @ORM\Column(type="datetime", name="created_at")
	 */
	protected $createdAt;

	/**
	 * @var \DateTime $updatedAt Updated at
	 *
	 * @ORM\Column(type="datetime", name="updated_at")
	 */
	protected $updatedAt;

	/**
	 * Get created at
	 *
	 * @return \DateTime Created at
	 */
	public function getCreatedAt()
	{
		return $this->createdAt;
	}

	/**
	 * Set created at
	 *
	 * @param \DateTime $createdAt Created at
	 *
	 * @return $this
	 */
	public function setCreatedAt(DateTime $createdAt)
	{
		$this->createdAt = $createdAt;

		return $this;
	}

	/**
	 * @ORM\PrePersist
	 */
	public function initTimestampableTrait()
	{
		$this->createdAt = new DateTime();
		$this->updatedAt = new DateTime();
	}

	/**
	 * @ORM\PreUpdate
	 */
	public function changeUpdatedAt()
	{
		$this->updatedAt = new DateTime();
	}

	/**
	 * Get updated at
	 *
	 * @return \DateTime Updated at
	 */
	public function getUpdatedAt()
	{
		return $this->updatedAt;
	}

	/**
	 * Set updated at
	 *
	 * @param \DateTime $updatedAt Updated at
	 *
	 * @return $this
	 */
	public function setUpdatedAt(DateTime $updatedAt)
	{
		$this->updatedAt = $updatedAt;

		return $this;
	}
}