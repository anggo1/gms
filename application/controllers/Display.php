<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Display extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mod_display'));
        
    }

    public function index()
    {
            //$aplikasi['aplikasi'] = $this->Mod_login->Aplikasi()->row();
            $this->load->view('display/index');
            //$this->load->view('display/index',$aplikasi);
      
    }//end function index

}

