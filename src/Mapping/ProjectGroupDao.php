<?php
namespace Core\Infrastructure\Mapping\Project;

use Core\Infrastructure\Mapping\Dibi\Project\ProjectGroupDibiMapper;
use Sellastica\Entity\Entity\EntityCollection;
use Sellastica\Entity\IBuilder;
use Sellastica\Entity\Mapping\Dao;
use Sellastica\Project\Entity\ProjectGroupBuilder;
use Sellastica\Project\Entity\ProjectGroupCollection;

/**
 * @see \Sellastica\Project\Entity\ProjectGroup
 * @property ProjectGroupDibiMapper $mapper
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