<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_display extends CI_Model {
    function Aplikasi()
    {
        return $this->db->get('aplikasi');
    }

    function Auth($username, $password)
    {

        //menggunakan active record . untuk menghindari sql injection
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        $this->db->where("is_active", 'Y');
        return $this->db->get("tbl_user");    
    }

    function check_db($username)
    {
        return $this->db->get_where('tbl_user', array('username' => $username));
    }
    public function select_antri()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date("Y-m-d");
        $sql = "SELECT * FROM tbl_br_bast WHERE status ='N'";

        $data = $this->db->query($sql);
        return $data->result();
        
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
    public function select_pk_selesai()
	{
		$this->db->select('*');
		$this->db->from('tbl_br_pk_aktif');
		//$this->db->join('tbl_pendidikan as b','a.pendidikan=b.id_pendidikan');
		//$this->db->join('tbl_supplier as c','a.supplier=c.id_supplier');
		//$this->db->join('tbl_departement as d','a.departement=d.id_departement');
		$this->db->where('status=','S');

		$data = $this->db->get();

		return $data->result();
	}
    public function select_bay1()
	{
		$this->db->select('*');
		$this->db->from('tbl_br_pk_aktif');
		//$this->db->join('tbl_pendidikan as b','a.pendidikan=b.id_pendidikan');
		//$this->db->join('tbl_supplier as c','a.supplier=c.id_supplier');
		//$this->db->join('tbl_departement as d','a.departement=d.id_departement');
		$this->db->where('status=','S');

		$data = $this->db->get();

		return $data->result();
	}


}

/* End of file Mod_login.php */
