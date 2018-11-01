<?php
namespace Sellastica\Project\Entity;

use Core\Domain\Model\Store\Store;
use Core\Domain\Model\Store\StoreCollection;
use Sellastica\Entity\Configuration;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\EntityManager;
use Sellastica\Entity\Relation\IEntityRelations;
use Theme\Theme\Entity\Theme;

/**
 * @property Project $project
 */
class ProjectRelations implements IEntityRelations
{
	/** @var IEntity */
	private $project;
	/** @var EntityManager */
	private $em;


	/**
	 * @param IEntity $project
	 * @param EntityManager $em
	 */
	public function __construct(
		IEntity $project,
		EntityManager $em
	)
	{
		$this->project = $project;
		$this->em = $em;
	}

	/**
	 * @return ProjectUrl[]|ProjectUrlCollection
	 */
	public function getUrls(): ProjectUrlCollection
	{
		return $this->em->getRepository(ProjectUrl::class)->findBy(['projectId' => $this->project->getId()]);
	}

	/**
	 * @return ProjectGroup|\Sellastica\Entity\Entity\IEntity|null
	 */
	public function getGroup()
	{
		if (!$this->project->getGroupId()) {
			return null;
		}

		return $this->em->getRepository(ProjectGroup::class)->find($this->project->getGroupId());
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
	 * @return \Theme\Theme\Entity\ThemeCollection
	 */
	public function getThemes(): \Theme\Theme\Entity\ThemeCollection
	{
		return $this->em->getRepository(Theme::class)->findByProjectId($this->project->getId());
	}

	/**
	 * @return Theme|null
	 */
	public function getTheme(): ?Theme
	{
		return $this->em->getRepository(Theme::class)->find($this->project->getThemeId());
	}

	/**
	 * @return ProjectContactCollection|\Sellastica\Entity\Entity\EntityCollection
	 */
	public function getContacts(): ProjectContactCollection
	{
		return $this->em->getRepository(ProjectContact::class)->findby([
			'projectId' => $this->project->getId(),
		],
			Configuration::sortBy('lastName')
		);
	}

	/**
	 * @return null|Project
	 */
	public function getParentProject(): ?Project
	{
		return $this->em->getRepository(Project::class)->find($this->project->getParentProjectId());
	}

	/**
	 * @return ProjectCollection
	 */
	public function getAffiliateProjects(): ProjectCollection
	{
		return $this->em->getRepository(Project::class)->findBy([
			'parentProjectId' => $this->project->getId(),
		], Configuration::sortBy('title'));
	}
}