<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_part_keluar extends CI_Model
{
    var $table = 'tbl_wh_barang';
    var $column_search = array('a.no_part', 'a.nama_part', 'a.stok', 'a.lokasi', 'a.satuan', 'a.type', 'a.kategori', 'a.kelompok');
    var $column_order = array('');
    var $order = array('id_barang' => 'desc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    private function _get_datatables_query($term = '')
    {

        $this->db->select('a.*,b.kategori,c.satuan,d.type_mesin,e.kelompok');
        $this->db->from('tbl_wh_barang as a');
        $this->db->join('tbl_wh_kategori as b', 'b.id_kategori=a.kategori', 'left');
        $this->db->join('tbl_wh_satuan as c', 'c.id_satuan=a.satuan', 'left');
        $this->db->join('tbl_wh_type_mesin as d', 'd.id_type=a.type', 'left');
        $this->db->join('tbl_wh_kelompok as e', 'e.id_kelompok=a.kelompok', 'left');
        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $term = $_REQUEST['search']['value'];
        $this->_get_datatables_query($term);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $term = $_REQUEST['search']['value'];
        $this->_get_datatables_query($term);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {

        $this->db->from('tbl_wh_barang as a');
        //$this->db->join('tbl_menu as b','a.id_menu=b.id_menu');
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
    public function select_supplier()
    {
        $sql = " SELECT * FROM tbl_wh_supplier";

        $data = $this->db->query($sql);

        return $data->result();
    }
    public function deleteDetail_keluar($id,$stok,$status,$kodePart)
    {
        $ci = get_instance();
        $query = "SELECT stok,stok_a,stok_p FROM tbl_wh_barang WHERE no_part='{$kodePart}'";
        $d_data = $ci->db->query($query)->row_array();
        $stok_awal       = $d_data['stok'];
        $stok_a1       = $d_data['stok_a'];
        $stok_p1       = $d_data['stok_p'];
        $stok_update = $stok+$stok_awal;
        $statusnye = "";
        if($status=='AKTIF'){
            $statusnye = $stok+$stok_a1;
            $sql_update = "UPDATE tbl_wh_barang SET stok ='$stok_update', stok_a ='$statusnye' WHERE no_part ='{$kodePart}'"; $this->db->query($sql_update);
        }
        if($status=='PASIF'){
            $statusnye = $stok+$stok_p1;
            $sql_update = "UPDATE tbl_wh_barang SET stok ='$stok_update', stok_p ='$statusnye' WHERE no_part ='{$kodePart}'"; $this->db->query($sql_update);
        }

        $sql = "DELETE FROM tbl_wh_detail_part_keluar WHERE id_detail='" . $id . "'";

        $this->db->query($sql);

        return $this->db->affected_rows();
    }
    public function insertDetail($kodeKeluar, $data)
    {
        $kodenya = "";
        if (empty($data['id_keluar'])) {
            $kodenya = $kodeKeluar;
        } else {
            $kodenya = $data['id_keluar'];
        }
        $total_harga = $data['hrg_awal'] * $data['jumlah'];

        $ci = get_instance();
        $kodePart   = $data['no_part'];
        $query = "SELECT stok,stok_a,stok_p FROM tbl_wh_barang WHERE no_part='{$kodePart}'";
        $d_data = $ci->db->query($query)->row_array();
        $stok       = $d_data['stok'];
        $stok_a       = $d_data['stok_a'];
        $stok_p       = $d_data['stok_p'];
        $stok_update = $stok - $data['jumlah'];
        $statusnye = "";
        if($data['status_part']=='AKTIF'){
            $statusnye = $stok_a-$data['jumlah'];
            $sql_update = "UPDATE tbl_wh_barang SET stok ='$stok_update', stok_a ='$statusnye ' WHERE no_part ='{$kodePart}'"; $this->db->query($sql_update);
        }
        if($data['status_part']=='PASIF'){
            $statusnye = $stok_p-$data['jumlah'];
            $sql_update = "UPDATE tbl_wh_barang SET stok ='$stok_update', stok_p ='$statusnye ' WHERE no_part ='{$kodePart}'"; $this->db->query($sql_update);
        }
        


        $sql = "INSERT INTO tbl_wh_detail_part_keluar SET
            id_detail       ='',
            id_keluar           ='" . $kodenya . "',
            no_part         ='" . $data['no_part'] . "',
            nama_part       ='" . $data['nama_part'] . "',
            supplier        ='" . $data['nama_part'] . "',
            status_part     ='" . $data['status_part'] . "',
            harga           ='" . $data['hrg_awal'] . "',
            jumlah          ='" . $data['jumlah'] . "',
            total_harga     ='$total_harga',
            ket_part     ='$data['keterangan']'";
        $this->db->query($sql);

        return $this->db->affected_rows();
    }
    public function select_by_id($id)
    {
        $sql = "SELECT * FROM tbl_wh_part_keluar WHERE id_keluar ='{$id}'";

        $data = $this->db->query($sql);
        return $data->result();
        //return $data->row();
    }
    public function select_detail($id)
    {
        $sql = "SELECT * FROM tbl_wh_detail_part_keluar WHERE id_keluar ='{$id}'";

        $data = $this->db->query($sql);
        return $data->result();
        //return $data->row();
    }
}
