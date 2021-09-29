<?php

namespace App\Libraries;

use App\Models\M_User;
use App\Models\M_Menu;
use App\Models\M_Submenu;
use App\Models\M_Role;

class Access
{
    protected $request;
    protected $session;
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
        $this->session = \Config\Services::session();
        $this->request = \Config\Services::request();
    }

    /**
     * check login
     * 0 = username tidak ada
     * 1 = sukses
     * 2 = password salah
     * 3 = user nonaktif
     * 4 = role tidak ada
     * @param unknown_type $post
     * @return boolean
     */
    public function checkLogin($post)
    {
        $user = new M_User();

        $dataUser = $user->detail([
            'username'    => $post['username']
        ])->getRow();

        if ($dataUser) {
            if ($dataUser->isactive === 'Y' && !empty($dataUser->role)) {
                if (password_verify($post['password'], $dataUser->password)) {
                    $this->session->set([
                        'sys_user_id'   => $dataUser->sys_user_id,
                        'sys_role_id'   => $dataUser->role,
                        'logged_in'     => TRUE
                    ]);
                    return 1;
                } else {
                    return 2;
                }
            } else if ($dataUser->isactive === 'Y' && empty($dataUser->role)) {
                return 4;
            } else {
                return 3;
            }
        }

        return 0;
    }

    public function checkCrud($uri = null, $field = null, $menu_id = null, $setmenu = null)
    {
        $menu = new M_Menu();
        $submenu = new M_Submenu();
        $role = new M_Role();

        try {
            if (!empty($uri)) {
                // Check uri segment from submenu
                $sub = $submenu->where('url', $uri)->first();

                // Check uri segment from main menu
                $parent = $menu->where('url', $uri)->first();

                // submenu already in submenu
                if (isset($sub)) {
                    // Check submenu is set in menu access
                    $access = $role->detail([
                        'am.sys_submenu_id'     => $sub->sys_submenu_id,
                        'am.sys_role_id'        => session()->get('sys_role_id')
                    ])->getRow();

                    // submenu set in role and role isactive Y
                    if ($access && $access->isactive === 'Y')
                        $field = $access->$field;
                    else
                        $field = false;
                } else if (isset($parent)) {
                    // Check menu is set in menu access
                    $access = $role->detail([
                        'am.sys_menu_id'        => $parent->sys_menu_id,
                        'am.sys_role_id'        => session()->get('sys_role_id')
                    ])->getRow();

                    // menu set in role and role isactive Y
                    if ($access && $access->isactive === 'Y')
                        $field = $access->$field;
                    else
                        $field = false;
                } else {
                    // not already
                    $field = false;
                }
            } else {
                if ($setmenu === 'parent') {
                    $access = $role->detail([
                        'am.sys_menu_id'        => $menu_id,
                        'am.sys_role_id'        => session()->get('sys_role_id')
                    ])->getRow();

                    if ($access && $access->isactive === 'Y')
                        $field = $access->$field;
                    else
                        $field = false;
                } else {
                    $access = $role->detail([
                        'am.sys_submenu_id'     => $menu_id,
                        'am.sys_role_id'        => session()->get('sys_role_id')
                    ])->getRow();

                    // submenu set in role
                    if ($access && $access->isactive === 'Y')
                        $field = $access->$field;
                    else
                        $field = false;
                }
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }

        return $field;
    }

    public function getUser($field)
    {
        $user = new M_User();
        $row = $user->find(session()->get('sys_user_id'));
        return $row->$field;
    }

    public function getRole()
    {
        $role = new M_Role();
        $row = $role->find(session()->get('sys_role_id'));
        return $row ? $row->name : 'No Role';
    }

    public function getMenu($uri, $field)
    {
        $menu = new M_Menu();
        $submenu = new M_Submenu();

        if (!empty($uri)) {
            $sub = $submenu->where('url', $uri)->first();

            $parent = $menu->where('url', $uri)->first();

            if (isset($sub)) {
                $field = $sub->$field;
            } else if (isset($parent)) {
                $field = $parent->$field;
            } else {
                $field = false;
            }
        } else {
            $field = false;
        }

        return $field;
    }
}
