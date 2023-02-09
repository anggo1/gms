<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->model(array('Mod_cuti'));
	}

	public function index()
	{
		$this->load->helper('url');
		$data['dataKode'] = $this->Mod_cuti->select_kode_cuti();
        $this->template->load('layoutbackend','hrd/cuti',$data);
	}

	 public function ajax_list()
    {
        ini_set('memory_limit','512M');
        set_time_limit(3600);
        $list = $this->Mod_cuti->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pel) {
            $no++;
            $row = array();
			$row[] = "<button type='button' class='btn btn-sm btn-outline-success' onClick=selectPegawai('$pel->nip','$pel->nama_depan')><i class='fa fa-check'></i></button>";
            $row[] = $pel->nip;
            $row[] = $pel->nama_depan; $pel->nama_belakang;
            $row[] = $pel->departement;
            $row[] = $pel->jabatan;
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Mod_cuti->count_all(),
                        "recordsFiltered" => $this->Mod_cuti->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function prosesCutiPegawai()
	{
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->Mod_cuti->insert_cutiPegawai($data);

			if ($result > 0) {					
				$out['status'] = '';
				$out['msg'] = show_ok_msg('Data Cuti Telah ditambahkan!', '20px');
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