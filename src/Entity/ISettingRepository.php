<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method Setting find(int $id)
 * @method Setting findOneBy(array $filterValues)
 * @method Setting[] findAll(Configuration $configuration = null)
 * @method Setting[] findBy(array $filterValues, Configuration $configuration = null)
 * @method Setting[] findByIds(array $idsArray, Configuration $configuration = null)
 * @method Setting findPublishable(int $id)
 * @method Setting findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method Setting[] findAllPublishable(Configuration $configuration = null)
 * @method Setting[] findPublishableBy(array $filterValues, Configuration $configuration = null)
 */
interface ISettingRepository extends IRepository
{
	/**
	 * @param string $code
	 * @param string|null $scope
	 * @return string|false
	 */
	public function findSetting(string $code, string $scope = null);
}
