<style type="text/css">
#infoPerkara .wrapword li {
  display: list-item !important;
  clear: both;
  float: none !important;
}
</style>
<div style="font-size:14px;">
	<table id='infoPerkara' style="font-size:14px;width:100%;">
		<col width="15%">
		<col width="85%">
		<tbody>
			<tr>
				<td id="first-child"><font color="white">Tanggal Putusan Sela</font></td>
				<td><?php echo $tglPutusanSela; ?></td>
			</tr>
			<tr>
				<td id="first-child" style="vertical-align: top;"><font color="white">Amar Putusan Sela</font></td>
				<td class='wrapword'><?php echo $amarSela;?></td>
			</tr>
			<?php if($idalurperkara>=3 AND $idalurperkara<=6){ ?>
			<tr>
				<td id="first-child"><font color="white">Tanggal Media Berita</font></td>
				<td><?php echo $row->tglBerita;?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Nama Media Berita</font></td>
				<td><?php echo $namaMedia;?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Tanggal Penetapan Hakim Pengawas</font></td>
				<td><?php echo $tglPenetapanHakim;?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Tanggal Surat Kabar</font></td>
				<td><?php echo $tglSuratKabar;?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Nama Surat Kabar</font></td>
				<td><?php echo $namaSuratKabar;?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Tanggal Penetapan Hakim Pengawas</font></td>
				<td><?php echo $row->tglPenetapanHakim;?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Hakim Pengawas</font></td>
				<td><?php echo $hakimPengawas;?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Pengurus Nama</font></td>
				<td><?php echo $pengurusNama;?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Tanggal Perpanjangan</font></td>
				<td><?php echo $row->tglPerpanjangan;?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Perpanjangan</font></td>
				<td><?php echo $mulaiPerpanjangan.'Sampai Dengan '.$row->sampaiPerpanjangan;?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Tanggal Penetapan Sita Jaminan</font></td>
				<td><?php echo $penetapanSitaJaminan;?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Tanggal Pelaksanaan Sita Jaminan</font></td>
				<td><?php echo $pelaksanaanSitaJaminan;?></td>
			</tr>
			<?php } ?>
			<tr>
				<td id="first-child"><font color="white">Pemberitahuan Putusan Sela Kepada <?php echo $this->nativesession->getStatusPihak(10,$idalurperkara,1);?></font></td>
				<td><?php echo $tglPemberitahuanPihak1;?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Pemberitahuan Putusan Sela Kepada <?php echo $this->nativesession->getStatusPihak(10,$idalurperkara,1);?></font></td>
				<td><?php echo $tglPemberitahuanPihak2;?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Pemberitahuan Putusan Sela Kepada Pihak <?php echo $this->nativesession->getStatusPihak(10,$idalurperkara,1);?></font></td>
				<td><?php echo $tglPemberitahuanPihak3;?></td>
			</tr>
			<tr>
				<td colspan='2'></td>
			</tr>
		</tbody>
	</table>
</div>
<script type="text/javascript">
closeLoading();
</script>