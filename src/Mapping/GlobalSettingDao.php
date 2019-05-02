<?php
namespace Sellastica\Project\Mapping;

/**
 * @see \Sellastica\Project\Entity\GlobalSetting
 * @property GlobalSettingDibiMapper $mapper
 */
class GlobalSettingDao extends \Sellastica\Entity\Mapping\Dao
{
	/**
	 * @inheritDoc
	 */
	protected function getBuilder(
		$data,
		$first = null,
		$second = null
	): \Sellastica\Entity\IBuilder
	{
		return \Sellastica\Project\Entity\GlobalSettingBuilder::create($data->code, $data->scope)
			->hydrate($data);
	}

	/**
	 * @return \Sellastica\Project\Entity\GlobalSettingCollection
	 */
	public function getEmptyCollection(): \Sellastica\Entity\Entity\EntityCollection
	{
		return new \Sellastica\Project\Entity\GlobalSettingCollection;
	}
}