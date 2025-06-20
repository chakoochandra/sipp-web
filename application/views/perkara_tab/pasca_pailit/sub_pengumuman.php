<!-- equalizr 25 nov 2021 -->
<div style="font-size:14px;width:90%;">
	<table>
		<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>INFORMASI KEPANITERAAN</b></td></tr>
		<tr>
			<td align='center' style='text-align:center;'>
				<div class="cssTable" style='width:100%'>
					<table>
                        <col width="5%">
						<col width="20%">
						<col width="35%">
						<col width="40%">
						<tbody>
							<tr>
								<td>No</td>
								<td>Tanggal Register</td>
								<td>Nomor Pengumuman</td>
								<td>Perihal</td>
							</tr>
							<?php
                            $no = 0;
							if($pengumuman!=''){
								if($pengumuman->num_rows>0){
									foreach ($pengumuman->result() as $row) { $no++;
										echo '<tr>';
                                            echo '<td>'.$no.'</td>';
											echo '<td>'.$this->tanggalhelper->convertDayDate($row->tanggal).'</td>';
											echo '<td>'.$row->nomor.'</td>';
                                            echo '<td>'.$row->perihal.'</td>';
										echo '</tr>';
									}
								}else{
									echo '<tr><td colspan="4">BELUM DITETAPKAN</td></tr>';
								}
							}else{
								echo '<tr><td colspan="4">BELUM DITETAPKAN</td></tr>';
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