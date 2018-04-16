<?php
namespace Sellastica\Project\Model;

/**
 * @method Settings get()
 */
class SettingsAccessor extends \Sellastica\Core\Model\FactoryAccessor
{
	/** @var \Sellastica\Entity\EntityManager */
	private $em;
	/** @var \Nette\Http\IRequest */
	private $request;


	/**
	 * @param \Sellastica\Entity\EntityManager $em
	 * @param \Nette\Http\IRequest $request
	 */
	public function __construct(
		\Sellastica\Entity\EntityManager $em,
		\Nette\Http\IRequest $request
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
		foreach ($this->em->getRepository(\Sellastica\Project\Entity\Setting::class)->findAll() as $setting) {
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