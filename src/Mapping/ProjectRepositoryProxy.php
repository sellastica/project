<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Api\Mapping\TApiRepositoryProxy;
use Sellastica\Entity\Mapping\RepositoryProxy;
use Sellastica\Project\Entity\IProjectRepository;

/**
 * @method ProjectRepository getRepository()
 */
class ProjectRepositoryProxy extends RepositoryProxy implements IProjectRepository
{
	use TApiRepositoryProxy;
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesRepositoryProxy;


	public function findByHost(string $host)
	{
		return $this->getRepository()->findByHost($host);
	}

	public function findByJobId(int $jobId): \Sellastica\Project\Entity\ProjectCollection
	{
		return $this->getRepository()->findByJobId($jobId);
	}

	/**
	 * @return int
	 */
	public function findBilledProjectsCount(): int
	{
		return $this->getRepository()->findBilledProjectsCount();
	}
}
