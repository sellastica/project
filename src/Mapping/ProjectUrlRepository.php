<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Entity\Mapping\Repository;
use Sellastica\Project\Entity\ProjectUrl;

/**
 * @property ProjectUrlDao $dao
 * @see ProjectUrl
 */
class ProjectUrlRepository extends Repository implements \Sellastica\Project\Entity\IProjectUrlRepository
{
}