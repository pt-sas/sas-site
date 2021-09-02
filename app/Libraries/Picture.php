<?php

namespace App\Libraries;

use App\Models\M_Image;

/**
 * Class to load image path directory
 *
 * @author Oki Permana
 */
class Picture
{
    protected $db;
    protected $image;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->image = new M_Image();
    }

    public function render($path = null, $image = null)
    {
        $result = '<center>';
        $result .= '<div class="avatar avatar-xl">';

        if (!empty($image) && is_numeric($image)) {
            $row = $this->image->find($image);

            if (!empty($row['name']) && file_exists($path . $row['name'])) {
                $result .= '<img class="avatar-img rounded-circle" src="' . site_url() . $row['image_url'] . '" />';
            } else {
                $result .= '<img class="avatar-img rounded-circle" src="https://via.placeholder.com/200/808080/ffffff?text=No+Image">';
            }
        } else if (!empty($image) && !is_numeric($image)) {
            if (file_exists($path . $image)) {
                $result .= '<img class="avatar-img rounded" src="' . site_url() . $path . $image . '" />';
            } else {
                $result .= '<img class="avatar-img rounded-circle" src="https://via.placeholder.com/200/808080/ffffff?text=No+Image">';
            }
        } else {
            $result .= '<img class="avatar-img rounded-circle" src="https://via.placeholder.com/200/808080/ffffff?text=No+Image">';
        }

        $result .= '</div>';
        $result .= '</center>';

        return $result;
    }
}
