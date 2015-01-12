<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Option_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getOption($data) {
        $this->db->select('*');
        $this->db->from('options');
        foreach ($data as $key => $val) {
            $this->db->where($key, $val);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    function listOptions($data = array(), $dataIn = array(), $fields = 'options.* ', $limit = null, $offset = null, $order = 'options.order', $sort = 'ASC') {
        $this->db->select($fields);
        $this->db->from('options');
        if (!empty($data)) {
            if (is_array($data)) {
                foreach ($data as $key => $val) {
                    $this->db->where($key, $val);
                }
            } else {
                $this->db->where($data);
            }
        }
        if (!empty($dataIn)) {
            foreach ($dataIn as $key => $list) {
                $this->db->where_in($key, $list);
            }
        }
        if ($limit && $offset)
            $this->db->limit($limit, $offset);
        elseif ($limit)
            $this->db->limit($limit);
        $this->db->order_by($order, $sort);
        $query = $this->db->get();
        $lists = $query->result_array();
        return $lists;
    }

    function update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('options', $data);
    }

    function insert($data) {
        $this->db->insert('options', $data);
        return $this->db->insert_id();
    }

    public function getOptionById($id, $fields = '*') {
        $this->db->select($fields);
        $this->db->from('options');
        $this->db->where('id', $id);

        $query = $this->db->get();
        $product = $query->row_array();
        return $product;
    }

    function delete($data) {
        return $this->db->delete('options', $data);
    }
    function deleteOptionValue($data) {
        return $this->db->delete('girl_option_value', $data);
    }

}

?>
