<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Display extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mod_display'));
		$this->load->helper('tgl_indo_helper');
        
    }

    public function index()
    {
        
        $data['dataAntri'] = $this->Mod_display->select_antri();
        $data['listPk'] = $this->Mod_display->select_pk();
        $data['dataPkselesai'] = $this->Mod_display->select_pk_selesai();
        $data['bay16'] = $this->Mod_display->select_bay16();
        $data['bay15'] = $this->Mod_display->select_bay15();
        $this->load->view('display/index',$data);
            //$this->load->view('display/index',$aplikasi);
      
    }//end function index

}

