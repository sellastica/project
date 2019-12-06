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
	/** @var \Core\Presentation\Web\ShopProxyFactory */
	private $proxyFactory;


	/**
	 * @param EntityManager $em
	 * @param \Sellastica\Entity\Event\IDomainEventPublisher $eventPublisher
	 * @param \Core\Presentation\Web\ShopProxyFactory $proxyFactory
	 */
	public function __construct(
		EntityManager $em,
		IDomainEventPublisher $eventPublisher,
		ShopProxyFactory $proxyFactory
	)
	{
		parent::__construct($em, $eventPublisher);
		$this->proxyFactory = $proxyFactory;
	}

	/**
	 * @param \Sellastica\Entity\Entity\IEntity|Project $entity
	 */
	public function doInitialize(IEntity $entity)
	{
		$entity->setRelationService(new ProjectRelations($entity, $this->em));
	}

	/**
	 * @return string
	 */
	public function getEntityClass(): string
	{
		return Project::class;
	}
}