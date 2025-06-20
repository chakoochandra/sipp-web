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
			if(!empty($data_diversi)){
				if($data_diversi->num_rows>0){
					foreach ($data_diversi->result() as $row) {?>
						<tr>
			        		<td id="first-child">Pembimbing Kemasyarakatan</td>
			        		<td colspan="2">
			        			<?php
			        			if($para_pihak!=''){
									if($para_pihak->num_rows>0){
										echo '<div class="cssTable">';
											echo '<table id="tableinfo" style="margin:0px;padding:0px;">';
												echo '<col width="5%">';
												echo '<col width="95%">';
												echo '<tbody>';
													echo '<tr>';
														echo '<td>No</td>';
														echo '<td>Nama</td>';
													echo '</tr>';
										$i=1;
										foreach ($para_pihak->result() as $pihak) {
											if($pihak->pihak_ke==7){
												echo "<tr>";
													echo "<td align='center'>".$i."</td>";
													echo "<td>".$pihak->nama."</td>";
												echo "</tr>";
												$i++;
											}
										}
												echo '</tbody>';
											echo '</table>';
										echo '</div>';
									}
								}?>								
			        		</td>
			        	</tr>
						<tr>
							<td id="first-child"><font color="white">Tanggal Penetapan Musyawarah Diversi</font></td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->tgl_penetapan_musyawarah);?></td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Tanggal Musyawarah Diversi</font></td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->tgl_musyawarah);?></td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Kesepakatan Pelaksanaan Musyawarah Diversi</font></td>
							<td><?php echo ($row->kesepakatan_melaksanakan_diversi==1?'Sepakat Melaksanakan Diversi':'Tidak Sepakat Melaksanakan Diversi');?></td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Tanggal Hasil Musyawarah Diversi</font></td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->tgl_kesepakatan_diversi);?></td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Hasil Diversi</font></td>
							<td><?php echo $row->hasil_diversi;?></td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Tanggal Laporan Hakim Fasilitator Kepada Ketua Pengadilan Negeri</font></td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->tgl_laporan_hakim);?></td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Nomor Penetapan Kesepakatan Diversi</font></td>
							<td><?php echo $row->no_penetapan_kesepakatan;?></td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Tanggal Penetapan Kesepakatan Diversi</font></td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->tgl_penetapan_kesepakatan_diversi);?></td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Tanggal Mulai Pelaksanaan Kesepakatan Diversi</font></td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->tgl_pelaksanaan_isi_diversi);?></td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Status Pelaksanaan Kesepakatan Diversi</font></td>
							<td><?php echo ($row->hasil_lap_pembimbing_masyarakat==1?'Dilaksanakan Sepenuhnya':'Dilaksanakan Sebagian/Tidak Dilaksanakan Sepenuhnya');?></td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">Tgl. Laporan Pembimbing Kemasyarakatan Kepada Ketua Pengadilan Negeri</font></td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->tgl_lap_pembimbing_masyarakat);?></td>
						</tr>
						<tr>
							<td id="first-child"><font color="white">No. Laporan Pembimbing Kemasyarakatan Kepada Ketua Pengadilan Negeri</font></td>
							<td><?php echo $row->nomor_laporan_pembimbing_masyarakat;?></td>
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