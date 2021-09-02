<?php

namespace App\Libraries;

class Template
{
    public function render($template = '', $view_data = [])
    {
        $view_data['filter'] = $this->render_page($template, 'form_filter');
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
}
