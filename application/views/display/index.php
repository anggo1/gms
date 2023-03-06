<?php

$warna_hijau = "background: #9dd53a;background: -moz-linear-gradient(top, #9dd53a 0%, #a1d54f 50%, #80c217 51%, #7cbc0a 100%);background: webkit-linear-gradient(top, #9dd53a 0%,#a1d54f 50%,#80c217 51%,#7cbc0a 100%);background: linear-gradient(to bottom, #9dd53a 0%,#a1d54f 50%,#80c217 51%,#7cbc0a 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#9dd53a', endColorstr='#7cbc0a',GradientType=0 );";
$warna_kuning="background: #fcf4c0; /* Old browsers */
background: -moz-linear-gradient(top, #fcf4c0 0%, #fdea59 50%, #ffe30b 51%, #fcf09a 100%); 
background: -webkit-linear-gradient(top, #fcf4c0 0%,#fdea59 50%,#ffe30b 51%,#fcf09a 100%);
background: linear-gradient(to bottom, #fcf4c0 0%,#fdea59 50%,#ffe30b 51%,#fcf09a 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcf4c0', endColorstr='#fcf09a',GradientType=0 );";
?>
<script type="text/JavaScript">
    <!--
    <!--setTimeout("location.href = 'index.php';",1000*120 );
-->

    <!--

/*
Auto Refresh Page with Time script
By JavaScript Kit (javascriptkit.com)
Over 200+ free scripts here!
*/

//enter refresh time in "minutes:seconds" Minutes should range from 0 to inifinity. Seconds should range from 0 to 59
var limit="0:30"

if (document.images){
var parselimit=limit.split(":")
parselimit=parselimit[0]*60+parselimit[1]*4
}
function beginrefresh(){
if (!document.images)
return
if (parselimit==1)
window.location.reload()
else{ 
parselimit-=1
curmin=Math.floor(parselimit/60)
cursec=parselimit%60
if (curmin!=0)
curtime=curmin+" minutes and "+cursec+" seconds left until page refresh!"
else
curtime=cursec+" seconds left until page refresh!"
window.status=curtime
setTimeout("beginrefresh()",2000)
}
}

window.onload=beginrefresh
    //-->
</script>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>KAROSERI SYSTEM</title>
        <link href="css/global.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery.min.js"></script>
        <link rel="stylesheet" href="css/style1.css" type="text/css">
        <link href="css/global.css" rel="stylesheet" type="text/css"/>
    </head>
    <div>
        <div class="header" align="center">
            <strong>DENAH LOKASI PERBAIKAN BODY REPAIR</strong>
        </div>
        <div class="kategoritengah">
            <div class="jarak_mobil2"></div>
            <div class="jarak_mobil2"></div>
            <div class="judul">
                <strong>T R I M I N G</strong>
            </div>
            <div class="jarak_mobil"></div>
            <div class="jarak_mobil"></div>
            <div class="jarak_mobil"></div>
            <div class="jarak_mobil"></div>
            <div class="jarak_mobil"></div>
            <div class="jarak_mobil"></div>
            <div class="jarak_mobil"></div>
            <div class="jarak_mobil"></div>
            <div class="jarak_mobil"></div>
            <div class="judul">
                <strong>ELEKTRIK</strong>
            </div>
            <div class="judul">
                <strong>Q/C</strong>
            </div>
            <div class="judul">
                <strong>BODY MTE</strong>
            </div>
            <div class="jarak_mobil"></div>
            <div class="jarak_mobil"></div>
        </div>
        <div class="kategoriatas">
            <div class="jarak_kiri1"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>15</strong>
                    </div>
                </div>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>14</strong>
                    </div>
                </div>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>13</strong>
                    </div>
                </div>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>12</strong>
                    </div>
                </div>
                <strong></strong>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>11</strong>
                    </div>
                </div>
                <strong></strong>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>10</strong>
                    </div>
                </div>
                <strong></strong>
            </div>
            <div class="jarak_mobil"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>9</strong>
                    </div>
                </div>
                <strong></strong>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>8</strong>
                    </div>
                </div>
                <strong></strong>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>7</strong>
                    </div>
                </div>
                <strong></strong>
            </div>
            <div class="jarak_mobil"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>6</strong>
                    </div>
                </div>
                <strong></strong>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>5</strong>
                    </div>
                </div>
                <strong></strong>
            </div>
            <div class="jarak_mobil"></div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>4</strong>
                    </div>
                </div>
                <strong></strong>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>3</strong>
                    </div>
                </div>
                <strong></strong>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>2</strong>
                    </div>
                </div>
                <strong></strong>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>1</strong>
                    </div>
                </div>
                <strong></strong>
            </div>
            <div class="jarak_mobil"></div>
            <div class="jarak_mobil"></div>
            <div class="jarak_mobil"></div>

            <div class="keteranganpk">
                <div class="isiketeranganpk">
                    <div
                        class="nomor1"
                        style='background-color: #258DFA; color:#F8F8F8; text-shadow:#000000; font-style: !important;'>
                        <strong>KETERANGAN</strong>
                    </div>
                    <table width="100%" border="0">
                        <tbody>
                            <tr>
                                <th width="19" bgcolor="#37BF07">&nbsp;</th>
                                <th width="76" style="font-size:12px; text-align:left;">
                                    : Bay Kosong</th>
                            </tr>
                            <tr>
                                <th bgcolor="#E6F408">&nbsp;</th>
                                <th width="76" style="font-size:12px;text-align:left;">
                                    : Bay Pause</th>
                            </tr>
                            <tr>
                                <th bgcolor="#FFFFFF">&nbsp;</th>
                                <th width="76" style="font-size:12px;text-align:left;">
                                    : Bay Aktif</th>
                            </tr>
                            <tr>
                                <th>BM</th>
                                <th style="font-size:12px;text-align:left;">: Bis Masuk</th>
                            </tr>
                            <tr>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="jarak_bus"></div>
            </div>
        </div>
        <div class="kategoritengah">
            <div class="bis5">
                <div class="jarak_mobil2"></div>
                <div class="jarak_mobil"></div>
                <div class="jarak_mobil"></div>
                <div class="jarak_mobil"></div>
                <div class="judul">
                    <strong>PRIMER, DEMPUL, FILLER</strong>
                </div>
                <div class="jarak_mobil2"></div>
                <div class="jarak_mobil2"></div>
                <div class="jarak_mobil"></div>
                <div class="judul">
                    <strong>PRIMER, DEMPUL, FILLER</strong>
                </div>
                <div class="jarak_mobil2"></div>
                <div class="jarak_mobil2"></div>
                <div class="jarak_mobil"></div>
                <div class="judul">
                    <strong>STRIPING</strong>
                </div>
                <div class="jarak_mobil2"></div>
                <div class="jarak_mobil"></div>
                <div class="jarak_mobil"></div>
                <div class="judul">
                    <strong>FINISHING</strong>
                </div>
            </div>
        </div>
        <div class="jarak_kiri"></div>
        <div class="kategoriatas">
            <div class="jarak_kiri1"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>16</strong>
                    </div>
                </div>
                <strong></strong>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>17</strong>
                    </div>
                </div>
                <strong></strong>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>18</strong>
                    </div>
                </div>
                <strong></strong>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>19</strong>
                    </div>
                </div>
                <strong></strong>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>20</strong>
                    </div>
                </div>
                <strong></strong>
            </div>
            <div class="jarak_mobil"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>21</strong>
                    </div>
                </div>
                <strong></strong>
            </div>
            <div class="jarak_bus"></div>

            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>22</strong>
                    </div>
                </div>
                <strong></strong>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>23</strong>
                    </div>
                </div>
                <strong></strong>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>24</strong>
                    </div>
                </div>
                <strong></strong>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>25</strong>
                    </div>
                </div>
                <strong></strong>
            </div>
            <div class="jarak_mobil"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>26</strong>
                    </div>
                </div>
                <strong></strong>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>27</strong>
                    </div>
                    test</div>
                <strong></strong>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>28</strong>
                    </div>
                    test</div>
                <strong></strong>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>29</strong>
                    </div>
                    test</div>
                <strong></strong>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>30</strong>
                    </div>
                    test</div>
                <strong></strong>
            </div>
            <div class="jarak_mobil"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>31</strong>
                    </div>
                    test</div>
                <strong></strong>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>32</strong>
                    </div>
                    test</div>
                <strong></strong>
            </div>
            <div class="jarak_bus"></div>
            <div class="bis2">
                <div class="isikategori2">
                    <div class="nomor">
                        <strong>33</strong>
                    </div>
                    test</div>
                <strong></strong>
            </div>
        </div>
    </div>
</div>
</div>

<div id="bawah2">
<ul id="bawah_01" class="bawah">
    <marquee direction="left" behavior="scroll" scrollamount="5">
        <?php
		 
             //$antrian_pk=mysql_query("SELECT * FROM pk_aktif WHERE status='S' AND tgl_selesai='".date('Y-m-d')."'");
             // while($dpk=mysql_fetch_array($antrian_pk)){
			//	echo "<td width=0 style=text-transform:capitalize;><img src=images/centang.png width=30 height=30>$dpk[no_body]($dpk[jns_pk])&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
             // }
            ?>

    </marquee>
</div>
<?php
 function DateToIndo($date){
		$BulanIndo = array("01", "02", "03",
						   "04", "05", "06",
						   "07", "08", "09",
						   "10", "11", "12");
	
		$tahun = substr($date, 0, 4);  
        $bulan = substr($date, 5, 2);  
        $tgl   = substr($date, 8, 2);  
          
        $result = $tgl . "/" . $BulanIndo[(int)$bulan-1] . "/". $tahun;       
        return($result);  
	}
?>
<div id="page1">
    <ul id="ticker_02" class="ticker">
        <div align="center">
            <table width="100%">
                <td width="100%" class="keterangan_lanjutan">
                    <strong>D A F T A R &nbsp;&nbsp; P E K E R J A A N &nbsp;&nbsp; AKTIF</strong>
                </td>
            </table>
        </div>
        <div align="left">
            <table width="100%">
                <td width="3%" class="keterangan_judul">No.</td>
                <td width="7%" class="keterangan_judul">Tgl-Masuk</td>
                <td width="10%" class="keterangan_judul">NoBody</td>
                <td width="10%" class="keterangan_judul">Status</td>
                <td width="20%" class="keterangan_judul">Spv</td>
                <td width="20%" class="keterangan_judul">Leader</td>
                <td width="100%" class="keterangan_judul">Keterangan</td>
            </table>
        </div>
        <li>
            <?php
            // $antrian=mysql_query("SELECT * FROM pk_aktif WHERE status ='N' ORDER BY jam_mulai ASC LIMIT 50");
              //while($d=mysql_fetch_array($antrian)){
				//  $noUrutberatbanget++;
				//echo "<li>
				//<table width=100%>	
				//<td width=3% class=isi_slider ><font> $noUrutberatbanget</font></td>	
				//<td width=7% class=isi_slider ><div align=center> ".DateToIndo($d[tgl_mulai])."</div> </td>
				//<td width=10% class=isi_slider ><div align=center> $d[no_body]</div></td>
				//<td width=10% class=isi_slider ><div align=center> $d[jns_pk]</div></td>
				//<td width=20% class=isi_slider ><div align=center> $d[nama_spv]</div></td>
				//<td width=20% class=isi_slider ><div align=center> $d[nama_ld]</div></td>
				//<td width=30$ class=isi_slider ><font size=1>$d[ket_pk]</td></font></table></li>";
             // }
            ?>
        </ul>
    </div>
    <div id="page2">
        <ul id="ticker_03" class="ticker">
            <div align="center">
                <table width="100%">
                    <td width="100%" class="keterangan_lanjutan">
                        <strong>D A F T A R &nbsp;&nbsp; ANTRIAN &nbsp;&nbsp; B O D Y &nbsp;&nbsp; R E P A I R</strong>
                    </td>
                </table>
            </div>
            <div align="left">
                <table width="100%">
                    <td width="3%" class="keterangan_judul">No.</td>
                    <td width="7%" class="keterangan_judul">Tgl-Masuk</td>
                    <td width="10%" class="keterangan_judul">NoBody</td>
                    <td width="20%" class="keterangan_judul">Kategori</td>
                    <td width="20%" class="keterangan_judul">Pelapor</td>
                    <td width="100%" class="keterangan_judul">Keterangan</td>
                </table>
            </div>
            <li>
                <?php
             //$antrian1=mysql_query("select * from bus_masuk where status ='N'");
             // while($d1=mysql_fetch_array($antrian1)){
				//  $noUrutberatbanget1++;
				//echo "<li>
				//<table width=100%>	
				//<td width=3% class=isi_slider ><font> $noUrutberatbanget1</font></td>	
				//<td width=7% class=isi_slider ><div align=center> ".DateToIndo($d1[tgl_masuk])."</div> </td>
				//<td width=10% class=isi_slider ><div align=center> $d1[no_body]</div></td>
				//<td width=20% class=isi_slider ><div align=center> $d1[kategori_pk]</div></td>
				//<td width=20% class=isi_slider ><div align=center> $d1[pelapor]</div></td>
				//<td width=30$ class=isi_slider ><font size=2>$d1[keterangan]</td></font></table></li>";
             // }
            ?>
                <?php
						 function selisih($jam_a,$jam_b){
						list ($h,$m,$s)= explode (":",$jam_a);
						$dtAwal= mktime($h,$m,$s,"1","1","1");
						list ($h,$m,$s)= explode (":",$jam_b);
						$dtAkhir= mktime($h,$m,$s,"1","1","1");
						$dtSelisih = $dtAkhir-$dtAwal;
						$totalmenit=$dtSelisih/60;
						$jam=explode(".",$totalmenit/60);
						$sisamenit=($totalmenit/60)-$jam[0];
						$sisamenit2=$sisamenit*60;
						return "$jam[0] ";//jam $sisamenit2 menit
						} ?>
        </ul>
    </div>
    <script>

        function tick() {
            $('#ticker_01 li:first').slideUp(function () {
                $(this)
                    .appendTo($('#ticker_01'))
                    .slideDown();
            });
        }
        setInterval(function () {
            tick()
        }, 5000);

        function tick2() {
            $('#ticker_02 li:first').slideUp(function () {
                $(this)
                    .appendTo($('#ticker_02'))
                    .slideDown();
            });
        }
        setInterval(function () {
            tick2()
        }, 3000);

        function tick3() {
            $('#ticker_03 li:first').slideUp(function () {
                $(this)
                    .appendTo($('#ticker_03'))
                    .slideDown();
            });
        }
        setInterval(function () {
            tick3()
        }, 3000);

        function tick4() {
            $('#ticker_04 li:first').slideUp(function () {
                $(this)
                    .appendTo($('#ticker_04'))
                    .slideDown();
            });
        }

        function tick5() {
            $('#ticker_05 li:first').slideUp(function () {
                $(this)
                    .appendTo($('#ticker_05'))
                    .slideDown();
            });
        }
        setInterval(function () {
            tick5()
        }, 3000);
        function tick6() {
            $('#ticker_06 li:first').slideUp(function () {
                $(this)
                    .appendTo($('#ticker_06'))
                    .slideDown();
            });
        }
        setInterval(function () {
            tick6()
        }, 3000);

        /**
	 * USE TWITTER DATA
	 */

        $.ajax({
            url: 'http://search.twitter.com/search.json',
            data: 'q=%23javascript',
            dataType: 'jsonp',
            timeout: 10000,
            success: function (data) {
                if (!data.results) {
                    return false;
                }

                for (var i in data.results) {
                    var result = data.results[i];
                    var $res = $("<li />");
                    $res.append('<img src="' + result.profile_image_url + '" />');
                    $res.append(result.text);

                    console.log(data.results[i]);
                    $res.appendTo($('#ticker_04'));
                }
                setInterval(function () {
                    tick4()
                }, 4000);

                $('#example_4').show();

            }
        });
    </script>

</body>
</html>