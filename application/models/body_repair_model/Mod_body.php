<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_body extends CI_Model
{
	var $table = 'body_detail';
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
		
		$this->db->from('body_detail');
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
		$this->db->from('body_detail');
		return $this->db->count_all_results();
	}
	function select_by_level($idlevel) {
		$this->db->select('tbl_akses_submenu.*', FALSE);
		$this->db->from('tbl_akses_submenu');
        $this->db->where('tbl_akses_submenu.id_level=',$idlevel);

		$data = $this->db->get();

		return $data->result();
	}
	function insert_bus($table, $data)
    {
        $insert = $this->db->insert($table, $data);
        return $insert;
    }

        function update_bus($no_body, $data)
    {
        $this->db->where('no_body', $no_body);
        $this->db->update('body_detail', $data);
    }

        function get_bus($no_body)
    {   
        $this->db->where('no_body',$no_body);
        return $this->db->get('body_detail')->row();
    }

        function delete_bus($no_body, $table)
    {
        $this->db->where('no_body', $no_body);
        $this->db->delete($table);
    }

}