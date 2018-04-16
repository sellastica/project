<?php
namespace Sellastica\Project\Model;

class ProjectRedirectHandler
{
	/** @var \Sellastica\Project\Entity\Project */
	private $project;
	/** @var \Nette\Http\Url */
	private $currentUrl;


	/**
	 * @param \Sellastica\Project\Entity\Project $project
	 * @param \Nette\Http\IRequest $httpRequest
	 */
	public function __construct(
		\Sellastica\Project\Entity\Project $project,
		\Nette\Http\IRequest $httpRequest
	)
	{
		$this->project = $project;
		$this->currentUrl = $httpRequest->getUrl();
	}

	/**
	 * @return \Nette\Http\Url|null
	 */
	public function getRedirectUrl(): ?\Nette\Http\Url
	{
		$currentHostStartsWithWww = \Nette\Utils\Strings::startsWith($this->currentUrl->getHost(), 'www.');
		if ($currentHostStartsWithWww) {
			$currentHost = \Nette\Utils\Strings::after($this->currentUrl->getHost(), 'www.');
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
	 * @param \Nette\Http\Url $url
	 * @return \Nette\Http\Url
	 */
	private function buildUrl(\Nette\Http\Url $url): \Nette\Http\Url
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