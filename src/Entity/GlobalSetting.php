<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\Entity\AbstractEntity;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\Entity\TAbstractEntity;

/**
 * @generate-builder
 * @see GlobalSettingBuilder
 *
 * @attach(false)
 */
class GlobalSetting extends AbstractEntity implements IEntity
{
	use TAbstractEntity;

	/** @var string @required */
	private $code;
	/** @var string|null @required */
	private $scope;
	/** @var string|null @optional */
	private $value;


	/**
	 * @param GlobalSettingBuilder $builder
	 */
	public function __construct(GlobalSettingBuilder $builder)
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
	public function getCode(): string
	{
		return $this->code;
	}

	/**
	 * @return string|null
	 */
	public function getScope(): ?string
	{
		return $this->scope;
	}

	/**
	 * @return string|null
	 */
	public function getValue(): ?string
	{
		return $this->value;
	}

	/**
	 * @param string|null $value
	 */
	public function setValue(?string $value)
	{
		$this->value = $value;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return [
			'id' => $this->id,
			'code' => $this->code,
			'scope' => $this->scope,
			'value' => $this->value,
		];
	}
}