<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\EntityManager;
use Sellastica\Entity\Relation\IEntityRelations;

/**
 * @property Project $project
 */
class ProjectRelations implements IEntityRelations
{
	/** @var IEntity */
	private $project;
	/** @var EntityManager */
	private $em;


	/**
	 * @param IEntity $project
	 * @param EntityManager $em
	 */
	public function __construct(
		IEntity $project,
		EntityManager $em
	)
	{
		$this->project = $project;
		$this->em = $em;
	}

	/**
	 * @return ProjectUrl[]|ProjectUrlCollection
	 */
	public function getUrls(): ProjectUrlCollection
	{
		return $this->em->getRepository(ProjectUrl::class)->findBy(['projectId' => $this->project->getId()]);
	}

	/**
	 * @return ProjectGroup|\Sellastica\Entity\Entity\IEntity|null
	 */
	public function getGroup()
	{
		if (!$this->project->getGroupId()) {
			return null;
		}

		return $this->em->getRepository(ProjectGroup::class)->find($this->project->getGroupId());
	}

	/**
	 * @return ProjectContactCollection|\Sellastica\Entity\Entity\EntityCollection
	 */
	public function getContacts(): ProjectContactCollection
	{
		return $this->em->getRepository(ProjectContact::class)->findby([
			'projectId' => $this->project->getId(),
		],
			Configuration::sortBy('lastName')
		);
	}

	/**
	 * @return \Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\B2bPartner|null
	 */
	public function getB2bPartner(): ?\Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\B2bPartner
	{
		return $this->em->getRepository(\Sellastica\CatalogSupplier\Entity\B2bPartner\Entity\B2bPartner::class)
			->find($this->project->getB2bPartnerId());
	}
}