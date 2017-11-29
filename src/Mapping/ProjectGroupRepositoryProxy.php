<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Entity\Mapping\RepositoryProxy;

/**
 * @method ProjectGroupRepository getRepository()
 * @see \Sellastica\Project\Entity\ProjectGroup
 */
class ProjectGroupRepositoryProxy extends RepositoryProxy implements \Sellastica\Project\Entity\IProjectGroupRepository
{
}