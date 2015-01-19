<?php

/*
 * To change this template, choose Tools | s
 * and open the template in the editor.
 */

class Email_templates_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getTemplate($data) {
        $this->db->select('*');
        $this->db->from('email_templates');
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                $this->db->where($key, $val);
            }
        } else {
            $this->db->where($data);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    function update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('email_templates', $data);
    }

    function insert($data) {
        $this->db->insert('email_templates', $data);
        return $this->db->insert_id();
    }

    public function getTemplateById($id, $fields = '*') {
        $this->db->select($fields);
        $this->db->from('email_templates');
        $this->db->where('id', $id);

        $query = $this->db->get();
        $user = $query->row_array();
        return $user;
    }

    function delete($data) {
        $this->db->delete('email_templates', $data);
    }

    function listTemplates($data = array(), $dataIn = array(), $fields = '*', $limit = null, $offset = null, $order = 'id', $sort = 'DESC') {
        $this->db->select($fields);
        $this->db->from('email_templates');
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

    function totalTemplates($data = array(), $dataIn = array()) {
        $this->db->select('count(id) as total');
        $this->db->from('email_templates');
        if (!empty($data)) {
            $this->db->where($data);
        }
        if (!empty($dataIn)) {
            foreach ($dataIn as $list) {
                $this->db->where_in($list);
            }
        }
        $query = $this->db->get();
        $lists = $query->row_array();
        return $lists['total'];
    }

}

?>
