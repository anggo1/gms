<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListBus extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->model(array('body_repair_model/Mod_body'));
	}

	public function index()
	{
		$this->load->helper('url');
        $this->template->load('layoutbackend','body_repair/data_body');
		$idlevel= $this->session->userdata['id_level'];
		$data['viewLevel'] = $this->Mod_body->select_by_level($idlevel);
		
		foreach ($data['viewLevel'] as $dataL) {
			$view1=$dataL->view_level;
			
		}
	}

	 public function ajax_list()
    {
		 
        ini_set('memory_limit','512M');
        set_time_limit(3600);
        $list = $this->Mod_body->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pel) {
            $no++;
            $row = array();
            $row[] = $pel->no_body;
            $row[] = $pel->type;
            $row[] = $pel->thn_rangka;
            $row[] = $pel->thn_pembuatan;
            $row[] = $pel->karoseri;
            $row[] = $pel->warna;
            $row[] = $pel->kelas;
            $row[] = $pel->strip;
            $row[] = $pel->keterangan;$view1;
            $row[] = '<button class="btn btn-sm btn-outline-primary update-datalaporan" data-id="'.$pel->no_body.'"><i class="glyphicon glyphicon-repeat"></i> Edit</button>
				  <button class="btn btn-sm btn-outline-danger detail-datalaporan" data-id="'.$pel->no_body.'"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>';
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Mod_body->count_all(),
                        "recordsFiltered" => $this->Mod_body->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function insert()
    {
        $this->_validate();
        $kode= date('ymsi');
		$save  = array(
			'no_body'  	=> $kode,
            'nama'			=> $this->input->post('nama'),
            'harga'  		=> $this->input->post('harga'),
            'satuan'   		=> $this->input->post('satuan'),
            'stok'   		=> $this->input->post('stok')
        );
            $this->Mod_body->insert_barang("tbl_bahan", $save);
            echo json_encode(array("status" => TRUE));
    }

    public function update()
    {
        $this->_validate();
        $no_body      = $this->input->post('no_body');
        $save  = array(
            'type' => $this->input->post('type'),
            'harga'      => $this->input->post('harga'),
            'satuan'      => $this->input->post('satuan'),
            'stok'      => $this->input->post('stok')
        );
        $this->Mod_body->update_barang($no_bahan, $save);
        echo json_encode(array("status" => TRUE));
    }

    public function edit_bus($no_body)
    {
            $data = $this->Mod_body->get_bus($no_body);
            echo json_encode($data);
    }

    public function delete()
    {
        $no_body = $this->input->post('no_body');
        $this->Mod_body->delete_bus($no_body, 'body_detail');        
        echo json_encode(array("status" => TRUE));
    }
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('nama') == '')
        {
            $data['inputerror'][] = 'nama';
            $data['error_string'][] = 'Nama Barang Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if($this->input->post('harga') == '')
        {
            $data['inputerror'][] = 'harga';
            $data['error_string'][] = 'Harga Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if($this->input->post('satuan') == '')
        {
            $data['inputerror'][] = 'satuan';
            $data['error_string'][] = 'Satuan Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
}