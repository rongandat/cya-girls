<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Location_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getLocation($data) {
        $this->db->select('*');
        $this->db->from('location');
        foreach ($data as $key => $val) {
            $this->db->where($key, $val);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    function listLocations($data = array(), $dataIn = array(), $fields = 'location.*', $limit = null, $offset = null, $order = 'order', $sort = 'ASC') {
        $this->db->select($fields);
        $this->db->from('location');
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
    
    function listLocationsByGirl($data = array(), $dataIn = array(), $fields = 'location.*', $limit = null, $offset = null, $order = 'location.order', $sort = 'ASC') {
        $this->db->select($fields);
        $this->db->from('location');
        $this->db->join('girl_location','location.id = girl_location.location_id');
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
    
    function listGirlLocations($data = array(), $dataIn = array(), $fields = '*', $limit = null, $offset = null, $order = 'id', $sort = 'DESC') {
        $this->db->select($fields);
        $this->db->from('girl_location');
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
        $this->db->update('location', $data);
    }

    function insert($data) {
        $this->db->insert('location', $data);
        return $this->db->insert_id();
    }
    function insertGirlLocation($data) {
        $this->db->insert('girl_location', $data);
        return $this->db->insert_id();
    }

    public function getLocationById($id, $fields = '*') {
        $this->db->select($fields);
        $this->db->from('location');
        $this->db->where('id', $id);

        $query = $this->db->get();
        $product = $query->row_array();
        return $product;
    }

    function delete($data) {
        return $this->db->delete('location', $data);
    }
    function deleteGirlLocations($data) {
        return $this->db->delete('girl_location', $data);
    }

}

?>
