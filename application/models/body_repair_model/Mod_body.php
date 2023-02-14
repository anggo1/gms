<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_body extends CI_Model
{
	var $table = 'tbl_wh_body';
	var $column_search = array('no_body','type','thn_rangka','thn_pembuatan','karoseri','warna','kelas','strip','keterangan'); 
	var $column_order = array('no_body','type','thn_rangka','thn_pembuatan','karoseri','warna','kelas','strip','keterangan');
	var $order = array('no_body' => 'desc'); 
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

		private function _get_datatables_query()
	{
		
		$this->db->from('tbl_wh_body');
		$i = 0;

	foreach ($this->column_search as $item) // loop column 
	{
	if($_POST['search']['value']) // if datatable send POST for search
	{

	if($i===0) // first loop
	{
	$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
	$this->db->like($item, $_POST['search']['value']);
	}
	else
	{
		$this->db->or_like($item, $_POST['search']['value']);
		$this->db->or_like($item, $_POST['search']['value']);
	} 

		if(count($this->column_search) - 1 == $i) //last loop
		$this->db->group_end(); //close bracket
	}
	$i++;
	}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	function count_all()
	{
		$this->db->from('tbl_wh_body');
		return $this->db->count_all_results();
	}
	
	public function get_by_nama($link)
    {
        $this->db->select('id_submenu');
        $this->db->from('tbl_submenu');
        $this->db->where('link', $link);
        $query = $this->db->get();
        return $query->result();
    }
    function select_by_level($idlevel, $id_sub)
    {
        $this->db->select('*');
        $this->db->from('tbl_akses_submenu');
        //$this->db->join('tbl_akses_submenu','tbl_akses_submenu.id_submenu=tbl_akses_menu.id_menu','inner');
        $this->db->where('tbl_akses_submenu.id_level=',$idlevel);
        $this->db->where('tbl_akses_submenu.id_submenu=',$id_sub);
        $data = $this->db->get();
        return $data->result();
    }
	function select_by_id_body($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_wh_body');
        $this->db->where('tbl_wh_body.no_body=',$id);
        $data = $this->db->get();
        return $data->result();
    }
	function insertBody($data)
    {
        $sql = "INSERT INTO tbl_wh_body SET
        no_body		='".$data['no_body']."',
        type 		='".$data['type']."',
        thn_rangka  ='".$data['thn_rangka']."',
        thn_pembuatn='".$data['thn_pembuatan']."',
        karoseri    ='".$data['karoseri']."',
        warna		='".$data['warna']."',
        kelas	    ='".$data['kelas']."',
        strip       ='".$data['strip']."',
        keterangan  ='".$data['keterangan']."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
    }
    function updateBody( $data)
    {
        $sql = "UPDATE tbl_wh_body SET
        type 		='".$data['type']."',
        thn_rangka  ='".$data['thn_rangka']."',
        thn_pembuatan='".$data['thn_pembuatan']."',
        karoseri    ='".$data['karoseri']."',
        warna		='".$data['warna']."',
        kelas	    ='".$data['kelas']."',
        strip       ='".$data['strip']."',
        keterangan  ='".$data['keterangan']."'
        WHERE no_body='".$data['no_body']."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
    }

        function get_bus($no_body)
    {   
        $this->db->where('no_body',$no_body);
        return $this->db->get('tbl_wh_body')->row();
    }

	function deleteBody($id)
    {
        $sql = "DELETE FROM tbl_wh_body WHERE no_body='{$id}'";

		$this->db->query($sql);

		return $this->db->affected_rows();
    }
	public function select_kodeBody($kode) {
        $query= $this->db->get_where('tbl_wh_body',array('no_body'=>$kode));
        return $query;
	}

}