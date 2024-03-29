<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Girls_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getGirl($data) {
        $imageDefaultSql = '(select image from images where girl_id = girl.id and `default` = 1 limit 1) as image';
        $this->db->select('*,' . $imageDefaultSql);
        $this->db->from('girl');
        foreach ($data as $key => $val) {
            $this->db->where($key, $val);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    function update($data, $id) {
        $this->db->set('date_modified', 'NOW()', FALSE);
        $this->db->where('id', $id);
        $this->db->update('girl', $data);
    }

    public function updateView($id) {
        $this->db->set('views', 'views + 1', FALSE);
        $this->db->where('id', $id);
        $this->db->update('girl', array());
    }

    function insert($data) {
        $this->db->set('date_added', 'NOW()', FALSE);
        $this->db->insert('girl', $data);
        return $this->db->insert_id();
    }

    public function getGirlById($id, $fields = '*') {
        $this->db->select($fields);
        $this->db->from('girl');
        $this->db->where('id', $id);

        $query = $this->db->get();
        $girl = $query->row_array();
        return $girl;
    }

    function delete($data) {
        return $this->db->delete('girl', $data);
    }

    function listGirls($data = array(), $dataIn = array(), $id = 0, $fields = '*', $limit = null, $offset = null, $order = 'id', $sort = 'DESC') {
        $imageDefaultSql = '(select image from images where girl_id = girl.id and `default` = 1 limit 1) as image';
        $this->db->select($fields . ', ' . $imageDefaultSql);
        $this->db->from('girl');
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
        if (!empty($order))
            $this->db->order_by($order, $sort);
        $query = $this->db->get();
        $lists = $query->result_array();
        return $lists;
    }

    function listGirlTotal($data = array(), $dataIn = array()) {
        $this->db->select('count(DISTINCT `girl`.id) as total', FALSE);
        $this->db->from('girl');
        if (!empty($data)) {
            $this->db->where($data);
        }
        if (!empty($dataIn)) {
            foreach ($dataIn as $key => $list) {
                $this->db->where_in($key, $list);
            }
        }
        $query = $this->db->get();
        $total = $query->row_array();
        return $total['total'];
    }

    function listGirlsByLocation($data = array(), $dataIn = array(), $id = 0, $fields = 'girl.*', $limit = 10, $offset = null, $order = 'girl.id', $sort = 'DESC') {
        $imageDefaultSql = '(select image from images where girl_id = girl.id and `default` = 1 limit 1) as image';
        $this->db->select('DISTINCT `girl`.id,' . $fields . ', ' . $imageDefaultSql, FALSE);
        $this->db->from('girl');
        $this->db->join('girl_location', 'girl.id = girl_location.girl_id');

        if (!empty($data)) {
            $this->db->where($data);
        }
        if (!empty($dataIn)) {
            foreach ($dataIn as $key => $list) {
                $this->db->where_in($key, $list);
            }
        }


        if ($limit && $offset) {
            $this->db->limit($limit, $offset);
        } elseif ($limit) {
            $this->db->limit($limit);
        }
        if (!empty($order))
            $this->db->order_by($order, $sort);
        $query = $this->db->get();
        $lists = $query->result_array();
        return $lists;
    }

    function listTotalGirlsByLocation($data = array(), $dataIn = array()) {
        $this->db->select('count(DISTINCT `girl`.id) as total', FALSE);
        $this->db->from('girl');
        $this->db->join('girl_location', 'girl.id = girl_location.girl_id');

        if (!empty($data)) {
            $this->db->where($data);
        }
        if (!empty($dataIn)) {
            foreach ($dataIn as $key => $list) {
                $this->db->where_in($key, $list);
            }
        }
        $query = $this->db->get();
        $total = $query->row_array();
        return $total['total'];
    }

    function listGirlsByTag($data = array(), $dataIn = array(), $id = 0, $fields = 'girl.*', $limit = 10, $offset = null, $order = 'girl.id', $sort = 'DESC') {
        $imageDefaultSql = '(select image from images where girl_id = girl.id and `default` = 1 limit 1) as image';
        $this->db->select('DISTINCT `girl`.id,' . $fields . ', ' . $imageDefaultSql, FALSE);
        $this->db->from('girl');
        $this->db->join('girl_tags', 'girl.id = girl_tags.girl_id');

        if (!empty($data)) {
            $this->db->where($data);
        }
        if (!empty($dataIn)) {
            foreach ($dataIn as $key => $list) {
                $this->db->where_in($key, $list);
            }
        }


        if ($limit && $offset) {
            $this->db->limit($limit, $offset);
        } elseif ($limit) {
            $this->db->limit($limit);
        }
        if (!empty($order))
            $this->db->order_by($order, $sort);
        $query = $this->db->get();
        $lists = $query->result_array();
        return $lists;
    }

    function listTotalGirlsByTag($data = array(), $dataIn = array()) {
        $this->db->select('count(DISTINCT `girl`.id) as total', FALSE);
        $this->db->from('girl');
        $this->db->join('girl_tags', 'girl.id = girl_tags.girl_id');

        if (!empty($data)) {
            $this->db->where($data);
        }
        if (!empty($dataIn)) {
            foreach ($dataIn as $key => $list) {
                $this->db->where_in($key, $list);
            }
        }
        $query = $this->db->get();
        $total = $query->row_array();
        return $total['total'];
    }

}

?>
