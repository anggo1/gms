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
        $this->load->model(array('Mod_pegawai'));
    }

    public function index()
    {
        $this->load->helper('url');
        $data['menu'] = $this->Mod_menu->getAll()->result();

        $data['dataSatuan'] = $this->Mod_sparepart->select_satuan();
        $data['dataType'] = $this->Mod_sparepart->select_type();
        $data['dataKategori'] = $this->Mod_sparepart->select_kategori();
        $data['dataKelompok'] = $this->Mod_sparepart->select_kelompok();
        $this->template->load('layoutbackend', 'warehouse/sparepart_data', $data);
    }

    public function ajax_list()
    {

        $get_id = $this->Mod_pegawai->get_by_nama('Pegawai');
        $idlevel = $this->session->userdata['id_level'];
        $viewLevel = $this->Mod_pegawai->select_by_level($idlevel, $get_id);

        foreach ($viewLevel as $pel1) {
            $row1 = array();
            $row1[] = $pel1->id_submenu;
            $data1[] = $row1;

            $list = $this->Mod_sparepart->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $submenu) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $submenu->no_part;
                $row[] = $submenu->nama_part;
                $row[] = $submenu->stok;
                $row[] = $submenu->hrg_awal;
                $row[] = $submenu->hrg_1;
                $row[] = $submenu->lokasi;
                $row[] = $submenu->kategori;
                $row[] = $pel1->add_level;
                $row[] = $pel1->view_level;
                $row[] = $pel1->edit_level;
                $row[] = $pel1->delete_level;
                $row[] = $submenu->id_barang;
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

    public function editsparepart($id)
    {

        $data = $this->Mod_sparepart->get_sparepart($id);
        echo json_encode($data);
    }

    public function insert()
    {
        $this->_validate();
        $save  = array(
            'nama_submenu'    => $this->input->post('nama_submenu'),
            'link'      => $this->input->post('link'),
            'icon'       => $this->input->post('icon'),
            'id_menu'      => $this->input->post('id_menu'),
            'is_active' => $this->input->post('is_active'),
            'urutan'     => $this->input->post('urutan')
        );
        $this->Mod_submenu->insertsubmenu("tbl_submenu", $save);
        $insert_id = $this->db->insert_id();
        /*$nama_submenu = $this->input->post('nama_submenu');
 $get_id= $this->Mod_submenu->get_by_nama($nama_submenu);*/
        $id_level = $this->session->userdata['id_level'];
        $levels = $this->Mod_userlevel->getAll()->result();
        foreach ($levels as $row) {
            $data = array(
                'id_submenu' => $insert_id,
                'id_level'   => $row->id_level,
            );
            $this->Mod_submenu->insert_akses_submenu("tbl_akses_submenu", $data);
        }
        echo json_encode(array("status" => TRUE));
    }

    public function update()
    {

        //$this->_validate();
        $id = $this->input->post('id_barang');
        $data  = array(
            'no_part'   => $this->input->post('no_part'),
            'nama_part' => $this->input->post('nama_part'),
            'hrg_awal'  => $this->input->post('hrg_awal'),
            'hrg_1'     => $this->input->post('hrg_1'),
            'hrg_2'     => $this->input->post('hrg_2'),
            'satuan'    => $this->input->post('satuan'),
            'kelompok'  => $this->input->post('kelompok'),
            'type'      => $this->input->post('type'),
            'lokasi'    => $this->input->post('lokasi'),
            'kategori'  => $this->input->post('kategori'),
            'ket'       => $this->input->post('ket')
        );
        $this->Mod_sparepart->updatesparepart($id, $data);
        echo json_encode(array("status" => TRUE));
    }
    public function delete()
    {
        $id = $this->input->post('id_barang');
        $this->Mod_sparepart->deletesparepart($id, 'tbl_wh_barang');
        $data['status'] = TRUE;
        echo json_encode($data);
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
