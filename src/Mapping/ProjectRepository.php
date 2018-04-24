<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Api\Mapping\TApiRepository;
use Sellastica\Entity\Mapping\Repository;
use Sellastica\Project\Entity\Project;

/**
 * @property ProjectDao $dao
 */
class ProjectRepository extends Repository implements \Sellastica\Project\Entity\IProjectRepository
{
	use TApiRepository;
	use \Sellastica\DataGrid\Mapping\TFilterRulesRepository;

	/**
	 * @param string $host
	 * @return Project|null
	 */
	public function findByHost(string $host)
	{
		return $this->initialize($this->dao->findByHost($host));
	}
}
