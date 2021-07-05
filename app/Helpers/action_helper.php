<?php

function message($param, $value, $message)
{
    if (strtolower($param) == 'success') {
        return [
            [
                strtolower($param)      => $value,
                'message'               => $message
            ]
        ];
    } else if (strtolower($param) == 'error') {
        return [
            [
                strtolower($param)      => $value,
                'message'               => $message
            ]
        ];
    } else {
        return [
            [
                'parameter'             => $param,
                'message'               => 'Undefined message'
            ]
        ];
    }
}

function active($string)
{
    return $string === 'Y' ? '<center><span class="badge badge-success">Active</span></center>' :
        '<center><span class="badge badge-danger">Non-active</span></center>';
}

function status($string)
{
    return $string === 'Y' ? '<center><span class="badge badge-success">Yes</span></center>' :
        '<center><span class="badge badge-danger">No</span></center>';
}

function truncate($string,$length=50,$append="...") {
  $string = trim($string);

  if(strlen($string) > $length) {
    $string = wordwrap($string, $length);
    $string = explode("\n", $string, 2);
    $string = $string[0] . $append;
  }

  return $string;
}
