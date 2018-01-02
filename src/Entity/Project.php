<?php
namespace Sellastica\Project\Entity;

use Core\Domain\Model\Project\Theme;
use Core\Domain\Model\Project\ThemeCollection;
use Core\Domain\Model\Store\Store;
use Core\Domain\Model\Store\StoreCollection;
use Core\Presentation\Web\ShopProxy;
use Core\Presentation\Web\ShopProxyFactory;
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
class Project extends AbstractEntity implements IEntity, IProxable, IPayloadable
{
	use TAbstractEntity;

	/** @var int @required */
	private $customerNumber;
	/** @var string @required */
	private $title;

	/** @var string @required */
	private $scheme;
	/** @var bool @required */
	private $www;
	/** @var string @required */
	private $host;

	/** @var string @required */
	private $localizationCode;
	/** @var string @required */
	private $currencyCode;
	/** @var Email @required */
	private $email;
	/** @var string|null @optional */
	private $phone;
	/** @var string|null @optional */
	private $note;

	/** @var int|null @optional */
	private $groupId;
	/** @var ProjectGroup|null */
	private $group;

	/** @var int|null @optional */
	private $themeId;
	/** @var bool @optional */
	private $backend;

	/** @var bool @optional */
	private $b2b;
	/** @var bool @optional */
	private $b2c;

	/** @var StoreCollection|Store[] */
	private $stores;
	/** @var int */
	private $storesCount;
	/** @var ShopProxyFactory */
	private $proxyFactory;

	/** @var Url */
	private $defaultUrl;
	/** @var ProjectUrlCollection|ProjectUrl[] */
	private $urls;

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
	 * @param ShopProxyFactory $proxyFactory
	 */
	public function doInitialize(
		InternalProjectSpecifics $internalProjectSpecifics,
		ShopProxyFactory $proxyFactory
	)
	{
		$this->internalProjectSpecifics = $internalProjectSpecifics;
		$this->proxyFactory = $proxyFactory;
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
	 * @return string
	 */
	public function getScheme(): string
	{
		return $this->scheme;
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
	 * @return Theme|null
	 */
	public function getTheme(): ?Theme
	{
		return $this->relationService->getTheme();
	}

	/**
	 * @return ThemeCollection
	 */
	public function getThemes(): ThemeCollection
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
	 * @return Store[]
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
	 * @return array
	 */
	public function toArray(): array
	{
		return array_merge(
			$this->parentToArray(),
			[
				'id' => $this->id,
				'customerNumber' => $this->customerNumber,
				'title' => $this->title,
				'localizationCode' => $this->localizationCode,
				'note' => $this->note,
				'email' => $this->getEmail(),
				'phone' => $this->phone,
				'themeId' => $this->themeId,
				'backend' => $this->backend,
				'b2b' => $this->b2b,
				'b2c' => $this->b2c,
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