<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method ProjectContact find(int $id)
 * @method ProjectContact findOneBy(array $filterValues)
 * @method ProjectContact findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method ProjectContact[]|ProjectContactCollection findAll(Configuration $configuration = null)
 * @method ProjectContact[]|ProjectContactCollection findBy(array $filterValues, Configuration $configuration = null)
 * @method ProjectContact[]|ProjectContactCollection findByIds(array $idsArray, Configuration $configuration = null)
 * @method ProjectContact[]|ProjectContactCollection findPublishable(int $id)
 * @method ProjectContact[]|ProjectContactCollection findAllPublishable(Configuration $configuration = null)
 * @method ProjectContact[]|ProjectContactCollection findPublishableBy(array $filterValues, Configuration $configuration = null)
 * @see ProjectContact
 */
interface IProjectContactRepository extends IRepository
{
}