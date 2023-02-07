<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_settinghrd extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
   function get_all_jabatan(){
		$hsl=$this->db->query("select * from tbl_hrd_jabatan");
		return $hsl;
	}
	function get_jabatan_by_id($jabatan){
		$hsl=$this->db->query("select * from tbl_hrd_jabatan where id_jabatan='$jabatan'");
		return $hsl;
	}
	public function select_jabatan() {
		$sql = " SELECT *
		FROM tbl_hrd_jabatan";

		$data = $this->db->query($sql);

		return $data->result();
	}
    public function select_id_jabatan($id) {
		$sql = " SELECT * FROM tbl_hrd_jabatan WHERE id_jabatan='{$id}'";

		$data = $this->db->query($sql);

		return $data->result();
	}
    public function insertJabatan($data) {
		$sql = "INSERT INTO tbl_hrd_jabatan VALUES
		('','".$data['jabatan']."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
    public function updateJabatan($data) {
		$sql = "UPDATE tbl_hrd_jabatan SET jabatan='" .$data['jabatan'] ."'
        WHERE id_jabatan='" .$data['id_jabatan'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
    function deleteJab($id)
    {
        $sql = "DELETE FROM tbl_hrd_jabatan WHERE id_jabatan='{$id}'";
        
		$this->db->query($sql);

		return $this->db->affected_rows();
    }
    //end jabatan//
    
    public function select_id_pendidikan($id) {
		$sql = " SELECT * FROM tbl_hrd_pendidikan WHERE id_pendidikan='{$id}'";

		$data = $this->db->query($sql);

		return $data->result();
	}
    
    public function select_pendidikan() {
		$sql = " SELECT *
		FROM tbl_hrd_pendidikan";

		$data = $this->db->query($sql);

		return $data->result();
	}
    public function insertPendidikan($data) {
		$sql = "INSERT INTO tbl_hrd_pendidikan VALUES
		('','".$data['pendidikan']."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
    public function updatePendidikan($data) {
		$sql = "UPDATE tbl_hrd_pendidikan SET pendidikan='" .$data['pendidikan'] ."'
        WHERE id_pendidikan='" .$data['id_pendidikan'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
    function deletePend($id)
    {
        $sql = "DELETE FROM tbl_hrd_pendidikan WHERE id_pendidikan='{$id}'";
        
		$this->db->query($sql);

		return $this->db->affected_rows();
    }
    // end Pendidikan //
    
     public function select_id_departement($id) {
		$sql = " SELECT * FROM tbl_hrd_departement WHERE id_departement='{$id}'";

		$data = $this->db->query($sql);

		return $data->result();
	}
     public function insertDepartement($data) {
		$sql = "INSERT INTO tbl_hrd_departement VALUES
		('','".$data['departement']."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
    public function updateDepartement($data) {
		$sql = "UPDATE tbl_hrd_departement SET departement='" .$data['departement'] ."'
        WHERE id_departement='" .$data['id_departement'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
    public function select_departement() {
		$sql = " SELECT * 
		FROM tbl_hrd_departement";
		$data = $this->db->query($sql);

		return $data->result();
	}
    function deleteDep($id)
    {
        $sql = "DELETE FROM tbl_hrd_departement WHERE id_departement='{$id}'";
        
		$this->db->query($sql);

		return $this->db->affected_rows();
    }
	public function select_total_departement() {
		$sql = " SELECT COUNT(*) TotalCount, 
		tbl_departement.id_departement,tbl_departement.departement 
		FROM tbl_departement 
		INNER JOIN tbl_pegawai ON tbl_pegawai.departement = tbl_departement.id_departement 
		GROUP BY tbl_departement.id_departement, tbl_departement.departement;";
		$data = $this->db->query($sql);

		return $data->result();
	}
    

    public function get_by_nama($link)
    {
		$this->db->select('id_submenu');
        $this->db->from('tbl_submenu');
        $this->db->where('link',$link);
        $query = $this->db->get();
        return $query->row();
    }
    function getAll()
    {
        $this->db->select('tbl_pegawai');
        //$this->db->join('tbl_menu b','a.id_menu=b.id_menu');
       return $this->db->get('tbl_pegawai a');
    }
	function select_by_level($idlevel,$get_id) {
		$this->db->select('*');
        $this->db->from('tbl_akses_submenu');
        //$this->db->join('tbl_akses_submenu','tbl_akses_submenu.id_submenu=tbl_akses_menu.id_menu','inner');
        $this->db->where('tbl_akses_submenu.id_level=1');
        $this->db->where('tbl_akses_submenu.id_submenu=42');

		$data = $this->db->get();

		return $data->result();
	}
    
    function view_pegawai($id)
    {	
    	$this->db->select('a.*,b.pendidikan,c.jabatan,d.departement');
        $this->db->from('tbl_pegawai as a');
        $this->db->join('tbl_pendidikan as b','a.pendidikan=b.id_pendidikan');
        $this->db->join('tbl_jabatan as c','a.jabatan=c.id_jabatan');
        $this->db->join('tbl_departement as d','a.departement=d.id_departement');
        $this->db->where('a.nip=',$id);

		$data = $this->db->get();

		return $data->result();
    }

    function get_pegawai($id)
    {   
        $this->db->where('nip',$id);
        return $this->db->get('tbl_pegawai')->row();
    }

    function edit_submenu($id)
    {	
    	$this->db->where('nip',$id);
    	return $this->db->get('tbl_pegawai');
    }

    function insertsubmenu($tabel, $data)
    {
        $insert = $this->db->insert($tabel, $data);
        return $insert;
    }

    function insert_akses_submenu($tbl_akses_submenu, $data)
    {
        $insert = $this->db->insert($tbl_akses_submenu, $data);
        return $insert;
    }

    function updatepegawai($nip, $data)
    {
        $this->db->where('nip', $nip);
        $this->db->update('tbl_pegawai', $data);
    }
    function getImage($nip)
    {
        $this->db->select('image');
        $this->db->from('tbl_pegawai');
        $this->db->where('nip', $nip);
        return $this->db->get();
    }
    function deletepegawai($id, $table)
    {
        $this->db->where('nip', $id);
        $this->db->delete($table);
    }

}

/* End of file Mod_pegawai.php */