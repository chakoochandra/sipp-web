<div style="font-size:14px;width:95%;">
	<table>
		
		<!-- equalizr revisi 2 februari 2022 -->

		<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>PENCOCOKAN PIUTANG DAN VERIFIKASI</b></td></tr>
		<tr>
			<td align='center' style='text-align:center;'>
			<div class="cssTable" style='width:100%'>
				<div style="font-size:14px;">
					<table id='infoPerkara' style="font-size:14px;width:100%;">
					<tr></tr>
					<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>JADWAL DAN HASIL RAPAT</b></td></tr>
					<tr>
						<td align='center' style='text-align:center;'>
							<div class="cssTable" style='width:98%'>
								<table style="font-size:14px; width: 100%;">
									<col width="3%">
									<col width="17%">
									<col width="10%">
									<col width="40%">
									<col width="30%">
									<tbody>
										<tr>
											<td>No</td>
											<td>Tanggal Rapat</td>
											<td>Jam</td>
											<td>Agenda/Alasan Ditunda</td>
											<td>Tempat Rapat</td>
										</tr>
										<?php
										if($rapatpencocokanpiutangverifikasi!=''){
											if($rapatpencocokanpiutangverifikasi->num_rows>0){
												$no=0;
												foreach ($rapatpencocokanpiutangverifikasi->result() as $row) { $no++;
													echo '<tr>';
														echo '<td>'.$no.'</td>';
														echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglRapat).'</td>';
														echo '<td>'.$row->jamRapat.'</td>';
														echo '<td>Agenda :</br>'.$row->agendaRapat.'</br></br>Alasan Ditunda :</br>'.$row->alasanDitunda.'</td>';
														echo '<td>'.$row->tempatRapat.'</td>';
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

					<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>BANTAHAN TAGIHAN</b></td></tr>
					<tr>
						<td align='center' style='text-align:center;'>
							<div class="cssTable" style='width:98%'>
								<table style="font-size:14px; width: 100%;">
									<col width="3%">
									<col width="17%">
									<col width="40%">
									<col width="40%">
									<tbody>
										<tr>
											<td>No</td>
											<td>Tanggal Pengajuan Bantahan</td>
											<td>Pemohon</td>
											<td>Hasil Bantahan</td>
										</tr>
										<?php
										if($bantahantagihan!=''){
											if($bantahantagihan->num_rows>0){
												$no=0;
												foreach ($bantahantagihan->result() as $row) { $no++;
													echo '<tr>';
														echo '<td>'.$no.'</td>';
														echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglPengajuan).'</td>';
														if ($row->kedudukanPemohon == 1){
															echo '<td>'.$row->pemohon.'</br>
															(Separatis)</td>';
														} else if ($row->kedudukanPemohon == 2){
															echo '<td>'.$row->pemohon.'</br>
															(Konkuren/Bersaing)</td>';
														} else if ($row->kedudukanPemohon == 3){
															echo '<td>'.$row->pemohon.'</br>
															(Preferen)</td>';
														}

														if ($row->hasil == 'Y'){
															echo '<td>Berhasil Berdamai</td>';
														} else if ($row->hasil == 'T'){
															echo '<td>Tidak Berhasil Berdamai</td>';
														}
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


                    <tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>RENVOI PROSEDUR</b></td></tr>
					<tr>
						<td align='center' style='text-align:center;'>
							<div class="cssTable" style='width:98%'>
								<table style="font-size:14px; width: 100%;">
									<col width="3%">
									<col width="17%">
									<col width="30%">
									<col width="30%">
                                    <col width="20%">
									<tbody>
										<tr>
											<td>No</td>
											<td>Nomor Perkara</td>
											<td>Tanggal Register</td>
											<td>Klasifikasi Perkara</td>
                                            <td>Status Perkara</td>
										</tr>
										<?php
										if($bantahantagihan!=''){
											if($bantahantagihan->num_rows>0){
												$no=0;
												foreach ($bantahantagihan->result() as $row) { $no++;
													echo '<tr>';
														echo '<td>'.$no.'</td>';
														echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglPengajuan).'</td>';
														if ($row->kedudukanPemohon == 1){
															echo '<td>'.$row->pemohon.'</br>
															(Separatis)</td>';
														} else if ($row->kedudukanPemohon == 2){
															echo '<td>'.$row->pemohon.'</br>
															(Konkuren/Bersaing)</td>';
														} else if ($row->kedudukanPemohon == 3){
															echo '<td>'.$row->pemohon.'</br>
															(Preferen)</td>';
														}

														if ($row->hasil == 'Y'){
															echo '<td>Berhasil Berdamai</td>';
														} else if ($row->hasil == 'T'){
															echo '<td>Tidak Berhasil Berdamai</td>';
														}
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


					<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>TINDAKAN HAKIM PENGAWAS</b></td></tr>
					<tr>
						<td align='center' style='text-align:center;'>
							<div class="cssTable" style='width:98%'>
								<table style="font-size:14px; width: 100%;">
									<col width="3%">
									<col width="17%">
									<col width="40%">
									<col width="40%">
									<tbody>
										<tr>
											<td>No</td>
											<td>Jenis Permohonan</td>
											<td>Detil Permohonan</td>
											<td>Detil Surat / Penetapan Hakim Pengawas</td>
										</tr>
										<?php
										if($thprapatpencocokanpiutangverifikasi!=''){
											if($thprapatpencocokanpiutangverifikasi->num_rows>0){
												$no=0;
												foreach ($thprapatpencocokanpiutangverifikasi->result() as $row) { $no++;
													echo '<tr>';
														echo '<td>'.$no.'</td>';
														echo '<td>'.$row->uraian.'</td>';
														if ($row->tipePemohon == 1){
															$tipe = "Kreditor";
														} else if ($row->tipePemohon == 2){
															$tipe = "Debitur";
														} else if ($row->tipePemohon == 3){
															$tipe = "Kurator";
														}
														echo '<td><b>Nomor Permohonan:</b> '.$row->noSurat.'</br>
														<b>Tanggal Permohonan:</b> '.$this->tanggalhelper->convertDayDate($row->tglSurat).'</br>
														<b>Nama Pemohon:</b> '.$row->namaPemohon.'</br>
														<b>Tipe Pemohon:</b> '.$tipe.'</br>
															 </td>';
														echo '<td><b>Nomor Surat/Penetapan:</b> '.$row->nomorPenetapan.'</br>
															 <b>Tanggal Surat/Penetapan:</b> '.$this->tanggalhelper->convertDayDate($row->tanggalPenetapan).'</br>
															 <b>Hakim Pengawas:</b> '.$row->namaHakim.'</br>
																  </td>';
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
			</div>
			</td>
		<tr>
			
		</tr>
		
		
	</table>
</div>
<script type="text/javascript">
closeLoading();
</script>