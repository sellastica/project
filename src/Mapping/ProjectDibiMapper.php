<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Api\Mapping\TApiDibiMapper;
use Sellastica\Entity\Mapping\DibiMapper;

class ProjectDibiMapper extends DibiMapper
{
	use TApiDibiMapper;
	use \Sellastica\DataGrid\Mapping\Dibi\TFilterRulesDibiMapper;


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
			->leftJoin($this->environment->getCrmDatabaseName() . '.project_url')
			->on('project_url.projectId = %n.id', $this->getTableName())
			->where('project_url.host = %s', $host)
			->or('%n.host = %s', $this->getTableName(), $host)
			->fetchSingle();
	}

	/**
	 * @return int
	 */
	public function findBilledProjectsCount(): int
	{
		return $this->database->select('COUNT(*)')
			->from($this->database->select('COUNT(*)')
				->from('%n.invoice', $this->environment->getCrmDatabaseName())
				->groupBy('projectId')
			)->as('tmp')
			->fetchSingle();
	}

	/**
	 * @param int $jobId
	 * @return array
	 */
	public function findByJobId(int $jobId): array
	{
		return $this->database->select('projectId')
			->from($this->environment->getCrmDatabaseName() . '.scheduler_project')
			->where('jobId = %i', $jobId)
			->fetchPairs();
	}

	/**
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @param \Sellastica\DataGrid\Model\FilterRuleCollection|null $rules
	 * @return \Dibi\Fluent
	 */
	protected function getAdminResource(
		\Sellastica\Entity\Configuration $configuration = null,
		\Sellastica\DataGrid\Model\FilterRuleCollection $rules = null
	): \Dibi\Fluent
	{
		$resource = parent::getAdminResource($configuration);
		if ($rules) {
			if ($rules['invoice']
				|| $rules['payment_date']) {
				$resource->innerJoin('invoice')
					->on('invoice.projectId = %n.id', $this->getTableName())
					->where('invoice.proforma = 1')
					->where('invoice.cancelled = 0');
			}

			//invoice
			if ($rules['invoice']) {
				switch ($rules['invoice']->getValue()) {
					case 'paid':
						$resource->where('invoice.paidAmount > 0');
						break;
					case 'unpaid':
						$resource->where('invoice.paidAmount = 0');
						break;
				}
			}

			//payment_date
			if ($rules['payment_date']) {
				$resource->where('invoice.paymentDate >= %d', \Nette\Utils\DateTime::createFromFormat('j.n.Y', $rules['payment_date']->getValue()));
			}

			//billing address
			if ($rules['billing_address']) {
				$resource->where('(company IS NULL AND firstName IS NULL AND lastName IS NULL)');
			}

			//suspended
			if ($rules['suspended']) {
				if ($rules['suspended']->getValue()) {
					$resource->where('suspended IS NOT NULL');
				} else {
					$resource->where('suspended IS NULL');
				}
			}

			//tariff history
			if ($rules['tariff_history']) {
				if ($rules['tariff_history']->getValue()) {
					$resource->innerJoin('tariff_history')
						->on('tariff_history.projectId = %n.id', $this->getTableName());
				} else {
					$resource->leftJoin('tariff_history')
						->on('tariff_history.projectId = %n.id', $this->getTableName())
						->where('tariff_history.id IS NULL');
				}
			}

			//application
			if ($rules['application']) {
				$resource->innerJoin('app_project_rel')
					->on('app_project_rel.projectId = %n.id', $this->getTableName())
					->innerJoin('app')
					->on('app.id = app_project_rel.applicationId')
					->where('app.slug = %s', $rules['application']->getValue());
			}
		}

		return $resource;
	}
}