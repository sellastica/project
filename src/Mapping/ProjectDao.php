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
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesDao;


	/**
	 * @param string $host
	 * @return Project|null
	 */
	public function findByHost(string $host)
	{
		return $this->find($this->mapper->findByHost($host));
	}

	/**
	 * @param int $jobId
	 * @return ProjectCollection
	 */
	public function findByJobId(int $jobId): ProjectCollection
	{
		return $this->getEntitiesFromCacheOrStorage($this->mapper->findByJobId($jobId));
	}

	/**
	 * {@inheritdoc}
	 */
	protected function getBuilder($data, $first = null, $second = null): IBuilder
	{
		$data->accountingPeriod = \Sellastica\Crm\Model\AccountingPeriod::from($data->accountingPeriod);
		$billingAddress = \Sellastica\Identity\Model\BillingAddress::fromArray((array)$data);
		return \Sellastica\Project\Entity\ProjectBuilder::create(
			$data->title,
			$data->scheme,
			$data->www,
			$data->host,
			$data->localizationCode,
			$data->currencyCode,
			new Email($data->email)
		)->hydrate($data)
			->billingAddress(!$billingAddress->isEmpty() ? $billingAddress : null);
	}

	/**
	 * @return EntityCollection|ProjectCollection
	 */
	public function getEmptyCollection(): EntityCollection
	{
		return new ProjectCollection();
	}
}