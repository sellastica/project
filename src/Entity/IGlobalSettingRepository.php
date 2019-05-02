<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method GlobalSetting find(int $id)
 * @method GlobalSetting findOneBy(array $filterValues)
 * @method GlobalSetting findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method GlobalSetting[]|GlobalSettingCollection findAll(Configuration $configuration = null)
 * @method GlobalSetting[]|GlobalSettingCollection findBy(array $filterValues, Configuration $configuration = null)
 * @method GlobalSetting[]|GlobalSettingCollection findByIds(array $idsArray, Configuration $configuration = null)
 * @method GlobalSetting[]|GlobalSettingCollection findPublishable(int $id)
 * @method GlobalSetting[]|GlobalSettingCollection findAllPublishable(Configuration $configuration = null)
 * @method GlobalSetting[]|GlobalSettingCollection findPublishableBy(array $filterValues, Configuration $configuration = null)
 * @see GlobalSetting
 */
interface IGlobalSettingRepository extends IRepository
{
}