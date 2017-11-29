<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Entity\Mapping\DibiMapper;

/**
 * @see \Sellastica\Project\Entity\ProjectUrl
 */
class ProjectUrlDibiMapper extends DibiMapper
{
	/**
	 * @return bool
	 */
	protected function isInCrmDatabase(): bool
	{
		return true;
	}
}