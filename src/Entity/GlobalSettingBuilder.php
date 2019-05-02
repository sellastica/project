<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;

/**
 * @see GlobalSetting
 */
class GlobalSettingBuilder implements IBuilder
{
	use TBuilder;

	/** @var string */
	private $code;
	/** @var string|null */
	private $scope;
	/** @var string|null */
	private $value;

	/**
	 * @param string $code
	 * @param string|null $scope
	 */
	public function __construct(
		string $code,
		string $scope = null
	)
	{
		$this->code = $code;
		$this->scope = $scope;
	}

	/**
	 * @return string
	 */
	public function getCode(): string
	{
		return $this->code;
	}

	/**
	 * @return string|null
	 */
	public function getScope()
	{
		return $this->scope;
	}

	/**
	 * @return string|null
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * @param string|null $value
	 * @return $this
	 */
	public function value(string $value = null)
	{
		$this->value = $value;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !GlobalSetting::isIdGeneratedByStorage();
	}

	/**
	 * @return GlobalSetting
	 */
	public function build(): GlobalSetting
	{
		return new GlobalSetting($this);
	}

	/**
	 * @param string $code
	 * @param string|null $scope
	 * @return self
	 */
	public static function create(
		string $code,
		string $scope = null
	): self
	{
		return new self($code, $scope);
	}
}