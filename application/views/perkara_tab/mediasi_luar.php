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
			foreach ($data_mediasi->result() as $row) {
	?>
				<table id='infoPerkara' style="font-size:14px;width:100%;">
					<col width="17%">
					<col width="85%">
					<tbody>
						<tr>
							<td id="first-child"><font color="white">Tgl. Kesepakatan Perdamaian</font></td>
							<td><?php echo !empty($row->tglKesepakatan)?$this->tanggalhelper->convertDayDate($row->tglKesepakatan):'';?></td>
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
			                                    $status_text ="-";
			                                }
			                                echo "<tr>";
			                                    echo "<td style='text-align:center; vertical-align:top'>".$no."</td>";
			                                    echo "<td style='text-align:left; vertical-align:top;'>".substr_replace("<br/>",$mediator_text[$i]."<br>",0)."</td>";
			                                    echo "<td style='text-align:center; vertical-align:top'>".$status_text."</td>";
			                                echo "<tr>";
			                            }
			                            ?>
			                            
			                        </tbody>
			                    </table>
			                </td>
			            </tr>																								
					</tbody>
				</table>
	<?php
			}
		}else{
			echo '<div align="center"; style="color: #648C03;font-size: 15px;"><strong>Data Tidak Ditemukan</strong></div>';								
		}
	}
	?>
</div>
<script type="text/javascript">
closeLoading();
</script>