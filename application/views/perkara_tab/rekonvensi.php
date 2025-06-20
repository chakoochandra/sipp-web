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
			if(!empty($data_rekonvensi)){
				if($data_rekonvensi->num_rows>0){
					foreach ($data_rekonvensi->result() as $row) {?>
						<tr>
							<td id="first-child">Tanggal Pendaftaran</td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->tglPendaftaran);?></td>
						</tr>
						<tr>
							<td id="first-child">Para Pihak</td>
							<td><?php echo $row->parapihak;?></td>
						</tr>
						<tr>
							<td id="first-child" style="vertical-align: top;">Isi Petitum</td>
							<td class='wrapword'><?php echo $row->petitum;?></td>
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
		</tbody>
	</table>
</div>
<script type="text/javascript">
closeLoading();
</script>