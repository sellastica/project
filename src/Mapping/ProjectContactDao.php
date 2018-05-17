<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Entity\Entity\EntityCollection;
use Sellastica\Entity\IBuilder;
use Sellastica\Entity\Mapping\Dao;
use Sellastica\Project\Entity\ProjectContact;
use Sellastica\Project\Entity\ProjectContactBuilder;
use Sellastica\Project\Entity\ProjectContactCollection;

/**
 * @see ProjectContact
 * @property ProjectContactDibiMapper $mapper
 */
class ProjectContactDao extends Dao
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
		$data->email = new \Sellastica\Identity\Model\Email($data->email);
		return ProjectContactBuilder::create($data->projectId, $data->firstName, $data->lastName, $data->email)
			->hydrate($data);
	}

	/**
	 * @return EntityCollection|ProjectContactCollection
	 */
	public function getEmptyCollection(): EntityCollection
	{
		return new ProjectContactCollection;
	}
}