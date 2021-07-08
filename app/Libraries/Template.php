<?php

namespace App\Libraries;

class Template
{
    public function render($template = '', $view_data = [])
    {
        return view($template, $view_data);
    }
}
