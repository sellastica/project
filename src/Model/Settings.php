<?php
namespace Sellastica\Project\Model;

class Settings implements \ArrayAccess
{
	/** @var array */
	private $settings = [];
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
	 * It is possible to access to settings over Setting instance and $instance->key
	 * @param $name
	 * @return mixed
	 */
	public function __get($name)
	{
		return $this->getSetting($name);
	}

	/**
	 * It is possible to access to settings over Setting instance and $instance('key')
	 * @param $name
	 * @return mixed
	 */
	public function __invoke($name)
	{
		return $this->getSetting($name);
	}

	/**
	 * @param \Sellastica\Project\Entity\Setting $setting
	 */
	public function addSetting(\Sellastica\Project\Entity\Setting $setting)
	{
		if (!$setting->getScope()) {
			$this->settings[$setting->getCode()] = $setting;
		} else {
			$this->settings[$setting->getScope()][$setting->getCode()] = $setting;
		}
	}

	/**
	 * @param string $key
	 * @return bool
	 */
	public function isSetting($key)
	{
		return array_key_exists($key, $this->settings);
	}

	/**
	 * @param string $key
	 * @param bool $object
	 * @return \Sellastica\Project\Entity\Setting|string|null
	 * @throws \Sellastica\Project\Exception\SettingNotFoundException
	 */
	public function getSetting($key, bool $object = false)
	{
		if (strpos($key, '.') === false) {
			if (!array_key_exists($key, $this->settings)) {
				throw new \Sellastica\Project\Exception\SettingNotFoundException(
					sprintf('Setting %s not found in the setting table (%s another settings found)', $key, sizeof($this->settings))
				);
			}

			$setting = $this->settings[$key];
		} else {
			list($scope, $key) = explode('.', $key);
			if (!array_key_exists($scope, $this->settings)
				|| !array_key_exists($key, $this->settings[$scope])) {
				throw new \Sellastica\Project\Exception\SettingNotFoundException(
					sprintf('Setting %s not found in the setting table (%s another settings found)', "$scope.$key", sizeof($this->settings))
				);
			}

			$setting = $this->settings[$scope][$key];
		}

		return $object ? $setting : $setting->getValue();
	}

	/**
	 * @return array
	 */
	public function getSettings()
	{
		return $this->settings;
	}

	/**
	 * @param string $key
	 * @param string $scope
	 * @param string|null $value
	 */
	public function saveSettingValue(string $key, string $scope = null, string $value = null)
	{
		$setting = $this->getSetting($scope ? "$scope.$key" : $key, true);
		$setting->setValue($value);
		$this->em->persist($setting);
	}

	/**
	 * @param string $offset
	 * @param mixed $value
	 * @throws \Exception
	 */
	public function offsetSet($offset, $value)
	{
		throw new \Exception('Using method offsetSet is not allowed. Use method addSetting instead.');
	}

	/**
	 * @param string $offset
	 * @return bool
	 */
	public function offsetExists($offset)
	{
		return $this->isSetting($offset);
	}

	/**
	 * @param string $offset
	 * @throws \Exception
	 */
	public function offsetUnset($offset)
	{
		throw new \Exception('Unset settings property is prohibited.');
	}

	/**
	 * @param string $offset
	 * @return mixed
	 */
	public function offsetGet($offset)
	{
		return $this->getSetting($offset);
	}

	/**
	 * @return \Nette\Http\Url|null
	 */
	public function getEmailLogoUrl(): ?\Nette\Http\Url
	{
		$filename = $this->getSetting('email.email_logo_file_name');
		$relPath = \Notification\Service\EmailLogoService::IMAGE_REL_PATH . '/' . $filename;
		return !empty($filename) && is_file(WWW_DIR . '/' . $relPath)
			? new \Nette\Http\Url($this->request->getUrl()->getHostUrl() . '/' . $relPath)
			: null;
	}
}
