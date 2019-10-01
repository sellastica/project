<?php
namespace Sellastica\Project\Service;

class B2bProjectService
{
	const COMMISSION_RATIO = 0.25;

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
	 * @param \Sellastica\Project\Entity\Project $parentProject
	 * @return \Sellastica\Project\Entity\ProjectCollection|\Sellastica\Project\Entity\Project[]
	 */
	public function getSubordinateProjects(
		\Sellastica\Project\Entity\Project $parentProject
	): \Sellastica\Project\Entity\ProjectCollection
	{
		return $this->projectService->findBy(
			['parentProjectId' => $parentProject->getId()],
			\Sellastica\Entity\Configuration::sortBy('title')
		);
	}
}