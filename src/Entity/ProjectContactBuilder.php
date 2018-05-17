<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see ProjectContact
 */
class ProjectContactBuilder implements IBuilder
{
	use TBuilder;

	/** @var int */
	private $projectId;
	/** @var \Sellastica\Identity\Model\Contact */
	private $contact;
	/** @var string|null */
	private $note;

	/**
	 * @param int $projectId
	 * @param \Sellastica\Identity\Model\Contact $contact
	 */
	public function __construct(
		int $projectId,
		\Sellastica\Identity\Model\Contact $contact
	)
	{
		$this->projectId = $projectId;
		$this->contact = $contact;
	}

	/**
	 * @return int
	 */
	public function getProjectId(): int
	{
		return $this->projectId;
	}

	/**
	 * @return \Sellastica\Identity\Model\Contact
	 */
	public function getContact(): \Sellastica\Identity\Model\Contact
	{
		return $this->contact;
	}

	/**
	 * @return string|null
	 */
	public function getNote()
	{
		return $this->note;
	}

	/**
	 * @param string|null $note
	 * @return $this
	 */
	public function note(string $note = null)
	{
		$this->note = $note;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !ProjectContact::isIdGeneratedByStorage();
	}

	/**
	 * @return ProjectContact
	 */
	public function build(): ProjectContact
	{
		return new ProjectContact($this);
	}

	/**
	 * @param int $projectId
	 * @param \Sellastica\Identity\Model\Contact $contact
	 * @return self
	 */
	public static function create(
		int $projectId,
		\Sellastica\Identity\Model\Contact $contact
	): self
	{
		return new self($projectId, $contact);
	}
}