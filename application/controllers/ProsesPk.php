<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ProsesPk extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('body_repair_model/Mod_prosespk', 'Mod_menu'));
        $this->load->model(array('Mod_userlevel'));
		$this->load->helper('tgl_indo_helper');
    }

    public function index()
    {
		$data['page'] 		= "Proses Pekerjaan";
		$data['judul'] 		= "Proses";
        $this->load->helper('url');
        $data['menu'] = $this->Mod_menu->getAll()->result();
        $this->template->load('layoutbackend', 'body_repair/proses_pk', $data);
    }


    public function showPk()
    {
        $data['dataPk'] = $this->Mod_prosespk->select_pk();
        $this->load->view('body_repair/lap_pk', $data);
    }
    public function cetakPk()
	{
		$id 				= $_POST['id'];
		$data['dataPk'] = $this->Mod_prosespk->cetak_pk($id);

		echo show_my_print('body_repair/modals/modal_cetak_pk_tunggal', 'cetak-pk', $data, ' modal-xl');
	}
    /*Keterangan Laporan*/
    public function prosesTlaporan()
    {
        $this->form_validation->set_rules('kode', 'Kode Laporan', 'trim|required');

        $data     = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $result = $this->Mod_settingbr->insertLapor($data);

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
    public function Pause()
    {
        $id                 = trim($_POST['id']);
		$data['dataPk'] = $this->Mod_prosespk->cetak_pk($id);

        echo show_my_modal('body_repair/modals/modal_pk_pause', 'pause-pk', $data);
    }

    public function pausePk()
    {

        $this->form_validation->set_rules('id_pk', 'ID PK', 'trim|required');

        $data     = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $result = $this->Mod_prosespk->pausepk($data);

            if ($result > 0) {
                $out['status'] = '';
                $out['msg'] = show_ok_msg('Success', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_del_msg('Filed!', '20px');
            }
        } else {
            $out['status'] = 'form';
            $out['msg'] = show_err_msg(validation_errors());
        }

        echo json_encode($out);
    }
    public function startPk()
    {
        $id = $_POST['id'];
        $result = $this->Mod_prosespk->startPk($id);

        if ($result > 0) {
            $out['status'] = '';
            $out['msg'] = show_ok_msg('PK Telah Dimulai', '20px');
        } else {
            $out['status'] = '';
            $out['msg'] = show_err_msg('Filed !', '20px');
        }
        echo json_encode($out);
    }
    public function tutupPk()
    {
        $id = $_POST['id'];
        $result = $this->Mod_prosespk->pkSelesai($id);

        if ($result > 0) {
            $out['status'] = '';
            $out['msg'] = show_ok_msg('PK Telah Selesai', '20px');
        } else {
            $out['status'] = '';
            $out['msg'] = show_err_msg('Filed !', '20px');
        }
        echo json_encode($out);
    }

    /*endKeteranganLaporan*/
        /*endPk*/
}