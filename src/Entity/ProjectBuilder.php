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
	/** @var string|null */
	private $database;
	/** @var string|null */
	private $debugModeDatabase;
	/** @var int|null */
	private $groupId;
	/** @var int|null */
	private $b2bPartnerId;
	/** @var \Sellastica\Project\Model\B2BPartnerStatus */
	private $b2bPartnerStatus;
	/** @var int|null */
	private $themeId;
	/** @var bool */
	private $backend = true;
	/** @var bool */
	private $b2c = true;
	/** @var bool */
	private $internal = false;
	/** @var Email|null */
	private $invoiceEmail;
	/** @var Email|null */
	private $invoiceEmailCopy;
	/** @var string|null */
	private $phone;
	/** @var string|null */
	private $invoicePhone;
	/** @var bool */
	private $sendSms = true;
	/** @var \Sellastica\Identity\Model\BillingAddress|null */
	private $billingAddress;
	/** @var string|null */
	private $note;
	/** @var bool */
	private $vatPayer = true;
	/** @var \DateTime|null */
	private $activeTill;
	/** @var bool */
	private $freeOfCharge = false;
	/** @var \DateTime|null */
	private $suspended;
	/** @var string|null */
	private $externalId;
	/** @var float */
	private $percentDiscount = 0;
	/** @var string */
	private $tariffLevel;
	/** @var \Sellastica\Crm\Model\AccountingPeriod */
	private $accountingPeriod;
	/** @var \Sellastica\Project\Model\Platform */
	private $platform;
	/** @var bool */
	private $api = false;
	/** @var bool */
	private $betaAdmin = true;
	/** @var bool */
	private $wizard = false;
	/** @var string|null */
	private $paymentInstrument;
	/** @var int|null */
	private $recurringPaymentId;
	/** @var \DateTime|null */
	private $recurringPaymentConfirmed;
	/** @var \DateTime|null */
	private $recurringPaymentSuspended;

	/**
	 * @param string $title
	 * @param string $scheme
	 * @param bool $www
	 * @param string $host
	 * @param string $localizationCode
	 * @param string $currencyCode
	 * @param Email $email
	 */
	public function __construct(
		string $title,
		string $scheme,
		bool $www,
		string $host,
		string $localizationCode,
		string $currencyCode,
		Email $email
	)
	{
		$this->title = $title;
		$this->scheme = $scheme;
		$this->www = $www;
		$this->host = $host;
		$this->localizationCode = $localizationCode;
		$this->currencyCode = $currencyCode;
		$this->email = $email;
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
	 * @return string|null
	 */
	public function getDatabase()
	{
		return $this->database;
	}

	/**
	 * @param string|null $database
	 * @return $this
	 */
	public function database(string $database = null)
	{
		$this->database = $database;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getDebugModeDatabase()
	{
		return $this->debugModeDatabase;
	}

	/**
	 * @param string|null $debugModeDatabase
	 * @return $this
	 */
	public function debugModeDatabase(string $debugModeDatabase = null)
	{
		$this->debugModeDatabase = $debugModeDatabase;
		return $this;
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
	public function getB2bPartnerId()
	{
		return $this->b2bPartnerId;
	}

	/**
	 * @param int|null $b2bPartnerId
	 * @return $this
	 */
	public function b2bPartnerId(int $b2bPartnerId = null)
	{
		$this->b2bPartnerId = $b2bPartnerId;
		return $this;
	}

	/**
	 * @return \Sellastica\Project\Model\B2BPartnerStatus
	 */
	public function getB2bPartnerStatus(): \Sellastica\Project\Model\B2BPartnerStatus
	{
		return $this->b2bPartnerStatus;
	}

	/**
	 * @param \Sellastica\Project\Model\B2BPartnerStatus $b2bPartnerStatus
	 * @return $this
	 */
	public function b2bPartnerStatus(\Sellastica\Project\Model\B2BPartnerStatus $b2bPartnerStatus)
	{
		$this->b2bPartnerStatus = $b2bPartnerStatus;
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
	public function backend(bool $backend = true)
	{
		$this->backend = $backend;
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
	public function b2c(bool $b2c = true)
	{
		$this->b2c = $b2c;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getInternal(): bool
	{
		return $this->internal;
	}

	/**
	 * @param bool $internal
	 * @return $this
	 */
	public function internal(bool $internal)
	{
		$this->internal = $internal;
		return $this;
	}

	/**
	 * @return Email|null
	 */
	public function getInvoiceEmail()
	{
		return $this->invoiceEmail;
	}

	/**
	 * @param Email|null $invoiceEmail
	 * @return $this
	 */
	public function invoiceEmail(Email $invoiceEmail = null)
	{
		$this->invoiceEmail = $invoiceEmail;
		return $this;
	}

	/**
	 * @return Email|null
	 */
	public function getInvoiceEmailCopy()
	{
		return $this->invoiceEmailCopy;
	}

	/**
	 * @param Email|null $invoiceEmailCopy
	 * @return $this
	 */
	public function invoiceEmailCopy(Email $invoiceEmailCopy = null)
	{
		$this->invoiceEmailCopy = $invoiceEmailCopy;
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
	 * @return string|null
	 */
	public function getInvoicePhone()
	{
		return $this->invoicePhone;
	}

	/**
	 * @param string|null $invoicePhone
	 * @return $this
	 */
	public function invoicePhone(string $invoicePhone = null)
	{
		$this->invoicePhone = $invoicePhone;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getSendSms(): bool
	{
		return $this->sendSms;
	}

	/**
	 * @param bool $sendSms
	 * @return $this
	 */
	public function sendSms(bool $sendSms = true)
	{
		$this->sendSms = $sendSms;
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
	public function getVatPayer(): bool
	{
		return $this->vatPayer;
	}

	/**
	 * @param bool $vatPayer
	 * @return $this
	 */
	public function vatPayer(bool $vatPayer = true)
	{
		$this->vatPayer = $vatPayer;
		return $this;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getActiveTill()
	{
		return $this->activeTill;
	}

	/**
	 * @param \DateTime|null $activeTill
	 * @return $this
	 */
	public function activeTill(\DateTime $activeTill = null)
	{
		$this->activeTill = $activeTill;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getFreeOfCharge(): bool
	{
		return $this->freeOfCharge;
	}

	/**
	 * @param bool $freeOfCharge
	 * @return $this
	 */
	public function freeOfCharge(bool $freeOfCharge)
	{
		$this->freeOfCharge = $freeOfCharge;
		return $this;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getSuspended()
	{
		return $this->suspended;
	}

	/**
	 * @param \DateTime|null $suspended
	 * @return $this
	 */
	public function suspended(\DateTime $suspended = null)
	{
		$this->suspended = $suspended;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getExternalId()
	{
		return $this->externalId;
	}

	/**
	 * @param string|null $externalId
	 * @return $this
	 */
	public function externalId(string $externalId = null)
	{
		$this->externalId = $externalId;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getPercentDiscount(): float
	{
		return $this->percentDiscount;
	}

	/**
	 * @param float $percentDiscount
	 * @return $this
	 */
	public function percentDiscount(float $percentDiscount)
	{
		$this->percentDiscount = $percentDiscount;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTariffLevel(): string
	{
		return $this->tariffLevel;
	}

	/**
	 * @param string $tariffLevel
	 * @return $this
	 */
	public function tariffLevel(string $tariffLevel)
	{
		$this->tariffLevel = $tariffLevel;
		return $this;
	}

	/**
	 * @return \Sellastica\Crm\Model\AccountingPeriod
	 */
	public function getAccountingPeriod(): \Sellastica\Crm\Model\AccountingPeriod
	{
		return $this->accountingPeriod;
	}

	/**
	 * @param \Sellastica\Crm\Model\AccountingPeriod $accountingPeriod
	 * @return $this
	 */
	public function accountingPeriod(\Sellastica\Crm\Model\AccountingPeriod $accountingPeriod)
	{
		$this->accountingPeriod = $accountingPeriod;
		return $this;
	}

	/**
	 * @return \Sellastica\Project\Model\Platform
	 */
	public function getPlatform(): \Sellastica\Project\Model\Platform
	{
		return $this->platform;
	}

	/**
	 * @param \Sellastica\Project\Model\Platform $platform
	 * @return $this
	 */
	public function platform(\Sellastica\Project\Model\Platform $platform)
	{
		$this->platform = $platform;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getApi(): bool
	{
		return $this->api;
	}

	/**
	 * @param bool $api
	 * @return $this
	 */
	public function api(bool $api)
	{
		$this->api = $api;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getBetaAdmin(): bool
	{
		return $this->betaAdmin;
	}

	/**
	 * @param bool $betaAdmin
	 * @return $this
	 */
	public function betaAdmin(bool $betaAdmin = true)
	{
		$this->betaAdmin = $betaAdmin;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getWizard(): bool
	{
		return $this->wizard;
	}

	/**
	 * @param bool $wizard
	 * @return $this
	 */
	public function wizard(bool $wizard)
	{
		$this->wizard = $wizard;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getPaymentInstrument()
	{
		return $this->paymentInstrument;
	}

	/**
	 * @param string|null $paymentInstrument
	 * @return $this
	 */
	public function paymentInstrument(string $paymentInstrument = null)
	{
		$this->paymentInstrument = $paymentInstrument;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getRecurringPaymentId()
	{
		return $this->recurringPaymentId;
	}

	/**
	 * @param int|null $recurringPaymentId
	 * @return $this
	 */
	public function recurringPaymentId(int $recurringPaymentId = null)
	{
		$this->recurringPaymentId = $recurringPaymentId;
		return $this;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getRecurringPaymentConfirmed()
	{
		return $this->recurringPaymentConfirmed;
	}

	/**
	 * @param \DateTime|null $recurringPaymentConfirmed
	 * @return $this
	 */
	public function recurringPaymentConfirmed(\DateTime $recurringPaymentConfirmed = null)
	{
		$this->recurringPaymentConfirmed = $recurringPaymentConfirmed;
		return $this;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getRecurringPaymentSuspended()
	{
		return $this->recurringPaymentSuspended;
	}

	/**
	 * @param \DateTime|null $recurringPaymentSuspended
	 * @return $this
	 */
	public function recurringPaymentSuspended(\DateTime $recurringPaymentSuspended = null)
	{
		$this->recurringPaymentSuspended = $recurringPaymentSuspended;
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
		string $title,
		string $scheme,
		bool $www,
		string $host,
		string $localizationCode,
		string $currencyCode,
		Email $email
	): self
	{
		return new self($title, $scheme, $www, $host, $localizationCode, $currencyCode, $email);
	}
}