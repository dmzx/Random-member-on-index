<?php
/**
*
* @package phpBB Extension - Random member on index
* @copyright (c) 2017 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\randommemberonindex\migrations;

class release_1_0_0 extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		return array(
			// Add configs
			array('config.add', array('randommemberonindex_enable', 0)),
			array('config.add', array('randommemberonindex_close', 0)),
			array('config.add', array('randommemberonindex_version', '1.0.0')),
			// Add ACP module
			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_RANDOMMEMBERONINDEX_TITLE',
			)),
			array('module.add', array(
				'acp',
				'ACP_RANDOMMEMBERONINDEX_TITLE',
				array(
					'module_basename'	=> '\dmzx\randommemberonindex\acp\acp_randommemberonindex_module',
					'modes'				=> array('configuration'),
				),
			)),
		);
	}

	public function update_schema()
	{
		return array(
			'add_columns'	=> array(
				$this->table_prefix . 'users'	=> array(
					'randommemberonindex_status'	=> array('BOOL', 1),
				),
			),
		);
	}

	public function revert_schema()
	{
		return array(
			'drop_columns'	=> array(
				$this->table_prefix . 'users'	=> array(
					'randommemberonindex_status',
				),
			),
		);
	}
}
