<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method ProjectUrl find(int $id)
 * @method ProjectUrl findOneBy(array $filterValues)
 * @method ProjectUrl findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method ProjectUrl[]|ProjectUrlCollection findAll(Configuration $configuration = null)
 * @method ProjectUrl[]|ProjectUrlCollection findBy(array $filterValues, Configuration $configuration = null)
 * @method ProjectUrl[]|ProjectUrlCollection findByIds(array $idsArray, Configuration $configuration = null)
 * @method ProjectUrl[]|ProjectUrlCollection findPublishable(int $id)
 * @method ProjectUrl[]|ProjectUrlCollection findAllPublishable(Configuration $configuration = null)
 * @method ProjectUrl[]|ProjectUrlCollection findPublishableBy(array $filterValues, Configuration $configuration = null)
 * @see ProjectUrl
 */
interface IProjectUrlRepository extends IRepository
{
}