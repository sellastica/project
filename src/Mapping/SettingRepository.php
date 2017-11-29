<?php
namespace Core\Infrastructure\Mapping\Project;

use Sellastica\Entity\Mapping\Repository;

/**
 * @property SettingDao $dao
 */
class SettingRepository extends Repository implements \Sellastica\Project\Entity\ISettingRepository
{
	/**
	 * @param string $code
	 * @param string|null $scope
	 * @return string|false
	 */
	public function findSetting(string $code, string $scope = null)
	{
		return $this->dao->findSetting($code, $scope);
	}
}
