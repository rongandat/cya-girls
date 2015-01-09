<?php

/*
  This model provcountry_ides all interfaces for country management
 */

class Country_model extends CI_Model {
    
    

    public function getCountryById($country_id) {
        $this->db->select("*");
        $this->db->from("country");
        $this->db->where("country_id", $country_id);
        $result = $this->db->get()->result();
        return !empty($result[0]) ? $result[0] : array();
    }

    public function getCountries($data = array(), $limit = null, $start = null, $sort = array()) {
        $this->db->select("*");
        $this->db->from("country");
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                if ($key == 'search') {
                    $where = "( name LIKE '%" . $value . "%')";
                    $this->db->where($where);
                }
                else
                    $this->db->where($key, $value);
            }
        }
        if ($limit)
            $this->db->limit($limit, $start);

        if (!empty($sort)) {
            foreach ($sort as $key => $value) {
                $this->db->order_by($key, $value);
            }
        }
        $query = $this->db->get();

        return $query->result();
    }
    
    public function totalCountries($data = array()) {
        $this->db->select("*");
        $this->db->from("country");
        
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                if ($key == 'search') {
                    $where = "( name LIKE '%" . $value . "%')";
                    $this->db->where($where);
                }
                else
                    $this->db->where($key, $value);
            }
        }
        $query = $this->db->get();
        
        return $query->num_rows();
        
    }

    public function insert($data) {
        $this->db->insert('country', $data);
        return $this->db->insert_country_id();
    }

    public function update($country_id, $data) {
        $this->db->where('country_id', $country_id);
        $this->db->update('country', $data);
    }
    public function delete($country_id) {
        $this->db->delete('country', array('country_id' => $country_id)); 
    }
    


}