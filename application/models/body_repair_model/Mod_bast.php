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
        $lb_kn=""; if (!empty($lb_kn)){ $lb_kn=$data['lb_kn']; }else { $lb_kn='0'; }
        $lb_kr=""; if (!empty($lb_kr)){ $lb_kr=$data['lb_kr']; }else { $lb_kr='0'; }
        $ban_serep=""; if (!empty($ban_serep)){ $ban_serep=$data['ban_serep']; }else { $ban_serep='0'; }
        $stnk=""; if (!empty($stnk)){ $stnk=$data['stnk']; }else { $stnk='0'; }
        $sign_kn=""; if (!empty($sign_kn)){ $sign_kn=$data['sign_kn']; }else { $sign_kn='0'; }
        $sign_kr=""; if (!empty($sign_kr)){ $sign_kr=$data['sign_kr']; }else { $sign_kr='0'; }
        $kc_roda=""; if (!empty($kc_roda)){ $kc_roda=$data['kc_roda']; }else { $kc_roda='0'; }
        $kps=""; if (!empty($kps)){ $kps=$data['kps']; }else { $kps='0'; }
        $lmp_rem_kn=""; if (!empty($lmp_rem_kn)){ $lmp_rem_kn=$data['lmp_rem_kn']; }else { $lmp_rem_kn='0'; }
        $lmp_rem_kr=""; if (!empty($lmp_rem_kr)){ $lmp_rem_kr=$data['lmp_rem_kr']; }else { $lmp_rem_kr='0'; }
        $dongkrak=""; if (!empty($dongkrak)){ $dongkrak=$data['dongkrak']; }else { $dongkrak='0'; }
        $keur=""; if (!empty($keur)){ $keur=$data['keur']; }else { $keur='0'; }
        $lmp_kota_kn=""; if (!empty($lmp_kota_kn)){ $lmp_kota_kn=$data['lmp_kota_kn']; }else { $lmp_kota_kn='0'; }
        $lmp_kota_kr=""; if (!empty($lmp_kota_kr)){ $lmp_kota_kr=$data['lmp_kota_kr']; }else { $lmp_kota_kr='0'; }
        $video=""; if (!empty($video)){ $video=$data['video']; }else { $video='0'; }
        $buku_jr=""; if (!empty($buku_jr)){ $buku_jr=$data['buku_jr']; }else { $buku_jr='0'; }
        $spion_kn=""; if (!empty($spion_kn)){ $spion_kn=$data['spion_kn']; }else { $spion_kn='0'; }
        $spion_kr=""; if (!empty($spion_kr)){ $spion_kr=$data['spion_kr']; }else { $spion_kr='0'; }
        $tv=""; if (!empty($tv)){ $tv=$data['tv']; }else { $tv='0'; }
        $siu=""; if (!empty($siu)){ $siu=$data['siu']; }else { $siu='0'; }
        $tape=""; if (!empty($tape)){ $tape=$data['tape']; }else { $tape='0'; }
        $kc_kontak=""; if (!empty($kc_kontak)){ $kc_kontak=$data['kc_kontak']; }else { $kc_kontak='0'; }

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
            lb_kn           ='$lb_kn',
            lb_kr           ='$lb_kr',
            ban_serep       ='$ban_serep',
            stnk            ='$stnk',
            sign_kn         ='$sign_kn',
            sign_kr         ='$sign_kr',
            kc_roda         ='$kc_roda',
            kps             ='$kps',
            lmp_rem_kn      ='$lmp_rem_kn',
            lmp_rem_kr      ='$lmp_rem_kr',
            dongkrak        ='$dongkrak',
            keur            ='$keur',
            lmp_kota_kn     ='$lmp_kota_kn',
            lmp_kota_kr     ='$lmp_kota_kr',
            video           ='$video',
            buku_jr         ='$buku_jr',
            spion_kn        ='$spion_kn',
            spion_kr        ='$spion_kr',
            tv              ='$tv',
            siu             ='$siu',
            tape            ='$tape',
            kc_kontak       ='$kc_kontak',
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
    public function select_detail()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date("Y-m-d");
        $sql = "SELECT * FROM tbl_br_bast WHERE tgl_bast ='$date'";

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
