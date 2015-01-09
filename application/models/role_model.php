<?php

/*
  This model provides all interfaces for user management
 */

class Role_model extends CI_Model {

    protected $lang_id;

    public function __construct() {
        parent::__construct();
    }
    
    public function getRoles(){
        $this->db->select("*");
        $this->db->from("role");
        return $this->db->get()->result_array();
        
    }

    public function getUserRole($id) {
        $this->db->select("*");
        $this->db->from("role");

        $this->db->where("id", $id);
        $result = $this->db->get()->row_array();
        $roles = array(
            'name' => $result['name'],
            'permission' => unserialize($result['permission'])
        );

        return $roles;
    }

    public function insert($data) {
        $this->db->insert('role', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('role', $data);
    }

    public function delete($id) {
        $this->db->delete('role', array('id' => $id)); 
    }
}