<?php
/**
*
* @package phpBB Extension - Random member on index
* @copyright (c) 2017 dmzx - https://www.dmzx-web.net
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
// ’ » “ ” …

$lang = array_merge($lang, array(
	'RANDOMMEMBERONINDEX_SAVED'				=> 'Random member on index Configuration Saved',
	'RANDOMMEMBERONINDEX_CONFIG_TITLE'		=> 'Random member on index Configuration',
	'RANDOMMEMBERONINDEX_ENABLE'			=> 'Random member on index Enable',
	'RANDOMMEMBERONINDEX_ENABLE_EXPLAIN'	=> 'Enable the Random member on index.',
	'RANDOMMEMBERONINDEX_CLOSE'				=> 'Allow users to close Random member on index',
	'RANDOMMEMBERONINDEX_CLOSE_EXPLAIN'		=> 'If set to yes members can close Random member on index.<br />Note: If set to yes members can also switch on/off in UCP edit global settings.',
	'RANDOMMEMBERONINDEX_RESET'				=> 'All Random member on index reset',
	'RANDOMMEMBERONINDEX_RESET_EXPLAIN'		=> 'Reset all members to show Random member on index.',
	'RANDOMMEMBERONINDEX_RESET_CONFIRM'		=> 'Confirm reset',
	'RANDOMMEMBERONINDEX_RESET_BUTTON'		=> 'Reset all members',
));
