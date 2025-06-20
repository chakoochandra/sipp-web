<?php
$idalurperkara = $this->tanggalhelper->getIDAlurPerkara($idperkara);
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
			<?php
			if(!empty($data_pen_gugur)){
				if($data_pen_gugur->num_rows>0){
					foreach ($data_pen_gugur->result() as $row) {?>
						<tr>
							<td id="first-child">Tanggal Penetapan</td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->tglPutusan);?></td>
						</tr>
						<tr>
							<td id="first-child" style="vertical-align: top;">Amar Penetapan</td>
							<td class='wrapword'><?php echo $row->amar;?></td>
						</tr>
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
		</tbody>
	</table>
</div>
<script type="text/javascript">
closeLoading();
</script>