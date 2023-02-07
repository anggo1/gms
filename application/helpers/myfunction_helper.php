<?php
date_default_timezone_set('Asia/Jakarta');

function tgl_indonesia($date)
{
	/* array hari dan bulan */
	$nama_hari  = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");

	$nama_bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober",
	                    "November","Desember");

	/*  Memisahkan format tanggal, bulan, tahun dengan substring */
	$tahun   = substr($date, 0, 4);
	$bulan   = substr($date, 5, 2);
	$tanggal = substr($date, 8, 2);
	$waktu   = substr($date, 11, 5);

	//w Urutan hari dalam seminggu
	$hari    = date("w", strtotime($date));

	$result  = $nama_hari[$hari] . ", " .$tanggal. " " .$nama_bulan[(int)$bulan-1]. " " .$tahun. " " .$waktu. " WIB";
	//keterangan (int)$bulan-1 karena array dimulai dari index ke 0 maka bulan-1
	return $result;
}
function tgl_indo($date)
{
	/* array hari dan bulan */

	$nama_bulan = array("Jan","Feb","Mar","Apr","Mei","Juni","Juli","Agus","Sept","Okt",
	                    "Nov","Des");

	/*  Memisahkan format tanggal, bulan, tahun dengan substring */
	$tahun   = substr($date, 0, 4);
	$bulan   = substr($date, 5, 2);
	$tanggal = substr($date, 8, 2);

	$result  = $tanggal. " " .$nama_bulan[(int)$bulan-1]. " " .$tahun;
	//keterangan (int)$bulan-1 karena array dimulai dari index ke 0 maka bulan-1
	return $result;
}
if (! function_exists('hitung_umur')) {
    function hitung_umur($tgl)
    {
        $tanggal = new DateTime($tgl);
        $today = new DateTime('today');
        $y = $today->diff($tanggal)->y;
        $m = $today->diff($tanggal)->m;
        $d = $today->diff($tanggal)->d;
        return $y . " Tahun, " . $m . " Bulan, " . $d . " Hari";
        //return $y . " , " . $m;
    }
}

function anti_injection($data)
{
	$filter = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
	return $filter;
}

function slug($s)
{
	$c = array (' ');
    $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');

    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d

    $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
    return $s;
}


function rupiah($nominal)
{
	return 'Rp '.number_format($nominal, 0, ',', '.');
}

/** login codeIgniter menggunakan bycrypt **/

if(!function_exists('get_hash'))
{    
    function get_hash($PlainPassword)
    {
    	$option=[
                'cost'=>5,// proses hash sebanyak: 2^5 = 32x
    	        ];
    	return password_hash($PlainPassword, PASSWORD_DEFAULT, $option);
   }
}

if(!function_exists('hash_verified'))
{  
    function hash_verified($PlainPassword,$HashPassword)
    {
    	return password_verify($PlainPassword,$HashPassword) ? true : false;
   }
}

/** login codeIgniter menggunakan bycrypt **/
     function show_ok_msg($content='', $size='14px') {
		if ($content != '') {
			return   $content;
		}
	}

    function show_del_msg($content='', $size='14px') {
		if ($content != '') {
			return   $content;
		}
	}
	function show_err_msg($content='', $size='14px') {
		if ($content != '') {
			return   '<p class="box-msg">
				      <div class="alert alert-danger alert-dismissible">
					      <div class="info-box-icon">
					      	<i class="fa fa-warning"></i>
					      </div>
					      <div class="info-box-content" style="font-size:' .$size .'">
				        	' .$content
				      	.'</div>
					  </div>
				    </p>';
		}
	}
	
	// MODAL
	function show_my_print($content='', $id='', $data='', $size='') {
		$_ci = &get_instance();

		if ($content != '') {
			$view_content = $_ci->load->view($content, $data, TRUE);

			return '<div class="modal fade" id="' .$id .'" role="dialog">
					  <div class="modal-dialog modal-' .$size .'" role="document">
					    <div class="modal-content" style="border: none;">
					        ' .$view_content .'
					    </div>
					  </div>
					</div>';
		}
	}
	function show_my_modal($content='', $id='', $data='', $size='') {
		$_ci = &get_instance();

		if ($content != '') {
			$view_content = $_ci->load->view($content, $data, TRUE);

			return '<div class="modal fade" id="' .$id .'" role="dialog">
					  <div class="modal-dialog modal-' .$size .'" role="document">
					    <div class="modal-content">
					        ' .$view_content .'
					    </div>
					  </div>
					</div>';
		}
	}

	function show_my_confirm($id='', $class='', $title='Konfirmasi', $yes = 'Ya', $no = 'Tidak') {
		$_ci = &get_instance();

		if ($id != '') {
			echo   '<div class="modal fade" id="' .$id .'" role="dialog">
					  <div class="modal-dialog modal-md" role="document">
					    <div class="modal-content">
					        <div class="col-md-offset-4 col-md-12 col-md-offset-1 well">
						      <h3 style="display:block; text-align:center;">' .$title .'</h3>
						       <table width="100%" border="0">
						          <tbody>
						            <tr>
						              <td><button class="form-control btn btn-sm btn-primary float-left ' .$class .'"> <i class="fas fa-hand-paper"></i> ' .$yes .'</button></td>
						              <td><button class="form-control btn btn-sm btn-danger float-right" data-dismiss="modal"> <i class="fas fa-times"></i> ' .$no .'</button></td>
					                </tr>
					              </tbody>
				              </table>
						      </div>
						    </div>
					    </div>
					  </div>
					</div>';
		}
	}