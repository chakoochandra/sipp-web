<div style="font-size:14px;width:95%;">
	<table>

		<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>PUBLISITAS<?php echo $idalurperkara ?></b></td></tr>
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
										if($penetapan_publisitas!=''){
											if($penetapan_publisitas->num_rows>0){
												$no=0;
												foreach ($penetapan_publisitas->result() as $row) { $no++;
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
										if($laporan_publisitas!=''){
											if($laporan_publisitas->num_rows>0){
												$no=0;
												foreach ($laporan_publisitas->result() as $row) { $no++;
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


		
	</table>
</div>
<script type="text/javascript">
closeLoading();
</script>