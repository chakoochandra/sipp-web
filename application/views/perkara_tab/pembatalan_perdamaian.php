<div class="cssTable" style="margin:0px;padding:0px;">
	
					<table style="font-size:14px; width: 100%;">
						<col width="2%">
						<col width="25%">
						<col width="13%">
						<col width="30%">
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
							if($pembatalanperdamaian!=''){
								if($pembatalanperdamaian->num_rows>0){
									$no=0;
									foreach ($pembatalanperdamaian->result() as $row) { $no++;
										echo '<tr>';
											echo '<td>'.$no.'</td>';
											echo '<td>'.$row->noPerkara.'</td>';
											echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglPendaftaran).'</td>';
											echo '<td>'.$row->jenisPerkara.'</td>';
											echo '<td>'.$row->statusAkhir.'</td>';
										echo '</tr>';
									}
								}else{
									echo '<tr><td colspan="3">BELUM ADA DATA</td></tr>';
								}
							}else{
								echo '<tr><td colspan="3">BELUM ADA DATA</td></tr>';
							}
							?>
						</tbody>
					</table>

</div>
<script type="text/javascript">
closeLoading();
</script>