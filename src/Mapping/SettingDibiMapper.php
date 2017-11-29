<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Entity\Mapping\DibiMapper;

class SettingDibiMapper extends DibiMapper
{
	/**
	 * @param string $code
	 * @param string|null $scope
	 * @return string|false
	 */
	public function findSetting($code, $scope = null)
	{
		return $this->getResource()
			->select(false)
			->select('value')
			->where(['code' => $code, 'scope' => $scope])
			->fetchSingle();
	}
}