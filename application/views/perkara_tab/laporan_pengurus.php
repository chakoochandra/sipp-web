<div class="cssTable" style="margin:0px;padding:0px;">
	
					<table style="font-size:14px; width: 100%;">
						<col width="2%">
						<col width="18%">
						<col width="30%">
						<col width="50%">
						<tbody>
							<tr>
								<td>No</td>
								<td>Nomor Laporan</td>
								<td>Tanggal Laporan</td>
								<td>Deskripsi</td>
							</tr>
							<?php
							if($laporanpengurus!=''){
								if($laporanpengurus->num_rows>0){
									$no=0;
									foreach ($laporanpengurus->result() as $row) { $no++;
										echo '<tr>';
											echo '<td>'.$no.'</td>';
											echo '<td>'.$row->noLaporan.'</td>';
											echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglLaporan).'</td>';
											echo '<td>'.$row->deskripsi.'</td>';
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
<script type="text/javascript">
closeLoading();
</script>