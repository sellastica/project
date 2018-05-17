<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Entity\Entity\EntityCollection;
use Sellastica\Entity\IBuilder;
use Sellastica\Entity\Mapping\Dao;
use Sellastica\Project\Entity\Contact;
use Sellastica\Project\Entity\ContactBuilder;
use Sellastica\Project\Entity\ContactCollection;

/**
 * @see Contact
 * @property ContactDibiMapper $mapper
 */
class ContactDao extends Dao
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
		return ContactBuilder::create($data->projectId, $data->firstName, $data->lastName, $data->email)
			->hydrate($data);
	}

	/**
	 * @return EntityCollection|ContactCollection
	 */
	public function getEmptyCollection(): EntityCollection
	{
		return new ContactCollection;
	}
}