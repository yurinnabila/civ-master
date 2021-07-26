<?php

class M_user extends CI_Model {
    var $table = 'users a'; //nama tabel dari database
    var $column_order = array(null, 'id', 'username'); //field yang ada di table user
    var $column_search = array('id', 'username'); //field yang diizin untuk pencarian
    var $order = array('id' => 'desc'); // default order

    public function __construct() {
        parent::__construct();
    }

    private function _get_datatables_query() {

    	$this->db->join('ref_role b', 'b.id = a.id_role');
        $this->db->select('b.nama, a.*'); 
        $this->db->where(['a.deleted_at' => null]);
        $this->db->from($this->table); 


        $i = 0;

        foreach ($this->column_search as $item) { // looping awal
            if($_GET['search']['value']) { // jika datatable mengirimkan pencarian dengan metode POST

                if($i===0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_GET['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_GET['search']['value']);
                }

                if(count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if(isset($_GET['order']))
        {
            $this->db->order_by($this->column_order[$_GET['order']['0']['column']], $_GET['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables() {
        $this->_get_datatables_query();
        if($_GET['length'] != -1)
        $this->db->limit($_GET['length'], $_GET['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->where(['a.deleted_at' => null]);

        $this->_get_datatables_query();
        return $this->db->count_all_results();
    } 

    function get_where_id($id=null) {
        return $this->db->where('id', $id)->get($this->table)->row();
    }


} 