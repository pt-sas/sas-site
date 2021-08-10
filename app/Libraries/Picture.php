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

        if (!empty($image) && is_numeric($image)) {
            $row = $this->image->find($image);

            if (!empty($row['name']) && file_exists($path . $row['name'])) {
                $result .= '<img class="rounded-image" src="' . site_url() . $row['image_url'] . '" />';
            }
        } else if (!is_numeric($image)) {
            $result .= '<img class="rectangle-image" src="' . site_url() . $image . '" />';
        } else {
            $result .= '<img class="rounded-image" src="https://via.placeholder.com/200/808080/ffffff?text=No+Image">';
        }

        $result .= '</center>';

        return $result;
    }
}
