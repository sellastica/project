<?php
namespace Sellastica\Project\Entity;

class ProjectUrlRelations implements \Sellastica\Entity\Relation\IEntityRelations
{
	/** @var ProjectUrl */
	private $url;
	/** @var \Sellastica\Entity\EntityManager */
	private $em;


	/**
	 * @param ProjectUrl $url
	 * @param \Sellastica\Entity\EntityManager $em
	 */
	public function __construct(
		ProjectUrl $url,
		\Sellastica\Entity\EntityManager $em
	)
	{
		$this->url = $url;
		$this->em = $em;
	}

	/**
	 * @return Project
	 */
	public function getProject(): Project
	{
		return $this->em->getRepository(Project::class)->find($this->url->getProjectId());
	}
}