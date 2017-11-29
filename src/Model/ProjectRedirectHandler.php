<?php
namespace Sellastica\Project\Model;

use Nette\Http\IRequest;
use Nette\Http\Url;
use Sellastica\Project\Entity\Project;
use Sellastica\Utils\Strings;

class ProjectRedirectHandler
{
	/** @var \Sellastica\Project\Entity\Project */
	private $project;
	/** @var Url */
	private $currentUrl;


	/**
	 * @param Project $project
	 * @param IRequest $httpRequest
	 */
	public function __construct(Project $project, IRequest $httpRequest)
	{
		$this->project = $project;
		$this->currentUrl = $httpRequest->getUrl();
	}

	/**
	 * @return Url|null
	 */
	public function getRedirectUrl(): ?Url
	{
		$currentHostStartsWithWww = Strings::startsWith($this->currentUrl->getHost(), 'www.');
		if ($currentHostStartsWithWww) {
			$currentHost = Strings::after($this->currentUrl->getHost(), 'www.');
		} else {
			$currentHost = $this->currentUrl->getHost();
		}

		if ($this->project->getHost() === $currentHost) {
			if (
				$this->currentUrl->getScheme() !== $this->project->getScheme()
				|| ($currentHostStartsWithWww && !$this->project->isWww())
				|| (!$currentHostStartsWithWww && $this->project->isWww())
			) {
				return $this->buildUrl($this->project->getDefaultUrl());
			}

			return null;
		}

		$projectUrl = $this->project->getProjectUrlByHost($currentHost);
		if (!$projectUrl || $projectUrl->isRedirect()) {
			return $this->buildUrl($this->project->getDefaultUrl());
		} elseif (
			$projectUrl->getUrl()->getScheme() !== $this->currentUrl->getScheme()
			|| ($currentHostStartsWithWww && !$projectUrl->isWww())
			|| (!$currentHostStartsWithWww && $projectUrl->isWww())
		) {
			return $this->buildUrl($projectUrl->getUrl());
		}

		return null;
	}

	/**
	 * @param Url $url
	 * @return Url
	 */
	private function buildUrl(Url $url): Url
	{
		//alltought it might seem easier to clone current url instead of $url,
		//problem is that current URL containt port number and it cannot be unset
		//(setPort method converts everything to int)
		$return = clone $url;
		$return->setPath($this->currentUrl->getPath());
		$return->setQuery($this->currentUrl->getQuery());
		$return->setFragment($this->currentUrl->getFragment());

		return $return;
	}
}