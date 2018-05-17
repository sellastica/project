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
		$contact = new \Sellastica\Identity\Model\Contact(
			$data->firstName,
			$data->lastName,
			new \Sellastica\Identity\Model\Email($data->email),
			$data->phone
		);
		return ProjectContactBuilder::create($data->projectId, $contact)
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