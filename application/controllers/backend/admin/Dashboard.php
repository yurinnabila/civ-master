<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct(){
        parent::__construct();
        //$this->load->helper(array('Cookie', 'String'));
        // if(!$this->user_id){
        //     redirect('login/logout');
        // }
    } 

	function index() {
        
        $data = [  
            'csrf'=>[
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            ],
            'page_title'    =>'Dashboard',
            'li_active'     =>'Dashboard',
            'content'       =>'backend/admin/dashboard/home', 
            'script'        =>'backend/admin/dashboard/home-js',
            'toastr'        =>TRUE,
            'chart_bundle'  =>TRUE,
            'modal'         => array(
            )
        ];
        $this->load->view('_templates/main', $data);
	}
    
}
