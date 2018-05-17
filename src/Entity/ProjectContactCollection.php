<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\Entity\EntityCollection;

/**
 * @property ProjectContact[] $items
 * @method ProjectContactCollection add($entity)
 * @method ProjectContactCollection remove($key)
 * @method ProjectContact|mixed getEntity(int $entityId, $default = null)
 * @method ProjectContact|mixed getBy(string $property, $value, $default = null)
 */
class ProjectContactCollection extends EntityCollection
{
}