<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\IBuilder;
use Sellastica\Entity\TBuilder;
use Sellastica\Identity\Model\Email;

/**
 * @see Project
 */
class ProjectBuilder implements IBuilder
{
	use TBuilder;

	/** @var int */
	private $customerNumber;
	/** @var string */
	private $title;
	/** @var string */
	private $scheme;
	/** @var bool */
	private $www;
	/** @var string */
	private $host;
	/** @var string */
	private $localizationCode;
	/** @var string */
	private $currencyCode;
	/** @var Email */
	private $email;
	/** @var int|null */
	private $groupId;
	/** @var int|null */
	private $themeId;
	/** @var bool */
	private $backend;
	/** @var bool */
	private $b2b;
	/** @var bool */
	private $b2c;
	/** @var string|null */
	private $phone;
	/** @var \Sellastica\Identity\Model\BillingAddress|null */
	private $billingAddress;
	/** @var string|null */
	private $note;

	/**
	 * @param int $customerNumber
	 * @param string $title
	 * @param string $scheme
	 * @param bool $www
	 * @param string $host
	 * @param string $localizationCode
	 * @param string $currencyCode
	 * @param Email $email
	 */
	public function __construct(
		int $customerNumber,
		string $title,
		string $scheme,
		bool $www,
		string $host,
		string $localizationCode,
		string $currencyCode,
		Email $email
	)
	{
		$this->customerNumber = $customerNumber;
		$this->title = $title;
		$this->scheme = $scheme;
		$this->www = $www;
		$this->host = $host;
		$this->localizationCode = $localizationCode;
		$this->currencyCode = $currencyCode;
		$this->email = $email;
	}

	/**
	 * @return int
	 */
	public function getCustomerNumber(): int
	{
		return $this->customerNumber;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
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
	 * @return string
	 */
	public function getLocalizationCode(): string
	{
		return $this->localizationCode;
	}

	/**
	 * @return string
	 */
	public function getCurrencyCode(): string
	{
		return $this->currencyCode;
	}

	/**
	 * @return Email
	 */
	public function getEmail(): Email
	{
		return $this->email;
	}

	/**
	 * @return int|null
	 */
	public function getGroupId()
	{
		return $this->groupId;
	}

	/**
	 * @param int|null $groupId
	 * @return $this
	 */
	public function groupId(int $groupId = null)
	{
		$this->groupId = $groupId;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getThemeId()
	{
		return $this->themeId;
	}

	/**
	 * @param int|null $themeId
	 * @return $this
	 */
	public function themeId(int $themeId = null)
	{
		$this->themeId = $themeId;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getBackend(): bool
	{
		return $this->backend;
	}

	/**
	 * @param bool $backend
	 * @return $this
	 */
	public function backend(bool $backend)
	{
		$this->backend = $backend;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getB2b(): bool
	{
		return $this->b2b;
	}

	/**
	 * @param bool $b2b
	 * @return $this
	 */
	public function b2b(bool $b2b)
	{
		$this->b2b = $b2b;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getB2c(): bool
	{
		return $this->b2c;
	}

	/**
	 * @param bool $b2c
	 * @return $this
	 */
	public function b2c(bool $b2c)
	{
		$this->b2c = $b2c;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * @param string|null $phone
	 * @return $this
	 */
	public function phone(string $phone = null)
	{
		$this->phone = $phone;
		return $this;
	}

	/**
	 * @return \Sellastica\Identity\Model\BillingAddress|null
	 */
	public function getBillingAddress()
	{
		return $this->billingAddress;
	}

	/**
	 * @param \Sellastica\Identity\Model\BillingAddress|null $billingAddress
	 * @return $this
	 */
	public function billingAddress(\Sellastica\Identity\Model\BillingAddress $billingAddress = null)
	{
		$this->billingAddress = $billingAddress;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getNote()
	{
		return $this->note;
	}

	/**
	 * @param string|null $note
	 * @return $this
	 */
	public function note(string $note = null)
	{
		$this->note = $note;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function generateId(): bool
	{
		return !Project::isIdGeneratedByStorage();
	}

	/**
	 * @return Project
	 */
	public function build(): Project
	{
		return new Project($this);
	}

	/**
	 * @param int $customerNumber
	 * @param string $title
	 * @param string $scheme
	 * @param bool $www
	 * @param string $host
	 * @param string $localizationCode
	 * @param string $currencyCode
	 * @param Email $email
	 * @return self
	 */
	public static function create(
		int $customerNumber,
		string $title,
		string $scheme,
		bool $www,
		string $host,
		string $localizationCode,
		string $currencyCode,
		Email $email
	): self
	{
		return new self($customerNumber, $title, $scheme, $www, $host, $localizationCode, $currencyCode, $email);
	}
}