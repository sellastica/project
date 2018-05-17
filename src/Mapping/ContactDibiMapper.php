<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Entity\Mapping\DibiMapper;
use Sellastica\Project\Entity\Contact;

/**
 * @see Contact
 */
class ContactDibiMapper extends DibiMapper
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