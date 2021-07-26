<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends MY_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->id){
            redirect('login/logout');
        } 
        $this->load->model('backend/admin/M_user', 'm_main');
        $this->load->model(['All_crud']);
    }

    function index() {  
        $data = [ 
            'page_title'        =>'Manajemen User',
            'detail_page_title' => 
            '
            List Data
            ',
            'li_active'         =>'user',
            'uri_segment'       =>'backend/admin/user/',
            'content'           =>'backend/admin/user/home',
            'script'            =>'backend/admin/user/home-js',
            'datatables_js'     =>TRUE,
            'datatables_css'    =>TRUE,
            'toastr'            => TRUE,
            'sweet_alert'       => TRUE,
            'select2'           => TRUE,
            'btn_kembali'       => '<a href="'.@$_SERVER['HTTP_REFERER'].'" class="btn btn-sm btn-rounded btn-outline-danger"> <i class="si si-arrow-left"></i> Kembali</a>',
            'btn_tambah'        => '<button type="button" href="javascript:;" class="btn btn-sm btn-rounded btn-outline-primary" id="tombol_tambah"> <i class="si si-plus"></i> Tambah</button>',
            'role'              => $this->db->where('deleted_at',null)->select('id,nama')->get('ref_role')->result(),
            'modal'             => array(
                'backend/admin/user/modal-tambah', 
                'backend/admin/user/modal-ubah',
            )
        ];

        $this->load->view('_templates/main', $data);
    }

    function get_data(){
        $list = $this->m_main->get_datatables(); 
        $data = array();
        $no = $_GET['start'];
        foreach($list as $field){
            // $struktur = '';
            $hapus = ''; 
            $ubah = ''; 
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->username;
            $row[] = ucfirst($field->nama);
            $ubah = '<button href="#" class="btn btn-sm btn-rounded btn-outline-primary tombol_ubah" data="'.strToHex($field->id).'"> <i class="fa fa-pencil"></i> Edit</button> '; 
            $hapus = '<button href="#" class="btn btn-sm btn-rounded btn-outline-danger tombol_hapus" data="'.strToHex($field->id).'"> <i class="fa fa-trash"></i> Hapus</button>';
            $row[] = $ubah.$hapus;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_GET['draw'],
            "recordsTotal" => $this->m_main->count_all(),
            "recordsFiltered" => $this->m_main->count_filtered(),
            "data" => $data,
            "csrf" => generate_csrf(),
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function store() {
        $input = $this->input->post(null,true);
        $id = $input['id'];
        $status = ""; $json = array(); $data = array();

        $this->form_validation->set_rules('username', 'Username ', 'required');
        if($id==null){
            $this->form_validation->set_rules('password', 'Password ', 'required');
            $this->form_validation->set_rules('confirm_password', 'confirm_password ', 'required|matches[password]');
        } 

        if ($this->form_validation->run() == FALSE) {
        	$json = array(
                'status'             => false,
                'message'            => 'inputan tidak boleh kosong',
                'csrf'               => generate_csrf()
            );
            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($json)); 
        } else{

            if($id==null){

                $data = [ 
                    'username'   => $input['username'],
                    'password'   => $input['password'],
                    'id_role'    => $input['id_role'],
                    'is_active'  => '1',
                    'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $this->session->userdata('id'),
                ]; 
                $this->db->insert('users', $data);
            } else {
                $data = [ 
                    'username'   => $input['username'],
                    'password'   => $input['password'],
                    'id_role'    => $input['id_role'],
                    'is_active'  => '1',
                    'updated_at' => date("Y-m-d H:i:s"),
                    'updated_by' => $this->session->userdata('id'),
                ]; 
                $this->db->where('id',$id);
                $this->db->update('users', $data);
            }

            echo json_encode(array('status' => true,'data' => $data,'csrf' => generate_csrf()));
        }
    }


    function detail()
    { 
        $id                = hexToStr($this->input->post('id'));
        $data              = $this->db->select('id, username,id_role')->where(['deleted_at is NULL','id' => $id])->get('users')->row();

        $return = ""; $status = false;
        if (@$data) { 
            $status = true;
            $return = $data;
        }
        echo json_encode(array('status' => $status,'data' => $return,'csrf' => generate_csrf()));
    } 

    function delete($id) { 
        $id = hexToStr($id); 
        $this->All_crud->update_by_id(
            'users',
            'id',
            $id,
            [
                'is_active' => '0',
                'deleted_at' => date("Y-m-d H:i:s"),
                'deleted_by' => $this->session->userdata('id'),

            ]

        ); 
        if($this->db->affected_rows()>0){
           $status = true;            
       } else {
        $status = false; 
    }
    echo json_encode(array('status' => $status,"csrf" => generate_csrf())); 
}



}