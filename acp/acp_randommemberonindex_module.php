<?php
/**
*
* @package phpBB Extension - Random member on index
* @copyright (c) 2017 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\randommemberonindex\acp;

class acp_randommemberonindex_module
{
	public $u_action;

	function main($id, $mode)
	{
		global $phpbb_container, $user;

		// Get an instance of the admin controller
		$admin_controller = $phpbb_container->get('dmzx.randommemberonindex.admin.controller');

		// Make the $u_action url available in the admin controller
		$admin_controller->set_page_url($this->u_action);

		switch ($mode)
		{
			case 'configuration':
				// Load a template from adm/style for our ACP page
				$this->tpl_name = 'acp_randommemberonindex';
				// Set the page title for our ACP page
				$this->page_title = $user->lang['RANDOMMEMBERONINDEX_CONFIG_TITLE'];
				// Load the display options handle in the admin controller
				$admin_controller->handle_config();
			break;
		}
	}
}
