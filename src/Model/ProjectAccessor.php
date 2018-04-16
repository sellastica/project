<?php
namespace Sellastica\Project\Model;

/**
 * @method \Sellastica\Project\Entity\Project get()
 */
class ProjectAccessor extends \Sellastica\Core\Model\FactoryAccessor
{
	/** @var \Nette\Http\UrlScript */
	private $url;
	/** @var \Sellastica\Entity\EntityManager */
	private $em;


	/**
	 * @param \Sellastica\Entity\EntityManager $em
	 * @param \Nette\Http\IRequest $request
	 */
	public function __construct(
		\Sellastica\Entity\EntityManager $em,
		\Nette\Http\IRequest $request
	)
	{
		$this->url = $request->getUrl();
		$this->em = $em;
	}

	/**
	 * @return \Sellastica\Project\Entity\Project
	 */
	public function create(): \Sellastica\Project\Entity\Project
	{
		//ignore if host contains www or not - we will potentionally redirect in the ProjectRedirectHandler
		$host = \Sellastica\Utils\Strings::removeFromBeginning($this->url->getHost(), 'www.');
		$project = $this->em->getRepository(\Sellastica\Project\Entity\Project::class)->findByHost($host);
		if (!isset($project)) {
			\Sellastica\BlueScreen\BlueScreen::display(sprintf('Project %s not found', $this->url->getHostUrl()));
			die;
		}

		return $project;
	}
}