<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Image_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getImage($data) {
        $this->db->select('*');
        $this->db->from('images');
        foreach ($data as $key => $val) {
            $this->db->where($key, $val);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    function listImages($data = array(), $dataIn = array(), $fields = 'images.*', $limit = null, $offset = null, $order = 'id', $sort = 'DESC') {
        $this->db->select($fields);
        $this->db->from('images');
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

    function update($data, $dataWhere) {
        foreach ($dataWhere as $key => $where){
            $this->db->where($key, $where);
        }
        $this->db->update('images', $data);
    }

    function insert($data) {
        $this->db->insert('images', $data);
        return $this->db->insert_id();
    }

    public function getImageById($id, $fields = '*') {
        $this->db->select($fields);
        $this->db->from('images');
        $this->db->where('id', $id);

        $query = $this->db->get();
        $product = $query->row_array();
        return $product;
    }

    function delete($data) {
        return $this->db->delete('images', $data);
    }

}

?>
