<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Entity\Mapping\RepositoryProxy;
use Sellastica\Project\Entity\IGlobalSettingRepository;
use Sellastica\Project\Entity\GlobalSetting;

/**
 * @method GlobalSettingRepository getRepository()
 * @see GlobalSetting
 */
class GlobalSettingRepositoryProxy extends RepositoryProxy implements IGlobalSettingRepository
{
}