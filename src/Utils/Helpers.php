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
		return ucfirst(self::getProjectHost($url));
	}

	/**
	 * @param \Nette\Http\Url $url
	 * @return string
	 */
	public static function getProjectHost(\Nette\Http\Url $url): string
	{
		return \Sellastica\Utils\Strings::startsWith($url->getHost(), 'www.')
			? str_replace('www.', '', $url->getHost())
			: $url->getHost();
	}
}