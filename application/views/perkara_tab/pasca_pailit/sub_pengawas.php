<div style="font-size:14px;width:90%;">
	<table>
		<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>PENUNJUKAN HAKIM PENGAWAS</b></td></tr>
		<tr>
			<td align='center' style='text-align:center;'>
				<div class="cssTable" style='width:100%'>
					<table>
						<col width="20%">
						<col width="30%">
						<col width="45%">
						<col width="5%">
						<tbody>
							<tr>
								<td>Tanggal Penunjukan</td>
								<td>Nomor Penunjukan</td>
								<td>Nama Hakim</td>
								<td>Aktif</td>
							</tr>
							<?php
							if($hakim_pengawas!=''){
								if($hakim_pengawas->num_rows>0){
									foreach ($hakim_pengawas->result() as $row) {
										echo '<tr>';
											echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglPengangkatan).'</td>';
											echo '<td>'.$row->noPengangkatan.'</td>';
											echo '<td>'.$row->nama.'</td>';
											echo '<td style="text-align:center;">'; echo ($row->aktif=='Y')? 'Ya':'Tidak'; echo '</td>';
										echo '</tr>';
									}
								}else{
									echo '<tr><td colspan="4">BELUM DITETAPKAN</td></tr>';
								}
							}else{
								echo '<tr><td colspan="4">BELUM DITETAPKAN</td></tr>';
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