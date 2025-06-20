<style type="text/css">
#infoPerkara .wrapword li {
  display: list-item !important;
  clear: both;
  float: none !important;
}
</style>
<?php
if($data_penetapan!=''){
	if($data_penetapan->num_rows>0){
		foreach ($data_penetapan->result() as $row) {
			$tglPenetapan = $row->tglPenetapan;
			$petitum = $row->petitum;
		}
	}
}
?>
<div style="font-size:14px;">
	<table id='infoPerkara' style="font-size:14px;width:100%;">
		<col width="15%">
		<col width="85%">
		<tbody>
			<tr>
				<td id="first-child"><font color="white">Tanggal Penetapan Pemeriksaan Pendahuluan</font></td>
				<td><?php echo $this->tanggalhelper->convertDayDate($tglPenetapan);?></td>
			</tr>
			<tr>
				<td id="first-child" style="vertical-align: top;"><font color="white">Tanggal Pemeriksaan Persiapan</font></td>
				<td>
					<?php
					if($data_jadwal_musyawarah!=''){
						if($data_jadwal_musyawarah->num_rows>0){
							echo '<div class="cssTable">';
								echo '<table id="tableinfo" style="margin:0px;padding:0px;">';
									echo '<col width="5%">';
									echo '<col width="15%">';
									echo '<col width="45%">';
									echo '<col width="10%">';
									echo '<col width="25%">';
									echo '<tbody>';
										echo '<tr>';
											echo '<td>No</td>';
											echo '<td>Tanggal</td>';
											echo '<td>Agenda</td>';
											echo '<td>Pukul</td>';
											echo '<td>Keterangan</td>';
										echo '</tr>';
							$i=1;
							foreach ($data_jadwal_musyawarah->result() as $row) {
								echo "<tr>";
									echo "<td align='center'>".$i."</td>";
									echo "<td>".$this->tanggalhelper->convertDayDate($row->tglMusyawarah)."</td>";
									echo "<td>".$row->agenda."</td>";
									echo "<td>".$row->waktu."</td>";
									echo "<td>".$row->keterangan."</td>";
								echo "</tr>";
								$i++;
							}
									echo '</tbody>';
								echo '</table>';
							echo '</div>';
						}
					}
					?>	
				</td>
			</tr>
			<tr>
				<td id="first-child" style="vertical-align: top;"><font color="white">Posita dan Petitum</font></td>
				<td class='wrapword'><?php echo $petitum;?></td>
			</tr>
		</tbody>
	</table>
</div>
<script type="text/javascript">
closeLoading();
</script>