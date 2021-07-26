<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->router->fetch_class()!="login") {
			if (!$this->session->userdata('login_id')) {
				redirect(base_url('login/logout')); 
			}
		}

		$this->id = @$this->session->userdata('id'); 
        $this->nama = @$this->session->userdata('nama');
        $this->nama_role = @$this->session->userdata('nama_role');
        $this->tahun = date('Y');
	}

	//callback
	public function _dropdown_check($str) {
		if ($str == 'pilih') {
			$this->form_validation->set_message('_dropdown_check', '{field} harus dipilih !'); return false;
		}
		else {
			return true;
		}
	}

    //input_post
	protected function array_from_post($fields) {
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = ($this->input->post($field, TRUE) == "") ? null : $this->input->post($field, TRUE);
        }
        return $data;
    }

    //form_validation
	protected function array_to_validation($fields) {
        foreach ($fields as $field) {
        	$this->form_validation->set_rules($field, ucwords($field), 'required', array('required' => '%s harus diisi.'));
        }
        return $this->form_validation->run();
    }

    //encryption
    protected function hash($string){
        return hash('sha512', $string . config_item('encryption_key'));
    }

}
