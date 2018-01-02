<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Api\Mapping\TApiDao;
use Sellastica\Entity\Entity\EntityCollection;
use Sellastica\Entity\IBuilder;
use Sellastica\Entity\Mapping\Dao;
use Sellastica\Identity\Model\Email;
use Sellastica\Project\Entity\Project;
use Sellastica\Project\Entity\ProjectCollection;

/**
 * @method \Sellastica\Project\Entity\Project|null find(int $id = null, $first = null, $second = null)
 * @property ProjectDibiMapper $mapper
 */
class ProjectDao extends Dao
{
	use TApiDao;

	/**
	 * @param string $host
	 * @return Project|null
	 */
	public function findByHost(string $host)
	{
		return $this->find($this->mapper->findByHost($host));
	}

	/**
	 * {@inheritdoc}
	 */
	protected function getBuilder($data, $first = null, $second = null): IBuilder
	{
		return \Sellastica\Project\Entity\ProjectBuilder::create(
			$data->customerNumber,
			$data->title,
			$data->scheme,
			$data->www,
			$data->host,
			$data->localizationCode,
			$data->currencyCode,
			new Email($data->email)
		)->hydrate($data);
	}

	/**
	 * @return EntityCollection|ProjectCollection
	 */
	protected function getEmptyCollection(): EntityCollection
	{
		return new ProjectCollection();
	}
}