<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Entity\Entity\EntityCollection;
use Sellastica\Entity\IBuilder;
use Sellastica\Entity\Mapping\Dao;
use Sellastica\Project\Entity\SettingBuilder;
use Sellastica\Project\Entity\SettingCollection;

/**
 * @property SettingDibiMapper $mapper
 */
class SettingDao extends Dao
{
	/**
	 * @param string $code
	 * @param string|null $scope
	 * @return string|false
	 */
	public function findSetting($code, $scope = null)
	{
		return $this->mapper->findSetting($code, $scope);
	}

	/**
	 * {@inheritdoc}
	 */
	protected function getBuilder($data, $first = null, $second = null): IBuilder
	{
		return SettingBuilder::create($data->code, $data->scope)
			->hydrate($data);
	}

	/**
	 * @return EntityCollection|SettingCollection
	 */
	public function getEmptyCollection(): EntityCollection
	{
		return new SettingCollection();
	}
}