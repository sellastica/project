<?php
namespace Sellastica\Project\Service;

class ProjectService
{
	/** @var \Sellastica\Entity\EntityManager */
	private $em;


	/**
	 * @param \Sellastica\Entity\EntityManager $em
	 */
	public function __construct(\Sellastica\Entity\EntityManager $em)
	{
		$this->em = $em;
	}

	/**
	 * @param \Nette\Http\Url $url
	 * @param \Sellastica\Localization\Model\Localization $localization
	 * @param \Sellastica\Localization\Model\Currency $currency
	 * @param \Sellastica\Identity\Model\Email $email
	 * @param string|null $title
	 * @return \Sellastica\Project\Entity\Project
	 */
	public function create(
		\Nette\Http\Url $url,
		\Sellastica\Localization\Model\Localization $localization,
		\Sellastica\Localization\Model\Currency $currency,
		\Sellastica\Identity\Model\Email $email,
		string $title = null
	): \Sellastica\Project\Entity\Project
	{
		$project = \Sellastica\Project\Entity\ProjectBuilder::create(
			$title ?? \Sellastica\Project\Utils\Helpers::getProjectTitle($url),
			$url->getScheme(),
			strpos($url->getHost(), 'www') !== false,
			\Sellastica\Project\Utils\Helpers::getProjectHost($url),
			$localization->getCode(),
			$currency->getCode(),
			$email
		)->build();

		$this->em->persist($project);

		return $project;
	}

	/**
	 * @param string $host
	 * @return null|\Sellastica\Project\Entity\Project
	 */
	public function findByHost(string $host): ?\Sellastica\Project\Entity\Project
	{
		if (\Nette\Utils\Strings::startsWith($host, 'www.')) {
			$host = \Nette\Utils\Strings::after($host, 'www.');
		}

		return $this->em->getRepository(\Sellastica\Project\Entity\Project::class)->findByHost($host);
	}

	/**
	 * @param int $jobId
	 * @return \Sellastica\Project\Entity\ProjectCollection|\Sellastica\Project\Entity\Project[]
	 */
	public function findByJobId(int $jobId): \Sellastica\Project\Entity\ProjectCollection
	{
		return $this->em->getRepository(\Sellastica\Project\Entity\Project::class)->findByJobId($jobId);
	}

	/**
	 * @param int $id
	 * @return null|\Sellastica\Project\Entity\Project
	 */
	public function find(int $id): ?\Sellastica\Project\Entity\Project
	{
		return $this->em->getRepository(\Sellastica\Project\Entity\Project::class)->find($id);
	}
}