<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\Entity\EntityCollection;

/**
 * @property Setting[] $items
 * @method SettingCollection add($entity)
 * @method SettingCollection remove($key)
 * @method Setting|mixed getEntity(int $entityId, $default = null)
 * @method Setting|mixed getBy(string $property, $value, $default = null)
 */
class SettingCollection extends EntityCollection
{
}