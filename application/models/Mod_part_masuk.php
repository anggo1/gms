<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_part_masuk extends CI_Model
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
    public function select_kode_cuti()
    {
        $sql    = "SELECT * FROM tbl_hrd_kodecuti";
        $data = $this->db->query($sql);


        return $data->result();
    }
    public function select_all()
    {
        $this->db->select('pegawai.*', TRUE);
        $this->db->select('posisi.*', FALSE);
        $this->db->select('departement.*', FALSE);
        $this->db->select('penempatan.*', FALSE);
        $this->db->from('pegawai');
        $this->db->join('posisi', 'posisi.id_posisi = pegawai.posisi', 'left');
        $this->db->join('departement', 'departement.id_departement = pegawai.departement', 'left');
        $this->db->join('penempatan', 'penempatan.id_penempatan = pegawai.penempatan', 'left');
        //$this->db->where('status=','AKTIF');
        $query_result = $this->db->get();
        return $data = $query_result->result();
    }
    public function deleteCuti($id)
    {
        $sql = "DELETE FROM tbl_hrd_cuti_pegawai WHERE id_cuti='" . $id . "'";

        $this->db->query($sql);

        return $this->db->affected_rows();
    }
    public function insert_cutiPegawai($data)
    {
        $id = md5(DATE('ymdhms') . rand());

        $date = $data['date1'];
        $tgl1 = explode('-', $date);
        $tgl_cuti = $tgl1[2] . "-" . $tgl1[1] . "-" . $tgl1[0] . "";

        $sql = "INSERT INTO tbl_hrd_cuti_pegawai (id_cuti,nip,tgl_cuti,status_cuti,alasan) 
		VALUES('',
		'" . $data['nip'] . "',
		'$tgl_cuti',
		'" . $data['kode'] . "',
		'" . $data['alasan'] . "'
		)";


        $this->db->query($sql);

        return $this->db->affected_rows();
    }
    public function cari_cuti($date = null, $date2 = null)
    {
        $this->db->select('a.*,b.nip,b.nama_depan,d.departement');
        $this->db->from('tbl_hrd_cuti_pegawai as a');
        $this->db->join('tbl_pegawai as b', 'a.nip=b.nip');
        $this->db->join('tbl_hrd_departement as d', 'b.departement=d.id_departement');
        $this->db->where('a.tgl_cuti BETWEEN "' . date($date) . '"AND"' . date($date2) . '"');
        //$this->db->group_by('data_selesai_kirim.id_kirim');
        $query_result = $this->db->get();
        return $data = $query_result->result();
    }
}
