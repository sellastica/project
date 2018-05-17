<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Entity\Mapping\RepositoryProxy;
use Sellastica\Project\Entity\IProjectContactRepository;
use Sellastica\Project\Entity\ProjectContact;

/**
 * @method ProjectContactRepository getRepository()
 * @see ProjectContact
 */
class ProjectContactRepositoryProxy extends RepositoryProxy implements IProjectContactRepository
{
}