<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Entity\Mapping\RepositoryProxy;
use Sellastica\Project\Entity\Contact;
use Sellastica\Project\Entity\IContactRepository;

/**
 * @method ContactRepository getRepository()
 * @see Contact
 */
class ContactRepositoryProxy extends RepositoryProxy implements IContactRepository
{
}