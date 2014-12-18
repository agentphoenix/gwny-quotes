<?php namespace Golfwny\Quote\Services;

use League\CommonMark\CommonMarkConverter as Parser;

class MarkdownService {

	protected $markdown;

	public function __construct(Parser $markdown)
	{
		$this->markdown = $markdown;
	}

	/**
	 * Parse the string from Markdown to HTML.
	 *
	 * @param	string	$str	The string to parse
	 * @return	string
	 */
	public function parse($str)
	{
		return $this->markdown->convertToHtml($str);
	}
	
}