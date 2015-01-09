<?php

/*
  This model provides all interfaces for user management
 */

class Zone_model extends CI_Model {

    protected $lang_id;

    public function __construct() {
        parent::__construct();
        $this->lang_id = get_language_id();
    }

    public function getZoneByCountry($country_id, $data = array()) {
        $this->db->select("*");
        $this->db->from("zone");
        $this->db->where("country_id", $country_id);
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        $query = $this->db->get();

        return $query->result();
    }
    public function getZoneById($zone_id) {
        $this->db->select("*");
        $this->db->from("zone");
        $this->db->where("zone_id", $zone_id);
        $result = $this->db->get()->result();
        return !empty($result[0]) ? $result[0] : array();
    }
    
    public function totalZones($data = array()){
        $this->db->select("*");
        $this->db->from("zone");
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                if ($key == 'search') {
                    $where = "( name LIKE '%" . $value . "%' OR code LIKE '%" . $value . "%')";
                    $this->db->where($where);
                }
                else
                    $this->db->where($key, $value);
            }
        }
        $query = $this->db->get();
        
        return $query->num_rows();
    }


    public function getZones($data = array(), $limit = null, $start = null, $sort = array()){
        $this->db->select("*");
        $this->db->from("zone");
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
    
    public function insert($data) {
        $this->db->insert('zone', $data);
        return $this->db->insert_id();
    }

    public function update($zone_id, $data) {
        $this->db->where('zone_id', $zone_id);
        $this->db->update('zone', $data);
    }
    public function delete($zone_id) {
        $this->db->delete('zone', array('zone_id' => $zone_id)); 
    }

}