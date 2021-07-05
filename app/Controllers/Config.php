<?php

namespace App\Controllers;

class Config extends BaseController
{
	public function general_setting()
	{
		echo view('backend/configuration/general/v_general');
	}

	public function menu()
	{
		echo view('backend/configuration/menu/v_menu');
	}

	public function role()
	{
		echo view('backend/configuration/user/v_role');
	}
}
