<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method ProjectGroup find(int $id)
 * @method ProjectGroup findOneBy(array $filterValues)
 * @method ProjectGroup findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method ProjectGroup[]|ProjectGroupCollection findAll(Configuration $configuration = null)
 * @method ProjectGroup[]|ProjectGroupCollection findBy(array $filterValues, Configuration $configuration = null)
 * @method ProjectGroup[]|ProjectGroupCollection findByIds(array $idsArray, Configuration $configuration = null)
 * @method ProjectGroup[]|ProjectGroupCollection findPublishable(int $id)
 * @method ProjectGroup[]|ProjectGroupCollection findAllPublishable(Configuration $configuration = null)
 * @method ProjectGroup[]|ProjectGroupCollection findPublishableBy(array $filterValues, Configuration $configuration = null)
 * @see ProjectGroup
 */
interface IProjectGroupRepository extends IRepository
{
}