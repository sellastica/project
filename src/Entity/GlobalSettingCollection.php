<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\Entity\EntityCollection;

/**
 * @property GlobalSetting[] $items
 * @method GlobalSettingCollection add($entity)
 * @method GlobalSettingCollection remove($key)
 * @method GlobalSetting|mixed getEntity(int $entityId, $default = null)
 * @method GlobalSetting|mixed getBy(string $property, $value, $default = null)
 */
class GlobalSettingCollection extends EntityCollection
{
}