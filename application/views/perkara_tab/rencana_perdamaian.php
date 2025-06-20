<div style="font-size:14px;width:95%;">
	<table>
		
		<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>JADWAL DAN HASIL RAPAT</b></td></tr>
		<tr>
			<td align='center' style='text-align:center;'>
				<div class="cssTable" style='width:100%'>
					<table style="font-size:14px; width: 100%;">
						<col width="2%">
						<col width="18%">
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
							if($rencana_perdamaian!=''){
								if($rencana_perdamaian->num_rows>0){
									$no=0;
									foreach ($rencana_perdamaian->result() as $row) { $no++;
										echo '<tr>';
											echo '<td>'.$no.'</td>';
											echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglRapat).'</td>';
											echo '<td>'.$row->jamRapat.'</td>';
											echo '<td>Agenda :</br>'.$row->agendaRapat.'</br></br>Alasan Ditunda :</br>'.$row->alasanDitunda.'</td>';
											echo '<td>'.$row->tempatRapat.'</td>';
										echo '</tr>';
									}
								}else{
									echo '<tr><td colspan="3">BELUM ADA LAPORAN</td></tr>';
								}
							}else{
								echo '<tr><td colspan="3">BELUM ADA LAPORAN</td></tr>';
							}
							?>
						</tbody>
					</table>	
				</div>
			</td>
		</tr>

		
		<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>PEMBETULAN BERITA ACARA RAPAT PEMUNGUTAN SUARA</b></td></tr>
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
								<td>Nomor Perkara</td>
								<td>Tanggal Register</td>
								<td>Klasifikasi Perkara</td>
								<td>Status Perkara</td>
							</tr>
							<?php
                            $no = 0;
							if($pembetulanba!=''){
								if($pembetulanba->num_rows>0){
									foreach ($pembetulanba->result() as $row) { $no++;
										echo '<tr>';
                                            echo '<td>'.$no.'</td>';
											echo '<td>'.$row->noPerkara.'</td>';
											echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglPendaftaran).'</td>';
											echo '<td>'.$row->jenisPerkara.'</td>';
                                            echo '<td>'.$row->statusAkhir.'</td>';
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

		<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>HASIL PEMUNGUTAN SUARA</b></td></tr>
		<tr>
			<td>
				<div style="font-size:14px;">
						<table id='infoPerkara' style="font-size:14px;width:100%;">
							<col width="15%">
							<col width="85%">
							<tbody>
							
							<?php 
							if($pemungutansuaraperdamaian!=''){
								if($pemungutansuaraperdamaian->num_rows>0){
									foreach ($pemungutansuaraperdamaian->result() as $row) { ?>
									<tr>
										<td id="first-child"><font color="white">Tanggal Pemungutan Suara</font></td>
										<td style="padding:0px;padding-left:5px;"><?php echo $this->tanggalhelper->convertDayDate($row->tglPemungutan);?></td>
									</tr>
									<tr>
										<td id="first-child"><font color="white">Amar Hasil Pemungutan Suara</font></td>
										<td class='wrapword' style="padding:0px;padding-left:5px;"><?php echo $row->amar;?></td>
									</tr>
									<tr>
										<td id="first-child"><font color="white">Hasil Pemungutan Suara</font></td>
										<td style="padding:0px;padding-left:5px;">
										<?php
										if ($row->hasilPemungutan == 1){
											echo "Diterima";
										} else if ($row->hasilPemungutan == 2){
											echo "Ditolak";
										}
										?>
										</td>
									</tr>                   
									<?php  
									}
								} else {
									?>
									<tr>
										<td id="first-child"><font color="white">Tanggal Pemungutan Suara</font></td>
										<td style="padding:0px;padding-left:5px;">Belum Ada Data</td>
									</tr>
									<tr>
										<td id="first-child"><font color="white">Amar Hasil Pemungutan Suara</font></td>
										<td class='wrapword' style="padding:0px;padding-left:5px;">Belum Ada Data</td>
									</tr>
									<tr>
										<td id="first-child"><font color="white">Hasil Pemungutan Suara</font></td>
										<td style="padding:0px;padding-left:5px;">Belum Ada Data</td>
									</tr> 
									<?php
								}
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