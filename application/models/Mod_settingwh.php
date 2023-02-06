<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_settingwh extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
   
    public function select_satuan() {
		$this->db->select('*');
        $this->db->from('tbl_wh_satuan');
        //$this->db->join('tbl_pendidikan as b','a.pendidikan=b.id_pendidikan');
        //$this->db->join('tbl_supplier as c','a.supplier=c.id_supplier');
        //$this->db->join('tbl_departement as d','a.departement=d.id_departement');
        //$this->db->where('a.nip=',$id);

		$data = $this->db->get();

		return $data->result();
	}
    public function select_id_satuan($id) {
		$sql = " SELECT * FROM tbl_wh_satuan WHERE id_satuan='{$id}'";

		$data = $this->db->query($sql);

		return $data->result();
	}
    public function insertSatuan($data) {
		$sql = "INSERT INTO tbl_wh_satuan VALUES
		('','".$data['kode_satuan']."','".$data['satuan']."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
    public function updateSatuan($data) {
		$sql = "UPDATE tbl_wh_satuan SET kode_satuan='" .$data['kode_satuan'] ."',satuan='" .$data['satuan'] ."'
        WHERE id_satuan='" .$data['id_satuan'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
    //end Satuan//
    
    public function select_kategori() {
		$this->db->select('*');
        $this->db->from('tbl_wh_kategori');
		$data = $this->db->get();
		return $data->result();
	}
    public function select_id_kategori($id) {
		$sql = " SELECT * FROM tbl_wh_kategori WHERE id_kategori='{$id}'";

		$data = $this->db->query($sql);

		return $data->result();
	}
    public function insertKategori($data) {
		$sql = "INSERT INTO tbl_wh_kategori VALUES
		('','".$data['kategori']."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
    public function updateKategori($data) {
		$sql = "UPDATE tbl_wh_kategori SET kategori='" .$data['kategori'] ."'
        WHERE id_kategori='" .$data['id_kategori'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
    
    // End Kategori //
    
	public function select_supplier() {
		$this->db->select('*');
        $this->db->from('tbl_supplier');
        //$this->db->join('tbl_pendidikan as b','a.pendidikan=b.id_pendidikan');
        //$this->db->join('tbl_supplier as c','a.supplier=c.id_supplier');
        //$this->db->join('tbl_departement as d','a.departement=d.id_departement');
        //$this->db->where('a.nip=',$id);

		$data = $this->db->get();

		return $data->result();
	}
    public function select_id_supplier($id) {
		$sql = " SELECT * FROM tbl_supplier WHERE id_supplier='{$id}'";

		$data = $this->db->query($sql);

		return $data->result();
	}
    public function insertSupplier($data) {
		$sql = "INSERT INTO tbl_supplier VALUES
		('','".$data['supplier']."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
    public function updateSupplier($data) {
		$sql = "UPDATE tbl_supplier SET supplier='" .$data['supplier'] ."'
        WHERE id_supplier='" .$data['id_supplier'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
}

/* End of file Mod_pegawai.php */
