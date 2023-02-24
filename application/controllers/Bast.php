<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bast extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('body_repair_model/Mod_bast'));
	}

	public function index()
	{
		$this->load->helper('url');
		$this->template->load('layoutbackend', 'body_repair/bast');
	}
	public function prosesBast()
    {
        $this->form_validation->set_rules('tgl_bast', 'Tanggal BAST', 'trim|required');

        $data=$this->input->post();
        if ($this->form_validation->run() == TRUE) {
			$result = $this->Mod_bast->insertBast($data);

            if ($result > 0) {
                $out['status'] = '';
                $out['msg'] = show_ok_msg('Success', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_err_msg('Filed !', '20px');
            }
        } else {
            $out['status'] = 'form';
            $out['msg'] = show_err_msg(validation_errors());
        }

        echo json_encode($out);
    }
	public function tampilDetail()
	{
		$data['dataDetail'] = $this->Mod_bast->select_detail();
		$this->load->view('body_repair/detail_bast', $data);
	}
	public function cetak()
	{
		$id 				= $_POST['id'];
		$data['dataPo'] = $this->Mod_bast->select_by_id($id);
		$data['detailPo'] = $this->Mod_bast->select_detail($id);

		echo show_my_print('warehouse/modals/modal_cetak_po', 'cetak-po', $data, ' modal-xl');
	}
}
