<?php
/**
*
* @package phpBB Extension - Random member on index
* @copyright (c) 2017 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\randommemberonindex\acp;

class acp_randommemberonindex_info
{
	function module()
	{
		return array(
			'filename'	=> 'dmzx\randommemberonindex\acp\acp_randommemberonindex_module',
			'title'		=> 'ACP_CAT_RANDOMMEMBERONINDEX',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'configuration'	=> array('title' => 'ACP_RANDOMMEMBERONINDEX_CONFIG', 'auth' => 'ext_dmzx/randommemberonindex && acl_a_board', 'cat' => array('ACP_CAT_DOT_MODS')),
			),
		);
	}
}
