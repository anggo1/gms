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
        $data['bay1'] = $this->Mod_display->select_bay1();
        $data['bay2'] = $this->Mod_display->select_bay2();
        $data['bay3'] = $this->Mod_display->select_bay3();
        $data['bay4'] = $this->Mod_display->select_bay4();
        $data['bay5'] = $this->Mod_display->select_bay5();
        $data['bay6'] = $this->Mod_display->select_bay6();
        $data['bay7'] = $this->Mod_display->select_bay7();
        $data['bay8'] = $this->Mod_display->select_bay8();
        $data['bay9'] = $this->Mod_display->select_bay9();
        $data['bay10'] = $this->Mod_display->select_bay10();
        $data['bay11'] = $this->Mod_display->select_bay11();
        $data['bay12'] = $this->Mod_display->select_bay12();
        $data['bay13'] = $this->Mod_display->select_bay13();
        $data['bay14'] = $this->Mod_display->select_bay14();
        $data['bay15'] = $this->Mod_display->select_bay15();
        $data['bay16'] = $this->Mod_display->select_bay16();
        $data['bay17'] = $this->Mod_display->select_bay17();
        $data['bay18'] = $this->Mod_display->select_bay18();
        $data['bay19'] = $this->Mod_display->select_bay19();
        $data['bay20'] = $this->Mod_display->select_bay20();
        $data['bay21'] = $this->Mod_display->select_bay21();
        $data['bay22'] = $this->Mod_display->select_bay22();
        $data['bay23'] = $this->Mod_display->select_bay23();
        $data['bay24'] = $this->Mod_display->select_bay24();
        $data['bay25'] = $this->Mod_display->select_bay25();
        $data['bay26'] = $this->Mod_display->select_bay26();
        $data['bay27'] = $this->Mod_display->select_bay27();
        $data['bay28'] = $this->Mod_display->select_bay28();
        $data['bay29'] = $this->Mod_display->select_bay29();
        $data['bay30'] = $this->Mod_display->select_bay30();
        $data['bay31'] = $this->Mod_display->select_bay31();
        $this->load->view('display/index',$data);
            //$this->load->view('display/index',$aplikasi);
      
    }//end function index
    public function detail()
	{
		$id 				= $_POST['id'];
		$data['dataPk'] = $this->Mod_display->cetak_pk($id);
		$data['detailPk'] = $this->Mod_display->cetak_estimasi($id);

		//echo show_my_display('display/modal_cetak_pk', 'modal-pk', $data, ' modal-sm');
        //$data['modalbay'] = show_my_modal('display/modal_cetak_pk', $data, ' modal-xl');
	}

}

