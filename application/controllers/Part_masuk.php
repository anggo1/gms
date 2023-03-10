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
		$data['page'] 		= "Barang Masuk";
		$data['judul'] 		= "Input Stok";
		$this->load->helper('url');
		//$data['dataKode'] = $this->Mod_cuti->select_kode_cuti();
		$this->template->load('layoutbackend', 'warehouse/part_masuk',$data);
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
}
