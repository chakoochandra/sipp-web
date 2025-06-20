<!-- equalizr 25 nov 2021 -->
<div style="font-size:14px;width:90%;">
	<table>
		<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>PENCABUTAN PERNYATAAN PAILIT</b></td></tr>
		<tr>
			<td align='center' style='text-align:center;'>
				<div class="cssTable" style='width:100%'>
					<table>
                        <col width="5%">
						<col width="20%">
						<col width="25%">
						<col width="35%">
						<col width="15%">
						<tbody>
							<tr>
								<td>No</td>
                                <td>Nomor Perkara</td>
								<td>Tanggal Register</td>
								<td>Klasifikasi Perkara</td>
								<td>Status Perkara</td>
							</tr>
							<?php
                            $no = 0;
							if($cabut!=''){
								if($cabut->num_rows>0){
									foreach ($cabut->result() as $row) { $no++;
										echo '<tr>';
                                            echo '<td>'.$no.'</td>';
											echo '<td>'.$row->noPerkara.'</td>';
											echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglPendaftaran).'</td>';
											echo '<td>'.$row->jenisPerkara.'</td>';
                                            echo '<td>'.$row->statusAkhir.'</td>';
										echo '</tr>';
									}
								}else{
									echo '<tr><td colspan="5">BELUM ADA DATA</td></tr>';
								}
							}else{
								echo '<tr><td colspan="5">BELUM ADA DATA</td></tr>';
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