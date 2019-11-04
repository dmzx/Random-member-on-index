<?php
/**
*
* @package phpBB Extension - Random member on index
* @copyright (c) 2019 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\randommemberonindex\migrations;

class randommemberonindex_v101 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return [
			'\dmzx\randommemberonindex\migrations\release_1_0_0',
		];
	}

	public function update_data()
	{
		return [
			// Update config
			['config.update', ['randommemberonindex_version', '1.0.1']],
		];
	}
}
