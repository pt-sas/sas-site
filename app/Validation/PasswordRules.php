<?php

namespace App\Validation;

use App\Models\M_User;

class PasswordRules
{
    public function match()
    {
        $request = \Config\Services::request();

        $user = new M_User();
        $post = $request->getVar();

        $user_id = session()->get('sys_user_id');

        $row = $user->find($user_id);

        if (password_verify($post['password'], $row->password))
            return true;

        return false;
    }
}
