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

    /**
     * Retrieve field and data from database
     *
     * $table
     * $data result from database
     * $query type join table or not
     */
    public function store($table, $data, $query = null)
    {
        $result = [];
        $fields;

        if ($this->db->fieldExists('code', $table)) {
            $result[] = [
                'field' => 'title',
                'label' => $data[0]->code
            ];
        } else if ($this->db->fieldExists('name', $table)) {
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
        } else if (is_object($query)) {
            $fields = $query->getFieldNames();
            foreach ($fields as $field) :
                foreach ($data as $row) :
                    $result[] = [
                        'field' =>  $field,
                        'label' =>  $row->$field
                    ];
                endforeach;
            endforeach;
        } else if (is_string($query)) {
            $result = $data;
        }

        return $result;
    }

    /**
     * Get error validation field
     *
     * $table untuk mendapatkan nama table
     * $query jenis data
     * $field_post mendapatkan field dari method post
     * @return $result
     */
    function errorValidation($table, $query = null, $field_post = null)
    {
        $allError = $this->validation->getErrors();

        $result = [];
        $arrField = [];
        $fields;

        $result[] = [
            'error' => true,
            'field' => $table
        ];

        // Populate array field from object all error
        foreach ($allError as $field => $msg) :
            if (strpos($field, '.*'))
                $arrField[] = str_replace('.*', '', $field);
        endforeach;

        if (!isset($field_post)) {
            if (empty($query)) {
                $fields = $this->db->getFieldNames($table);
            } else {
                $fields = $query->getFieldNames();
            }

            foreach ($fields as $field) :
                // Validation field dot array
                if (in_array($field, $arrField)) {
                    $result[] = [
                        'error' => 'error_' . $field,
                        'field' => $field,
                        'label' => $this->validation->getError($field . '.*')
                    ];
                } else {
                    $result[] = [
                        'error' => 'error_' . $field,
                        'field' => $field,
                        'label' => $this->validation->getError($field)
                    ];
                }
            endforeach;
        } else {
            foreach ($field_post as $key => $field) :
                // Validation field dot array
                if (in_array($field, $arrField)) {
                    $result[] = [
                        'error' => 'error_' . $key,
                        'field' => $key,
                        'label' => $this->validation->getError($key . '.*')
                    ];
                } else {
                    $result[] = [
                        'error' => 'error_' . $key,
                        'field' => $key,
                        'label' => $this->validation->getError($key)
                    ];
                }
            endforeach;
        }

        return $result;
    }
}
