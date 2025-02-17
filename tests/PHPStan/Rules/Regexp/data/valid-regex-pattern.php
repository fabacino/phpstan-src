<?php namespace RegexExpressionPatterns;

$string = (function (): string {})();

preg_match('~ok~', '');
preg_match('nok', '');
preg_match('~(~', '');
preg_match($string, '');

preg_match_all('~ok~', '');
preg_match_all('nok', '');
preg_match_all('~(~', '');
preg_match_all($string, '');

preg_split('~ok~', '');
preg_split('nok', '');
preg_split('~(~', '');
preg_split($string, '');

preg_grep('~ok~', []);
preg_grep('nok', []);
preg_grep('~(~', []);
preg_grep($string, []);

preg_replace('~ok~', '', '');
preg_replace('nok', '', '');
preg_replace('~(~', '', '');
preg_replace($string, '', '');
preg_replace(['~ok~', 'nok', '~(~', $string], '', '');

preg_replace_callback('~ok~', function () {});
preg_replace_callback('nok', function () {});
preg_replace_callback('~(~', function () {});
preg_replace_callback($string, function () {});
preg_replace_callback(['~ok~', 'nok', '~(~', $string], function () {});

preg_filter('~ok~', '', '');
preg_filter('nok', '', '');
preg_filter('~(~', '', '');
preg_filter($string, '', '');
preg_filter(['~ok~', 'nok', '~(~', $string], '', '');

preg_replace_callback_array(
	[
		'~ok~' => function () {},
		'nok' => function () {},
		'~(~' => function () {},
	],
	''
);

function doFoo(string $s) {
	preg_match('~ok'. preg_quote($s, '~') .'~', '');
	preg_match('~ok'. preg_quote($s) .'~', '');

	// invalid preg_quote delimiters will be reported by RegularExpressionQuotingRule
	preg_match('nok'. preg_quote($s), '');
	preg_match('nok'. preg_quote($s), '');
	preg_match('~('. preg_quote($s, '~') .'~', '');

	preg_replace('nok'. preg_quote($s).'nono', '');
	preg_replace('nok'. preg_quote($s).'nope', '');
	preg_replace('~('. preg_quote($s, '~') .'~', '');
}

class Bug11403
{
	public function sayHello(string $s): void
	{
		preg_replace('![' . preg_quote($s) . ']+!u', $s, $s);
	}
}

class Bug11432 {
	function a(string $str, string $character = ',', bool $trim = false): string
	{
		$str = preg_replace('#' . preg_quote($character, '#') . '{2,}#', $character, $str);

		return ($trim) ? trim($str, $character) : $str;
	}
	function b(string $str, string $character = ',', bool $trim = false): string
	{
		$str = preg_replace('#' . preg_quote($character, '#') . '*#', $character, $str);

		return ($trim) ? trim($str, $character) : $str;
	}
	function c(string $str, string $character = ',', bool $trim = false): string
	{
		$str = preg_replace('#' . preg_quote($character, '#') . '?#', $character, $str);

		return ($trim) ? trim($str, $character) : $str;
	}
}
