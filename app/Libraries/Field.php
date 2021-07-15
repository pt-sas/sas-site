<?php

namespace App\Libraries;

/**
 * Class to represent Field Name and Retrieve data from database based on column
 *
 * @author Oki Permana
 */
class Field
{
    protected $db;
    protected $validation;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->validation = \Config\Services::validation();
    }

    // Retrieve field and data from database
    public function store($table, $data, $query = null)
    {
        $result = [];

        if ($this->db->fieldExists('name', $table)) {
            $result[] = [
                'field' => 'title',
                'label' => $data[0]->name
            ];
        } else if ($this->db->fieldExists('title', $table)) {
            $result[] = [
                'field' => 'title',
                'label' => $data[0]->title
            ];
        } else if ($this->db->fieldExists('value', $table)) {
            $result[] = [
                'field' => 'title',
                'label' => $data[0]->value
            ];
        } else {
            $result[] = [
                'field' => 'title',
                'label' => 'Title not found'
            ];
        }

        /**
         * Check generating data using query or modeling data
         * #empty query using modeling data
         */
        if (empty($query)) {
            $fields = $this->db->getFieldNames($table);
            foreach ($fields as $field) :
                foreach ($data as $row) :
                    $result[] = [
                        'field' =>  $field,
                        'label' =>  $row->$field
                    ];
                endforeach;
            endforeach;
        } else {
            $fields = $query->getFieldNames();
            foreach ($fields as $field) :
                foreach ($data as $row) :
                    $result[] = [
                        'field' =>  $field,
                        'label' =>  $row->$field
                    ];
                endforeach;
            endforeach;
        }

        return $result;
    }

    // Get error validation field
    function errorValidation($table)
    {
        $fields = $this->db->getFieldNames($table);
        $result = [];

        $result[] = [
            'error' => true,
            'field' => $table
        ];

        foreach ($fields as $field) :
            $result[] = [
                'error' => 'error_' . $field,
                'field' => $field,
                'label' => $this->validation->getError($field)
            ];
        endforeach;

        return $result;
    }
}
