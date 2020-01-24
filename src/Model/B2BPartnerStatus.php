<?php
namespace Sellastica\Project\Model;

class B2BPartnerStatus
{
	const UNCONFIRMED = 'unconfirmed',
		CONFIRMED = 'confirmed',
		REJECTED = 'rejected';

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
	public function getValue(): string
	{
		return $this->value;
	}

	/**
	 * @return bool
	 */
	public function isUnconfirmed(): bool
	{
		return $this->value === self::UNCONFIRMED;
	}

	/**
	 * @param string $status
	 * @return B2BPartnerStatus
	 */
	public static function from(string $status): B2BPartnerStatus
	{
		$rc = new \ReflectionClass(B2BPartnerStatus::class);
		if (!in_array($status, $rc->getConstants())) {
			throw new \InvalidArgumentException("Unknown B2B partner status $status");
		}

		return new self($status);
	}

	/**
	 * @return B2BPartnerStatus
	 */
	public static function unconfirmed(): B2BPartnerStatus
	{
		return new self(self::UNCONFIRMED);
	}

	/**
	 * @return B2BPartnerStatus
	 */
	public static function confirmed(): B2BPartnerStatus
	{
		return new self(self::CONFIRMED);
	}

	/**
	 * @return B2BPartnerStatus
	 */
	public static function rejected(): B2BPartnerStatus
	{
		return new self(self::REJECTED);
	}
}
