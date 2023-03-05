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
    public function updateLaporan()
    {
        $id                 = trim($_POST['id']);
        $data['dataLapor'] = $this->Mod_settingbr->select_id_lapor($id);

        echo show_my_modal('body_repair/modals/modal_tambah_lap', 'update-laporan', $data);
    }

    public function prosesUlaporan()
    {

        $this->form_validation->set_rules('kode', 'Kode Laporan', 'trim|required');

        $data     = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $result = $this->Mod_settingbr->updateLapor($data);

            if ($result > 0) {
                $out['status'] = '';
                $out['msg'] = show_ok_msg('Success', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Filed!', '20px');
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
        $result = $this->Mod_settingbr->deleteLap($id);

        if ($result > 0) {
            //$out['datakode']=$kodeBaru;
            $out['status'] = '';
            $out['msg'] = show_del_msg('Deleted', '20px');
        } else {
            $out['status'] = '';
            $out['msg'] = show_err_msg('Filed !', '20px');
        }
        echo json_encode($out);
    }

    /*endKeteranganLaporan*/
    /*Kategori*/
    public function prosesTkategori()
    {
        $this->form_validation->set_rules('kategori', 'Nama Satuan', 'trim|required');

        $data     = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $result = $this->Mod_settingbr->insertKategori($data);

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
    public function updateKategori()
    {
        $id                 = trim($_POST['id']);
        $data['dataKategori'] = $this->Mod_settingbr->select_id_kategori($id);

        echo show_my_modal('body_repair/modals/modal_tambah_kat', 'update-kategori', $data);
    }

    public function prosesUkategori()
    {

        $this->form_validation->set_rules('kategori', 'Nama kategori', 'trim|required');

        $data     = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $result = $this->Mod_settingbr->updateKategori($data);

            if ($result > 0) {
                $out['status'] = '';
                $out['msg'] = show_ok_msg('Success', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Filed!', '20px');
            }
        } else {
            $out['status'] = 'form';
            $out['msg'] = show_err_msg(validation_errors());
        }

        echo json_encode($out);
    }
    public function deleteKategori()
    {
        $id = $_POST['id'];
        $result = $this->Mod_settingbr->deleteKat($id);

        if ($result > 0) {
            $out['status'] = '';
            $out['msg'] = show_del_msg('Deleted', '20px');
        } else {
            $out['status'] = '';
            $out['msg'] = show_err_msg('Filed !', '20px');
        }
        echo json_encode($out);
    }

    /*endKategori*/
        /*KodePK*/
        public function prosesTpk()
        {
            $this->form_validation->set_rules('kode', 'Nama Pekerjaan', 'trim|required');
    
            $data     = $this->input->post();
            if ($this->form_validation->run() == TRUE) {
                $result = $this->Mod_settingbr->insertPk($data);
    
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
        public function updatePk()
        {
            $id                 = trim($_POST['id']);
            $data['dataPk'] = $this->Mod_settingbr->select_id_pk($id);
    
            echo show_my_modal('body_repair/modals/modal_tambah_pk', 'update-pk', $data);
        }
    
        public function prosesUpk()
        {
    
            $this->form_validation->set_rules('kode', 'Nama Pekerjaan', 'trim|required');
    
            $data     = $this->input->post();
            if ($this->form_validation->run() == TRUE) {
                $result = $this->Mod_settingbr->updatePk($data);
    
                if ($result > 0) {
                    $out['status'] = '';
                    $out['msg'] = show_ok_msg('Success', '20px');
                } else {
                    $out['status'] = '';
                    $out['msg'] = show_succ_msg('Filed!', '20px');
                }
            } else {
                $out['status'] = 'form';
                $out['msg'] = show_err_msg(validation_errors());
            }
    
            echo json_encode($out);
        }
        public function deletePk()
        {
            $id = $_POST['id'];
            $result = $this->Mod_settingbr->deletePk($id);
    
            if ($result > 0) {
                $out['status'] = '';
                $out['msg'] = show_del_msg('Deleted', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_err_msg('Filed !', '20px');
            }
            echo json_encode($out);
        }
    
        /*endPk*/
}