<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->model(array('Mod_barang'));
	}

	public function index()
	{
		$this->load->helper('url');
        $this->template->load('layoutbackend','barang');
	}

	 public function ajax_list()
    {
        ini_set('memory_limit','512M');
        set_time_limit(3600);
        $list = $this->Mod_barang->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pel) {
            $no++;
            $row = array();
            $row[] = $pel->no_bahan;
            $row[] = $pel->nama;
            $row[] = $pel->harga;
            $row[] = $pel->satuan;
            $row[] = $pel->stok;
            $row[] = $pel->no_bahan;
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Mod_barang->count_all(),
                        "recordsFiltered" => $this->Mod_barang->count_filtered(),
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
			'no_bahan'  	=> $kode,
            'nama'			=> $this->input->post('nama'),
            'harga'  		=> $this->input->post('harga'),
            'satuan'   		=> $this->input->post('satuan'),
            'stok'   		=> $this->input->post('stok')
        );
            $this->Mod_barang->insert_barang("tbl_bahan", $save);
            echo json_encode(array("status" => TRUE));
    }

    public function update()
    {
        $this->_validate();
        $no_bahan      = $this->input->post('no_bahan');
        $save  = array(
            'nama' => $this->input->post('nama'),
            'harga'      => $this->input->post('harga'),
            'satuan'      => $this->input->post('satuan'),
            'stok'      => $this->input->post('stok')
        );
        $this->Mod_barang->update_barang($no_bahan, $save);
        echo json_encode(array("status" => TRUE));
    }

    public function edit_barang($no_bahan)
    {
            $data = $this->Mod_barang->get_brg($no_bahan);
            echo json_encode($data);
    }

    public function delete()
    {
        $no_bahan = $this->input->post('no_bahan');
        $this->Mod_barang->delete_brg($no_bahan, 'tbl_bahan');        
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