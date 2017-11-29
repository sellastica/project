<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Entity\Mapping\DibiMapper;
use Sellastica\Project\Entity\ProjectGroup;

/**
 * @see ProjectGroup
 */
class ProjectGroupDibiMapper extends DibiMapper
{
	/**
	 * @return bool
	 */
	protected function isInCrmDatabase(): bool
	{
		return true;
	}
}