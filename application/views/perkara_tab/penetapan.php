<div style="font-size:14px;width:90%;">
	<table>
		<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>PENETAPAN HAKIM</b></td></tr>
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
								<?php
								if($idalurperkara==9)
									echo '<td>Jenis Acara</td>';
								?>
								<td>Aktif</td>
							</tr>
							<?php
							if($data_penetapan_hakim!=''){
								if($data_penetapan_hakim->num_rows>0){
									foreach ($data_penetapan_hakim->result() as $row) {
										echo '<tr>';
											echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglPenetapan).'</td>';
											if($jenis_perkara_id == 282 || $jenis_perkara_id == 13){
												echo '<td>Data disamarkan</td>';
											}else{
												echo '<td>'.$row->nama.'</td>';

											}
											echo '<td>'.$row->posisiHakim.'</td>';
											if($idalurperkara==9){
												if($row->jenisAcara=='1'){
													$jenisAcara = 'Acara Cepat';
												} else {
													$jenisAcara = 'Acara Biasa';
												}
												echo '<td style="text-align:center;">'.$jenisAcara.'</td>';
											}
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
		<tr><td style='padding-top:20px;padding-left:5px;color: #648C03;font-size: 15px;'><b>PENETAPAN PANITERA PENGGANTI</b></td></tr>
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
							if($data_penetapan_pp!=''){
								if($data_penetapan_pp->num_rows>0){
									foreach ($data_penetapan_pp->result() as $row) {
										echo '<tr>';
											echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglPenetapan).'</td>';
											if($jenis_perkara_id == 282 || $jenis_perkara_id == 13){
												echo '<td>Data disamarkan</td>';
											}else{
											echo '<td>'.$row->nama.'</td>';
											}
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
		<?php
		
		if($idalurperkara<100){
		?>
			<tr>
				<td style='padding-top:20px;padding-left:5px;color: #648C03;font-size: 15px;'><b>PENETAPAN JURUSITA PENGGANTI</b></td>
			</tr>
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
									<td>Nama Jurusita Pengganti</td>
									<td>Aktif</td>
								</tr>
								<?php
								if($data_penetapan_jurusita!=''){
									if($data_penetapan_jurusita->num_rows>0){
										foreach ($data_penetapan_jurusita->result() as $row) {
											echo '<tr>';
												echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglPenetapan).'</td>';
												if($jenis_perkara_id == 282 || $jenis_perkara_id == 13){
													echo '<td>Data disamarkan</td>';
												}else{
													echo '<td>'.$row->nama.'</td>';
												}
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
		<?php
		}
		?>
		<tr>
			<td style='padding-top:20px;padding-left:5px;color: #648C03;font-size: 15px;'><b>PENETAPAN SIDANG PERTAMA</b></td>
		</tr>
		<tr>
			<td>
				<div class="cssTable" style='width:100%'>
					<table>
						<col width="20%">
						<col width="70%">
						<tbody>
							<tr>
								<td>Tanggal Penetapan</td>
								<td>Tanggal Sidang Pertama</td>
							</tr>
							<?php
							if($data_penetapan_sidang!=''){
								if($data_penetapan_sidang->num_rows>0){
									foreach ($data_penetapan_sidang->result() as $row) {
										echo '<tr>';
											echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglPenetapan).'</td>';
											echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglSidangPertama).'</td>';
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