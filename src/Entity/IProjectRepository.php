<?php
namespace Sellastica\Project\Entity;

use Sellastica\Entity\Configuration;
use Sellastica\Entity\Mapping\IRepository;

/**
 * @method Project find(int $id)
 * @method Project findOneBy(array $filterValues)
 * @method Project[] findAll(Configuration $configuration = null)
 * @method Project[] findBy(array $filterValues, Configuration $configuration = null)
 * @method Project[] findByIds(array $idsArray, Configuration $configuration = null)
 * @method Project findPublishable(int $id)
 * @method Project findOnePublishableBy(array $filterValues, Configuration $configuration = null)
 * @method Project[] findAllPublishable(Configuration $configuration = null)
 * @method Project[] findPublishableBy(array $filterValues, Configuration $configuration = null)
 */
interface IProjectRepository extends IRepository
{
	/**
	 * @param string $host
	 * @return Project|null
	 */
	function findByHost(string $host);
}
