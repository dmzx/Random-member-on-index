<?php
/**
*
* @package phpBB Extension - Random member on index
* @copyright (c) 2017 dmzx - https://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace dmzx\randommemberonindex\controller;

use phpbb\db\driver\driver_interface as db_interface;
use phpbb\controller\helper;
use phpbb\request\request_interface;
use phpbb\user;

class controller
{
	/** @var db_interface */
	protected $db;

	/** @var helper */
	protected $helper;

	/** @var request_interface	*/
	protected $request;

	/** @var user */
	protected $user;

	/**
	* Constructor
	*
	* @param db_interface		$db
	* @param helper				$helper
	* @param request_interface	$request
	* @param user				$user
	*
	*/
	public function __construct(
		db_interface $db,
		helper $helper,
		request_interface $request,
		user $user
	)
	{
		$this->db 		= $db;
		$this->helper 	= $helper;
		$this->request 	= $request;
		$this->user 	= $user;
	}

	public function close_randommemberonindex()
	{
		if (!check_link_hash($this->request->variable('hash', ''), 'close_randommemberonindex'))
		{
			throw new \phpbb\exception\http_exception(403, 'NO_AUTH_OPERATION');
		}

		if ($this->user->data['user_id'] != ANONYMOUS)
		{
			$response = $this->update_randommemberonindex_status();
		}

		if ($this->request->is_ajax())
		{
			return new \Symfony\Component\HttpFoundation\JsonResponse(array(
				'success' => $response,
			));
		}

		$redirect = $this->request->variable('redirect', $this->user->data['session_page']);
		$redirect = reapply_sid($redirect);
		redirect($redirect);
	}

	protected function update_randommemberonindex_status()
	{
		$sql = 'UPDATE ' . USERS_TABLE . '
			SET randommemberonindex_status = 0
			WHERE user_id = ' . (int) $this->user->data['user_id'] . '
				AND user_type <> ' . USER_IGNORE;
		$this->db->sql_query($sql);

		return (bool) $this->db->sql_affectedrows();
	}
}
