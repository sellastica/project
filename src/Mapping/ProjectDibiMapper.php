<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Api\Mapping\TApiDibiMapper;
use Sellastica\Entity\Mapping\DibiMapper;

class ProjectDibiMapper extends DibiMapper
{
	use TApiDibiMapper;

	/**
	 * @return bool
	 */
	protected function isInCrmDatabase(): bool
	{
		return true;
	}

	/**
	 * @param string $host
	 * @return int|false
	 */
	public function findByHost(string $host)
	{
		return $this->getResourceWithIds()
			->leftJoin('crm.project_url')
			->on('project_url.projectId = %n.id', $this->getTableName())
			->where('project_url.host = %s', $host)
			->or('%n.host = %s', $this->getTableName(), $host)
			->fetchSingle();
	}
}