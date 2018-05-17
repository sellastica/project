<?php
namespace Sellastica\Project\Entity;

/**
 * @generate-builder
 * @see ProjectContactBuilder
 *
 * @property \Sellastica\Project\Entity\ProjectContactRelations $relationService
 */
class ProjectContact extends \Sellastica\Entity\Entity\AbstractEntity implements \Sellastica\Entity\Entity\IAggregateRoot
{
	use \Sellastica\Entity\Entity\TAbstractEntity;

	/** @var int @required */
	private $projectId;
	/** @var \Sellastica\Identity\Model\Contact @required */
	private $contact;
	/** @var string|null @optional */
	private $note;


	/**
	 * @param \Sellastica\Project\Entity\ProjectContactBuilder $builder
	 */
	public function __construct(\Sellastica\Project\Entity\ProjectContactBuilder $builder)
	{
		$this->hydrate($builder);
	}

	/**
	 * @return bool
	 */
	public static function isIdGeneratedByStorage(): bool
	{
		return true;
	}

	/**
	 * @return int
	 */
	public function getProjectId(): int
	{
		return $this->projectId;
	}

	/**
	 * @return \Sellastica\Project\Entity\Project
	 */
	public function getProject(): \Sellastica\Project\Entity\Project
	{
		return $this->relationService->getProject();
	}

	/**
	 * @return \Sellastica\Identity\Model\Contact
	 */
	public function getContact(): \Sellastica\Identity\Model\Contact
	{
		return $this->contact;
	}

	/**
	 * @param \Sellastica\Identity\Model\Contact $contact
	 */
	public function setContact(\Sellastica\Identity\Model\Contact $contact): void
	{
		$this->contact = $contact;
	}

	/**
	 * @return null|string
	 */
	public function getNote(): ?string
	{
		return $this->note;
	}

	/**
	 * @param null|string $note
	 */
	public function setNote(?string $note): void
	{
		$this->note = $note;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return [
			'id' => $this->id,
			'projectId' => $this->projectId,
			'firstName' => $this->contact->getFirstName(),
			'lastName' => $this->contact->getLastName(),
			'email' => $this->contact->getEmail()->getEmail(),
			'note' => $this->note,
		];
	}
}