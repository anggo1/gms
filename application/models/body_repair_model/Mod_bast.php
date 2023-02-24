<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_bast extends CI_Model
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
    public function deleteDetail_po($id)
    {
        $sql = "DELETE FROM tbl_wh_detail_po WHERE id_detail='". $id. "'";

        $this->db->query($sql);

        return $this->db->affected_rows();
    }
    public function insertBast($data)
    {
        $date= date("Ymd");
        $ci = get_instance();
        $qdata = "SELECT max(id_bast) as maxKode FROM tbl_br_bast WHERE id_bast LIKE '%$date%'";
        $dataQ = $ci->db->query($qdata)->row_array();
        $noOrder = $dataQ['maxKode'];
        $noUrut = (int) substr($noOrder, 10, 3);
        $noUrut++;
        $char = "BS";
        $tahun=substr($date, 0, 4);
        $bulan=substr($date, 4, 2);
        $tgl=substr($date, 6, 2);
        $kodeBaru  = $char.$tahun.$bulan.$tgl. sprintf("%03s", $noUrut);

        $date2 = $data['tgl_bast'];
		$tgl2 = explode('-',$date2);
		$tgl_bast = $tgl2[2]."-".$tgl2[1]."-".$tgl2[0]."";
        $lb_kanan="";
        if (!empty($lb_kanan)){
            $lb_kanan=$data['lb_kn'];
        }else{
            $lb_kanan='0';
        }

        $sql = "INSERT INTO tbl_br_bast SET
            id_bast         ='".$kodeBaru."',
            tgl_bast        ='".$tgl_bast."',
            no_sj           ='".$data['no_sj']."',
            no_body         ='".$data['no_body']."',
            no_pol          ='".$data['no_pol']."',
            nip_sp          ='".$data['nip_sp']."',
            nama_sp         ='".$data['nama_sp']."',
            kaca_depan      ='".$data['kaca_depan']."',
            kaca_belakang   ='".$data['kaca_belakang']."',
            spion           ='".$data['spion']."',
            solar           ='".$data['solar']."',
            seat            ='".$data['seat']."',
            ac              ='".$data['ac']."',
            lb_kn           ='$lb_kanan',
            lb_kr           ='".$data['lb_kr']."',
            ban_serep       ='".$data['ban_serep']."',
            stnk            ='".$data['stnk']."',
            sign_kn         ='".$data['sign_kn']."',
            sign_kr         ='".$data['sign_kr']."',
            kc_roda         ='".$data['kc_roda']."',
            kps             ='".$data['kps']."',
            lmp_rem_kn      ='".$data['lmp_rem_kn']."',
            lmp_rem_kr      ='".$data['lmp_rem_kr']."',
            dongkrak        ='".$data['dongkrak']."',
            keur            ='".$data['keur']."',
            lmp_kota_kn     ='".$data['lmp_kota_kn']."',
            lmp_kota_kr      ='".$data['lmp_kota_kr']."',
            video           ='".$data['video']."',
            buku_jr         ='".$data['buku_jr']."',
            spion_kn        ='".$data['spion_kn']."',
            spion_kr        ='".$data['spion_kr']."',
            tv              ='".$data['tv']."',
            siu             ='".$data['siu']."',
            tape            ='".$data['tape']."',
            kc_kontak       ='".$data['kc_kontak']."',
            keterangan      ='".$data['keterangan']."',
            status_bus      ='".$data['status_bus']."',
            user            ='".$data['user']."'";

            $this->db->query($sql);
    
            return $this->db->affected_rows();
    }
    public function select_by_id($id)
    {
        $sql = "SELECT * FROM tbl_wh_po LEFT JOIN tbl_wh_supplier ON tbl_wh_supplier.id_supplier=tbl_wh_po.supplier
        WHERE id_po ='{$id}'";

        $data = $this->db->query($sql);
        return $data->result();
        //return $data->row();
    }
    public function select_detail($id)
    {
        $ci = get_instance();
        $query = "SELECT sum(total_harga) as total,b.ppn FROM tbl_wh_detail_po as a 
                    LEFT JOIN tbl_wh_po as b ON b.id_po=a.id_po
                    WHERE a.id_po='{$id}'";
        $d_data = $ci->db->query($query)->row_array();
        $total       = $d_data['total'];
        $ppn       = $d_data['ppn'];
        $total_ppn = $total * $ppn / 100;
        $grand_total = $total + $total_ppn;
        $sql_update = "UPDATE tbl_wh_po SET
        t_ppn       ='$total_ppn',
        sub_total   ='$total',
        grand_total ='$grand_total'
        WHERE id_po ='{$id}'";

        $this->db->query($sql_update);

        $sql = "SELECT * FROM tbl_wh_detail_po WHERE id_po ='{$id}'";

        $data = $this->db->query($sql);
        return $data->result();
        //return $data->row();
    }
    function updatePo($a, $b, $c, $d)
    {
        $sql = "UPDATE tbl_wh_po SET
        t_ppn       ='$a',
        sub_total   ='$b',
        grand_total ='$c'
        WHERE id_po ='". $data['id_po']. "'";

        $this->db->query($sql);

        return $this->db->affected_rows();
    }
}
