<?php
namespace Sellastica\Project\Entity;

class ProjectContactRelations implements \Sellastica\Entity\Relation\IEntityRelations
{
	/** @var ProjectContact */
	private $contact;
	/** @var \Sellastica\Entity\EntityManager */
	private $em;


	/**
	 * @param ProjectContact $contact
	 * @param \Sellastica\Entity\EntityManager $em
	 */
	public function __construct(
		ProjectContact $contact,
		\Sellastica\Entity\EntityManager $em
	)
	{
		$this->contact = $contact;
		$this->em = $em;
	}

	/**
	 * @return \Sellastica\Project\Entity\Project
	 */
	public function getProject(): \Sellastica\Project\Entity\Project
	{
		return $this->em->getRepository(\Sellastica\Project\Entity\Project::class)->find($this->contact->getProjectId());
	}
}