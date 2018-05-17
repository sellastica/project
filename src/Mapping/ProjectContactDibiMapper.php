<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Entity\Mapping\DibiMapper;
use Sellastica\Project\Entity\ProjectContact;

/**
 * @see ProjectContact
 */
class ProjectContactDibiMapper extends DibiMapper
{
	/**
	 * @param bool $databaseName
	 * @return string
	 */
	protected function getTableName($databaseName = false): string
	{
		return $this->environment->getCrmDatabaseName() . '.project_contact';
	}
}