<?php 
if ($data_jadwal_sidang!='') {
	if ($data_jadwal_sidang->num_rows > 0 ){
		foreach ($data_jadwal_sidang->result() as $row) {
			$noPerkara=$row->noPerkara;
		}
	}
}
?>
<div  style="margin:5% 25%;padding:5px;width:50%;background:#fff">
	<div class="cssTable"  style="width:97%;border:1px solid #eee;align:center">
	<table  id="infoPerkara" style="font-size:14px;width:100%;height:100px">
		<col width="35%" />
		<col width="75%" />
		<tbody>
			<tr>
				<td colspan="2"><h2 style="text-align:center">Detil Jadwal Sidang</h2></td>
			</tr>
			
			<?php
			if($data_jadwal_sidang!=''){
				if($data_jadwal_sidang->num_rows>0){
					foreach ($data_jadwal_sidang->result() as $row) {
					
				   echo 
				   		'<tr>
							<td id="first-child">Nomor Perkara</td>
							<td>'.$row->noPerkara.'<td>
						</tr>
						<tr>
							<td id="first-child">Jenis Perkara</td>
							<td>'.$row->jenisPerkara.'<td>
						</tr>
						<tr>';
						if ($row->klasifikasiPerkara > 110 ){
							echo '<td id="first-child">Terdakwa </td>';
						}else{
							echo '<td id="first-child">Pihak </td>';
						}
						echo '<td>'.$row->pihak.'<td> 
						</tr>
						<td colspan="2" id="first-child"></td>
						<tr>
							<td id="first-child">Hari dan Tanggal Sidang</td>
							<td>'.$this->tanggalhelper->convertDayDate($row->tglSidang).'<td>
						</tr>
						<tr>
							<td id="first-child">Jam Sidang</td>
							<td>'.$row->jamSidang.' s/d '.$row->selesaiSidang.'<td>
						</tr>
						<tr>
							<td id="first-child">Agenda</td>
							<td>'.$row->agenda.'<td>
						</tr>
						<tr>
							<td id="first-child">Sidang Keliling</td>
							<td>'.$row->sidangkeliling.'<td>
						</tr>
						<tr>
							<td id="first-child">Ruang Sidang</td>
							<td>'.$row->ruangan.'<td>
						</tr>
						<tr>
							<td colspan="2" style="background:#fff" align="center"><input type="button" id="kembaliKeList" value="Tutup" class="btn"></td>
						<tr>';
					}
				}
			}
			?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
closeLoading();
$('#kembaliKeList').closingFormWin();

</script>