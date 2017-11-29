<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\Entity\EntityFactory;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\IBuilder;

/**
 * @method ProjectGroup build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see ProjectGroup
 */
class ProjectGroupFactory extends EntityFactory
{
	/**
	 * @param IEntity|ProjectGroup $entity
	 */
	public function doInitialize(IEntity $entity)
	{
		$entity->setRelationService(new ProjectGroupRelations($entity, $this->em));
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return ProjectGroup::class;
	}
}