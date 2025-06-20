<style type="text/css">
#infoPerkara .wrapword li {
  display: list-item !important;
  clear: both;
  float: none !important;
}
</style>
<div style="font-size:14px;">
	<?php
	if(!empty($data_mediasi)){
		if($data_mediasi->num_rows>0){
			$jml = 1;
			foreach ($data_mediasi->result() as $row) {
	?>
				<table id='infoPerkara' style="font-size:14px;width:100%;">
					<col width="15%">
					<col width="85%">
					<tbody>
						<tr>
							<td colspan="3" class="header">
				            <?php
				            if ($jml==1){
				            	$jnsmed="Mediasi";
				            }else{
				            	$jnsmed="Perdamaian Pada Tahap Pemeriksaan Perkara";
				            }
				            ?>
				            </td>
			            <tr>
			                <td colspan="3" class="divider">Data Penetapan <?php echo $jnsmed; ?></td>
			            </tr>
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
			                            $status         = explode(",",$row->statusMediator);
			                            $total          = $jumlah+1;
			                            for($i=0; $i<$total; $i++){
			                                $no = $i+1;
			                                if($status[$i]=='H'){
			                                    $status_text ='Hakim';
			                                }else if($status[$i]=='N'){
			                                    $status_text ='Non-Hakim';
			                                }else if($status[$i]=='P'){
			                                    $status_text ='Pegawai';
			                                }else{
			                                    $status_text = '-';
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
	<?php  	$jml++;
			}
		}
	}
	?>
</div>
<script type="text/javascript">
closeLoading();
</script>