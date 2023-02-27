<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estimator extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->model(array('body_repair_model/Mod_estimator'));
	}

	public function index()
	{
		$data['page'] 		= "Estimasi Perbaikan Bus";
		$data['judul'] 		= "Estimator";
		$this->load->helper('url');

        
        $id = $_POST['id'];
        $data['dataLap'] = $this->Mod_estimator->select_laporan();
        $this->template->load('layoutbackend','body_repair/estimator',$data);
	}

    public function ajax_list()
    {
		$link=$this->uri->segment(1);
        $idlevel = $this->session->userdata['id_level'];
        ini_set('memory_limit','512M');
        set_time_limit(3600);
        $list = $this->Mod_busmasuk->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $bd) {
            $no++;
            if($bd->status_body == 'AKTIF'){
                $status_bus='<button class="tombol-success Blink-warning btn-lg pull-right">A</button>';
            }if($bd->status_body == 'PASIF'){
                $status_bus='<button class="tombol-warning Blink-warning btn-lg pull-right">P</button>';
            }else{
                $status_bus='';
            }
            $row = array();
            $row[] = $no;
            $row[] = $bd->no_body.'&nbsp'.$status_bus;
            $row[] = $bd->no_pol;
            $row[] = $bd->nip_sp.'&nbsp'.$bd->nama_sp;
            $row[] = $bd->kode;
            $row[] = $bd->kategori;
            $row[] = $bd->tgl_masuk;
            $row[] = $bd->jam_masuk;
            $row[] = $bd->keterangan;
            if($bd->status='N'){
                $row[] = 
                '<button class="btn btn-xs btn-outline-success estimasi" title="Edit" no_body="'.$bd->no_body.'" data-id="'.$bd->id_lapor.'"><i class="fa fa-chalkboard-teacher"></i> Estimator
                </button></a>
                <button class="btn btn-xs btn-outline-danger delete-laporan" title="Delete" data-toggle="modal" data-target="#hapusLaporan" data-id="'.$bd->id_lapor.'"><i class="fa fa-times"></i>  Batal
                </button>';
            } else{
                $row[] = 
                '<button class="btn btn-xs btn-outline-primary update-masuk" title="Edit" data-id="'.$bd->id_lapor.'"><i class="fa fa-chalkboard"></i> Proses PK
                </button>';
            }
                
            
            $data[] = $row;
        }
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Mod_busmasuk->count_all(),
                        "recordsFiltered" => $this->Mod_busmasuk->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function prosesLaporan()
    {
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'trim|required');

        $data=$this->input->post();
        if ($this->form_validation->run() == TRUE) {
			$result = $this->Mod_busmasuk->insertLaporan($data);

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
    public function deleteLaporan()
    {
        $id = $_POST['id'];
        $result = $this->Mod_busmasuk->deleteLapor($id);

        if ($result > 0) {
            $out['status'] = '';
            $out['msg'] = show_del_msg('Deleted', '20px');
        } else {
            $out['status'] = '';
            $out['msg'] = show_err_msg('Filed !', '20px');
        }
        echo json_encode($out);
    }
    //Estimator//
    public function Estimasi()
	{
		$data['page'] 		= "Estimasi Perbaikan Bus";
		$data['judul'] 		= "Estimator";
		$this->load->helper('url');
        $data['dataPk'] = $this->Mod_busmasuk->select_pk();
        $this->template->load('layoutbackend','body_repair/estimator',$data);
	}

}