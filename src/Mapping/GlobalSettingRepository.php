<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Entity\Mapping\Repository;
use Sellastica\Project\Entity\GlobalSetting;
use Sellastica\Project\Entity\IGlobalSettingRepository;

/**
 * @property GlobalSettingDao $dao
 * @see GlobalSetting
 */
class GlobalSettingRepository extends Repository implements IGlobalSettingRepository
{
}