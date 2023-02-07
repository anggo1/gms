<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_mesinabsen extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	public function select_mesin() {
		$sql = " SELECT *
		FROM tbl_hrd_mesin";

		$data = $this->db->query($sql);

		return $data->result();
	}
    public function select_id_mesin($id) {
		$sql = " SELECT * FROM tbl_hrd_mesin WHERE id='{$id}'";

		$data = $this->db->query($sql);

		return $data->result();
	}
    public function insertMesin($data) {
		$sql = "INSERT INTO tbl_hrd_mesin VALUES
		('','".$data['pin']."','0','".$data['nama_mesin']."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
    public function updateMesin($data) {
		$sql = "UPDATE tbl_hrd_mesin SET pin='" .$data['pin'] ."', nama_mesin='" .$data['nama_mesin'] ."'
        WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
    function deleteDev($id)
    {
        $sql = "DELETE FROM tbl_hrd_mesin WHERE id='{$id}'";
        
		$this->db->query($sql);

		return $this->db->affected_rows();
    }

}

/* End of file Mod_pegawai.php */