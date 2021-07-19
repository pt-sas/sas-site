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

    public function render($path = null, $image_id = null)
    {
        if (!empty($image_id)) {
            $row = $this->image->find($image_id);

            if (file_exists($path . $row['name'])) {
                return '<img class="rounded-image" src="' . base_url() . '/' . $row['image_url'] . '" />';
            }
        }

        return '<img class="rounded-image" src="https://via.placeholder.com/100/808080/ffffff?text=Not+found">';
    }
}
