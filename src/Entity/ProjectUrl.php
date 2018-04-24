<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\Entity\AbstractEntity;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\Entity\TAbstractEntity;
use Sellastica\Http\Url;

/**
 * @generate-builder
 * @see ProjectUrlBuilder
 *
 * @property ProjectUrlRelations $relationService
 */
class ProjectUrl extends AbstractEntity implements IEntity, \Sellastica\Entity\Entity\IAggregateMember
{
	use TAbstractEntity;

	/** @var int @required */
	private $projectId;
	/** @var string @required */
	private $scheme;
	/** @var bool @required */
	private $www;
	/** @var string @required */
	private $host;
	/** @var bool @optional */
	private $redirect;
	/** @var Url */
	private $url;


	/**
	 * @param ProjectUrlBuilder $builder
	 */
	public function __construct(ProjectUrlBuilder $builder)
	{
		$this->hydrate($builder);
	}

	/**
	 * @return int
	 */
	public function getAggregateId(): int
	{
		return $this->projectId;
	}

	public function getAggregateRootClass(): string
	{
		return Project::class;
	}

	/**
	 * @return \Sellastica\Project\Entity\Project
	 */
	public function getAggregateRoot(): Project
	{
		return $this->getProject();
	}

	/**
	 * @return bool
	 */
	public static function isIdGeneratedByStorage(): bool
	{
		return true;
	}

	/**
	 * @return int
	 */
	public function getProjectId(): int
	{
		return $this->projectId;
	}

	/**
	 * @return \Sellastica\Project\Entity\Project
	 */
	public function getProject(): Project
	{
		return $this->relationService->getProject();
	}

	/**
	 * @return string
	 */
	public function getScheme(): string
	{
		return $this->scheme;
	}

	/**
	 * @return bool
	 */
	public function isHttps(): bool
	{
		return $this->scheme === 'https';
	}

	/**
	 * @return bool
	 */
	public function isWww(): bool
	{
		return $this->www;
	}

	/**
	 * @return string
	 */
	public function getHost(): string
	{
		return $this->host;
	}

	/**
	 * @return Url
	 */
	public function getUrl(): Url
	{
		if (!isset($this->url)) {
			$this->url = new Url($this->scheme . '://' . ($this->www ? 'www.' : '') . $this->host);
		}

		return $this->url;
	}

	/**
	 * @return bool
	 */
	public function isRedirect(): bool
	{
		return $this->redirect;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return [
			'id' => $this->id,
			'projectId' => $this->projectId,
			'scheme' => $this->scheme,
			'www' => $this->www,
			'host' => $this->host,
			'redirect' => $this->redirect,
		];
	}
}