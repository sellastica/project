<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\Entity\EntityCollection;

/**
 * @property ProjectGroup[] $items
 * @method ProjectGroupCollection add($entity)
 * @method ProjectGroupCollection remove($key)
 * @method ProjectGroup|mixed getEntity(int $entityId, $default = null)
 * @method ProjectGroup|mixed getBy(string $property, $value, $default = null)
 */
class ProjectGroupCollection extends EntityCollection
{
}