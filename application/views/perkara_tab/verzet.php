<style type="text/css">
#infoPerkara .wrapword li {
  display: list-item !important;
  clear: both;
  float: none !important;
}
</style>
<?php
$idalurperkara = $this->tanggalhelper->getIDAlurPerkara($idperkara);
if($idalurperkara==9){
    $status = 'Perlawanan';
} else {
    $status = 'Verzet';
}
if(!empty($data_verzet)){
    if($data_verzet->num_rows>0){
        foreach ($data_verzet->result() as $row) {
?>
<div style="font-size:14px;margin:0px;border:0px;">
<table id='infoPerkara' style="font-size:14px;width:100%;"><tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>DATA PERMOHONAN</b></td></tr></tbody></table>
<table id="infoPerkara" style="font-size:14px;width:100%;">
	<col width="15%">
    <col width="85%">
    <tbody>
    	<tr>
        	<td id="first-child"><font color="white">Nomor Perkara</font></td>
            <td><span><?php echo $row->noPerkara;?></span></td>
       	</tr>
        <?php
        if($idalurperkara!=15 OR $idalurperkara!=16){
        	$tmp = explode('/', $row->noPerkara);
            if($idalurperkara==9){
            	$kode_perkara = '/PLW/';
            } else {
               	$kode_perkara = '/Pdt.Plw/';
            }
            $nomorperkaraverzet = $tmp[0].$kode_perkara.$tmp[2].'/'.$tmp[3];
        ?>
        <tr>
        	<td id="first-child"><font color="white">Nomor Perkara <?php echo $status;?></font></td>
            <td><span><?php echo $nomorperkaraverzet;?></span></td>
     	</tr>
        <tr>
        	<td id="first-child"><font color="white">Tanggal Pendaftaran <?php echo $status;?></font></td>
            <td><span><?php echo $this->tanggalhelper->convertDayDate($row->tglPendaftaran);?></span></td>
       	</tr>
        <?php } else { ?>
     	<tr>
        	<td id="first-child"><font color="white">Tanggal Berkekuatan Hukum Tetap</font></td>
            <td><span><?php echo $row->tglBHT;?></span></td>
      	</tr>
        <?php } ?>
 	</tbody>
</table>

<div style="padding:3px;"></div>
<table id='infoPerkara' style="font-size:14px;width:100%;"><tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>DATA PENETAPAN</b></td></tr></tbody></table>
<table id="infoPerkara" style="font-size:14px;width:100%;">
	<col width="15%">
    <col width="85%">
    <tbody>
    <tr>
    	<td id="first-child"><font color="white">Tanggal Penetapan Majelis</font></td>
        <td><span><?php echo $this->tanggalhelper->convertDayDate($row->tglPenetapanMajelis);?></span></td>
    </tr>
    <tr>
    	<td id="first-child"><font color="white">Majelis Hakim</font></td>
    	<td><span><?php echo $row->majelisHakim;?></span></td>
	</tr>
	<tr><td colspan="2" style='background:white;'></td></tr>
	<tr>
	    <td id="first-child"><font color="white">Tanggal Penetapan Panitera Pengganti</font></td>
	    <td><span><?php echo $this->tanggalhelper->convertDayDate($row->tglPenetapanPP);?></span></td>
	</tr>
	<tr>
	    <td id="first-child"><font color="white">Panitera Pengganti</font></td>
	    <td><span><?php echo $row->paniteraPengganti;?></span></td>
	</tr>
	<tr><td colspan="2" style='background:white;'></td></tr>
	<tr>
	    <td id="first-child"><font color="white">Tanggal Penetapan Jurusita</font></td>
	    <td><span><?php echo $this->tanggalhelper->convertDayDate($row->tglPenetapanJurusita);?></span></td>
	</tr>
	<tr>
	    <td id="first-child"><font color="white">Jurusita</font></td>
	    <td><span><?php echo $row->jurusita;?></span></td>
	</tr>
	<tr><td colspan="2" style='background:white;'></td></tr>
	<tr>
		<td id="first-child"><font color="white">Tanggal Penetapan Sidang Verzet</font></td>
    	<td><span><?php echo $this->tanggalhelper->convertDayDate($row->tglPenetapanSidang);?></span></td>
  	</tr>
	<tr>
		<td id="first-child"><font color="white">Tanggal Sidang Pertama Verzet</font></td>
	    <td><span><?php echo $this->tanggalhelper->convertDayDate($row->tglSidangPertama);?></span></td>
  	</tr>
    </tbody>
</table>

<div style="padding:3px;"></div>
<table id='infoPerkara' style="font-size:14px;width:100%;"><tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>DATA MEDIASI</b></td></tr></tbody></table>
<table id='infoPerkara' style="font-size:14px;width:100%;">
	<col width="15%">
	<col width="85%">
	<tbody>		
		<tr>
			<td id="first-child"><font color="white">Tgl. Penetapan Mediator</font></td>
			<td><?php echo $this->tanggalhelper->convertDayDate($row->tglPenetapan);?></td>
		</tr>
		<tr>
			<td id="first-child"><font color="white">No. Penetapan Mediator</font></td>
			<td><?php echo $row->SKPenetapan;?></td>
		</tr>
		<tr>
            <td id="first-child"><font color="white">Data Mediator</font></td>
            <td colspan="2">
                <div class="cssTable" style="">
                    <table id="tableinfo" style="margin:0px;padding:0px;">
                        <col style="width:5%">
                        <col style="width:75%">
                        <col style="width:20%">
                        <tbody>
                            <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>Status Mediator</td>
                                
                            </tr>
                        <?php
                        $jumlah         = substr_count($row->nama,"<br/>");
                        $mediator_text  = explode("<br/>",$row->nama);
                        $statusm         = explode(",",$row->statusMediator);
                        $total          = $jumlah+1;
                        for($i=0; $i<$total; $i++){
                            $no = $i+1;
                            if($statusm[$i]=='H'){
                                $status_text ='Hakim';
                            }else if($statusm[$i]=='N'){
                                $status_text ='Non-Hakim';
                            }else if($statusm[$i]=='P'){
                                $status_text ='Pegawai';
                            }else{
                                $status_text ="-";
                            }
                            echo "<tr>";
                                echo "<td style='text-align:center; vertical-align:top'>".$no."</td>";
                                echo "<td style='text-align:left; vertical-align:top;'>".substr_replace("<br/>",$mediator_text[$i]."<br>",0)."</td>";
                                echo "<td style='text-align:left; vertical-align:top'>".$status_text."</td>";
                            echo "<tr>";
                        }
                        ?>
                        
                    </tbody>
                </table>
            </td>
        </tr>
		<tr>
			<td id="first-child"><font color="white">Tgl. Mulai Mediasi</font></td>
			<td><?php echo $this->tanggalhelper->convertDayDate($row->tglMulaiMediasi);?></td>
		</tr>
		<tr>
			<td id="first-child" ><font color="white">Tgl. Hasil Mediasi</font></td>
			<td class='wrapword'><?php echo $this->tanggalhelper->convertDayDate($row->tglPutusan);?></td>
		</tr>
		<tr>
			<td id="first-child"><font color="white">Hasil Mediasi</font></td>
			<td><?php echo $row->hasil;?></td>
		</tr>
	</tbody>
</table>

<div style="padding:3px;"></div>
<table id='infoPerkara' style="font-size:14px;width:100%;"><tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>DATA PUTUSAN</b></td></tr></tbody></table>
<table id="infoPerkara" style="font-size:14px;width:100%;">
	<col width="15%">
    <col width="85%">
    <tbody>
	<tr>
		<td id="first-child"><font color="white">Putusan <?php echo $status;?></font></td>
	    <td><span><?php echo $this->tanggalhelper->convertDayDate($row->putusan);?></span></td>
	</tr>
	<?php if($idalurperkara!=9){ ?>
    <tr>
        <td id="first-child"><font color="white">Putusan Verstek</font></td>
        <td>
        	<?php 
	        if($row->verstek='Y'){
	            $verstek = 'Ya';
	        }elseif($row->verstek='T'){
	            $verstek = 'Tidak';
	        }
	        if(empty($row->putusan)){
	            $verstek = '';
	        }
	        echo $verstek;?>
	  	</td>
    </tr>
	<?php } ?>
	<tr>
	    <td id="first-child"><font color="white">Sumber Hukum</font></td>
	    <td><?php echo $row->sumberHukum;?></td>
	</tr>
	<tr>
		<td id="first-child"><font color="white">Status Putusan <?php echo $status;?></font></td>
	    <td><span><?php echo ($row->statusPutusan);?></span></td>
	</tr>
	<tr>
		<td id="first-child"><font color="white">Amar Putusan <?php echo $status;?></font></td>
    	<td style="background:white;" class="wrapword"><span><?php echo $row->amarPutusan; ?></span></td>
	</tr>
    </tbody>
</table>

<div style="padding:3px;"></div>
<table id='infoPerkara' style="font-size:14px;width:100%;"><tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>DATA PEMBERITAHUAN</b></td></tr></tbody></table>
<table id="infoPerkara" style="font-size:14px;width:100%;">
	<col width="15%">
    <col width="85%">
    <tbody>
	<tr>
		<td id="first-child"><font color="white">Pemberitahuan Putusan</font></td>
	    <td><span><?php echo $this->tanggalhelper->convertDayDate($row->tglPemberitahuan); ?></span></td>
	</tr>
	<tr>
		<td id="first-child"><font color="white">Tanggal Pemberitahuan Putusan <?php echo $status;?> Kepada Penggugat</font></td>
	    <td><span><?php echo $this->tanggalhelper->convertDayDate($row->tglPemberitahuanPutusanKpdPenggugat);?></span></td>
	</tr>
	<tr>
		<td id="first-child"><font color="white">Tanggal Pemberitahuan Putusan <?php echo $status;?> Kepada Tergugat</font></td>
	    <td><span><?php echo $this->tanggalhelper->convertDayDate($row->tglPemberitahuanPutusanKpdTergugat);?></span></td>
	</tr>
   	</tbody>
</table>  
</div>
<?php } } } ?>

<script type="text/javascript">
closeLoading();
</script>