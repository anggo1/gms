<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Part_masuk extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Mod_part_masuk'));
	}

	public function index()
	{
		$this->load->helper('url');
		//$data['dataKode'] = $this->Mod_cuti->select_kode_cuti();
		$this->template->load('layoutbackend', 'warehouse/part_masuk');
	}

	public function ajax_list()
	{
		ini_set('memory_limit', '512M');
		set_time_limit(3600);
		$list = $this->Mod_part_masuk->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $pel) {
			$no++;
			$row = array();
			$row[] = "<button type='button' class='btn btn-sm btn-outline-success' onClick=selectPart('$pel->id_barang')><i class='fa fa-check'></i></button>";
			$row[] = $pel->no_part;
			$row[] = $pel->nama_part;
			$data[] = $row; 

		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Mod_part_masuk->count_all(),
			"recordsFiltered" => $this->Mod_part_masuk->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}
	public function cariKode($id)
	{
	$data = $this->Mod_part_masuk->get_part($id);
	echo json_encode($data);
	}

	public function prosesPartmasuk()
	{
		$this->form_validation->set_rules('date1', 'Tanggal Masuk', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->Mod_part_masuk->insert_part($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_ok_msg('Data  ditambahkan!', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_ok_msg('Filed !', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}
		echo json_encode($out);
	}
	public function list_cuti()
	{
		$date1 				= $_GET['date1'];
		$date2 				= $_GET['date2'];
		$tgl1 = explode('-', $date1);
		$ttmp1 = $tgl1[2] . "-" . $tgl1[1] . "-" . $tgl1[0] . "";

		$tgl2 = explode('-', $date2);
		$ttmp2 = $tgl2[2] . "-" . $tgl2[1] . "-" . $tgl2[0] . "";
		$data['dataCuti'] = $this->Mod_cuti->cari_cuti($ttmp1, $ttmp2);
		$this->load->view('hrd/list_cuti', $data);
	}
	public function deleteCuti()
	{
		$id = $_POST['id'];
		$result = $this->Mod_cuti->deleteCuti($id);
		if ($result > 0) {
			//$out['datakode']=$kodeBaru;
			$out['status'] = '';
			$out['msg'] = show_del_msg('Deleted', '10px');
		} else {
			$out['status'] = '';
			$out['msg'] = show_err_msg('Filed !', '10px');
		}
		echo json_encode($out);
	}
}
