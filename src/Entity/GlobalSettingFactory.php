<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\Entity\EntityFactory;

/**
 * @method GlobalSetting build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 * @see GlobalSetting
 */
class GlobalSettingFactory extends EntityFactory
{
	/**
	 * @param IEntity|GlobalSetting $entity
	 */
	public function doInitialize(IEntity $entity)
	{
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return GlobalSetting::class;
	}
}