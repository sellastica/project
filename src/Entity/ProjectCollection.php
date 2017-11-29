<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\Entity\EntityCollection;

/**
 * @property Project[] $items
 * @method ProjectCollection add($entity)
 * @method ProjectCollection remove($key)
 * @method Project|mixed getEntity(int $entityId, $default = null)
 * @method Project|mixed getBy(string $property, $value, $default = null)
 */
class ProjectCollection extends EntityCollection
{
}