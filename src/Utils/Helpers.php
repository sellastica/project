<?php
namespace Sellastica\Project\Utils;

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