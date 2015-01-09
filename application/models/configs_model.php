<?php

/*
  This model provides all interfaces for user management
 */

class Configs_model extends CI_Model {


    public function getConfig($code) {
        $this->db->select("*");
        $this->db->from("config");
        $this->db->where('key', $code);

        $query = $this->db->get();
        $result = $query->result();
        return (array) $result[0];
    }

    public function getConfigs() {
        $this->db->select("*");
        $this->db->from("config");

        $query = $this->db->get();
        $results = $query->result();
        $data = array();
        if ($results)
            foreach ($results as $result) {
                if (!$result->serialized) {
                    $data[$result->key] = $result->value;
                } else {
                    $data[$result->key] = unserialize($result->value);
                }
            }

        return $data;
    }

    public function editConfigs($data) {
        $this->db->empty_table('config');
        foreach ($data as $key => $value) {
            $dataConfig['key'] = $key;
            if (!is_array($value)) {
                $dataConfig['value'] = $value;
            } else {
                $dataConfig['value'] = serialize($value);
                $dataConfig['serialized'] = 1;
            }

            $this->db->insert('config', $dataConfig);
        }
    }

}