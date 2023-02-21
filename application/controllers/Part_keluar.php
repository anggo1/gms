<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Part_keluar extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Mod_part_keluar'));
	}

	public function index()
	{
		$this->load->helper('url');
		$data['dataSupplier'] = $this->Mod_part_keluar->select_supplier();
		$this->template->load('layoutbackend', 'warehouse/part_keluar', $data);
	}

	public function ajax_list()
	{
		ini_set('memory_limit', '512M');
		set_time_limit(3600);
		$list = $this->Mod_part_keluar->get_datatables();
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
			"recordsTotal" => $this->Mod_part_keluar->count_all(),
			"recordsFiltered" => $this->Mod_part_keluar->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}
	public function cariKode($id)
	{
		$data = $this->Mod_part_keluar->get_part($id);
		echo json_encode($data);
	}

	public function prosesPo()
	{
		$date = date("Ymd");
		$ci_kons = get_instance();
		$query = "SELECT max(id_po) AS maxKode FROM tbl_wh_po WHERE id_po LIKE '%$date%'";
		$hasil = $ci_kons->db->query($query)->row_array();
		$noOrder = $hasil['maxKode'];
		$noUrut = (int)substr($noOrder, 9, 4);
		$noUrut++;
		$tahun = substr($date, 0, 4);
		$bulan = substr($date, 4, 2);
		$tgl = substr($date, 6, 2);
		$kode_po  = $tahun . $bulan . $tgl . sprintf("%04s", $noUrut);


		$this->form_validation->set_rules('tgl_po', 'Tanggal Masuk', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->input->post();
			$date2 = $data['tgl_po'];
			$tgl2 = explode('-', $date2);
			$tgl_po_fix = $tgl2[2] . "-" . $tgl2[1] . "-" . $tgl2[0] . "";
			$sekarang = date('Y/m/d');

			$data = array(
				'id_po'  	=> $kode_po,
				'tgl_po'  	=> $tgl_po_fix,
				'kode_pesan' => $data['kode_pesan'],
				'top'      	=> $data['top'],
				'ppn'  		=> $data['ppn'],
				'supplier'	=> $data['supplier'],
				'pengesah'  => $data['pengesah'],
				'keterangan' => $data['keterangan'],
				'user'   	=> $data['user']
			);
			if (empty($_POST['id_po'])) {
				$data['dataPo'] = $this->db->insert('tbl_wh_po', $data);
				$data 	= $this->input->post();
				//$kode_po=$data['id_po'];
				$this->Mod_part_keluar->insertDetail($kode_po, $data);
			} else {
				$data 	= $this->input->post();
				$kode_po = $data['id_po'];
				$data['dataPo'] = $this->Mod_part_keluar->insertDetail($kode_po, $data);
			}
			if ($result > 0) {
				$out['dataPo'] = $kode_po;
				$out['status'] = '';
				$out['msg'] = show_ok_msg('Data  ditambahkan!', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_del_msg('Filed !', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}
		echo json_encode($out);
	}
	public function tampilDetail()
	{
		$id 				= $_GET['id_po'];
		$data['dataDetail'] = $this->Mod_part_keluar->select_detail($id);
		$this->load->view('warehouse/detail_po', $data);
	}
	public function deleteDetail()
	{
		$id = $_POST['id'];
		$result = $this->Mod_part_keluar->deleteDetail_po($id);
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
	public function cetak()
	{
		$id 				= $_POST['id'];
		$data['dataPo'] = $this->Mod_part_keluar->select_by_id($id);
		$data['detailPo'] = $this->Mod_part_keluar->select_detail($id);

		echo show_my_print('warehouse/modals/modal_cetak_part', 'cetak-po', $data, ' modal-xl');
	}
}
