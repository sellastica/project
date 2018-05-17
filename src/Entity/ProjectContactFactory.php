<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\Entity\EntityFactory;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\IBuilder;

/**
 * @method ProjectContact build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see ProjectContact
 */
class ProjectContactFactory extends EntityFactory
{
	/**
	 * @param IEntity|ProjectContact $entity
	 */
	public function doInitialize(IEntity $entity)
	{
		$entity->setRelationService(new ProjectContactRelations($entity, $this->em));
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return ProjectContact::class;
	}
}