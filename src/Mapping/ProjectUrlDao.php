<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Entity\Entity\EntityCollection;
use Sellastica\Entity\IBuilder;
use Sellastica\Entity\Mapping\Dao;
use Sellastica\Project\Entity\ProjectUrlBuilder;
use Sellastica\Project\Entity\ProjectUrlCollection;

/**
 * @see \Sellastica\Project\Entity\ProjectUrl
 * @property ProjectUrlDibiMapper $mapper
 */
class ProjectUrlDao extends Dao
{
	/**
	 * @inheritDoc
	 */
	protected function getBuilder(
		$data,
		$first = null,
		$second = null
	): IBuilder
	{
		return ProjectUrlBuilder::create($data->projectId, $data->scheme, $data->www, $data->host)
			->hydrate($data);
	}

	/**
	 * @return EntityCollection|ProjectUrlCollection
	 */
	public function getEmptyCollection(): EntityCollection
	{
		return new \Sellastica\Project\Entity\ProjectUrlCollection;
	}
}