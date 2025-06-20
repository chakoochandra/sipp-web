
<div style="font-size:14px;width:90%;">
	<table>
		<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>HAKIM PEMERIKSA</b></td></tr>
		<tr>
			<td align='center' style='text-align:center;'>
				<div class="cssTable" style='width:100%'>
					<table>
						<?php if($idalurperkara==9) { ?>
							<col width="20%">
							<col width="25%">
							<col width="25%">
							<col width="10%">
							<col width="10%">
						<?php } else { ?>
							<col width="20%">
							<col width="30%">
							<col width="30%">
							<col width="10%">
						<?php } ?>
						<tbody>
							<tr>
								<td>Tanggal Penetapan</td>
								<td>Nama Hakim/Majelis Hakim</td>
								<td>Posisi</td>
								<td>Aktif</td>
							</tr>
							<?php
							if($hakim_pemeriksa!=''){
								if($hakim_pemeriksa->num_rows>0){
									foreach ($hakim_pemeriksa->result() as $row) {
										echo '<tr>';
											echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglPenetapan).'</td>';
											echo '<td>'.$row->nama.'</td>';
											echo '<td>'.$row->posisiHakim.'</td>';
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
		<tr><td style='padding-top:20px;padding-left:5px;color: #648C03;font-size: 15px;'><b>PANITERA/PANITERA PENGGANTI</b></td></tr>
		<tr>
			<td>
				<div class="cssTable" style='width:100%'>
					<table>
						<col width="20%">
						<col width="60%">
						<col width="10%">
						<tbody>
							<tr>
								<td>Tanggal Penetapan</td>
								<td>Nama Panitera Pengganti</td>
								<td>Aktif</td>
							</tr>
							<?php
							if($pp_pemeriksa!=''){
								if($pp_pemeriksa->num_rows>0){
									foreach ($pp_pemeriksa->result() as $row) {
										echo '<tr>';
											echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglPenetapan).'</td>';
											echo '<td>'.$row->nama.'</td>';
											echo '<td style="text-align:center;">'; echo ($row->aktif=='Y')? 'Ya':'Tidak'; echo '</td>';
										echo '</tr>';
									}
								}else{
									echo '<tr><td colspan="3">BELUM DITETAPKAN</td></tr>';
								}
							}else{
								echo '<tr><td colspan="3">BELUM DITETAPKAN</td></tr>';
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