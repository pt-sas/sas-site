<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;

use App\Models\M_Role;
use App\Models\M_Menu;
use App\Models\M_Submenu;

class Accessmenu extends BaseController
{
	protected $table = 'sys_access_menu';

	public function getAccess()
	{
		$menu = new M_Menu();
		$submenu = new M_Submenu();
		$role = new M_Role();

		$post = $this->request->getVar();

		if ($this->request->getMethod(true) === 'POST') {

			try {
				if (isset($post)) {
					// Check uri segment from submenu
					$sub = $submenu->detail('sys_submenu.url', $post['last_url'])->getRow();

					// Check uri segment from main menu
					$parent = $menu->where('url', $post['last_url'])->first();

					if (isset($sub)) {
						$access = $role->detail([
							'am.sys_submenu_id'		=> $sub->sys_submenu_id,
							'am.sys_role_id'		=> session()->get('sys_role_id')
						])->getRow();

						if ($post['action'] === 'create')
							$response = $access->iscreate;

						if ($post['action'] === 'update')
							$response = $access->isupdate;

						if ($post['action'] === 'delete')
							$response = $access->isdelete;
					} else if (isset($parent)) {
						$access = $role->detail([
							'am.sys_menu_id'		=> $parent->sys_menu_id,
							'am.sys_role_id'		=> session()->get('sys_role_id')
						])->getRow();

						if ($post['action'] === 'create')
							$response = $access->iscreate;

						if ($post['action'] === 'update')
							$response = $access->isupdate;

						if ($post['action'] === 'delete')
							$response = $access->isdelete;
					}
				}
			} catch (\Exception $e) {
				$response = message('error', false, $e->getMessage());
			}
		}

		return json_encode($response);
	}
}
