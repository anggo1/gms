<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_prosespk extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function select_pk()
	{
		$this->db->select('*');
		$this->db->from('tbl_br_pk_aktif');
		//$this->db->join('tbl_pendidikan as b','a.pendidikan=b.id_pendidikan');
		//$this->db->join('tbl_supplier as c','a.supplier=c.id_supplier');
		//$this->db->join('tbl_departement as d','a.departement=d.id_departement');
		$this->db->where('status!=','S');

		$data = $this->db->get();

		return $data->result();
	}	
	public function insertLapor($data)
	{
		$sql = "INSERT INTO tbl_br_ket_lapor VALUES
		('','" . $data['kode'] . "','" . $data['keterangan'] . "')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	public function pausepk($data)
	{
        $date = date("Y-m-d");
        $jam = date("H:i:s");
		$sql = "UPDATE tbl_br_pk_aktif SET status='P',ket_pause='" . $data['ket_pause'] . "',jam_pause='" .$jam. "',tgl_pause='" .$date. "'
        WHERE id_pk='" . $data['id_pk'] . "'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	function startPk($id)
	{
		$date = date("Y-m-d");
        $jam = date("H:i:s");
		$sql = "UPDATE tbl_br_pk_aktif SET status='Y',jam_start='" .$jam. "',tgl_start='" .$date. "'
        WHERE id_pk='" . $id . "'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	function pkSelesai($id)
	{
		$date = date("Y-m-d");
        $jam = date("H:i:s");
		$sql = "UPDATE tbl_br_pk_aktif SET status='S',jam_selesai='" .$jam. "',tgl_selesai='" .$date. "'
        WHERE id_pk='" . $id . "'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	//end Satuan//
	function cetak_masuk($id)
    {
        $this->db->select('a.*,b.*,c.kategori,d.keterangan as ket_lapor');
        $this->db->from('tbl_br_laporan_bus as a');
        $this->db->join('tbl_br_detail_estimasi as b', 'b.id_lapor=a.id_lapor', 'left');
        $this->db->join('tbl_br_kategori as c', 'c.id_kategori=a.kategori', 'left');
        $this->db->join('tbl_br_ket_lapor as d', 'd.id=a.ket_lapor', 'left');
        $this->db->where('a.id_lapor', $id);
        return $this->db->get('tbl_br_laporan_bus')->result();
		//return $data->result();
    }
	function cetak_estimasi($id)
    {
		$sql = "SELECT a.*,b.keterangan as ket_pk FROM tbl_br_detail_estimasi as a
		LEFT JOIN tbl_br_kat_pk as b ON b.kode=a.jns_pk WHERE a.id_lapor = '{$id}'";

		$data = $this->db->query($sql);

		return $data->result();
    }
	function cetak_pk($id)
    {
		$sql = "SELECT * FROM tbl_br_pk_aktif AS a LEFT JOIN tbl_br_laporan_bus AS b ON b.id_lapor=a.id_lapor WHERE a.id_pk ='{$id}'";

		$data = $this->db->query($sql);

		return $data->result();
    }
	//** end Keterangan PK **//

}
