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
			$title ?? Helpers::getProjectTitle($url),
			$url->getScheme(),
			strpos($url->getHost(), 'www') !== false,
			$url->getHost(),
			$localization->getCode(),
			$currency->getCode(),
			$email
		)->build();

		$this->em->persist($project);

		return $project;
	}
}