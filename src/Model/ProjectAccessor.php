<?php
namespace Sellastica\Project\Model;

use Nette\Http\IRequest;
use Nette\Http\UrlScript;
use Sellastica\BlueScreen\BlueScreen;
use Sellastica\Core\Model\FactoryAccessor;
use Sellastica\Entity\EntityManager;
use Sellastica\Project\Entity\Project;
use Sellastica\Utils\Strings;

/**
 * @method Project get()
 */
class ProjectAccessor extends FactoryAccessor
{
	/** @var UrlScript */
	private $url;
	/** @var \Sellastica\Entity\EntityManager */
	private $em;


	/**
	 * @param \Sellastica\Entity\EntityManager $em
	 * @param IRequest $request
	 */
	public function __construct(
		EntityManager $em,
		IRequest $request
	)
	{
		$this->url = $request->getUrl();
		$this->em = $em;
	}

	/**
	 * @return Project
	 */
	public function create(): Project
	{
		//ignore if host contains www or not - we will potentionally redirect in the ProjectRedirectHandler
		$host = Strings::removeFromBeginning($this->url->getHost(), 'www.');
		$project = $this->em->getRepository(Project::class)->findByHost($host);
		if (!isset($project)) {
			BlueScreen::display(sprintf('Project %s not found', $this->url->getHostUrl()));
			die;
		}

		return $project;
	}
}