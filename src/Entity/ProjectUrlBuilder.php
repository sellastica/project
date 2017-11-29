<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see ProjectUrl
 */
class ProjectUrlBuilder implements IBuilder
{
	use TBuilder;

	/** @var int */
	private $projectId;
	/** @var string */
	private $scheme;
	/** @var bool */
	private $www;
	/** @var string */
	private $host;
	/** @var bool */
	private $redirect;

	/**
	 * @param int $projectId
	 * @param string $scheme
	 * @param bool $www
	 * @param string $host
	 */
	public function __construct(
		int $projectId,
		string $scheme,
		bool $www,
		string $host
	)
	{
		$this->projectId = $projectId;
		$this->scheme = $scheme;
		$this->www = $www;
		$this->host = $host;
	}

	/**
	 * @return int
	 */
	public function getProjectId(): int
	{
		return $this->projectId;
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
	public function getWww(): bool
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
	 * @return bool
	 */
	public function getRedirect(): bool
	{
		return $this->redirect;
	}

	/**
	 * @param bool $redirect
	 * @return $this
	 */
	public function redirect(bool $redirect)
	{
		$this->redirect = $redirect;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !ProjectUrl::isIdGeneratedByStorage();
	}

	/**
	 * @return ProjectUrl
	 */
	public function build(): ProjectUrl
	{
		return new ProjectUrl($this);
	}

	/**
	 * @param int $projectId
	 * @param string $scheme
	 * @param bool $www
	 * @param string $host
	 * @return self
	 */
	public static function create(
		int $projectId,
		string $scheme,
		bool $www,
		string $host
	): self
	{
		return new self($projectId, $scheme, $www, $host);
	}
}