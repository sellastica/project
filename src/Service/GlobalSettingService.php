<?php
namespace Sellastica\Project\Service;

class GlobalSettingService
{
	/** @var \Sellastica\Entity\EntityManager */
	private $em;


	/**
	 * @param \Sellastica\Entity\EntityManager $em
	 */
	public function __construct(
		\Sellastica\Entity\EntityManager $em
	)
	{
		$this->em = $em;
	}

	/**
	 * @param string|null $scope
	 * @param string $code
	 * @return \Sellastica\Project\Entity\GlobalSetting
	 */
	public function get(?string $scope, string $code): \Sellastica\Project\Entity\GlobalSetting
	{
		$setting = $this->em->getRepository(\Sellastica\Project\Entity\GlobalSetting::class)->findOneBy([
			'scope' => $scope,
			'code' => $code,
		]);
		if (!$setting) {
			throw new \UnexpectedValueException(
				sprintf('Global setting "%s.%s" not found', $scope, $code)
			);
		}

		return $setting;
	}
}