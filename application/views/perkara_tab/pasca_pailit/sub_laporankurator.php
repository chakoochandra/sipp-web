<div style="font-size:14px;width:90%;">
	<table>
		<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>LAPORAN KURATOR</b></td></tr>
		<tr>
			<td align='center' style='text-align:center;'>
				<div class="cssTable" style='width:100%'>
					<table>
						<col width="5%">
						<col width="20%">
						<col width="20%">
						<col width="55%">
						<tbody>
							<tr>
								<td>No</td>
								<td>Nomor Laporan</td>
								<td>Tanggal</td>
								<td>Deskripsi</td>
							</tr>
							<?php
                            $no = 0;
							if($laporankurator!=''){
								if($laporankurator->num_rows>0){
									foreach ($laporankurator->result() as $row) { $no++;
										echo '<tr>';
											echo '<td>'.$no.'</td>';
											echo '<td>'.$row->noLaporan.'</td>';
                                            echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglLaporan).'</td>';
                                            echo '<td>'.$row->deskripsi.'</td>';
										echo '</tr>';
									}
								}else{
									echo '<tr><td colspan="4">BELUM ADA DATA</td></tr>';
								}
							}else{
								echo '<tr><td colspan="4">BELUM ADA DATA</td></tr>';
							}
							?>
						</tbody>
					</table>
				</div>
			</td>
		</tr>
		
	</table>
</div>
<script type="text/javascript">
closeLoading();
</script>