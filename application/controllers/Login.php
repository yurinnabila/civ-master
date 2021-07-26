<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    var $user_id = '';
    var $role    = '';

    public function __construct(){
        parent::__construct();
        $this->load->model('M_login');
        $this->load->helper(array('Cookie', 'String'));
        $this->load->library('simple_login');

    }

	public function index($teks=null){
        $data = [
            'csrf'=>[
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            ]
        ];

        if (!$this->id || !$this->nama_role) {
            $this->load->view('login', $data);
        } elseif ($this->nama_role == "Adminsitrator") {
            redirect(base_url('backend/admin/dashboard/index'));
        } elseif ($this->nama_role == "Verifikator") {
            redirect(base_url('backend/varifikator/dashboard/index'));
        } elseif ($this->nama_role == "Penduduk") {
            redirect(base_url('backend/penduduk/dashboard/index'));
        } else {
            $this->load->view('login', $data);
        } 

        // if (!$this->user_id || !$this->role)
        //     $this->load->view('login', $data);
        // else
        //     redirect(base_url('welcome'));
	}

    public function processing() {
        $field = array('username', 'password');
        $valid = $this->array_to_validation($field);
        $data = $this->array_from_post($field);
        if($valid == TRUE) {
            return $this->simple_login->login($data);
        } 
        $csrf = [
            'csrf'=>[ 
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            ]
        ];
        $this->session->set_flashdata('failed','Username atau Password Belum Diisi');
        $this->load->view('login', $csrf);
    }

    public function processing_lock() {
        if (empty($this->session->userdata('username'))) {
            redirect('login','refresh');
        }
        
        $field = array('username', 'password','previous_page');
        $valid = $this->array_to_validation($field);
        $data = $this->array_from_post($field);
        if($valid == TRUE) {
            return $this->simple_login->login_lock($data);
        }
        $csrf = [
            'csrf'=>[
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            ]
        ];
        $this->session->set_flashdata('failed','Password salah');
        $this->load->view('lock_screen', $csrf);
    }

    function _daftarkan_session($row) {
        $sess = array(
            'id'    => $row->id,
            'tahun' => date('Y'),
            'login' => TRUE
        );
        $this->session->set_userdata($sess);
    }


    function encrypt_decrypt($action, $string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";

        $secret_key = 'fajaSsd1fjDwASjA12SAGSHga3yus'.date('Ymd');
        $secret_iv = 'ASsadkmjku4jLOIh2jfGda5'.date('Ymd');
        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if( $action == 'decrypt' ) {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);

            $pisah 				= explode('|',$output);
            $datetime_request 	= $pisah[3];
            $datetime_expired 	= date('Y-m-d H:i:s',strtotime('+10 seconds',strtotime($datetime_request)));

            $datetime_now		= date('Y-m-d H:i:s');
            if($datetime_now > $datetime_expired || !$datetime_request)
            {
                $output = false;
            }

            /* Testing
            echo "datetime now".$datetime_now."<br>";
            echo "datetime expired".$datetime_expired."<br>";
            var_dump($output);
            */
        }
        return $output;
    }

   

    public function logout($teks=null) {
        delete_cookie('civilarch');
        // $this->All_crud->update_by_id('users', 'id', $this->session->userdata('id'), ['cookie_token'=>NULL, 'logged_in'=>'0']);
		$this->session->sess_destroy();
        if(@$teks){
            redirect('login/index/'.$teks);
        } else{
            redirect('login');
        }
    }

    private function set_session_timeout()
    {
        $sesdata = [
            'login_id' => FALSE,
            'user_id' => null,
            'id' => null,
            'nama' => null, 
            'nama_role' => null,
            'tahun' => null,
            'bulan' => null,
        ];  
        $this->session->set_userdata($sesdata); 
    }

    public function session_timeout()
    {
        self::set_session_timeout();
        if (empty($this->session->userdata('username'))) {
            redirect('login','refresh');
        } else {
            $data = [
                'username' => $this->session->userdata('username'),
                'nama_lengkap' => $this->session->userdata('nama_lengkap'),
                'csrf' => [
                    'name' => $this->security->get_csrf_token_name(),
                    'hash' => $this->security->get_csrf_hash()
                ]
            ];
            $this->load->view('lock_screen', $data, FALSE);  
        }
        
    }

    public function continue_session()
    {       
        $username = $this->session->userdata('username');
        $pass_attempt = @$this->session->userdata('pass_attempt') ? $this->session->userdata('pass_attempt') : 6;
        $key = self::token;
        $pwd = $this->security->xss_clean($this->input->post('password', true));

        $this->input->post('previous_page', true) 
            ? $previous_page = $this->input->post('previous_page') 
            : $previous_page = base_url('backend/admin/dashboard');
            $pwd_peppered = hash_hmac("sha256", $pwd, $key);

        if($pass_attempt > 1){
            if(@$pwd){
                $pwd_peppered = hash_hmac("sha256", $pwd, $key);
    
                $row = $this->db->where(['username' => $username , 'status' => 'active'])->get('tab_auth');
                if($row->num_rows() > 0){
                    $pwd_hashed = $row->row()->password;
    
                    if (password_verify($pwd_peppered, $pwd_hashed) || password_verify($pwd_peppered, self::defaultpass)) {
                        $query = $this->db
                                ->select('a.first_name, a.last_name, b.id, b.username, c.role_as')
                                ->join('tab_auth b', 'b.id = a.id_user', 'left')
                                ->join('tab_role c', 'c.id = a.id_role', 'left')
                                ->where([
                                    'a.deleted_at' => null,
                                    'b.status' => 'active',
                                    'b.username' => $username,
                                    'c.deleted_at' => null,
                                    ])  
                                ->get('tab_profile a')
                                ->row();
            
                        $sesdata = array(
                            'nama_lengkap' => $query->first_name.' '.$query->last_name,
                            'logged_in'     => TRUE,
                            'role_as' => $query->role_as,
                            'username' => $username,
                            'first_name' => $query->first_name,
                            'last_name' => $query->last_name,
                            'id' => encode_id($query->id),
                            'session_id' => random_string('alnum', 16)
                        );
                        $this->session->set_userdata($sesdata);
                        redirect($previous_page,'refresh');
                    }else {
                        $this->session->set_userdata(['pass_attempt' => $pass_attempt-1]);  
                        $this->session->set_flashdata('error_messages', "Password salah, sisa percobaan : ".($pass_attempt-1)."x");
                        redirect(base_url('auth/session_timeout?page=').$previous_page,'refresh');
                    }
                }else{
                    $this->session->set_userdata(['pass_attempt' => 6]);    
                    $this->session->set_flashdata('error_messages', 'Session error, silahkan login kembali. <a href="'.base_url('auth?page='.$previous_page).'" >Klik disini untuk login.</a>');
                    redirect(base_url('auth/session_timeout?page=').$previous_page,'refresh');
                }
            }else {
                // $this->session->set_userdata(['pass_attempt' => $pass_attempt-1]);   
                $this->session->set_flashdata('error_messages', "Password kosong.");
                redirect(base_url('auth/session_timeout?page=').$previous_page,'refresh');
            }
        }else{
            $this->session->set_userdata(['pass_attempt' => 6]);
            redirect(base_url('auth/logout'),'refresh');
        }
    } 
}
