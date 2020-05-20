<?php
namespace Sellastica\Project\Model;

class Platform
{
	const SHOPTET = 'shoptet',
		UPGATES = 'upgates',
		HEUREKA = 'heureka',
		OTHER = 'other';

	/** @var array */
	public static $titles = [
		self::SHOPTET => 'Shoptet',
		self::UPGATES => 'Upgates',
		self::HEUREKA => 'Heuréka',
		self::OTHER => 'system.project.platform.other',
	];

	/** @var string */
	private $value;


	/**
	 * @param string $value
	 */
	private function __construct(string $value)
	{
		$this->value = $value;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return self::$titles[$this->value];
	}

	/**
	 * @return string
	 */
	public function getValue(): string
	{
		return $this->value;
	}

	/**
	 * @param string $format
	 * @return Platform
	 */
	public static function from(string $format): Platform
	{
		$rc = new \ReflectionClass(Platform::class);
		if (!in_array($format, $rc->getConstants())) {
			throw new \InvalidArgumentException("Unknown platform $format");
		}

		return new self($format);
	}

	/**
	 * @return Platform
	 */
	public static function shoptet(): Platform
	{
		return new self(self::SHOPTET);
	}

	/**
	 * @return bool
	 */
	public function isShoptet(): bool
	{
		return $this->value === self::SHOPTET;
	}

	/**
	 * @return Platform
	 */
	public static function upgates(): Platform
	{
		return new self(self::UPGATES);
	}

	/**
	 * @return bool
	 */
	public function isUpgates(): bool
	{
		return $this->value === self::UPGATES;
	}

	/**
	 * @return Platform
	 */
	public static function other(): Platform
	{
		return  new self(self::OTHER);
	}

	/**
	 * @return Platform[]
	 */
	public static function getAll(): array
	{
		$return = [];
		$rc = new \ReflectionClass(Platform::class);
		foreach ($rc->getConstants() as $constant) {
			$return[] = new self($constant);
		}

		return $return;
	}
}
