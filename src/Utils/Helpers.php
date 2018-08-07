<?php
namespace Sellastica\Project\Service;

class Helpers
{
	/**
	 * @param \Nette\Http\Url $url
	 * @return string
	 */
	public static function getProjectTitle(\Nette\Http\Url $url): string
	{
		return ucfirst($url->getHost());
	}
}