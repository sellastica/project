<?php
namespace Sellastica\Project\Service;

class ProjectContactService
{
	/** @var \Sellastica\Entity\EntityManager */
	private $em;


	/**
	 * @param \Sellastica\Entity\EntityManager $em
	 */
	public function __construct(
		\Sellastica\Entity\EntityManager $em
	)
	{
		$this->em = $em;
	}

	/**
	 * @param int $id
	 * @return null|\Sellastica\Project\Entity\ProjectContact
	 */
	public function find(int $id): ?\Sellastica\Project\Entity\ProjectContact
	{
		return $this->em->getRepository(\Sellastica\Project\Entity\ProjectContact::class)->find($id);
	}

	/**
	 * @param array $filter
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return null|\Sellastica\Project\Entity\ProjectContact
	 */
	public function findOneBy(
		array $filter,
		\Sellastica\Entity\Configuration $configuration = null
	): ?\Sellastica\Project\Entity\ProjectContact
	{
		return $this->em->getRepository(\Sellastica\Project\Entity\ProjectContact::class)->findOneBy(
			$filter, $configuration
		);
	}

	/**
	 * @param string $email
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return null|\Sellastica\Project\Entity\ProjectContact
	 */
	public function findOneByEmail(
		string $email,
		\Sellastica\Entity\Configuration $configuration = null
	): ?\Sellastica\Project\Entity\ProjectContact
	{
		return $this->findOneBy(
			['email' => $email], $configuration
		);
	}

	/**
	 * @param array $filter
	 * @param \Sellastica\Entity\Configuration|null $configuration
	 * @return \Sellastica\Project\Entity\ProjectContactCollection|\Sellastica\Project\Entity\ProjectContact[]
	 */
	public function findBy(
		array $filter,
		\Sellastica\Entity\Configuration $configuration = null
	): \Sellastica\Project\Entity\ProjectContactCollection
	{
		return $this->em->getRepository(\Sellastica\Project\Entity\ProjectContact::class)->findBy($filter, $configuration);
	}
}