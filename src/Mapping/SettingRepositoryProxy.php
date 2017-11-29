<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Entity\Mapping\RepositoryProxy;

/**
 * @method SettingRepository getRepository()
 */
class SettingRepositoryProxy extends RepositoryProxy implements \Sellastica\Project\Entity\ISettingRepository
{
	public function findSetting(string $code, string $scope = null)
	{
		return $this->getRepository()->findSetting($code, $scope);
	}
}
