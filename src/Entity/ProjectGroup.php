<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\Entity\AbstractEntity;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\Entity\TAbstractEntity;

/**
 * @generate-builder
 * @see ProjectGroupBuilder
 *
 * @property ProjectGroupRelations $relationService
 */
class ProjectGroup extends AbstractEntity implements IEntity
{
	use TAbstractEntity;

	/** @var string @required */
	private $title;
	/** @var ProjectCollection */
	private $projects;


	/**
	 * @param ProjectGroupBuilder $builder
	 */
	public function __construct(ProjectGroupBuilder $builder)
	{
		$this->hydrate($builder);
	}

	/**
	 * @return bool
	 */
	public static function isIdGeneratedByStorage(): bool
	{
		return true;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle(string $title)
	{
		$this->title = $title;
	}

	/**
	 * @return ProjectCollection
	 */
	public function getProjects(): ProjectCollection
	{
		if (!isset($this->projects)) {
			$this->projects = $this->relationService->getProjects();
		}

		return $this->projects;
	}


	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return [
			'id' => $this->id,
			'title' => $this->title,
		];
	}
}