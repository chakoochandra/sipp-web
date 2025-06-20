<?php
if ($infoperkaragrasi!=NULL) {
	if($infoperkaragrasi->num_rows>0){
		foreach($infoperkaragrasi->result() as $row){
				  $id=$row->ID;
				  $alur_perkara_id=$row->IDAlurPerkara;
				  $nomor_perkara_pn=$row->noPerkaraPN;
				  $putusan_pn=$this->tanggalhelper->convertDayDate($row->putusanPN);
				  $nomor_perkara_banding=$row->nomorBerkaraBanding;
				  $putusan_banding=$this->tanggalhelper->convertDayDate($row->putusanBanding);
				  $nomor_perkara_kasasi=$row->nomorPerkaraKasasi;
				  $putusan_kasasi=$this->tanggalhelper->convertDayDate($row->putusanKasasi);
				  $nomor_perkara_pk=$row->nomorPerkaraPK;
				  $putusan_pk=$this->tanggalhelper->convertDayDate($row->putusanPK);
				  $permohonan_grasi=$this->tanggalhelper->convertDayDate($row->permohonanGrasi);
				  $permohonan_penundaan_pidana=$this->tanggalhelper->convertDayDate($row->permohonanPenundaanPidana);
				  $terdakwa_nama=$row->terdakwaNama;
				  $pemohon_nama=$row->pemohonNama;
				  $pemohon_pekerjaan=$row->pemohonPekerjaan;
				  $pemohon_alamat=$row->pemohonAlamat;
				  $pemohon_grasi=$row->pemohonGrasi;
				  $pemberitahuan_putusan_tetap=$this->tanggalhelper->convertDayDate($row->pemberitahuanPutusanTetap);
				  $menjalani_pidana_pengganti=$row->menjalaniPidanaPengganti;
				  $terpidana_dalam_tahanan=$row->terpidanaDalamTahanan;
				  $denda_dibayar=$row->dendaDibayar;
				  $barang_rampasan=$row->barangRampasan;
				  $tanggal_pertimbangan_hakim=$this->tanggalhelper->convertDayDate($row->tanggalPertimbanganHakim);
				  $isi_perimbangan_hakim=$row->isiPerimbanganHakim;
				  $pengiriman_berkas_grasi_ke_kejaksaan=$this->tanggalhelper->convertDayDate($row->pengirimanBerkasGrasiKeKejaksaan);
				  $no_pengiriman_berkas_grasi_ke_kejaksaan=$row->noPengirimanPerkasGrasiKeKejaksaan;
				  $pengiriman_berkas_grasi_ke_ma=$this->tanggalhelper->convertDayDate($row->pengirimanBerkasGrasiKeMA);
				  $no_pengiriman_berkas_grasi_ke_ma=$row->noPengirimanBerkasGrasiKeMA;
				  $pengiriman_pertimbangan_hakim_grasi=$this->tanggalhelper->convertDayDate($row->pengirimanPertimbanganHakimGrasi);
				  $tanggal_penerimaan_kembali_berkas_grasi=$this->tanggalhelper->convertDayDate($row->tanggalPenerimaanKembaliBerkasGrasi);
				  $tanggal_putusan_grasi=$this->tanggalhelper->convertDayDate($row->tanggalPutusanGrasi);
				  $status_putusan_grasi_text=$row->statusPutusanGrasi;
				  $nomor_putusan_grasi=$row->nomorPutusanGrasi;
				  $amar_putusan_grasi=$row->amarPutusanGrasi;
				  $pemberitahuan_putusan_grasi=$this->tanggalhelper->convertDayDate($row->pemberitahuanPutusanGrasi);
				  $pemberitahuan_tembusan_grasi=$this->tanggalhelper->convertDayDate($row->pemberitahuanTembusanGrasi);
				  $catatan_putusan_grasi=$this->tanggalhelper->convertDayDate($row->catatanPutusanGrasi);
		}
	}
}
?>
<style type="text/css">
td{
	border:1px solid #eee;
}
</style>
 <hr class="thick-line" style="clear:both;">
	<div class="detil" style="background-color:white;border-color: white;font-size:14px;margin-top:25px;width: 95%;margin: 0 auto;padding:5px;border:1px solid #5fb85c;">
		<table id="tableDetilPerkara">
			<col width="30%">
			<col width="70%">
				<tbody>
					<tr>
						<td style="color:white;">Nomor Perkara PN</td>
						<td style="padding:0px;padding-left:5px;"><?php echo $nomor_perkara_pn; ?></td>
					</tr>
					<tr>
						<td style="color:white;">Putusan PN</td>
						<td style="padding:0px;padding-left:5px;"><?php echo $putusan_pn; ?></td>
					</tr>
					<tr>
						<td style="color:white;">Nomor Perkara Banding</td>
						<td style="padding:0px;padding-left:5px;"><?php echo $nomor_perkara_banding; ?></td>
					</tr>
					<tr>
						<td style="color:white;">Putusan Banding</td>
						<td style="padding:0px;padding-left:5px;"><?php echo $putusan_banding; ?></td>
					</tr>
					<tr>
						<td style="color:white;">Nomor Perkara Kasasi</td>
						<td style="padding:0px;padding-left:5px;"><?php echo $nomor_perkara_kasasi; ?></td>
					</tr>
					<tr>
						<td style="color:white;">Putusan Kasasi</td>
						<td style="padding:0px;padding-left:5px;"><?php echo $putusan_kasasi; ?></td>
					</tr>
					<tr>
						<td style="color:white;">Nomor Perkara PK</td>
						<td style="padding:0px;padding-left:5px;"><?php echo $nomor_perkara_pk; ?></td>
					</tr>
					<tr>
						<td style="color:white;">Putusan PK</td>
						<td style="padding:0px;padding-left:5px;"><?php echo $putusan_pk; ?></td>
					</tr>
					<tr>
						<td style="color:white;">Permohonan Grasi</td>
						<td style="padding:0px;padding-left:5px;"><?php echo $permohonan_grasi; ?></td>
					</tr>
					<tr>
						<td style="color:white;">Permohonan Penundaan Pidana</td>
						<td style="padding:0px;padding-left:5px;"><?php echo $permohonan_penundaan_pidana; ?></td>
					</tr>
					<tr id="tr_terdakwa">
						<td style="color:white;">Nama Terdakwa</td>
						<td style="padding:0px;padding-left:5px;"><?php echo $terdakwa_nama; ?></td>
					</tr>
					<tr>
						<td style="color:white;">Nama Pemohon</td>
						<td style="padding:0px;padding-left:5px;"><?php echo $pemohon_nama; ?></td>
					</tr>
					<tr>
						<td style="color:white;">Pekerjaan Pemohon</td>
						<td style="padding:0px;padding-left:5px;"><?php echo $pemohon_pekerjaan; ?></td>
					</tr>
					<tr>
						<td style="color:white;">Alamat Pemohon</td>
						<td style="padding:0px;padding-left:5px;"><?php echo $pemohon_alamat; ?></td>
					</tr>
					<tr>
						<td style="color:white;">Pemberitahuan Putusan Tetap</td>
						<td style="padding:0px;padding-left:5px;"><?php echo $pemberitahuan_putusan_tetap; ?></td>
					</tr>
					<tr>
					<td style="color:white;">Menjalani Pidana Pengganti</td>
						<td style="padding:0px;padding-left:5px;">
							<?php
								if ($menjalani_pidana_pengganti=="Y") {
									echo "YA";
								}else{
									echo "Tidak";
								} 
								?>
						</td>
					</tr>
						<tr>
							<td style="color:white;">Terpidana Dalam Tahanan</td>
							<td style="padding:0px;padding-left:5px;">
							<?php
								if ($terpidana_dalam_tahanan=="Y") {
									echo "YA";
								}else{
									echo "Tidak";
								} 
							?>
							</td>	
						</tr>
						<tr>
							<td style="color:white;">Denda Dibayar</td>
							<td style="padding:0px;padding-left:5px;">
							<?php
								if ($denda_dibayar=="Y") {
									echo "YA";
								}else{
									echo "Tidak";
								} 
							?>
							</td>
						</tr>
						<tr>
							<td style="color:white;">Barang Rampasan</td>
							<td style="padding:0px;padding-left:5px;">
							<?php
								if ($barang_rampasan=="Y") {
									echo "YA";
								}else{
									echo "Tidak";
								} 
							?>
							</td>
						</tr>
						<tr>
							<td style="color:white;">Tanggal Pertimbangan Mahkamah Agung</td>
							<td style="padding:0px;padding-left:5px;"><?php echo $tanggal_pertimbangan_hakim; ?></td>
						</tr>
						<tr>
							<td style="color:white;">Isi Pertimbangan Mahkamah Agung</td>
							<td style="padding:0px;padding-left:5px;"><?php echo $isi_perimbangan_hakim; ?></td>
						</tr>
						<tr>
							<td style="color:white;">Pengiriman Berkas Grasi ke Kejaksaan negeri</td>
							<td style="padding:0px;padding-left:5px;"><?php echo $pengiriman_berkas_grasi_ke_kejaksaan; ?></td>
						</tr>
						<tr>
							<td style="color:white;">Nomor Surat Pengiriman Berkas Grasi ke Kejaksaan Negeri</td>
							<td style="padding:0px;padding-left:5px;"><?php echo $no_pengiriman_berkas_grasi_ke_kejaksaan; ?></td>
						</tr>
						<tr>
							<td style="color:white;">Pengiriman Berkas Grasi ke MA</td>
							<td style="padding:0px;padding-left:5px;"><?php echo $pengiriman_berkas_grasi_ke_ma; ?></td>
						</tr>
						<tr>
							<td style="color:white;">Nomor Surat Pengiriman Berkas Grasi ke MA</td>
							<td style="padding:0px;padding-left:5px;"></td>
						</tr>
						<tr>
							<td style="color:white;">Pengiriman Pertimbangan Hakim Grasi</td>
							<td style="padding:0px;padding-left:5px;"><?php echo $pengiriman_pertimbangan_hakim_grasi; ?></td>
						</tr>
						<tr>
							<td style="color:white;">Tanggal Putusan Presiden</td>
							<td style="padding:0px;padding-left:5px;"><?php echo $tanggal_putusan_grasi; ?></td>
						</tr>
						<tr>
							<td style="color:white;">Nomor Putusan Presiden</td>
							<td style="padding:0px;padding-left:5px;"><?php echo $nomor_putusan_grasi; ?></td>
						</tr>
						<tr>
							<td style="color:white;">Isi Keputusan Presiden</td>
							<td style="padding:0px;padding-left:5px;"><?php echo $amar_putusan_grasi; ?></td>
						</tr>
						<tr>
							<td style="color:white;">Tanggal Penerimaan Kembali Berkas Grasi</td>
							<td style="padding:0px;padding-left:5px;"><?php echo $tanggal_penerimaan_kembali_berkas_grasi; ?></td>
						</tr>
						<tr>
							<td style="color:white;">Pemberitahuan Putusan Grasi Kepada Pemohon dan Jaksa</td>
							<td style="padding:0px;padding-left:5px;"><?php echo $pemberitahuan_putusan_grasi; ?></td>
						</tr>
						<tr>
							<td style="color:white;">Penerimaan Tembusan Berita Acara Pelaksanaan Putusan Dari Penuntut Umum</td>
							<td style="padding:0px;padding-left:5px;"><?php echo $pemberitahuan_tembusan_grasi; ?></td>
						</tr>
						<tr>
							<td style="color:white;">Keterangan</td>
							<td style="padding:0px;padding-left:5px;"><?php echo $catatan_putusan_grasi; ?></td>
						</tr>
					</tbody>
				</table>
		</div>
</div>
<script type="text/javascript">
	closeLoading();
</script>