<div style="font-size:14px;width:95%;">
	<table>

		<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>PUTUSAN PKPU SEMENTARA</b></td></tr>
		<tr>
			<td>
				<div style="font-size:14px;">
						<table id='infoPerkara' style="font-size:14px;width:100%;">
							<col width="20%">
							<col width="80%">
							<tbody>
							<?php 
							foreach ($putusan_pkpu_sementara->result() as $row) { ?>
							
								<tr>
									<td id="first-child"><font color="white">Tanggal Putusan</font></td>
									<td><?php echo $row->tglPutusan;?></td>
								</tr>
								<tr>
									<td id="first-child"><font color="white">Amar Putusan</font></td>
									<td class='wrapword'><?php echo $row->amar;?></td>
								</tr>
								<tr>
									<td id="first-child"><font color="white">Pemberitahuan Putusan Kepada Pemohon</font></td>
									<td><?php echo $row->pemberitahuanPutPihak1;?></td>
								</tr>
								<tr>
									<td id="first-child"><font color="white">Pemberitahuan Putusan Kepada Termohon</font></td>
									<td><?php echo $row->pemberitahuanPutPihak2;?></td>
								</tr>
							
							<?php } ?>
							</tbody>
						</table>
				</div>
			</td>
		</tr>
		
		<!-- equalizr revisi 25 nov 2021 -->
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

		<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>PENUNJUKAN PENGURUS</b></td></tr>
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
								<td>Nomor Surat/ Putusan Penunjukan</td>
								<td>Nama Pengurus</td>
								<td>Aktif</td>
							</tr>
							<?php
							if($pengurus!=''){
								if($pengurus->num_rows>0){
									foreach ($pengurus->result() as $row) {
										echo '<tr>';
											echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglPengangkatan).'</td>';
											echo '<td>'.$row->noPenunjukan.'</td>';
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

		<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>PUBLISITAS</b></td></tr>
		<tr>
			<td align='center' style='text-align:center;'>
			<div class="cssTable" style='width:100%'>
				<div style="font-size:14px;">
					<table id='infoPerkara' style="font-size:14px;width:100%;">
					<tr></tr>
					<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>PENETAPAN PUBLISITAS</b></td></tr>
					<tr>
						<td align='center' style='text-align:center;'>
							<div class="cssTable" style='width:98%'>
								<table style="font-size:14px; width: 100%;">
									<col width="3%">
									<col width="17%">
									<col width="80%">
									<tbody>
										<tr>
											<td>No</td>
											<td>Tanggal</td>
											<td>Isi Penetapan</td>
										</tr>
										<?php
										if($penetapanpublisitas!=''){
											if($penetapanpublisitas->num_rows>0){
												$no=0;
												foreach ($penetapanpublisitas->result() as $row) { $no++;
													echo '<tr>';
														echo '<td>'.$no.'</td>';
														echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglPenetapan).'</td>';
														echo '<td><b>Nomor Penetapan:</b> '.$row->noPenetapan.'</br>
														<b>Nama Surat Kabar 1:</b> '.$row->suratKabar1.'</br>
														<b>Nama Surat Kabar 2:</b> '.$row->suratKabar2.'</br>
														<b>Tanggal Rapat Kreditor Pertama:</b> '.$this->tanggalhelper->convertDayDate($row->tglRapat).'</br>
														<b>Tempat Rapat Kreditor Pertama:</b> '.$row->tempatRapat.'</br>
														<b>Batas Akhir Pengajuan Tagihan Kreditor:</b> '.$this->tanggalhelper->convertDayDate($row->batasAkhirPenagihanKreditur).'</br>
														<b>Tanggal Rapat Pencocokan Piutang dan Verifikasi Pajak:</b> '.$this->tanggalhelper->convertDayDate($row->tglRapatPencocokan).'</br>
														<b>Tempat Rapat Pencocokan Piutang dan Verifikasi Pajak:</b> '.$row->tempatRapatPencocokan.'</br>
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

					<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>LAPORAN PUBLISITAS</b></td></tr>
					<tr>
						<td align='center' style='text-align:center;'>
							<div class="cssTable" style='width:98%'>
								<table style="font-size:14px; width: 100%;">
									<col width="3%">
									<col width="17%">
									<col width="80%">
									<tbody>
										<tr>
											<td>No</td>
											<td>Tanggal Publisitas</td>
											<td>Media</td>
										</tr>
										<?php
										if($laporanpublisitas!=''){
											if($laporanpublisitas->num_rows>0){
												$no=0;
												foreach ($laporanpublisitas->result() as $row) { $no++;
													if ($row->IDJenisMedia == 1){

													} else if ($row->IDJenisMedia == 1){

													}
													echo '<tr>';
														echo '<td>'.$no.'</td>';
														echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglPublisitas).'</td>';
														if ($row->IDJenisMedia == 1){
															echo '<td><b>Jenis Media:</b> Berita Negara</br>
															<b>Nama Media:</b> '.$row->jenisMedia.'</br>
															</td>';
														} else if ($row->IDJenisMedia == 2){
															echo '<td><b>Jenis Media:</b> Surat Kabar</br>
															<b>Nama Media:</b> '.$row->jenisMedia.'</br>
															</td>';	
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

					</table>
				</div>
			</div>
			</td>
		<tr>
			
		</tr>


		<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>RAPAT KREDITOR PERTAMA</b></td></tr>
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
										if($rapatkreditorpertama!=''){
											if($rapatkreditorpertama->num_rows>0){
												$no=0;
												foreach ($rapatkreditorpertama->result() as $row) { $no++;
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

					<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>TINDAKAN HAKIM PENGAWAS</b></td></tr>
					<tr>
						<td align='center' style='text-align:center;'>
							<div class="cssTable" style='width:98%'>
								<table style="font-size:14px; width: 100%;">
									<col width="3%">
									<col width="37%">
									<col width="30%">
									<col width="30%">
									<tbody>
										<tr>
											<td>No</td>
											<td>Jenis Permohonan</td>
											<td>Detil Permohonan</td>
											<td>Detil Surat / Penetapan Hakim Pengawas</td>
										</tr>
										<?php
										if($thprapatkreditorpertama!=''){
											if($thprapatkreditorpertama->num_rows>0){
												$no=0;
												foreach ($thprapatkreditorpertama->result() as $row) { $no++;
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

		<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>RAPAT KREDITOR LANJUTAN</b></td></tr>
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
										if($rapatkreditorlanjutan!=''){
											if($rapatkreditorlanjutan->num_rows>0){
												$no=0;
												foreach ($rapatkreditorlanjutan->result() as $row) { $no++;
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
										if($thprapatkreditorlanjutan!=''){
											if($thprapatkreditorlanjutan->num_rows>0){
												$no=0;
												foreach ($thprapatkreditorlanjutan->result() as $row) { $no++;
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