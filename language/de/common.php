<?php
/**
*
* @version $Id: common.php 90 2017-04-27 08:48:52Z Scanialady $
* @package phpBB Extension - Random member on index (deutsch)
* @copyright (c) 2017 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters for use
//	‚ ‘ ’ « » „ “ ” …

$lang = array_merge($lang, array(
	'RANDOMMEMBERONINDEX_INDEX'				=> 'Stimme ab für <strong>%1$s</strong> als Präsident!',
	'RANDOMMEMBERONINDEX_UPC_INDEX'			=> 'Zufälliges Mitglied auf Forenübersicht anzeigen',
	'RANDOMMEMBERONINDEX_CLOSE'				=> 'Schließe „Zufälliges Mitglied auf der Forenübersicht“',
));
