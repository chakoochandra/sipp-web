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
			<?php
			if(!empty($data_keberatan)){
				if($data_keberatan->num_rows>0){
					foreach ($data_keberatan->result() as $row) {?>
						<tr>
							<td colspan="2">
								<table id='infoPerkara' style="font-size:14px;width:100%;">
								<tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>DATA PARA PIHAK</b></td></tr></tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Tanggal Permohonan</font></td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->tglPendaftaran);?></td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Para Pihak</td>
							<td><?php echo $row->pemohon;?></td>
						</tr>
						<tr>
							<td colspan="2">
								<table id='infoPerkara' style="font-size:14px;width:100%;">
								<tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>DATA PROSES KEBERATAN</b></td></tr></tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Tanggal Penerimaan Memory</font></td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->penerimaanMemori);?></td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Tanggal Penyerahan Memory</font></td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->penyerahanMemori);?></td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Tanggal Penerimaan Kontra Memory</font></td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->penerimaanKontra);?></td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Tanggal Penyerahan Kontra Memory</font></td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->penyerahanKontra);?></td>
						</tr>
						<tr>
							<td colspan="2">
								<table id='infoPerkara' style="font-size:14px;width:100%;">
								<tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>DATA MEJELIS HAKIM</b></td></tr></tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Tanggal Penetapan Hakim</font></td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->tglPenetapanMajelis);?></td>
						</tr>

						<tr>
							<td id="first-child"><font color="white">Majelis Hakim</font></td>
							<td><?php echo $row->majelisHakim;?></td>
						</tr>
						<tr>
							<td colspan="2">
								<table id='infoPerkara' style="font-size:14px;width:100%;">
								<tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>DATA PANITERA PENGGANTI</b></td></tr></tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Tanggal Penetapan Panitera Pengganti</font></td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->tglPenetapanPP);?></td>
						</tr>

						<tr>
							<td id="first-child"><font color="white">Panitera Pengganti</font></td>
							<td><?php echo $row->paniteraPengganti;?></td>
						</tr>
						<tr>
							<td colspan="2">
								<table id='infoPerkara' style="font-size:14px;width:100%;">
								<tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>DATA JURUSITA</b></td></tr></tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Tanggal Penetapan Jurusita</font></td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->tglPenetapanJurusita);?></td>
						</tr>

						<tr>
							<td id="first-child"><font color="white">Jurusita</font></td>
							<td><?php echo $row->jurusita;?></td>
						</tr>
						<tr>
							<td colspan="2">
								<table id='infoPerkara' style="font-size:14px;width:100%;">
								<tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>DATA PUTUSAN</b></td></tr></tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Tanggal Putusan</font></td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->tglPutusan);?></td>
						</tr>

						<tr>
							<td id="first-child"><font color="white">Status Putusan</font></td>
							<td><?php echo $row->statusPutusan;?></td>
						</tr>
						<tr>
							<td id="first-child" style="vertical-align: top;"><font color="white">Amar Putusan</font></td>
							<td class='wrapword'><?php echo $row->amar;?></td>
						</tr>
						<tr>
							<td colspan="2">
								<table id='infoPerkara' style="font-size:14px;width:100%;">
								<tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>DATA PEMBERITAHUAN</b></td></tr></tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Tanggal Pemberitahuan Pemohon</font></td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->tglPemberitahuanPihakPertama);?></td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Tanggal Pemberitahuan Termohon</font></td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->tglPemberitahuanPihakKedua);?></td>
						</tr>
						
						<tr>
							<td colspan='2'></td>
						</tr>
			<?php
					}
				}else{
					echo "<tr><td colspan='2'>DATA TIDAK DITEMUKAN</td></tr>";
				}
			}else{
				echo "<tr><td colspan='2'>DATA TIDAK DITEMUKAN</td></tr>";
			}
			?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
closeLoading();
</script>