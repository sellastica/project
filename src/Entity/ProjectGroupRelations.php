<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\EntityManager;
use Sellastica\Entity\Relation\IEntityRelations;

/**
 * @property Project $entity
 */
class ProjectGroupRelations implements IEntityRelations
{
	/** @var IEntity */
	private $entity;
	/** @var EntityManager */
	private $em;


	/**
	 * @param IEntity $entity
	 * @param EntityManager $em
	 */
	public function __construct(
		IEntity $entity,
		EntityManager $em
	)
	{
		$this->entity = $entity;
		$this->em = $em;
	}

	/**
	 * @return Project[]|ProjectCollection
	 */
	public function getProjects(): ProjectCollection
	{
		return $this->em->getRepository(Project::class)
			->findBy(['groupId' => $this->entity->getId()], Configuration::sortBy('title'));
	}
}