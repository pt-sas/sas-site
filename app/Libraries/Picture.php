<?php

namespace App\Libraries;

/**
 * Class to load image path directory
 *
 * @author Oki Permana
 */
class Picture
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function render($table = null, $path = null, $field = null, $image_id = null)
    {
        if ($this->db->tableExists($table) && !empty($field) && !empty($image_id)) {
            if ($this->db->fieldExists($field, $table)) {
                $query = $this->db->query("SELECT						
                		mdi.name as image,
                		mdi.image_url
                		FROM md_image mdi
                		WHERE $field = $image_id");

                foreach ($query->getResult() as $row) :
                    if (!empty($row->image)) {
                        return '<img class="rounded-image" src="' . base_url() . '/' . $row->image_url . '" />';
                    }
                endforeach;
            }
        }

        return '<img class="rounded-image" src="https://via.placeholder.com/100/808080/ffffff?text=Not+found">';
    }
}
