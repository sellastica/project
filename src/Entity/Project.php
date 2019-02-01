<?php
namespace Sellastica\Project\Entity;

use Nette\Http\Url;
use Project\Model\InternalProjectSpecifics;
use Sellastica\Api\Model\IPayloadable;
use Sellastica\Entity\Configuration;
use Sellastica\Entity\Entity\AbstractEntity;
use Sellastica\Entity\Entity\IEntity;
use Sellastica\Entity\Entity\TAbstractEntity;
use Sellastica\Identity\Model\Email;
use Sellastica\Localization\Model\Localization;
use Sellastica\Twig\Model\IProxable;
use Sellastica\Utils\Strings;

/**
 * @generate-builder
 * @see ProjectBuilder
 *
 * @property ProjectRelations $relationService
 */
class Project extends AbstractEntity implements IEntity, IProxable, IPayloadable, \Sellastica\Entity\Entity\IAggregateRoot
{
	use TAbstractEntity;

	const SUSPEND_AFTER_DAYS = 14;

	/** @var string @required */
	private $title;

	/** @var string @required */
	private $scheme;
	/** @var bool @required */
	private $www;
	/** @var string @required */
	private $host;
	/** @var string|null @optional */
	private $database;

	/** @var string @required */
	private $localizationCode;
	/** @var string @required */
	private $currencyCode;

	/** @var int|null @optional */
	private $groupId;
	/** @var ProjectGroup|null */
	private $group;

	/** @var int|null @optional */
	private $parentProjectId;
	/** @var Project|null */
	private $parentProject;

	/** @var int|null @optional */
	private $themeId;
	/** @var bool @optional */
	private $backend = true;

	/** @var bool @optional */
	private $b2b = false;
	/** @var bool @optional */
	private $b2c = true;

	/** @var Email @required */
	private $email;
	/** @var string|null @optional */
	private $phone;
	/** @var \Sellastica\Identity\Model\BillingAddress|null @optional */
	private $billingAddress;
	/** @var string|null @optional */
	private $note;

	/** @var \Core\Domain\Model\Store\StoreCollection|\Core\Domain\Model\Store\Store[] */
	private $stores;
	/** @var int */
	private $storesCount;

	/** @var Url */
	private $defaultUrl;
	/** @var ProjectUrlCollection|ProjectUrl[] */
	private $urls;
	/** @var bool @optional */
	private $vatPayer = true;
	/** @var bool @optional */
	private $active = true;
	/** @var \DateTime|null @optional */
	private $suspended = null;
	/** @var string|null @optional */
	private $externalId;
	/** @var float @optional */
	private $percentDiscount = 0;

	/** @var InternalProjectSpecifics */
	private $internalProjectSpecifics;


	/**
	 * @param ProjectBuilder $builder
	 */
	public function __construct(ProjectBuilder $builder)
	{
		$this->hydrate($builder);
	}

	/**
	 * @param InternalProjectSpecifics $internalProjectSpecifics
	 */
	public function doInitialize(
		InternalProjectSpecifics $internalProjectSpecifics
	)
	{
		$this->internalProjectSpecifics = $internalProjectSpecifics;
	}

	/**
	 * @return InternalProjectSpecifics
	 */
	public function getInternalProjectSpecifics(): InternalProjectSpecifics
	{
		return $this->internalProjectSpecifics;
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
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle(string $title)
	{
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getShortTitle(): string
	{
		return ucfirst(Strings::removeFromBeginning($this->getDefaultUrl()->getHost(), 'www.'));
	}

	/**
	 * @return Localization
	 */
	public function getLocalization(): Localization
	{
		return Localization::from($this->localizationCode);
	}

	/**
	 * @return \Sellastica\Localization\Model\Currency
	 */
	public function getCurrency(): \Sellastica\Localization\Model\Currency
	{
		return \Sellastica\Localization\Model\Currency::from($this->currencyCode);
	}

	/**
	 * @param \Sellastica\Localization\Model\Currency $currency
	 */
	public function setCurrency(\Sellastica\Localization\Model\Currency $currency): void
	{
		$this->currencyCode = $currency->getCode();
	}

	/**
	 * @param bool $object
	 * @return string|Email
	 */
	public function getEmail(bool $object = false)
	{
		return $object ? $this->email : $this->email->getEmail();
	}

	/**
	 * @param Email $email
	 */
	public function setEmail(Email $email)
	{
		$this->email = $email;
	}

	/**
	 * @return null|string
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * @param null|string $phone
	 */
	public function setPhone(string $phone = null)
	{
		$this->phone = $phone;
	}

	/**
	 * @return null|\Sellastica\Identity\Model\BillingAddress
	 */
	public function getBillingAddress(): ?\Sellastica\Identity\Model\BillingAddress
	{
		return $this->billingAddress;
	}

	/**
	 * @param null|\Sellastica\Identity\Model\BillingAddress $billingAddress
	 */
	public function setBillingAddress(?\Sellastica\Identity\Model\BillingAddress $billingAddress): void
	{
		$this->billingAddress = $billingAddress;
	}

	/**
	 * @return string
	 */
	public function getScheme(): string
	{
		return $this->scheme;
	}

	/**
	 * @param string $scheme
	 */
	public function setScheme(string $scheme): void
	{
		$this->scheme = $scheme;
	}

	/**
	 * @return bool
	 */
	public function isWww(): bool
	{
		return $this->www;
	}

	/**
	 * @param bool $www
	 */
	public function setWww(bool $www): void
	{
		$this->www = $www;
	}

	/**
	 * @return string
	 */
	public function getHost(): string
	{
		return $this->host;
	}

	/**
	 * @param string $host
	 */
	public function setHost(string $host): void
	{
		$this->host = $host;
	}

	/**
	 * @return null|string
	 */
	public function getDatabase(): ?string
	{
		return $this->database;
	}

	/**
	 * @param null|string $database
	 */
	public function setDatabase(?string $database): void
	{
		$this->database = $database;
	}

	/**
	 * @param string $host
	 * @return Url|null
	 */
	public function getUrlByHost(string $host)
	{
		if ($this->getDefaultUrl()->host === $host) {
			return $this->getDefaultUrl();
		}

		/** @var ProjectUrl $projectUrl */
		$projectUrl = $this->getUrls()->get(function (ProjectUrl $projectUrl) use ($host) {
			return $projectUrl->getHost() === $host;
		});
		return $projectUrl ? $projectUrl->getUrl() : null;
	}

	/**
	 * @param string $host
	 * @return ProjectUrl|null
	 */
	public function getProjectUrlByHost(string $host)
	{
		return $this->getUrls()->get(function (ProjectUrl $projectUrl) use ($host) {
			return $projectUrl->getHost() === $host;
		});
	}

	/**
	 * @return ProjectUrl[]|ProjectUrlCollection
	 */
	public function getUrls(): ProjectUrlCollection
	{
		if (!isset($this->urls)) {
			$this->urls = $this->relationService->getUrls();
		}

		return $this->urls;
	}

	/**
	 * @param string $host
	 * @param bool $www
	 * @param string $scheme
	 * @param bool $redirect
	 */
	public function addUrl(
		string $host,
		bool $www = false,
		string $scheme = 'http',
		bool $redirect = false
	): void
	{
		$url = ProjectUrlBuilder::create($this->getId(), $scheme, $www, $host)
			->redirect($redirect)
			->build();
		$this->eventPublisher->publish(new \Sellastica\Entity\Event\AggregateMemberAdded($this, $url));
	}

	/**
	 * @param \Sellastica\Project\Entity\ProjectUrl $url
	 */
	public function removeUrl(ProjectUrl $url): void
	{
		if ($this->getUrls()->hasEntity($url)) {
			$this->getUrls()->remove($url);
			$this->eventPublisher->publish(new \Sellastica\Entity\Event\AggregateMemberRemoved($this, $url));
		}
	}

	/**
	 * @return Url
	 */
	public function getDefaultUrl(): Url
	{
		if (!isset($this->defaultUrl)) {
			$this->defaultUrl = new Url($this->scheme . '://' . ($this->www ? 'www.' : '') . $this->host);
		}

		return $this->defaultUrl;
	}

	/**
	 * @param Url $url
	 */
	public function setDefaultUrl(Url $url): void
	{
		$this->scheme = $url->getScheme();
		$this->www = strpos($url->getHost(), 'www') !== false;
		$this->host = \Sellastica\Project\Utils\Helpers::getProjectHost($url);
		$this->defaultUrl = null;
	}

	/**
	 * @return string
	 */
	public function getNote()
	{
		return $this->note;
	}

	/**
	 * @return int|null
	 */
	public function getGroupId()
	{
		return $this->groupId;
	}

	/**
	 * @return ProjectGroup|null
	 */
	public function getGroup()
	{
		if (!isset($this->group) && $this->relationIsNotSet('group')) {
			$this->group = $this->relationService->getGroup();
		}

		return $this->group;
	}

	/**
	 * @return int|null
	 */
	public function getThemeId(): ?int
	{
		return $this->themeId;
	}

	/**
	 * @return \Theme\Theme\Entity\Theme|null
	 */
	public function getTheme(): ?\Theme\Theme\Entity\Theme
	{
		return $this->relationService->getTheme();
	}

	/**
	 * @return \Theme\Theme\Entity\ThemeCollection
	 */
	public function getThemes(): \Theme\Theme\Entity\ThemeCollection
	{
		return $this->relationService->getThemes();
	}

	/**
	 * @return bool If project has administration
	 */
	public function hasBackend(): bool
	{
		return $this->backend;
	}

	/**
	 * @param Configuration $configuration
	 * @param array $filters
	 * @return \Core\Domain\Model\Store\Store[]
	 */
	public function getStores(Configuration $configuration = null, array $filters = [])
	{
		if (!isset($this->stores)) {
			$this->stores = $this->relationService->getStores($configuration, $filters);
		}

		return $this->stores;
	}

	/**
	 * @return int
	 */
	public function getStoresCount(): int
	{
		if (!isset($this->storesCount)) {
			$this->storesCount = $this->relationService->getStoresCount();
		}

		return $this->storesCount;
	}

	/**
	 * @return bool
	 */
	public function isB2b(): bool
	{
		return $this->b2b;
	}

	/**
	 * @return bool
	 */
	public function isB2c(): bool
	{
		return $this->b2c;
	}

	/**
	 * @return ProjectContactCollection
	 */
	public function getContacts(): ProjectContactCollection
	{
		return $this->relationService->getContacts();
	}

	/**
	 * @return bool
	 */
	public function isVatPayer(): bool
	{
		return $this->vatPayer;
	}

	/**
	 * @param bool $vatPayer
	 */
	public function setVatPayer(bool $vatPayer): void
	{
		$this->vatPayer = $vatPayer;
	}

	/**
	 * @return bool
	 */
	public function isActive(): bool
	{
		return $this->active;
	}

	/**
	 * @param bool $active
	 */
	public function setActive(bool $active): void
	{
		$this->active = $active;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getSuspended(): ?\DateTime
	{
		return $this->suspended;
	}

	/**
	 * @param \DateTime|null $suspended
	 */
	public function setSuspended(?\DateTime $suspended): void
	{
		$this->suspended = $suspended;
	}

	/**
	 * @return int|null
	 */
	public function getParentProjectId(): ?int
	{
		return $this->parentProjectId;
	}

	/**
	 * @param int|null $parentProjectId
	 */
	public function setParentProjectId(?int $parentProjectId): void
	{
		$this->parentProjectId = $parentProjectId;
	}

	/**
	 * @return null|Project
	 */
	public function getParentProject(): ?Project
	{
		return $this->relationService->getParentProject();
	}

	/**
	 * @param null|Project $parentProject
	 */
	public function setParentProject(?Project $parentProject): void
	{
		$this->parentProjectId = $parentProject->getId();
		$this->parentProject = $parentProject;
	}

	/**
	 * @return ProjectCollection|Project[]
	 */
	public function getB2bProjects(): ProjectCollection
	{
		return $this->relationService->getB2bProjects();
	}

	/**
	 * @param Project $project
	 * @return bool
	 */
	public function isB2bSubproject(Project $project): bool
	{
		foreach ($this->getB2bProjects() as $b2bProject) {
			if ($b2bProject->getId() === $project->getId()) {
				return true;
			}
		}

		return false;
	}

	/**
	 * @return null|string
	 */
	public function getExternalId(): ?string
	{
		return $this->externalId;
	}

	/**
	 * @param null|string $externalId
	 */
	public function setExternalId(?string $externalId): void
	{
		$this->externalId = $externalId;
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
	 */
	public function setPercentDiscount(float $percentDiscount): void
	{
		$this->percentDiscount = $percentDiscount;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return array_merge(
			$this->parentToArray(),
			[
				'id' => $this->id,
				'title' => $this->title,
				'scheme' => $this->scheme,
				'www' => $this->www,
				'host' => $this->host,
				'database' => $this->database,
				'localizationCode' => $this->localizationCode,
				'currencyCode' => $this->currencyCode,
				'note' => $this->note,
				'themeId' => $this->themeId,
				'backend' => $this->backend,
				'b2b' => $this->b2b,
				'b2c' => $this->b2c,
				'vatPayer' => $this->vatPayer,
				'active' => $this->active,
				'suspended' => $this->suspended,
				'parentProjectId' => $this->parentProjectId,
				//contact
				'email' => $this->getEmail(),
				'phone' => $this->phone,
				'externalId' => $this->externalId,
				'percentDiscount' => $this->percentDiscount,
			],
			//billing address
			$this->billingAddress ? $this->billingAddress->toArray() : [
				'company' => null,
				'street' => null,
				'city' => null,
				'zip' => null,
				'countryCode' => null,
				'cin' => null,
				'tin' => null,
			],
			$this->internalProjectSpecifics->toArray()
		);
	}

	/**
	 * @return \Sellastica\Twig\Model\ProxyObject
	 */
	public function toProxy()
	{
		return $this->internalProjectSpecifics->toProxy();
	}

	/**
	 * @return \Sellastica\Api\Model\PayloadObject
	 */
	public function toPayloadObject()
	{
		return $this->internalProjectSpecifics->toPayloadObject();
	}
}