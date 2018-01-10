<?php
namespace Sellastica\Project\Entity;

use Core\Domain\Model\Project\Theme;
use Core\Domain\Model\Project\ThemeCollection;
use Core\Domain\Model\Store\Store;
use Core\Domain\Model\Store\StoreCollection;
use Sellastica\Entity\Configuration;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\EntityManager;
use Sellastica\Entity\Relation\IEntityRelations;

/**
 * @property Project $entity
 */
class ProjectRelations implements IEntityRelations
{
	/** @var IEntity */
	private $entity;
	/** @var EntityManager */
	private $em;


	/**
	 * @param IEntity $entity
	 * @param EntityManager $em
	 */
	public function __construct(
		IEntity $entity,
		EntityManager $em
	)
	{
		$this->entity = $entity;
		$this->em = $em;
	}

	/**
	 * @return ProjectUrl[]|ProjectUrlCollection
	 */
	public function getUrls(): ProjectUrlCollection
	{
		return $this->em->getRepository(ProjectUrl::class)->findBy(['projectId' => $this->entity->getId()]);
	}

	/**
	 * @return ProjectGroup|\Sellastica\Entity\Entity\IEntity|null
	 */
	public function getGroup()
	{
		if (!$this->entity->getGroupId()) {
			return null;
		}

		return $this->em->getRepository(ProjectGroup::class)->find($this->entity->getGroupId());
	}

	/**
	 * @param Configuration|null $configuration
	 * @param array $filters
	 * @return Store[]|StoreCollection
	 */
	public function getStores(Configuration $configuration = null, array $filters = [])
	{
		return $this->em->getRepository(Store::class)->findStores(
			$filters,
			$configuration ?? Configuration::sortBy('title'),
			true
		);
	}

	/**
	 * @return int
	 */
	public function getStoresCount(): int
	{
		return $this->em->getRepository(Store::class)->findCount();
	}

	/**
	 * @return ThemeCollection
	 */
	public function getThemes(): ThemeCollection
	{
		return $this->em->getRepository(Theme::class)->findByProjectId($this->entity->getId());
	}

	/**
	 * @return Theme|null
	 */
	public function getTheme(): ?Theme
	{
		return $this->em->getRepository(Theme::class)->find($this->entity->getThemeId());
	}
}