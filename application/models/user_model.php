<?php

/*
  This model provides all interfaces for user management
 */

class User_model extends CI_Model {

    public function getUserById($id) {
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("id", $id);
        return $this->db->get()->row_array();
    }

    public function getUsers($data = array(), $limit = null, $start = null, $sort = array()) {
        $this->db->select("*");
        $this->db->from("user");
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                if ($key == 'search') {
                    $where = "( firstname LIKE '%" . $value . "%' OR lastname LIKE '%" . $value . "%' OR email LIKE '%" . $value . "%' )";
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

        return $query->result_array();
    }
    
    public function totalUsers($data = array()) {
        $this->db->select("*");
        $this->db->from("user");
        
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                if ($key == 'search') {
                    $where = "( firstname LIKE '%" . $value . "%' OR lastname LIKE '%" . $value . "%' OR email LIKE '%" . $value . "%' )";
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
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
    


    public function getUserByUsernameAndPassword($username, $password) {
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("username", $username);
        $this->db->where("password", md5($password));
        $result = $this->db->get()->result();
        return !empty($result[0]) ? $result[0] : array();
    }

    public function delete($id) {
        $this->db->delete('user', array('id' => $id)); 
    }

}