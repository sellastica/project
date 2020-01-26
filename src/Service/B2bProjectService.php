<?php
namespace Sellastica\Project\Service;

class B2bProjectService
{
	const COMMISSION_RATIO = 0.2,
		MAX_COMMISSIONS_COUNT = 12;

	/** @var ProjectService */
	private $projectService;
	/** @var \Sellastica\Crm\Entity\Invoice\Service\InvoiceService */
	private $invoiceService;


	/**
	 * @param ProjectService $projectService
	 * @param \Sellastica\Crm\Entity\Invoice\Service\InvoiceService $invoiceService
	 */
	public function __construct(
		ProjectService $projectService,
		\Sellastica\Crm\Entity\Invoice\Service\InvoiceService $invoiceService
	)
	{
		$this->projectService = $projectService;
		$this->invoiceService = $invoiceService;
	}

	/**
	 * @return \Sellastica\Project\Entity\ProjectCollection|\Sellastica\Project\Entity\Project[]
	 */
	public function findActiveB2BProjects(): \Sellastica\Project\Entity\ProjectCollection
	{
		return $this->projectService->findBy([
			'b2b' => 1,
			'active' => 1,
			'suspended IS NULL',
		]);
	}

	/**
	 * @param int $b2bPartnerId
	 * @return \Sellastica\Project\Entity\ProjectCollection|\Sellastica\Project\Entity\Project[]
	 */
	public function findPartnerProjects(int $b2bPartnerId): \Sellastica\Project\Entity\ProjectCollection
	{
		return $this->projectService->findBy(
			['b2bPartnerId' => $b2bPartnerId],
			\Sellastica\Entity\Configuration::sortBy('title')
		);
	}

	/**
	 * @param int $b2bPartnerId
	 * @return int
	 */
	public function findPartnerProjectsCount(int $b2bPartnerId): int
	{
		return $this->projectService->findCountBy(
			['b2bPartnerId' => $b2bPartnerId]
		);
	}

	/**
	 * @param int $projectId
	 * @return \Sellastica\Crm\Entity\Invoice\Entity\InvoiceCollection|\Sellastica\Crm\Entity\Invoice\Entity\Invoice[]
	 */
	public function findCommissionableInvoices(int $projectId): \Sellastica\Crm\Entity\Invoice\Entity\InvoiceCollection
	{
		return $this->invoiceService->findBy(
			[
				'projectId' => $projectId,
				'mustPay' => 1,
				'cancelled' => 0, //some cancelled invoices can be refunded
				'paidAmount > 0',
				'paidAmount >= priceToPay',
			],
			\Sellastica\Entity\Configuration::sortBy('created')
		);
	}
}