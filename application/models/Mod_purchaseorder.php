<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_purchaseorder extends CI_Model
{
    var $table = 'tbl_wh_barang';
    var $column_search = array('a.no_part','a.nama_part','a.stok','a.lokasi','a.satuan','a.type','a.kategori','a.kelompok');
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
        $this->db->join('tbl_wh_satuan as c','c.id_satuan=a.satuan', 'left');
        $this->db->join('tbl_wh_type_mesin as d','d.id_type=a.type','left');
        $this->db->join('tbl_wh_kelompok as e','e.id_kelompok=a.kelompok','left');
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
        $this->db->join('tbl_wh_satuan as c','c.id_satuan=a.satuan', 'left');
        $this->db->join('tbl_wh_type_mesin as d','d.id_type=a.type', 'left');
        $this->db->join('tbl_wh_kelompok as e','e.id_kelompok=a.kelompok','left');
        $this->db->join('tbl_wh_supplier as f','f.id_supplier=a.supplier','left');
        $this->db->where('a.id_barang',$id);
        return $this->db->get('tbl_wh_barang')->row();
    }
    public function select_kode_cuti()
    {
        $sql    = "SELECT * FROM tbl_hrd_kodecuti";
        $data = $this->db->query($sql);


        return $data->result();
    }
    public function deleteCuti($id)
    {
        $sql = "DELETE FROM tbl_hrd_cuti_pegawai WHERE id_cuti='" . $id . "'";

        $this->db->query($sql);

        return $this->db->affected_rows();
    }
    public function insert_part($data)
    {
        $id = md5(DATE('ymdhms') . rand());

        $date = $data['date1'];
        $tgl1 = explode('-', $date);
        $tgl_masuk = $tgl1[2] . "-" . $tgl1[1] . "-" . $tgl1[0] . "";
        $jml_part=$data['jumlah'];
        $stok_awal=$data['stok_awal'];
        $jml_a=$data['stok_a'];
        $jml_p=$data['stok_p'];
        
        $status_barang = $data['status_part'];
        if($status_barang=="AKTIF"){
            $stok   =$stok_awal + $jml_part;
            $stok_a =$jml_a + $jml_part;
            $sql_stok = "UPDATE tbl_wh_barang SET
            stok      ='$stok',
            stok_a    ='$stok_a'
            WHERE id_barang='".$data['id_barang']."'";
            $this->db->query($sql_stok);
        }
        if($status_barang=="PASIF"){
            $stok   =$stok_awal + $jml_part;
            $stok_p =$jml_p + $jml_part;
            $sql_stok = "UPDATE tbl_wh_barang SET
            stok      ='$stok',
            stok_p    ='$stok_p'
            WHERE id_barang='".$data['id_barang']."'";
        $this->db->query($sql_stok);
        }
        
        $sql = "INSERT INTO tbl_wh_part_masuk SET
        id_masuk    ='',
        id_barang   ='".$data['id_barang']."',
        no_part     ='".$data['no_part']."',
        status_po   ='".$data['status_po']."',
        no_po       ='".$data['no_po']."',
        tgl_masuk   ='$tgl_masuk',
        jumlah      ='".$data['jumlah']."',
        status_part ='".$data['status_part']."',
        user        ='".$data['user']."'";


        $this->db->query($sql);

        return $this->db->affected_rows();
    }
}
