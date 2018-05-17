<?php
namespace Sellastica\Project\Mapping;

use Sellastica\Entity\Mapping\Repository;
use Sellastica\Project\Entity\IProjectContactRepository;
use Sellastica\Project\Entity\ProjectContact;

/**
 * @property ProjectContactDao $dao
 * @see ProjectContact
 */
class ProjectContactRepository extends Repository implements IProjectContactRepository
{
}