<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\Access;
use App\Models\M_User;

class AuthFilter implements FilterInterface
{
	/**
	 * Do whatever processing this filter needs to do.
	 * By default it should not return anything during
	 * normal execution. However, when an abnormal state
	 * is found, it should return an instance of
	 * CodeIgniter\HTTP\Response. If it does, script
	 * execution will end and that Response will be
	 * sent back to the client, allowing for error pages,
	 * redirects, etc.
	 *
	 * @param RequestInterface $request
	 * @param array|null       $arguments
	 *
	 * @return mixed
	 */
	public function before(RequestInterface $request, $arguments = null)
	{
		$uri = $request->uri->getSegment(1);

        // 1. Cek apakah user sudah login secara global (SSO)
        if (!session()->get('logged_in')) {
            return redirect()->to(env("app.appURL"));
        }
        
        // 2. Set session khusus compro jika belum ada
        if (!session()->has('compro')) {
            $user = new M_User();

            // Ambil user compro berdasarkan user_id dari asset
            $userCompro = $user->detail([
                'username'    => session()->get('username')
            ])->getRow();
    
            if ($userCompro) {
                session()->set('compro', [
                    'sys_user_id'   => $userCompro->sys_user_id,
                    'username'      => $userCompro->username,
                    'sys_role_id'   => $userCompro->role,
                ]);
            } else {
                session()->setFlashdata('error', 'User tidak terdaftar di aplikasi compro');
                return redirect()->to(env("app.appURL"));
            }
        }
        
        // 3. Redirect jika akses ke /auth padahal sudah login
        if ($uri === 'auth') {
            return redirect()->to(site_url('panel'));
        }
        
        // 4. Cek hak akses untuk halaman /panel
        if ($uri === 'panel') {
            $access = new Access();
            $uri2 = $request->uri->getSegment(2);
            $previouse_url = session()->get('previous_url');
            $isView = 'isview';
    
            $check = $access->checkCrud($uri2, $isView, session('compro.sys_role_id'));
    
            if (!empty($uri2)) {
                if ($check) {
                    if ($previouse_url === current_url() && $check !== 'Y') {
                        session()->setFlashdata('error', "You are role don't have permission");
                        return redirect()->to(site_url('panel'));
                    } else if ($previouse_url !== current_url() && $check !== 'Y') {
                        session()->setFlashdata('error', "You are role don't have permission");
                        return redirect()->back();
                    }
                } else {
                    session()->setFlashdata('error', "Menu has not been set permission");
                    return redirect()->back();
                }
            }
        }
    
        return null; // lanjutkan request
	}

	/**
	 * Allows After filters to inspect and modify the response
	 * object as needed. This method does not allow any way
	 * to stop execution of other after filters, short of
	 * throwing an Exception or Error.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param array|null        $arguments
	 *
	 * @return mixed
	 */
	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		//
	}
}
