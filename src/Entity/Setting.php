<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\Entity\AbstractEntity;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\Entity\TAbstractEntity;

/**
 * @generate-builder
 * @see SettingBuilder
 */
class Setting extends AbstractEntity implements IEntity
{
	use TAbstractEntity;

	/** @var string @required */
	private $code;
	/** @var string|null @required */
	private $scope;
	/** @var string|null @optional */
	private $value;


	/**
	 * @param SettingBuilder $builder
	 */
	public function __construct(SettingBuilder $builder)
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
	public function getCode()
	{
		return $this->code;
	}

	/**
	 * @return string
	 */
	public function getScope()
	{
		return $this->scope;
	}

	/**
	 * @return string
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * @param string $value
	 */
	public function setValue(string $value = null)
	{
		$this->value = $value;
	}

	/**
	 * @return string
	 */
	public function __toString(): string
	{
		return $this->value;
	}

	/**
	 * @return array
	 */
	public function toArray()
	{
		return [
			'id' => $this->id,
			'code' => $this->code,
			'scope' => $this->scope,
			'value' => $this->value,
		];
	}
}