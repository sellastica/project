<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Entity\Mapping\Repository;
use Sellastica\Project\Entity\Contact;
use Sellastica\Project\Entity\IContactRepository;

/**
 * @property ContactDao $dao
 * @see Contact
 */
class ContactRepository extends Repository implements IContactRepository
{
}