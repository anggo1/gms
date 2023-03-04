<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_busmasuk extends CI_Model
{
	var $table = 'tbl_br_laporan_bus';
	var $column_search = array('a.tgl_masuk','a.jam_masuk','a.nobody','a.no_pol','a.nip_sp','a.nama_sp','b.kategori','c.kode','a.keterangan'); 
	var $column_order = array('a.tgl_masuk','a.jam_masuk','a.nobody','a.no_pol','a.nip_sp','a.nama_sp','b.kategori','c.kode','a.keterangan');
	var $order = array('no_body' => 'desc'); 
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

		private function _get_datatables_query()
	{
		
		$this->db->select('a.*,b.kategori,c.kode');
        $this->db->from('tbl_br_laporan_bus as a');
        $this->db->join('tbl_br_kategori as b', 'b.id_kategori=a.kategori', 'left');
        $this->db->join('tbl_br_ket_lapor as c','c.id=a.ket_lapor', 'left');
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
		$this->db->from('tbl_br_laporan_bus');
		return $this->db->count_all_results();
	}
	function get_part($id)
    {
        $this->db->select('a.*,b.kategori,c.satuan,d.type_mesin,e.kelompok,f.nama_sup');
        $this->db->from('tbl_wh_barang as a');
        $this->db->join('tbl_wh_kategori as b', 'b.id_kategori=a.kategori', 'left');
        $this->db->join('tbl_wh_satuan as c', 'c.id_satuan=a.satuan', 'left');
        $this->db->join('tbl_wh_type_mesin as d', 'd.id_type=a.type', 'left');
        $this->db->join('tbl_wh_kelompok as e', 'e.id_kelompok=a.kelompok', 'left');
        $this->db->join('tbl_wh_supplier as f', 'f.id_supplier=a.supplier', 'left');
        $this->db->where('a.id_barang', $id);
        return $this->db->get('tbl_wh_barang')->row();
    }
	public function select_laporan()
	{
		$this->db->select('*');
		$this->db->from('tbl_br_ket_lapor');
		//$this->db->join('tbl_pendidikan as b','a.pendidikan=b.id_pendidikan');
		//$this->db->join('tbl_supplier as c','a.supplier=c.id_supplier');
		//$this->db->join('tbl_departement as d','a.departement=d.id_departement');
		//$this->db->where('a.nip=',$id);

		$data = $this->db->get();

		return $data->result();
	}
	public function select_kategori()
	{
		$this->db->select('*');
		$this->db->from('tbl_br_kategori');
		$data = $this->db->get();
		return $data->result();
	}

	// End Kategori //
	function select_estimasi($id)
		{
			$sql = "SELECT * FROM tbl_br_detail_estimasi WHERE id_lapor ='{$id}'";
	
			$data = $this->db->query($sql);
			return $data->result();
			//return $data->row();
		}
		function select_proses_pk($id)
		{
			$sql = "SELECT * FROM tbl_br_detail_estimasi WHERE id_lapor ='{$id}' GROUP BY jns_pk";
	
			$data = $this->db->query($sql);
			return $data->result();
			//return $data->row();
		}
		function cari_pk($id,$kode)
		{
			$sql = "SELECT * FROM tbl_br_detail_estimasi as a 
			LEFT JOIN tbl_br_kat_pk as b on b.kode=a.jns_pk  WHERE id_lapor ='{$id}' AND jns_pk ='{$kode}' GROUP BY jns_pk";
	
			$data = $this->db->query($sql);
			return $data->result();
			//return $data->row();
		}
	public function select_pk()
	{
		$this->db->select('*');
		$this->db->from('tbl_br_kat_pk');
		$data = $this->db->get();
		return $data->result();
	}
	public function insertLaporan($data)
    {
        $date= date("Ymd");
        $ci = get_instance();
        $qdata = "SELECT max(id_lapor) as maxKode FROM tbl_br_laporan_bus WHERE id_lapor LIKE '%$date%'";
        $dataQ = $ci->db->query($qdata)->row_array();
        $noOrder = $dataQ['maxKode'];
        $noUrut = (int) substr($noOrder, 10, 3);
        $noUrut++;
        $char = "LP";
        $tahun=substr($date, 0, 4);
        $bulan=substr($date, 4, 2);
        $tgl=substr($date, 6, 2);
        $kodeBaru  = $char.$tahun.$bulan.$tgl. sprintf("%03s", $noUrut);

        $date2 = $data['tgl_masuk'];
		$tgl2 = explode('-',$date2);
		$tgl_masuk = $tgl2[2]."-".$tgl2[1]."-".$tgl2[0]."";
        
       
        $sql = "INSERT INTO tbl_br_laporan_bus SET
            id_lapor	='".$kodeBaru."',
            tgl_masuk   ='".$tgl_masuk."',
            jam_masuk	='".$data['jam_masuk']."',
            no_body		='".$data['no_body']."',
            no_pol      ='".$data['no_pol']."',
            nip_sp      ='".$data['nip_sp']."',
            nama_sp     ='".$data['nama_sp']."',
            ket_lapor   ='".$data['ket_lapor']."',
            kategori    ='".$data['kategori']."',
            keterangan  ='".$data['keterangan']."',
            status_body ='".$data['status_body']."',
            user        ='".$data['user']."',
            status      ='N'";

            $this->db->query($sql);
    
            return $this->db->affected_rows();
    }
	public function insertEstimasi($data)
    {
        $date2 = $data['tgl_estimasi'];
		$tgl2 = explode('-',$date2);
		$tgl_estimasi = $tgl2[2]."-".$tgl2[1]."-".$tgl2[0]."";
		$idUpdate = $data['id_lapor'];

		$sql_update = "UPDATE tbl_br_laporan_bus SET estimasi ='Y' WHERE id_lapor ='{$idUpdate}'"; $this->db->query($sql_update);

        $sql = "INSERT INTO tbl_br_detail_estimasi SET
            id_detail	='',
            id_lapor	='".$data['id_lapor']."',
            tgl_estimasi='".$tgl_estimasi."',
            no_body		='".$data['body_pk']."',
            acc			='".$data['acc']."',
            jns_pk		='".$data['jns_pk']."',
            no_part     ='".$data['no_part']."',
            nama_part   ='".$data['nama_part']."',
            ket_part    ='".$data['ket_part']."',
            jml_part  	='".$data['jml_part']."',
            hrg_part  	='".$data['hrg_awal']."',
            user        ='".$data['user']."'";

            $this->db->query($sql);
    
            return $this->db->affected_rows();
    }
	function deleteLapor($id)
    {
        $sql = "DELETE FROM tbl_br_laporan_bus WHERE id_lapor='{$id}'";

		$this->db->query($sql);

		return $this->db->affected_rows();
    }
	function deleteEstimasi($id)
    {
        $sql = "DELETE FROM tbl_br_detail_estimasi WHERE id_detail='{$id}'";

		$this->db->query($sql);

		return $this->db->affected_rows();
    }
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

	public function insertPk($data)
    {
        $date= date("Ymd");
        $ci = get_instance();
        $qdata = "SELECT max(id_pk) as maxKode FROM tbl_br_pk_aktif WHERE id_pk LIKE '%$date%'";
        $dataQ = $ci->db->query($qdata)->row_array();
        $noOrder = $dataQ['maxKode'];
        $noUrut = (int) substr($noOrder, 10, 3);
        $noUrut++;
        $char = "PK";
        $tahun=substr($date, 0, 4);
        $bulan=substr($date, 4, 2);
        $tgl=substr($date, 6, 2);
        $kodeBaru  = $char.$tahun.$bulan.$tgl. sprintf("%03s", $noUrut);

        $date2 = $data['tgl_mulai'];
		$tgl2 = explode('-',$date2);
		$tgl_mulai = $tgl2[2]."-".$tgl2[1]."-".$tgl2[0]."";
        
       
        $sql = "INSERT INTO tbl_br_pk_aktif SET
            id_pk	='".$kodeBaru."',
            id_lapor	='".$data['id_lapor']."',
            tgl_mulai  ='".$tgl_mulai."',
            jam_mulai	='".$data['jam_mulai']."',
            no_body		='".$data['no_body']."',
            jns_pk      ='".$data['jns_pk']."',
            ket_pk      ='".$data['ket_pk']."',
            status     ='Y',
            pt_pemborong   ='".$data['pt_pemborong']."',
            pj_borong    ='".$data['pj_borong']."'";

            $this->db->query($sql);
    
            return $this->db->affected_rows();
    }
	function select_pk_mulai($id)
		{
			$sql = "SELECT * FROM tbl_br_pk_aktif WHERE id_lapor ='{$id}'";
	
			$data = $this->db->query($sql);
			return $data->result();
			//return $data->row();
		}
}