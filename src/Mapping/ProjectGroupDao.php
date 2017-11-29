<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Entity\Entity\EntityCollection;
use Sellastica\Entity\IBuilder;
use Sellastica\Entity\Mapping\Dao;
use Sellastica\Project\Entity\ProjectGroupBuilder;
use Sellastica\Project\Entity\ProjectGroupCollection;

/**
 * @see \Sellastica\Project\Entity\ProjectGroup
 * @property \Sellastica\Project\Mapping\ProjectGroupDibiMapper $mapper
 */
class ProjectGroupDao extends Dao
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
		return ProjectGroupBuilder::create($data->title)
			->hydrate($data);
	}

	/**
	 * @return \Sellastica\Entity\Entity\EntityCollection|\Sellastica\Project\Entity\ProjectGroupCollection
	 */
	protected function getEmptyCollection(): EntityCollection
	{
		return new ProjectGroupCollection;
	}
}