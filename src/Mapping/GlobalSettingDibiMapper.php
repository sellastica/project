<?php
namespace Sellastica\Project\Mapping;

/**
 * @see \Sellastica\Project\Entity\GlobalSetting
 */
class GlobalSettingDibiMapper extends \Sellastica\Entity\Mapping\DibiMapper
{
	/**
	 * @return bool
	 */
	protected function isInCrmDatabase(): bool
	{
		return true;
	}

	/**
	 * @param bool $databaseName
	 * @return string
	 */
	protected function getTableName($databaseName = false): string
	{
		return ($databaseName ? $this->environment->getCrmDatabaseName() . '.' : '')
			. 'global_setting';
	}
}