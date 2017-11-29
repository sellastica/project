<?php
namespace Core\Infrastructure\Mapping\Project;

use Sellastica\Entity\Mapping\RepositoryProxy;

/**
 * @method ProjectGroupRepository getRepository()
 * @see \Sellastica\Project\Entity\ProjectGroup
 */
class ProjectGroupRepositoryProxy extends RepositoryProxy implements \Sellastica\Project\Entity\IProjectGroupRepository
{
}