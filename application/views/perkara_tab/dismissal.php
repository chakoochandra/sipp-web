<?php
function isPihakKeExist($pihakke,$data){
	foreach ($data->result() as $row) {
		if($row->pihakke==$pihakke){
			return TRUE;
		}
	}
	return FALSE;
}
$isDiberitahukan = FALSE;
?>
<style type="text/css">
#infoPerkara .wrapword li {
  display: list-item !important;
  clear: both;
  float: none !important;
}
</style>
<div style="font-size:14px;">
	<table id='infoPerkara' style="font-size:14px;width:100%;">
		<col width="15%">
		<col width="85%">
		<tbody>
			<?php if($idalurperkara==9){?>
				<tr>
					<td colspan='2' style="background-color:#A3DBA8;padding:5px;">Data Panggilan Dismissal</td>
				</tr>
				<tr>
					<td id="first-child" style="vertical-align:top;">Jadwal Panggilan Dismissal</td>
					<td>
						<?php
							if($data_panggilan!=''){
								if($data_panggilan->num_rows>0){?>
								<div class="cssTable" style="margin:0px;padding:0px;width:75%">
									<table id="tableinfo" style="margin:0px;padding:0px;width:100%">
										<col width="3%">
										<col width="15%">
										<col width="20%">
										<tbody>
											<tr>
												<td>No</td>
												<td>Tanggal Panggilan</td>
												<td>Status Kehadiran</td>
											</tr>
										<?php
											$i=1;
											foreach ($data_panggilan->result() as $row) {
												echo '<tr>';
													echo '<td>'.$i.'</td>';
													$tgl = (!empty($row->tglPanggilan))? $this->tanggalhelper->convertDayDate($row->tglPanggilan):'';
													echo '<td>'.$tgl.'</td>';
													echo '<td>'.$row->statusText.'</td>';
												echo '</tr>';
											}?>
										</tbody>
									</table>
								</div>
								<?php
								}
							}?>
					</td>
				</tr>
			<?php } ?>
			<tr>
				<td colspan='2' style="background-color:#A3DBA8;padding:5px;">Data Penetapan Dismissal</td>
			</tr>
			<?php
			if(!empty($data_dismissal)){
				if($data_dismissal->num_rows>0){
					foreach ($data_dismissal->result() as $row) {
						$pemberitahuan_penggugat = $this->tanggalhelper->convertDayDate($row->pemberitahuanPenggugat);
						$pemberitahuan_tergugat = $this->tanggalhelper->convertDayDate($row->pemberitahuanTergugat);
						$hasil = $row->hasil;
						?>
						<tr>
							<td id="first-child">Tanggal Penetapan</td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->tglPutusan);?></td>
						</tr>
						<?php if($idalurperkara==9){?>
							<tr>
								<td id="first-child">Penetapan Dismissal</td>
								<td><?php echo ($row->hasil==1)? 'Lolos':'Tidak Lolos';?></td>
							</tr>
							<tr>
								<td id="first-child" style="vertical-align: top;">Pertimbangan Hukum dan Amar</td>
								<td class='wrapword'><?php echo $row->amar;?></td>
							</tr>
						<?php
						}else{
						?>
							<tr>
								<td id="first-child" style="vertical-align: top;">Pertimbangan Hukum dan Amar</td>
								<td class='wrapword'><?php echo $row->amar;?></td>
							</tr>
						<?php
						}
						?>
						<tr>
							<td colspan='2'></td>
						</tr>


			<?php
					}
				}else{
					echo "<tr><td colspan='2'>DATA TIDAK DITEMUKAN</td></tr>";
				}
			}else{
				echo "<tr><td colspan='2'>DATA TIDAK DITEMUKAN</td></tr>";
			}
			if($idalurperkara==8){
			?>
				<tr>
					<td id="first-child" style="vertical-align:top;">Pemberitahuan Putusan</td>
						<td>
						<?php
							if($data_pemberitahuan!=''){
								if($data_pemberitahuan->num_rows>0){?>
								<div class="cssTable">
									<table id="tableinfo" style="margin:0px;padding:0px;">
										<col width="20%">
										<col width="55%">
										<col width="25%">
										<tbody>
											<tr>
												<td>Status</td>
												<td>Nama</td>
												<td>Tanggal Pemberitahuan Putusan</td>
											</tr>
										<?php
											$i=1;
											foreach ($data_pemberitahuan->result() as $row) {
												$isDiberitahukan = TRUE;
												if($row->pihakke==1){
													echo '<tr>';
														echo '<td>'.$this->nativesession->getStatusPihak(10,$idalurperkara,1).' '.$row->urutan.'</td>';
														echo '<td>'.$row->nama.'</td>';
														$tgl = (!empty($row->tglPemberitahuan))? $this->tanggalhelper->convertDayDate($row->tglPemberitahuan):'';
														echo '<td>'.$tgl.'</td>';
													echo '</tr>';
												}
												
											}?>
										</tbody>
									</table>
								</div>
								<?php
								}
							}
							if($isDiberitahukan){
								echo '<br>';
							}
								?>
							<?php
							if($data_pemberitahuan!=''){
								if($data_pemberitahuan->num_rows>0 AND isPihakKeExist(2,$data_pemberitahuan)){?>
									<div class="cssTable">
										<table id="tableinfo" style="margin:0px;padding:0px;">
											<col width="20%">
											<col width="55%">
											<col width="25%">
											<tbody>
												<tr>
													<td>Status</td>
													<td>Nama</td>
													<td>Tanggal Pemberitahuan Putusan</td>
												</tr>
											<?php
												$i=1;
												foreach ($data_pemberitahuan->result() as $row) {
													$isDiberitahukan = TRUE;
													if($row->pihakke==2){
														echo '<tr>';
															echo '<td>'.$this->nativesession->getStatusPihak(10,$idalurperkara,2).' '.$row->urutan.'</td>';
															echo '<td>'.$row->nama.'</td>';
															$tgl = (!empty($row->tglPemberitahuan))? $this->tanggalhelper->convertDayDate($row->tglPemberitahuan):'';
															echo '<td>'.$tgl.'</td>';
														echo '</tr>';
													}
												}?>
											</tbody>
										</table>
									</div>
								<?php
									}
								}
								?>
						<?php
						echo ($isDiberitahukan==FALSE)? 'Belum diBeritahukan':'';
						?>
					</td>
				</tr>
			<?php 
			}elseif($idalurperkara==9 AND $hasil==2){?>
				<tr>
					<td colspan='2' style="background-color:#A3DBA8;padding:5px;">Data Pemberitahuan Penetapan Dismissal</td>
				</tr>
				<tr>
					<td id="first-child" style="vertical-align:top;">Pemberitahuan Kepada Penggugat</td>
					<td><?php echo $pemberitahuan_penggugat;?></td>
				</tr>
				<tr>
					<td id="first-child" style="vertical-align:top;">Pemberitahuan Kepada Tergugat</td>
					<td><?php echo $pemberitahuan_tergugat;?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
closeLoading();
</script>