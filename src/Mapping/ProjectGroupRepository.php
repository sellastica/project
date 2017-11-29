<?php
namespace Core\Infrastructure\Mapping\Project;

use Sellastica\Entity\Mapping\Repository;

/**
 * @property ProjectGroupDao $dao
 * @see \Sellastica\Project\Entity\ProjectGroup
 */
class ProjectGroupRepository extends Repository implements \Sellastica\Project\Entity\IProjectGroupRepository
{
}