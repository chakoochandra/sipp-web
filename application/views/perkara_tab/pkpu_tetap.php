<div style="font-size:14px;width:95%;">
	<table>
        
        <tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>PENGAMBILAN SUARA</b></td></tr>
		<tr>
			<td align='center' style='text-align:center;'>
				<div class="cssTable" style='width:100%'>
					<table>
                    <col width="3%">
					<col width="17%">
					<col width="10%">
					<col width="40%">
					<col width="30%">
						<tbody>
							<tr>
                                <td>No</td>
								<td>Tanggal Rapat</td>
								<td>Jam</td>
								<td>Agenda/Alasan Ditunda</td>
								<td>Tempat Rapat</td>
							</tr>
							<?php
										if($rapatpengambilansuara!=''){
											if($rapatpengambilansuara->num_rows>0){
												$no=0;
												foreach ($rapatpengambilansuara->result() as $row) { $no++;
													echo '<tr>';
														echo '<td>'.$no.'</td>';
														echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglRapat).'</td>';
														echo '<td>'.$row->jamRapat.'</td>';
														echo '<td>Agenda :</br>'.$row->agendaRapat.'</br></br>Alasan Ditunda :</br>'.$row->alasanDitunda.'</td>';
														echo '<td>'.$row->tempatRapat.'</td>';
													echo '</tr>';
												}
											}else{
												echo '<tr><td colspan="3">BELUM DITETAPKAN</td></tr>';
											}
										}else{
											echo '<tr><td colspan="3">BELUM DITETAPKAN</td></tr>';
										}
							?>
						</tbody>
					</table>
				</div>
			</td>
		</tr>

		<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>PUTUSAN PKPU TETAP</b></td></tr>
		<tr>
			<td align='center' style='text-align:center;'>
			
				<div style="font-size:14px;">
					<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>PUTUSAN PKPU TETAP PERTAMA</b></td></tr>
                    <tr>
                        <td align='center' style='text-align:center;'>
                            <div style="font-size:14px;">
                                    <table id='infoPerkara' style="font-size:14px;width:100%;">
                                        <col width="20%">
                                        <col width="80%">
                                        <tbody>
                                        <?php 
                                        foreach ($putusan_pkpu_tetap_pertama->result() as $row) { ?>
                                        
                                            <tr>
                                                <td id="first-child"><font color="white">Tanggal Putusan</font></td>
                                                <td><?php echo $this->tanggalhelper->convertDayDate($row->tglPutusan);?></td>
                                            </tr>
                                            <tr>
                                                <td id="first-child"><font color="white">Amar Putusan</font></td>
                                                <td class='wrapword'><?php echo $row->amar;?></td>
                                            </tr>
                                            <tr>
                                                <td id="first-child"><font color="white">Pemberitahuan Putusan Kepada Pemohon</font></td>
                                                <td><?php echo $this->tanggalhelper->convertDayDate($row->pemberitahuanPutPihak1);?></td>
                                            </tr>
                                            <tr>
                                                <td id="first-child"><font color="white">Pemberitahuan Putusan Kepada Termohon</font></td>
                                                <td><?php echo $this->tanggalhelper->convertDayDate($row->pemberitahuanPutPihak2);?></td>
                                            </tr>
                                        
                                        <?php } ?>
                                        </tbody>
                                    </table>
                            </div>
                        </td>
                    </tr>

					<tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>PUTUSAN PKPU TETAP LANJUTAN</b></td></tr>
					<tr>
                        <td align='center' style='text-align:center;'>
                            <div style="font-size:14px;">
                                    <table id='infoPerkara' style="font-size:14px;width:100%;">
                                        <col width="20%">
                                        <col width="80%">
                                        <tbody>
                                        <?php 
                                        foreach ($putusan_pkpu_tetap_lanjutan->result() as $row) { ?>
                                        
                                            <tr>
                                                <td id="first-child"><font color="white">Tanggal Putusan</font></td>
                                                <td><?php echo $this->tanggalhelper->convertDayDate($row->tglPutusan);?></td>
                                            </tr>
                                            <tr>
                                                <td id="first-child"><font color="white">Amar Putusan</font></td>
                                                <td class='wrapword'><?php echo $row->amar;?></td>
                                            </tr>
                                            <tr>
                                                <td id="first-child"><font color="white">Pemberitahuan Putusan Kepada Pemohon</font></td>
                                                <td><?php echo $this->tanggalhelper->convertDayDate($row->pemberitahuanPutPihak1);?></td>
                                            </tr>
                                            <tr>
                                                <td id="first-child"><font color="white">Pemberitahuan Putusan Kepada Termohon</font></td>
                                                <td><?php echo $this->tanggalhelper->convertDayDate($row->pemberitahuanPutPihak2);?></td>
                                            </tr>
                                        
                                        <?php } ?>
                                        </tbody>
                                    </table>
                            </div>
                        </td>
                    </tr>
                    
				</div>
			
			</td>
		<tr>
			
		</tr>

		
		
	</table>
</div>
<script type="text/javascript">
closeLoading();
</script>