<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class All_crud extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    function get_table($table, $fields=null){
        if(@$fields){
            $this->db->select($fields);
        }
        return $this->db->get($table);
    }
    
    function get_by_id($table, $field, $id, $select=null){
        if(@$select){
            $this->db->select($select);
        }
        $this->db->where($field, $id);
        return $this->db->get($table);
    }
    
    function get_by_params($table, $params, $select=null){
        if(@$select){
            $this->db->select($select);
        }
        $this->db->where($params);
        return $this->db->get($table);
    }
    
    function insert($table, $data){
        $this->db->insert($table, $data);
    }
    
    function update_by_id($table, $field, $id, $data){
        $this->db->where($field, $id)->update($table, $data);
    }
    
    function update_by_params($table, $params, $data){
        $this->db->where($params)->update($table, $data);
    }
    
    function delete_by_id($table, $field, $id){
        $this->db->where($field, $id)->delete($table);
    }
    
    function delete_by_params($table, $params){
        $this->db->where($params)->delete($table);
    }
    
    /*function insert_response($table, $data){
        $process = $this->db->insert($table, $data);
        if($process){
            return true;
        } else{
            return false;
        }
    }*/
    
}