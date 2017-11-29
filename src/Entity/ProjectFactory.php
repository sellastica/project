<?php
namespace Sellastica\Project\Entity;

use Core\Presentation\Web\ShopProxyFactory;
use Sellastica\Entity\Entity\EntityFactory;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\EntityManager;
use Sellastica\Entity\Event\IDomainEventPublisher;
use Sellastica\Entity\IBuilder;

/**
 * @method Project build(IBuilder $builder, bool $initialize = true, int $assignedId = null)
 */
class ProjectFactory extends EntityFactory
{
	/** @var ShopProxyFactory */
	private $shopProxyFactory;

	/**
	 * @param EntityManager $em
	 * @param \Sellastica\Entity\Event\IDomainEventPublisher $eventPublisher
	 * @param ShopProxyFactory $shopProxyFactory
	 */
	public function __construct(
		EntityManager $em,
		IDomainEventPublisher $eventPublisher,
		ShopProxyFactory $shopProxyFactory
	)
	{
		parent::__construct($em, $eventPublisher);
		$this->shopProxyFactory = $shopProxyFactory;
	}

	/**
	 * @param \Sellastica\Entity\Entity\IEntity|Project $entity
	 */
	public function doInitialize(IEntity $entity)
	{
		$entity->setRelationService(new ProjectRelations($entity, $this->em));
		$entity->doInitialize(
			$this->shopProxyFactory
		);
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return Project::class;
	}
}