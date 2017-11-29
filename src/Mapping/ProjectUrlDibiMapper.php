<?php
namespace Core\Infrastructure\Mapping\Dibi\Project;

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