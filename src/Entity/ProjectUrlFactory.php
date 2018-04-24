<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\Entity\EntityFactory;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\IBuilder;

/**
 * @method ProjectUrl build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see ProjectUrl
 */
class ProjectUrlFactory extends EntityFactory
{
	/**
	 * @param \Sellastica\Entity\Entity\IEntity|ProjectUrl $entity
	 */
	public function doInitialize(IEntity $entity)
	{
		$entity->setRelationService(new ProjectUrlRelations($entity, $this->em));
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return ProjectUrl::class;
	}
}