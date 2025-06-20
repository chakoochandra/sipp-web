<div style="font-size:14px;width:95%;">
	<table>
		
		<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>INSOLVENSI</b></td></tr>
		<tr>
			<td align='center' style='text-align:center;'>
				<div class="cssTable" style='width:100%'>
					<table style="font-size:14px; width: 100%;">
						<col width="5%">
						<col width="15%">
						<col width="10%">
						<col width="40%">
						<col width="30%">
						<tbody>
							<tr>
								<td>No</td>
								<td>Tanggal Rapat</td>
								<td>Jam Rapat</td>
								<td>Agenda / Alasan Ditunda</td>
								<td>Tempat Rapat</td>
							</tr>
							<?php
							if($insolvensi!=''){
								if($insolvensi->num_rows>0){
									$no=0;
									foreach ($insolvensi->result() as $row) { $no++;
										echo '<tr>';
											echo '<td>'.$no.'</td>';
											echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglRapat).'</td>';
											echo '<td>'.$row->jamRapat.'</td>';
											echo '<td>Agenda :</br>'.$row->agendaRapat.'</br></br>Alasan Ditunda :</br>'.$row->alasanDitunda.'</td>';
											echo '<td>'.$row->tempatRapat.'</td>';
										echo '</tr>';
									}
								}else{
									echo '<tr><td colspan="5">BELUM ADA DATA</td></tr>';
								}
							}else{
								echo '<tr><td colspan="5">BELUM ADA DATA</td></tr>';
							}
							?>
						</tbody>
					</table>	
				</div>
			</td>
		</tr>

		
		
	</table>
</div>

<script type="text/javascript">
closeLoading();
</script>