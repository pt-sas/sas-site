<?php

namespace App\Libraries;

use App\Models\M_Menu;
use App\Models\M_Submenu;

use App\Libraries\Access;

class Template
{
    protected $request;
    protected $session;

    protected $access;

    protected $isView = 'isview';
    protected $isCreate = 'iscreate';
    protected $isUpdate = 'isupdate';
    protected $isDelete = 'isdelete';

    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();
        $this->access = new Access();
    }

    public function render($template = '', $view_data = [])
    {
        $uri = $this->request->uri->getSegment(2);

        // Set previouse url from current url
        $this->session->set(['previous_url' => current_url()]);

        $view_data['title'] = $this->access->getMenu($uri, 'name');
        $view_data['filter'] = $this->render_page($template, 'form_filter');
        $view_data['sidebar'] = $this->menu_sidebar();
        $view_data['toolbar_button'] = $this->toolbar_button();
        $view_data['action_button'] = $this->action_button();

        $view_data['username'] = $this->access->getUser('username');
        $view_data['name'] = $this->access->getUser('name');
        $view_data['email'] = $this->access->getUser('email');
        $view_data['level'] = $this->access->getRole();

        return view($template, $view_data);
    }

    private function render_page($path, $fileName)
    {
        $ext = '.php';
        $view = explode('/', $path);

        // Remove last element array
        array_pop($view);

        $path = implode('/', $view);

        $dir = APPPATH . '/Views/' . $path . '/';

        $file = $dir . $fileName . $ext;

        if (file_exists($file))
            $result = $path . '/' . $fileName;
        else
            $result = false;

        return $result;
    }

    public function table_button($btnID)
    {
        $uri = $this->request->uri->getSegment(2);
        $allBtn = '';

        $btnUpdate = '<a class="btn" onclick="Edit(' . "'" . $btnID . "'" . ')" title="Edit"><i class="far fa-edit text-info"></i></a>';

        $btnDelete = '<a class="btn" onclick="Destroy(' . "'" . $btnID . "'" . ')" title="Delete"><i class="fas fa-trash-alt text-danger"></i></a>';

        $update = $this->access->checkCrud($uri, $this->isUpdate);
        $delete = $this->access->checkCrud($uri, $this->isDelete);

        if ($update === 'Y')
            $allBtn .= $btnUpdate;

        if ($delete === 'Y')
            $allBtn .= $btnDelete;

        return $allBtn;
    }

    private function toolbar_button()
    {
        $uri = $this->request->uri->getSegment(2);
        $allBtn = '';

        $btnNew = '<button type="button" class="btn btn-primary btn-sm btn-round ml-auto new_form" title="New Data">
                        <i class="fa fa-plus fa-fw"></i> Add New
                      </button>';

        $check = $this->access->checkCrud($uri, $this->isCreate);

        if ($check === 'Y')
            $allBtn .= $btnNew;

        return $allBtn;
    }

    private function action_button()
    {
        $uri = $this->request->uri->getSegment(2);
        $allBtn = '';

        $btnBottom = '<div class="card-action card-button">
                        <button type="button" class="btn btn-outline-danger btn-round ml-auto close_form">Close</button>
                        <button type="button" class="btn btn-primary btn-round ml-auto save_form">Save changes</button>
                    </div>';

        $check = $this->access->checkCrud($uri, $this->isCreate);

        if ($check === 'Y')
            $allBtn .= $btnBottom;

        return $allBtn;
    }

    private function menu_sidebar()
    {
        $menu = new M_Menu();
        $submenu = new M_Submenu();

        $uri = $this->request->uri->getSegment(2);

        $dataMenu = $menu->where('isactive', 'Y')
            ->orderBy('sequence', 'ASC')
            ->findAll();

        $sidebar = '<ul class="nav nav-primary">';

        foreach ($dataMenu as $row) :
            $menu_id = $row->sys_menu_id;

            // Get value access parent menu
            $check = $this->access->checkCrud(null, $this->isView, $menu_id, 'parent');

            if ($check === 'Y') {
                $isActive = '';
                if ($uri == '' && $row->url === 'dashboard')
                    $isActive = 'active';
                else if ($uri == $row->url)
                    $isActive = 'active';

                $dataSub = $submenu->where('sys_menu_id', $menu_id)->where('isactive', 'Y')
                    ->orderBy('sequence', 'ASC')
                    ->findAll();

                if ($dataSub) {
                    $subActive = '';

                    foreach ($dataSub as $row2) :
                        if ($uri == $row2->url)
                            $subActive = 'active';
                    endforeach;

                    $sidebar .= '<li class="nav-item ' . $subActive . ' submenu">
                                <a data-toggle="collapse" href="#' . $row->url . '">
                                    <i class="' . $row->icon . '"></i>
                                    <p>' . $row->name . '</p>
                                    <span class="caret"></span>
                                </a>';

                    if (!empty($subActive))
                        $sidebar .= '<div class="collapse show" id="' . $row->url . '">';
                    else
                        $sidebar .= '<div class="collapse" id="' . $row->url . '">';

                    $sidebar .= '<ul class="nav nav-collapse">';

                    foreach ($dataSub as $row2) :
                        $sub_id = $row2->sys_submenu_id;

                        // Get value access submenu
                        $check = $this->access->checkCrud(null, $this->isView, $sub_id);

                        $subActive2 = '';

                        if ($uri == $row2->url)
                            $subActive2 = 'active';

                        if ($check === 'Y')
                            $sidebar .= '<li class="' . $subActive2 . '">
                            <a href="' . site_url('panel/' . $row2->url) . '"><span class="sub-item">' . $row2->name . '</span></a>
                        </li>';
                    endforeach;

                    $sidebar .= '</ul>
                                </div>
                            </li>';
                } else {
                    $sidebar .= '<li class="nav-item ' . $isActive . '">';

                    if ($row->url === 'dashboard')
                        $sidebar .= '<a href="' . site_url('panel') . '">';
                    else
                        $sidebar .= '<a href="' . site_url('panel/' . $row->url) . '">';

                    $sidebar .= '<i class="' . $row->icon . '"></i>
                            <p>' . $row->name . '</p>
                        </a>
                    </li>';
                }
            }
        endforeach;

        $sidebar .= '</ul>';

        return $sidebar;
    }
}
