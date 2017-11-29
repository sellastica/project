<?php
namespace Core\Infrastructure\Mapping\Project;

use Sellastica\Api\Mapping\TApiRepositoryProxy;
use Sellastica\Entity\Mapping\RepositoryProxy;
use Sellastica\Project\Entity\IProjectRepository;

/**
 * @method ProjectRepository getRepository()
 */
class ProjectRepositoryProxy extends RepositoryProxy implements IProjectRepository
{
	use TApiRepositoryProxy;

	public function findByHost(string $host)
	{
		return $this->getRepository()->findByHost($host);
	}
}
