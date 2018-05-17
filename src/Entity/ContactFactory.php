<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\Entity\EntityFactory;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\IBuilder;

/**
 * @method Contact build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see Contact
 */
class ContactFactory extends EntityFactory
{
	/**
	 * @param IEntity|Contact $entity
	 */
	public function doInitialize(IEntity $entity)
	{
		$entity->setRelationService(new ContactRelations($entity, $this->em));
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return Contact::class;
	}
}