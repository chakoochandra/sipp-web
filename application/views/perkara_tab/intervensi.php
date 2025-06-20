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
			$idalurperkara = $this->tanggalhelper->getIDAlurPerkara($idperkara);
			if(!empty($data_intervensi)){
				if($data_intervensi->num_rows>0){
					$urutan = 0;
					foreach ($data_intervensi->result() as $row) {
						$urutan++;
						?>
						<tr>
							<td colspan='2'><table id='infoPerkara' style="font-size:14px;width:100%;"><tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>PIHAK INTERVENSI <?php echo $urutan;?></b></td></tr></tbody></table></td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Nama Pemohon</font></td>
							<td><?php echo $row->nama;?></td>
						</tr>
						<?php if($idalurperkara!=9){?>
							<tr>
								<td id="first-child"><font color="white">Jenis Intervensi</font></td>
								<td><?php echo $row->jenisIntervensi;?></td>
							</tr>
						<?php } ?>
						<tr>
							<td id="first-child"><font color="white">Tergabung Ke Pihak</font></td>
							<td><?php echo $row->tergabungKePihak;?></td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Tanggal Intervensi</font></td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->tglIzinIntervensi);?></td>
						</tr>
						<tr>
							<td id="first-child" style="vertical-align: top;"><font color="white">Isi Petitum</font></td>
							<td class='wrapword'><?php echo $row->petitum;?></td>
						</tr>
						<tr><td colspan='2'></td></tr>
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