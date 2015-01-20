<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Information_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getInformation($data) {
        $this->db->select('*');
        $this->db->from('information');
        foreach ($data as $key => $val) {
            $this->db->where($key, $val);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    function listInformations($data = array(), $dataIn = array(), $fields = 'information.*', $limit = null, $offset = null, $order = 'order', $sort = 'ASC') {
        $this->db->select($fields);
        $this->db->from('information');
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
        $this->db->update('information', $data);
    }

    function insert($data) {
        $this->db->insert('information', $data);
        return $this->db->insert_id();
    }

    function delete($data) {
        return $this->db->delete('information', $data);
    }
    function deleteGirlInformations($data) {
        return $this->db->delete('girl_information', $data);
    }

}

?>
