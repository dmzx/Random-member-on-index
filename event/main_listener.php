<?php
/**
*
* @package phpBB Extension - Random member on index
* @copyright (c) 2017 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\randommemberonindex\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use phpbb\user;
use phpbb\db\driver\driver_interface as db_interface;
use phpbb\config\config;
use phpbb\template\template;
use phpbb\controller\helper;
use phpbb\request\request_interface;

class main_listener implements EventSubscriberInterface
{
	/** @var user */
	protected $user;

	/** @var db_interface */
	protected $db;

	/** @var config */
	protected $config;

	/** @var template */
	protected $template;

	/** @var helper */
	protected $helper;

	/** @var request_interface */
	protected $request;

	/**
	 * Constructor
	 *
	 * @param user				$user
	 * @param db_interface		$db
	 * @param config			$config
	 * @param template			$template
	 * @param helper			$helper
	 * @param request_interface	$request
	 *
	 */
	public function __construct(
		user $user,
		db_interface $db,
		config $config,
		template $template,
		helper $helper,
		request_interface $request
	)
	{
		$this->user 		= $user;
		$this->db 			= $db;
		$this->config 		= $config;
		$this->template 	= $template;
		$this->helper 		= $helper;
		$this->request 		= $request;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.index_modify_page_title' 				=> 'index_modify_page_title',
			'core.ucp_prefs_personal_data'				=> 'ucp_prefs_get_data',
			'core.ucp_prefs_personal_update_data'		=> 'ucp_prefs_set_data',
		);
	}

	function index_modify_page_title($event)
	{
		if ($this->config['randommemberonindex_enable'])
		{
			$this->user->add_lang_ext('dmzx/randommemberonindex', 'common');

			if (!$this->user->data['randommemberonindex_status'])
			{
				return;
			}

			$sql_layer = $this->db->get_sql_layer();

			switch ($sql_layer)
			{
				case 'postgres':
					$order_by = 'RANDOM()';
				break;
				case 'mssql':
				case 'mssql_odbc':
					$order_by = 'NEWID()';
				break;
				default:
					$order_by = 'RAND()';
				break;
			}

			$sql = 'SELECT user_id, username, user_colour
				FROM ' . USERS_TABLE . '
				WHERE user_type <> ' . USER_IGNORE . '
					AND user_type <> ' . USER_INACTIVE . '
				ORDER BY ' . $order_by;
			$result = $this->db->sql_query_limit($sql, 1);
			$row = $this->db->sql_fetchrow($result);

			$username_colored = get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']);

			$this->template->assign_block_vars('random_member', array(
				'USERNAME_FULL'	=> $this->user->lang('RANDOMMEMBERONINDEX_INDEX', $username_colored),
			));
			$this->db->sql_freeresult($result);

			$this->template->assign_vars(array(
				'S_RANDOMMEMBERONINDEX_ENABLE' 	=> $this->config['randommemberonindex_enable'],
				'S_RANDOMMEMBERONINDEX_CLOSE' 	=> $this->config['randommemberonindex_close'],
				'U_RANDOMMEMBERONINDEX_CLOSE'	=> $this->helper->route('dmzx_randommemberonindex_controller', array(
					'hash' => generate_link_hash('close_randommemberonindex')
				)),
			));
		}
	}

	public function ucp_prefs_get_data($event)
	{
		$this->user->add_lang_ext('dmzx/randommemberonindex', 'common');

		$event['data'] = array_merge($event['data'], array(
			'randommemberonindex_ucp_index_enable'	=> $this->request->variable('randommemberonindex_ucp_index_enable', (int) $this->user->data['randommemberonindex_status']),
		));

		if (!$event['submit'])
		{
			$this->template->assign_vars(array(
				'S_UCP_RANDOMMEMBERONINDEX_INDEX'	=> $event['data']['randommemberonindex_ucp_index_enable'],
				'S_RANDOMMEMBERONINDEX_CLOSE' 		=> $this->config['randommemberonindex_close'],
			));
		}
	}

	public function ucp_prefs_set_data($event)
	{
		$event['sql_ary'] = array_merge($event['sql_ary'], array(
			'randommemberonindex_status' => $event['data']['randommemberonindex_ucp_index_enable'],
		));
	}
}
