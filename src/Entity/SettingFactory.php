<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\Entity\EntityFactory;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\IBuilder;

/**
 * @method Setting build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 */
class SettingFactory extends EntityFactory
{
	/**
	 * @param \Sellastica\Entity\Entity\IEntity $entity
	 */
	public function doInitialize(IEntity $entity)
	{
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return Setting::class;
	}
}