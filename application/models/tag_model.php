<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Tag_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getTag($data) {
        $this->db->select('*');
        $this->db->from('tags');
        foreach ($data as $key => $val) {
            $this->db->where($key, $val);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    function listTags($data = array(), $dataIn = array(), $fields = 'tags.*', $limit = null, $offset = null, $order = 'id', $sort = 'DESC') {
        $this->db->select($fields);
        $this->db->from('tags');
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

    function listGirlTags($data = array(), $dataIn = array(), $fields = 'tags.*', $limit = null, $offset = null, $order = 'id', $sort = 'DESC') {
        $this->db->select($fields);
        $this->db->from('tags');
        $this->db->join('girl_tags', 'tags.id = girl_tags.tag_id');
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
        $this->db->update('tags', $data);
    }

    function insert($data) {
        $this->db->insert('tags', $data);
        return $this->db->insert_id();
    }

    public function getTagById($id, $fields = '*') {
        $this->db->select($fields);
        $this->db->from('tags');
        $this->db->where('id', $id);

        $query = $this->db->get();
        $product = $query->row_array();
        return $product;
    }

    function delete($data) {
        return $this->db->delete('tags', $data);
    }
    function deleteUserTags($data) {
        return $this->db->delete('girl_tags', $data);
    }
    function insertUserTags($data) {
        $this->db->insert('girl_tags', $data);
        return $this->db->insert_id();
    }

}

?>
