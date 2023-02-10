<?php
  $no = 1;
  foreach ($dataDev as $s) {
    $IP = $s->ip;
    $key = $s->pass;
    $hasil="";
        $connect = fsockopen($s->ip, "80", $errno, $errstr, 1);
        if($connect) {
          $hasil="<i class='fas fa-check-circle text-success btn'> OK</i>";
          error_reporting(0);
        //$IP = $this->get_setting()->ip;
        //$Key = $this->get_setting()->password;
        $IP = $IP;
        $Key = $key;
        if($IP!=""){
        $Connect = fsockopen($IP, "80", $errno, $errstr, 1);
            if($Connect){
                $soap_request="<GetAttLog><ArgComKey xsi:type=\"xsd:integer\">".$Key."</ArgComKey><Arg><PIN xsi:type=\"xsd:integer\">All</PIN></Arg></GetAttLog>";
                $newLine="\r\n";
                fputs($Connect, "POST /iWsService HTTP/1.0".$newLine);
                fputs($Connect, "Content-Type: text/xml".$newLine);
                fputs($Connect, "Content-Length: ".strlen($soap_request).$newLine.$newLine);
                fputs($Connect, $soap_request.$newLine);
                $buffer="";
                while($Response=fgets($Connect, 1024)){
                    $buffer=$buffer.$Response;
                }
                $buffer = Parse_Data($buffer,"<GetAttLogResponse>","</GetAttLogResponse>");
                $buffer = explode("\r\n",$buffer);
                for($a=0;$a<count($buffer);$a++){
                    $data = Parse_Data($buffer[$a],"<Row>","</Row>");
                    $PIN = Parse_Data($data,"<PIN>","</PIN>");
                    $DateTime = Parse_Data($data,"<DateTime>","</DateTime>");
                    $Verified = Parse_Data($data,"<Verified>","</Verified>");
                    $Status = Parse_Data($data,"<Status>","</Status>");
                    $ins = array(
                           "pin"       =>  $PIN,
                            "date_time" =>  $DateTime
                            );
                    if (!$this->if_exist_check($PIN, $DateTime) && $PIN && $DateTime) {
                    	$this->db->insert('tbl_hrd_data_absen', $ins);
                    }
                }
                if($buffer){
                	return '<div class="alert alert-success alert-dismissable">
        				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        				<h4><i class="icon fa fa-check"></i> Success !</h4>
        				Anda terhubung dengan mesin.
        			</div>';
                } else {
                	return '<div class="alert alert-danger alert-dismissable">
        				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        				<h4><i class="icon fa fa-ban"></i> Alert!</h4>
        				Anda tidak terhubung dengan mesin !
        			</div>';
                }
            }
        } 
        } else {
          $hasil= "<i class='fa fa-times-circle text-red btn'> False</i>";
      }
    ?>
<tr>

    <td><?php echo $no; ?></td>
    <td><?php echo $s->ip; ?></td>
    <td><?php echo $s->pass; ?></td>
    <td><?php echo $s->nama_mesin; ?></td>
    <td><?php echo $hasil; ?></td>

    <td class="text-center">
        <button
            class="btn btn-sm btn-outline-primary download-dataMesin"
            data-ip="<?php echo $s->ip; ?>" data-pass="<?php echo $s->pass; ?>">
            <i class="fa fa-download"></i>
        </button>
        <button
            class="btn btn-sm btn-outline-success update-dataMesin"
            data-id="<?php echo $s->id; ?>">
            <i class="fa fa-edit"></i>
        </button>
        <button
            class="btn btn-sm btn-outline-danger delete-mesin"
            data-toggle="modal"
            data-target="#hapusMesin"
            data-id="<?php echo $s->id; ?>">
            <i class="fa fa-trash"></i>
        </button>
    </td>
</tr>
<?php
	 $no++;
  }
?>