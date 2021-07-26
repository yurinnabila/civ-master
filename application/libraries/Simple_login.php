<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Simple_login {
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	} 
	public function login($data) {
        $db_name = $this->CI->db->database;
        $users = 'users a';

        $get_login = $this->CI->db->select('a.*,b.nama nama_role')->where(['a.username' => $data['username'],'a.password' => sha1($data['password']),'a.is_active' => '1'])->join('ref_role b','a.id_role = b.id','LEFT')->get($users);
		// $get_login = $this->CI->db->get_where($users, array('username'=>$data['username'],'password' => sha1($data['password']), 'is_active' => '1')); 

		if($get_login->num_rows() == 1) {

			$row_user = $get_login->row_array();

			$this->CI->session->set_userdata('login_id', uniqid(rand()));
			$this->CI->session->set_userdata('id', $row_user['id']); 
			$this->CI->session->set_userdata('nama', $row_user['username']);
			$this->CI->session->set_userdata('username', $row_user['username']);
			$this->CI->session->set_userdata('nama_role', $row_user['nama_role']);
			$this->CI->session->set_userdata('tahun', date('Y'));
			$this->CI->session->set_userdata('bulan', date('m'));  
  
			if ($row_user['nama_role'] == "Administrator") {
				redirect(base_url('backend/admin/dashboard/index'));
			} else if ($row_user['nama_role'] == "Verifikator") {
				redirect(base_url('backend/verifikator/dashboard/index')); 
			} else if ($row_user['nama_role'] == "Penduduk") {
				redirect(base_url('backend/penduduk/dashboard/index'));
			}  
		}else{
			$this->CI->session->set_flashdata('failed','Username atau Password Salah');
			redirect(base_url('login'));
		}
		return false;
	}

	public function login_lock($data) {
        $db_name = $this->CI->db->database;
        $users = 'users a';

        $get_login = $this->CI->db->select('a.*,b.nama nama_role')->where(['a.username' => $data['username'],'a.password' => sha1($data['password']),'a.is_active' => '1'])->join('ref_role b','a.id_role = b.id','LEFT')->get($users);
		// $get_login = $this->CI->db->get_where($users, array('username'=>$data['username'],'password' => sha1($data['password']), 'is_active' => '1'));

		if($get_login->num_rows() == 1) {

			$row_user = $get_login->row_array();

			$this->CI->session->set_userdata('login_id', uniqid(rand()));
			$this->CI->session->set_userdata('id', $row_user['id']); 
			$this->CI->session->set_userdata('nama', $row_user['username']);
			$this->CI->session->set_userdata('username', $row_user['username']);
			$this->CI->session->set_userdata('nama_role', $row_user['nama_role']);
			$this->CI->session->set_userdata('tahun', date('Y'));
			$this->CI->session->set_userdata('bulan', date('m'));

			// untuk lock screen
			if (@$data['previous_page']) {
				redirect($data['previous_page'],'refresh');
			}
			// 
		}else{
			$this->CI->session->set_flashdata('failed','Password salah');
			redirect(base_url('login/session_timeout?page='.$data['previous_page']));
		}
		return false;
	}

	public function cek_login() {
		if($this->CI->session->userdata('username') == '') {
			$this->CI->session->set_flashdata('msg','Anda Belum Login');
			redirect(base_url('login'));
		}
	}

	public function logout() {
		$this->CI->session->unset_userdata('user_id');
		$this->CI->session->unset_userdata('id');
		$this->CI->session->unset_userdata('foto');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('login_id', $username);
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('id_role');
		$this->CI->session->unset_userdata('id_ref_bidang');
		$this->CI->session->sess_destroy();
		$this->CI->session->set_flashdata('msg','Anda Berhasil Logout');
		redirect(base_url('login'));
	}

	private function hash_pass($string){
        return hash('sha256', $string);
    }

}
