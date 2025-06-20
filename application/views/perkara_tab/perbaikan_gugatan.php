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
			if(!empty($data_perbaikan_gugatan)){
				if($data_perbaikan_gugatan->num_rows>0){
					foreach ($data_perbaikan_gugatan->result() as $row) {?>

						<tr>
							<td id="first-child"><font color="white">Tanggal Saran Perbaikan Gugatan</font></td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->tglSaranPerbaikan);?></td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Saran Perbaikan</font></td>
							<td><?php echo $row->isiSaranPerbaikan;?></td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Perbaikan/Dinyatakan Lengkap</font></td>
							<td>
							<?php 
							if ($row->statusPerbaikan == 1){
								echo 'Diperbaiki dan dinyatakan lengkap'; 
							} else if ($row->statusPerbaikan == 2){
								echo 'Dinyatakan Lengkap';
							} else if ($row->statusPerbaikan == 3){
								echo 'Belum Menyempurnakan Gugatan';
							}
							?>
							</td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Tanggal Perbaikan/Dinyatakan Lengkap</font></td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->tglDinyatakanLengkap);?></td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Petitum</font></td>
							<td><?php echo $row->petitum;?></td>
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