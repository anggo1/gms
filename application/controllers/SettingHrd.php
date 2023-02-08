<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SettingHrd extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mod_settinghrd','Mod_menu'));
        $this->load->model(array('Mod_userlevel'));
    }

    public function index()
    {
        $this->load->helper('url');
        $data['menu'] = $this->Mod_menu->getAll()->result();        
		echo show_my_modal('hrd/modals/modal_tambah_pend', 'tambah-pendidikan', $data);
		echo show_my_modal('hrd/modals/modal_tambah_jab', 'tambah-jabatan', $data);
		echo show_my_modal('hrd/modals/modal_tambah_dept', 'tambah-departement', $data);
        $this->template->load('layoutbackend','hrd/setting_panel',$data);
    }

    
    public function showPend() {
		$data['dataPen'] = $this->Mod_settinghrd->select_pendidikan();
		$this->load->view('hrd/pend_data', $data);
	}
    public function showDep() {
		$data['dataDep'] = $this->Mod_settinghrd->select_departement();
		$this->load->view('hrd/dep_data', $data);
	}
    public function showJab() {
		$data['datajab'] = $this->Mod_settinghrd->select_jabatan();
		$this->load->view('hrd/jab_data', $data);
	}
    /*Pendidikan*/
	public function prosesTpendidikan() {
		$this->form_validation->set_rules('pendidikan', 'Nama Pendidikan', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->Mod_settinghrd->insertPendidikan($data);

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
	public function updatePendidikan() {
		$id 				= trim($_POST['id']);
		$data['dataPendidikan'] = $this->Mod_settinghrd->select_id_pendidikan($id);

		echo show_my_modal('hrd/modals/modal_tambah_pend', 'update-pendidikan', $data);
	}

	public function prosesUpendidikan() {
		
		$this->form_validation->set_rules('pendidikan', 'Nama Pendidikan', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->Mod_settinghrd->updatePendidikan($data);

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
	public function deletePendidikan() {
		$id = $_POST['id'];
		$result = $this->Mod_settinghrd->deletePend($id);
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

	/*end Pendidikan*/
    /*Jabatan*/
	public function prosesTjabatan() {
		$this->form_validation->set_rules('jabatan', 'Nama Jabatan', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->Mod_settinghrd->insertJabatan($data);

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
	public function updateJabatan() {
		$id 				= trim($_POST['id']);
		$data['dataJabatan'] = $this->Mod_settinghrd->select_id_jabatan($id);

		echo show_my_modal('hrd/modals/modal_tambah_jab', 'update-jabatan', $data);
	}

	public function prosesUjabatan() {
		
		$this->form_validation->set_rules('jabatan', 'Nama Jabatan', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->Mod_settinghrd->updateJabatan($data);

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
	public function deleteJab() {
		$id = $_POST['id'];
		$result = $this->M_masterdata->deleteJab($id);
		
		if ($result > 0) {
			echo show_succ_msg('Deleted', '20px');
		} else {
			echo show_err_msg('Failed!', '20px');
		}
	}
    public function deleteJabatan() {
		$id = $_POST['id'];
		$result = $this->Mod_settinghrd->deleteJab($id);
		if ($result > 0) {
            $out['status'] = '';
			$out['msg'] = show_del_msg('Deleted', '20px');
			} else {
			$out['status'] = '';
			$out['msg'] = show_err_msg('Filed !', '20px');
			}
		echo json_encode($out);
	}
	/*endJabatan*/
     /*Department*/
	public function prosesTdepartement() {
		$this->form_validation->set_rules('departement', 'Nama departement', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->Mod_settinghrd->insertDepartement($data);

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
	public function updateDepartement() {
		$id 				= trim($_POST['id']);
		$data['dataDepartement'] = $this->Mod_settinghrd->select_id_departement($id);

		echo show_my_modal('hrd/modals/modal_tambah_dept', 'update-departement', $data);
	}

	public function prosesUdepartement() {
		
		$this->form_validation->set_rules('departement', 'Nama Departement', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->Mod_settinghrd->updateDepartement($data);

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
	public function deleteDep() {
		$id = $_POST['id'];
		$result = $this->M_masterdata->deleteJab($id);
		
		if ($result > 0) {
			echo show_succ_msg('Deleted', '20px');
		} else {
			echo show_err_msg('Failed!', '20px');
		}
	}
    public function deleteDepartement() {
		$id = $_POST['id'];
		$result = $this->Mod_settinghrd->deleteDep($id);
		if ($result > 0) {
            $out['status'] = '';
			$out['msg'] = show_del_msg('Deleted', '20px');
			} else {
			$out['status'] = '';
			$out['msg'] = show_err_msg('Filed !', '20px');
			}
		echo json_encode($out);
	}
	/*endJabatan*/
    
    public function ajax_pendidikan()
    {
        
 		$get_id= $this->Mod_settinghrd->get_by_nama('pendidikan');		
		$idlevel= $this->session->userdata['id_level'];
		 $viewLevel = $this->Mod_settinghrd->select_by_level($idlevel,$get_id);
		
		 foreach ($viewLevel as $pel1) {
            $row1 = array();
            $row1[] = $pel1->id_submenu;
            $data1[] = $row1;
			 
        $list = $this->Mod_settinghrd->get_pendidikan();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $submenu) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $submenu->pendidikan;
        }
		 }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Mod_settinghrd->count_all_pendidikan(),
            "recordsFiltered" => $this->Mod_settinghrd->count_filtered_pendidikan(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }




    public function viewpegawai()
    {
     $id = $this->input->post('id');
     $data['data_table'] = $this->Mod_pegawai->view_pegawai($id);
    
     $this->load->view('hrd/view', $data);
     
 }

 public function editpegawai($id)
 {
     
    $data = $this->Mod_pegawai->get_pegawai($id);
    echo json_encode($data);
    
}

public function insert()
{
 $this->_validate();
 $save  = array(
    'nama_submenu'	=> $this->input->post('nama_submenu'),
    'link'  	=> $this->input->post('link'),
    'icon'   	=> $this->input->post('icon'),
    'id_menu'  	=> $this->input->post('id_menu'),
    'is_active' => $this->input->post('is_active'),
    'urutan' 	=> $this->input->post('urutan')
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
    $this->Mod_submenu->insert_akses_submenu("tbl_akses_submenu",$data);
}
echo json_encode(array("status" => TRUE));

}

public function update()
{
    
    //$this->_validate();
    $nip = $this->input->post('nip');
    $data  = array(
        
		'nama_depan'	=> $this->input->post('nama_depan'),
        'nama_belakang'	=> $this->input->post('nama_belakang'),
        'departement'	=> $this->input->post('departement'),
        'jabatan'		=> $this->input->post('jabatan'),
        'status_kerja'	=> $this->input->post('status_kerja'),
        'tgl_masuk'		=> $this->input->post('tgl_masuk'),
        'tempat_lahir'	=> $this->input->post('tempat_lahir'),
        'tgl_lahir'		=> $this->input->post('tgl_lahir'),
        'agama'			=> $this->input->post('agama'),
        'status_nikah'	=> $this->input->post('status_nikah'),
        'pendidikan'	=> $this->input->post('pendidikan'),
        'alamat'		=> $this->input->post('alamat'),
        'kodepos'		=> $this->input->post('kodepos'),
        'no_hp'			=> $this->input->post('no_hp'),
        'status_nikah'	=> $this->input->post('status_nikah'),
        'jamsostek'		=> $this->input->post('jamsostek'),
        'tinggi'		=> $this->input->post('tinggi'),
        'berat'			=> $this->input->post('berat'),
        'darah'			=> $this->input->post('darah'),
        's_kawin'		=> $this->input->post('s_kawin'),
        'no_ktp'		=> $this->input->post('no_ktp'),
        'npwp'			=> $this->input->post('npwp'),
        'catatan1'		=> $this->input->post('catatan1')
    );
    $this->Mod_pegawai->updatepegawai($nip, $data);
    echo json_encode(array("status" => TRUE));
    
}
public function delete()
{
    $nip = $this->input->post('nip');
    $this->Mod_pegawai->deletepegawai($nip, 'tbl_pegawai');
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
    foreach($menu as $row)
    {
        $sheet->setCellValue('A'.$x, $no++);
        $sheet->setCellValue('B'.$x, $row->nama_submenu);
        $sheet->setCellValue('C'.$x, $row->link);
        $sheet->setCellValue('D'.$x, $row->icon);
        $sheet->setCellValue('E'.$x, $row->nama_menu);
        $sheet->setCellValue('F'.$x, $row->is_active);
        $x++;
    }
    $writer = new Xlsx($spreadsheet);
    $filename = 'laporan-Submenu';
    
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
    header('Cache-Control: max-age=0');
    
    $writer->save('php://output');
}


private function _validate()
{
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if($this->input->post('nama_submenu') == '')
    {
        $data['inputerror'][] = 'nama_submenu';
        $data['error_string'][] = 'Submenu is required';
        $data['minlength'] = '2';
        $data['status'] = FALSE;
    }

    if($this->input->post('link') == '')
    {
        $data['inputerror'][] = 'link';
        $data['error_string'][] = 'Link is required';
        $data['minlength'] = '2';
        $data['status'] = FALSE;
    }

    if($this->input->post('icon') == '')
    {
        $data['inputerror'][] = 'icon';
        $data['error_string'][] = 'Icon is required';
        $data['minlength'] = '2';
        $data['status'] = FALSE;
    }

    if($this->input->post('is_active') == '')
    {
        $data['inputerror'][] = 'is_active';
        $data['error_string'][] = 'Please select Is Active';
        $data['minlength'] = '2';
        $data['status'] = FALSE;
    }

    if($this->input->post('id_menu') == '')
    {
        $data['inputerror'][] = 'id_menu';
        $data['error_string'][] = 'Please select Menu';
        $data['minlength'] = '2';
        $data['status'] = FALSE;
    }

    if($data['status'] === FALSE)
    {
        echo json_encode($data);
        exit();
    }
}
}