<?php
namespace Core\Infrastructure\Mapping\Project;

use Sellastica\Entity\Mapping\RepositoryProxy;

/**
 * @method ProjectUrlRepository getRepository()
 * @see \Sellastica\Project\Entity\ProjectUrl
 */
class ProjectUrlRepositoryProxy extends RepositoryProxy implements \Sellastica\Project\Entity\IProjectUrlRepository
{
}