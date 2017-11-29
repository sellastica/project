<?php
namespace Sellastica\Project\Model;

use Nette;
use Sellastica\Core\Model\FactoryAccessor;
use Sellastica\Entity\EntityManager;
use Sellastica\Project\Entity\Setting;

/**
 * @method Settings get()
 */
class SettingsAccessor extends FactoryAccessor
{
	/** @var EntityManager */
	private $em;
	/** @var Nette\Http\IRequest */
	private $request;


	/**
	 * @param EntityManager $em
	 * @param Nette\Http\IRequest $request
	 */
	public function __construct(
		EntityManager $em,
		Nette\Http\IRequest $request
	)
	{
		$this->em = $em;
		$this->request = $request;
	}

	/**
	 * @return Settings
	 */
	public function create(): Settings
	{
		$settings = new Settings($this->em, $this->request);
		foreach ($this->em->getRepository(Setting::class)->findAll() as $setting) {
			$settings->addSetting($setting);
		}

		return $settings;
	}

	/**
	 * @param string $key
	 * @return mixed
	 */
	public function getSetting(string $key)
	{
		return $this->get()->getSetting($key);
	}
}