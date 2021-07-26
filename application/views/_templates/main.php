<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('_templates/head');
$this->load->view('_templates/sidebars/sidebar');
$this->load->view('_templates/header');
if(is_file('./application/views/'.@$content.'.php')){
    $this->load->view($content);
} else{
    $this->load->view('_templates/blank');
}
$this->load->view('_templates/footer'); 
