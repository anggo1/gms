<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Sparepart extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mod_sparepart', 'Mod_menu'));
        $this->load->model(array('Mod_userlevel'));
    }

    public function index()
    {
        $this->load->helper('url');
        $data['menu'] = $this->Mod_menu->getAll()->result();

        $data['dataSatuan'] = $this->Mod_sparepart->select_satuan();
        $data['dataType'] = $this->Mod_sparepart->select_type();
        $data['dataKategori'] = $this->Mod_sparepart->select_kategori();
        $data['dataKelompok'] = $this->Mod_sparepart->select_kelompok();

        $link=$this->uri->segment(1);
        $idlevel = $this->session->userdata['id_level'];
        $get_id = $this->Mod_sparepart->get_by_nama($link);
        foreach ($get_id as $idnye){
            $row1 = array();
            $row1[] = $idnye->id_submenu;
            $id_sub=$idnye->id_submenu;
        }
        $data['viewLevel']  = $this->Mod_sparepart->select_by_level($idlevel, $id_sub);
        
		echo show_my_modal('warehouse/modals/modal_tambah_part', 'tambah-sparepart', $data, ' modal-lg');
        $this->template->load('layoutbackend', 'warehouse/sparepart_data', $data);
    }

    public function ajax_list()
    {
        $link=$this->uri->segment(1);
        $idlevel = $this->session->userdata['id_level'];
        $get_id = $this->Mod_sparepart->get_by_nama($link);
        foreach ($get_id as $idnye){
            $row1 = array();
            $row1[] = $idnye->id_submenu;
            $id_sub=$idnye->id_submenu;
        }
        $viewLevel = $this->Mod_sparepart->select_by_level($idlevel, $id_sub);

        foreach ($viewLevel as $pel1) {
            $row1 = array();
            $row1[] = $pel1->id_submenu;
            $data1[] = $row1;

            $list = $this->Mod_sparepart->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $p) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $p->no_part;
                $row[] = $p->nama_part;
                $row[] = $p->stok;
                $row[] = $p->lokasi;
                $row[] = $p->satuan;
                $row[] = $p->type_mesin;
                $row[] = $p->kategori;
                $row[] = $p->kelompok;
                if($pel1->edit_level=="Y" && $pel1->delete_level=="Y"){
                    $row[]='
                    <button class="btn btn-sm btn-outline-success update-sparepart ion-compose ion-lg" title="Edit" data-id="'.$p->id_barang.'">
                    </button>
                    <button class="btn btn-sm btn-outline-danger delete-part ion-android-close ion-lg" title="Delete" data-toggle="modal" data-target="#hapusPart" data-id="'.$p->id_barang.'">
                    </button>';
                }
                if($pel1->edit_level=="Y" && $pel1->delete_level=="N"){
                    $row[]='<button class="btn btn-sm btn-outline-success detail-sparepart ion-eye ion-lg" title="View" data-id="'.$p->id_barang.'">
                    </button>
                    <button class="btn btn-sm btn-outline-succeess update-sparepart ion-compose ion-lg" title="Edit" data-id="'.$p->id_barang.'">
                    </button>';
                }else{
                    $row[]='';
                }
                $data[] = $row;
            }
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Mod_sparepart->count_all(),
            "recordsFiltered" => $this->Mod_sparepart->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }




    public function viewsparepart()
    {
        $id = $this->input->post('id_barang');
        $data['data_table'] = $this->Mod_sparepeart->view_sparepart($id);

        $this->load->view('warehouse/view', $data);
    }

    public function prosesTsparepart()
    {
        $this->form_validation->set_rules('no_part', 'No Part', 'trim|required');
        $this->form_validation->set_rules('nama_part', 'Nama Barang', 'trim|required');

        $data     = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $result = $this->Mod_sparepart->insertSparepart($data);

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
    public function updateSparepart() {
		$id 				= trim($_POST['id']);
        $data['dataSatuan'] = $this->Mod_sparepart->select_satuan();
        $data['dataType'] = $this->Mod_sparepart->select_type();
        $data['dataKategori'] = $this->Mod_sparepart->select_kategori();
        $data['dataKelompok'] = $this->Mod_sparepart->select_kelompok();
		$data['dataPart'] = $this->Mod_sparepart->select_by_id_part($id);

		echo show_my_modal('warehouse/modals/modal_tambah_part', 'update-sparepart', $data, ' modal-lg');
	}

	public function prosesUsparepart() {
		
		$this->form_validation->set_rules('no_part', 'no Part', 'trim|required');
		$this->form_validation->set_rules('nama_part', 'Nama Barang', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->Mod_sparepart->updateSparepart($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_ok_msg('Data Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

    public function deleteSparepart()
    {
        $id = $_POST['id'];
        $result = $this->Mod_sparepart->deletePart($id);

        if ($result > 0) {
            $out['status'] = '';
            $out['msg'] = show_del_msg('Deleted', '20px');
        } else {
            $out['status'] = '';
            $out['msg'] = show_err_msg('Filed !', '20px');
        }
        echo json_encode($out);
    }

    public function download()
    {

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Submenu');
        $sheet->setCellValue('C1', 'Link');
        $sheet->setCellValue('D1', 'Icon');
        $sheet->setCellValue('E1', 'Menu');
        $sheet->setCellValue('F1', 'Is Active');

        $menu = $this->Mod_submenu->getAll()->result();
        $no = 1;
        $x = 2;
        foreach ($menu as $row) {
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $row->nama_submenu);
            $sheet->setCellValue('C' . $x, $row->link);
            $sheet->setCellValue('D' . $x, $row->icon);
            $sheet->setCellValue('E' . $x, $row->nama_menu);
            $sheet->setCellValue('F' . $x, $row->is_active);
            $x++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = 'laporan-Submenu';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('nama_submenu') == '') {
            $data['inputerror'][] = 'nama_submenu';
            $data['error_string'][] = 'Submenu is required';
            $data['minlength'] = '2';
            $data['status'] = FALSE;
        }

        if ($this->input->post('link') == '') {
            $data['inputerror'][] = 'link';
            $data['error_string'][] = 'Link is required';
            $data['minlength'] = '2';
            $data['status'] = FALSE;
        }

        if ($this->input->post('icon') == '') {
            $data['inputerror'][] = 'icon';
            $data['error_string'][] = 'Icon is required';
            $data['minlength'] = '2';
            $data['status'] = FALSE;
        }

        if ($this->input->post('is_active') == '') {
            $data['inputerror'][] = 'is_active';
            $data['error_string'][] = 'Please select Is Active';
            $data['minlength'] = '2';
            $data['status'] = FALSE;
        }

        if ($this->input->post('id_menu') == '') {
            $data['inputerror'][] = 'id_menu';
            $data['error_string'][] = 'Please select Menu';
            $data['minlength'] = '2';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }
}
