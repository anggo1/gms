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
    function cetak_estimasi($id)
    {
		$sql = "SELECT a.*,b.keterangan as ket_pk FROM tbl_br_detail_estimasi as a
		LEFT JOIN tbl_br_kat_pk as b ON b.kode=a.jns_pk WHERE a.id_lapor = '{$id}'";

		$data = $this->db->query($sql);

		return $data->result();
    }
	function cetak_pk($id)
    {
		$sql = "SELECT * FROM tbl_br_laporan_bus AS a LEFT JOIN tbl_br_pk_aktif AS b ON a.id_lapor=b.id_lapor WHERE a.id_lapor ='{$id}'";

		$data = $this->db->query($sql);

		return $data->result();
    }
    public function select_pk_selesai()
	{
        $this->db->select('a.*,c.kategori');
        $this->db->from('tbl_br_laporan_bus as a');
        $this->db->join('tbl_br_kategori as c', 'c.id_kategori=a.kategori', 'left');
		$this->db->where('a.status=','S');

		$data = $this->db->get();

		return $data->result();
	}
    public function select_bay1()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '1'";
        $data = $this->db->query($sql);
        return $data->result();
	}
    public function select_bay2()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '2'";
        $data = $this->db->query($sql);
        return $data->result();
	}
    public function select_bay3()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '3'";
        $data = $this->db->query($sql);
        return $data->result();
	}
    public function select_bay4()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '4'";
        $data = $this->db->query($sql);
        return $data->result();
	}
    public function select_bay5()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '5'";
        $data = $this->db->query($sql);
        return $data->result();
	}
    public function select_bay6()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '6'";
        $data = $this->db->query($sql);
        return $data->result();
	}
    public function select_bay7()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '7'";
        $data = $this->db->query($sql);
        return $data->result();
	}
    public function select_bay8()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '8'";
        $data = $this->db->query($sql);
        return $data->result();
	}
    public function select_bay9()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '9'";
        $data = $this->db->query($sql);
        return $data->result();
	}
    public function select_bay10()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '10'";
        $data = $this->db->query($sql);
        return $data->result();
	}
    public function select_bay11()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '11'";
        $data = $this->db->query($sql);
        return $data->result();
	}
    public function select_bay12()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '12'";
        $data = $this->db->query($sql);
        return $data->result();
	}
    public function select_bay13()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '13'";
        $data = $this->db->query($sql);
        return $data->result();
	}
    public function select_bay14()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '14'";
        $data = $this->db->query($sql);
        return $data->result();
	}
    public function select_bay15()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '15'";
        $data = $this->db->query($sql);
        return $data->result();
	}
	public function select_bay16()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '16'";
        $data = $this->db->query($sql);
        return $data->result();
	}
    public function select_bay17()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '17'";
        $data = $this->db->query($sql);
        return $data->result();
	}
    public function select_bay18()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '18'";
        $data = $this->db->query($sql);
        return $data->result();
	}
    public function select_bay19()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '19'";
        $data = $this->db->query($sql);
        return $data->result();
	}
    public function select_bay20()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '20'";
        $data = $this->db->query($sql);
        return $data->result();
	}
    public function select_bay21()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '21'";
        $data = $this->db->query($sql);
        return $data->result();
	} public function select_bay22()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '22'";
        $data = $this->db->query($sql);
        return $data->result();
	} public function select_bay23()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '23'";
        $data = $this->db->query($sql);
        return $data->result();
	} public function select_bay24()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '24'";
        $data = $this->db->query($sql);
        return $data->result();
	} public function select_bay25()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '25'";
        $data = $this->db->query($sql);
        return $data->result();
	} public function select_bay26()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '26'";
        $data = $this->db->query($sql);
        return $data->result();
	} public function select_bay27()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '27'";
        $data = $this->db->query($sql);
        return $data->result();
	} public function select_bay28()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '28'";
        $data = $this->db->query($sql);
        return $data->result();
	} public function select_bay29()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '29'";
        $data = $this->db->query($sql);
        return $data->result();
	} public function select_bay30()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '30'";
        $data = $this->db->query($sql);
        return $data->result();
	} public function select_bay31()
	{
		$sql = "SELECT `a`.*,COUNT(b.id_lapor) AS jml_pk,
        COUNT(IF(`b`.`status` = 'S', 1, NULL)) 'selesai',
        COUNT(IF(`b`.`status` = 'P', 1, NULL)) 'pause',
        COUNT(IF(`b`.`status` = 'Y', 1, NULL)) 'aktif'
        FROM `tbl_br_laporan_bus` as `a`
        INNER JOIN `tbl_br_pk_aktif` as `b` ON `a`.`id_lapor`=`b`.`id_lapor`
        WHERE `a`.`no_bay` = '31'";
        $data = $this->db->query($sql);
        return $data->result();
	}

}

/* End of file Mod_login.php */
