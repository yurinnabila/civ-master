<?php
 
class M_login extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    function get_role($params=null){
        $this->db->select('b.nama as role');
        $this->db->where($params);
        $this->db->from('user_role a');
        $this->db->join('ref_role b', 'a.id_role=b.id', 'INNER');
        return $this->db->get();
    }
    
}