<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see ProjectGroup
 */
class ProjectGroupBuilder implements IBuilder
{
	use TBuilder;

	/** @var string */
	private $title;

	/**
	 * @param string $title
	 */
	public function __construct(string $title)
	{
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !ProjectGroup::isIdGeneratedByStorage();
	}

	/**
	 * @return ProjectGroup
	 */
	public function build(): ProjectGroup
	{
		return new ProjectGroup($this);
	}

	/**
	 * @param string $title
	 * @return self
	 */
	public static function create(string $title): self
	{
		return new self($title);
	}
}