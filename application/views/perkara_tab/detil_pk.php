<div style="font-size:14px;padding-top:10px;padding-left:5px;" id="detilpk">
	<table id='infoPerkara' style="font-size:14px;width:100%;"><tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>DATA PARA PIHAK</b></td></tr></tbody></table>
	<div style="padding:1px;"></div>
	<div class="cssTable" style="margin:0px;padding:0px;">
		<table id="tableinfo" style="font-size:14px;width:100%;">
			<col width="5%" />
			<col width="45%" />
			<col width="50%" />
			<tbody>
				<tr>
					<td>No</td>
					<td>Status</td>
					<td>Nama</td>
				</tr>
				<?php
				if($queryPKDetil!=''){
					if($queryPKDetil->num_rows>0){
						$i=1;
						foreach ($queryPKDetil->result() as $row) {
								echo '<tr>';
								echo '<td>'.$i.'</td>';
								echo '<td>'.$row->statusPihak.'</td>';
								echo '<td>'.$row->nama.'</td>';
							echo '</tr>';
							$i++;
						}
					}
				}
				?>
			</tbody>
		</table>
	</div>
	<div style="padding:5px;"></div>
	<table id='infoPerkara' style="font-size:14px;width:100%;"><tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>DATA PERMOHONAN PK</b></td></tr></tbody></table>
	<div class="cssTable" style="margin:0px;padding:0px;">
		<table id="tableinfo" style="font-size:14px;width:100%;">
			<col width="20%" />
			<col width="50%" />
			<col width="30%" />
			<tbody>
				<tr>
					<td>Tanggal Permohonan</td>
					<td>Pemohon PK</td>
					<td>Keterangan</td>
				</tr>
				<?php
				if($queryPKDetil!=''){
					if($queryPKDetil->num_rows>0){
						foreach ($queryPKDetil->result() as $row) {
							if(!empty($row->pemohon_nama)){
								echo '<tr>';
									echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglPermohonan).'</td>';
									echo '<td>'.$row->pemohon_nama.'</td>';
									echo '<td>'.$row->statusPihak.'</td>';
								echo '</tr>';
							}
						}
					}
				}
				?>
			</tbody>
		</table>
	</div>
	<?php if ($idalurperkara==1 OR $idalurperkara==8 OR $idalurperkara==15){ ?>
	<div style="padding:5px;"></div>
	<table id='infoPerkara' style="font-size:14px;width:100%;"><tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>DATA MEDIASI</b></td></tr></tbody></table>
	<table id='infoPerkara' style="font-size:14px;width:100%;">
		<col width="23%">
		<col width="78%">
		<?php											
		if($data_mediasi!=''){
			if($data_mediasi->num_rows>0){
				foreach ($data_mediasi->result() as $row) {						
					$tgl_kesepakatan 			= $this->tanggalhelper->convertDayDate($row->tglKesepakatan);
					$tgl_pengajuan_kesepakatan 	= $this->tanggalhelper->convertDayDate($row->tglPengajuanSepakat);

					$mediator_text 				= $row->nama;
					$status_mediator 			= $row->statusMediator;
					$tgl_pengiriman_kesepakatan = $this->tanggalhelper->convertDayDate($row->tglKirimKesepakatan);													
				}
			}
		}
		?>
		<tbody>			
			<tr>
				<td style="padding:1px;"></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Tanggal Kesepakatan Perdamaian</font></td>
				<td><?php echo (!empty($tgl_kesepakatan) ? $tgl_kesepakatan : '-');?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Tanggal Pengajuan Kesepakatan Perdamaian</font></td>
				<td colspan="2"><?php echo (!empty($tgl_pengajuan_kesepakatan) ? $tgl_pengajuan_kesepakatan : '-');?></td>					
			</tr>
			<tr>
				<td id="first-child"><font color="white">Data Mediator</font></td>
				<td colspan="2">
				<?php 
				if(!empty($mediator_text)){
				?>
                <div class="cssTable" style="">
                    <table id="tableinfo" style="margin:0px;padding:0px;">
                        <col style="width:5%">
                        <col style="width:75%">
                        <col style="width:20%">
                        <tbody>
                            <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>Status Mediator</td>
                                
                            </tr>
	                            <?php
	                            $jumlah         = substr_count($mediator_text,"<br/>");
	                            $mediator_text  = explode("<br/>",$mediator_text);
	                            $status         = explode(",",$status_mediator);
	                            $total          = $jumlah+1;
	                            for($i=0; $i<$total; $i++){
	                                $no = $i+1;
	                                $status_med = substr_replace(",",$status[$i]."<br>",0);
	                                if($status[$i]=='H'){
	                                    $status_text ='Hakim';
	                                }elseif($status[$i]=='N'){
	                                    $status_text ='Non-Hakim';
	                                }else{
	                                    $status[$i] ="-";
	                                }
	                                if($mediator_text!=''){
	                                    echo "<tr>";
	                                        echo "<td style='text-align:center; vertical-align:top'>".$no."</td>";
	                                        echo "<td style='text-align:left; vertical-align:top;'>".substr_replace("<br/>",$mediator_text[$i]."<br>",0)."</td>";
	                                        echo "<td style='text-align:left; vertical-align:top'>".$status_text."</td>";
	                                    echo "<tr>";
	                                }else{
	                                    echo "<tr>";
	                                        echo "<td style='text-align:center' colspan='3'>Data tidak ditemukan</td>";
	                                    echo "<tr>";
	                                }
	                            }
	                            ?>
                        </tbody>
                    </table>
                <?php
            	}else{
            		echo '-';
            	}
                ?>
                </td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Tanggal Pengiriman Hasil Kesepakatan ke MA</font></td>
				<td colspan="2"><?php echo (!empty($tgl_pengiriman_kesepakatan) ? $tgl_pengiriman_kesepakatan : '-');?></td>					
			</tr>
			<tr>
				<td colspan="2"></td>
			</tr>
		</tbody>
	</table>
	<?php } ?>

	<div style="padding:5px;"></div>
	<table id='infoPerkara' style="font-size:14px;width:100%;"><tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>TANGGAL PEMBERITAHUAN PERMOHONAN PK</b></td></tr></tbody></table>
	<div class="cssTable" style="margin:0px;padding:0px;">
		<table id="tableinfo" style="font-size:14px;width:100%;">
			<col width="5%" />
			<col width="25%" />
			<col width="35%" />
			<col width="15%" />
			<tbody>
				<tr>
					<td>No</td>
					<td>Status</td>
					<td>Nama</td>
					<td>Tanggal</td>
				</tr>
				<?php
				if($queryPKDetil!=''){
					if($queryPKDetil->num_rows>0){
						$i=1;
						foreach ($queryPKDetil->result() as $row) {
							if($row->IDStatusPihak>1){
								echo '<tr>';
									echo '<td>'.$i.'</td>';
									echo '<td>'.$row->statusPihak.'</td>';
									echo '<td>'.$row->nama.'</td>';
									echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglPemberitahuanPermohonan).'</td>';
								echo '</tr>';
								$i++;
							}
						}
					}
				}
				?>
			</tbody>
		</table>
	</div>
	<div style="padding:5px;"></div>
	<table id='infoPerkara' style="font-size:14px;width:100%;"><tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>TANGGAL PENERIMAAN MEMORI PK</b></td></tr></tbody></table>
	<div class="cssTable" style="margin:0px;padding:0px;">
		<table id="tableinfo" style="font-size:14px;width:100%;">
			<col width="5%" />
			<col width="25%" />
			<col width="35%" />
			<col width="15%" />
			<tbody>
				<tr>
					<td>No</td>
					<td>Status</td>
					<td>Nama</td>
					<td>Tanggal</td>
				</tr>
				<?php
				if($queryPKDetil!=''){
					if($queryPKDetil->num_rows>0){
						$i=1;
						foreach ($queryPKDetil->result() as $row) {
							if($row->IDStatusPihak==1 OR $row->IDStatusPihak==2 OR $row->IDStatusPihak==5){
								echo '<tr>';
									echo '<td>'.$i.'</td>';
									echo '<td>'.$row->statusPihak.'</td>';
									echo '<td>'.$row->nama.'</td>';
									echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglPenerimaanMemori).'</td>';
								echo '</tr>';
								$i++;
							}
						}
					}
				}
				?>
			</tbody>
		</table>
	</div>
	<div style="padding:5px;"></div>
	<table id='infoPerkara' style="font-size:14px;width:100%;"><tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>TANGGAL PENYERAHAN MEMORI PK</b></td></tr></tbody></table>
	<div class="cssTable" style="margin:0px;padding:0px;">
		<table id="tableinfo" style="font-size:14px;width:100%;">
			<col width="5%" />
			<col width="25%" />
			<col width="35%" />
			<col width="15%" />
			<tbody>
				<tr>
					<td>No</td>
					<td>Status</td>
					<td>Nama</td>
					<td>Tanggal</td>
				</tr>
				<?php
				if($queryPKDetil!=''){
					if($queryPKDetil->num_rows>0){
						$i=1;
						foreach ($queryPKDetil->result() as $row) {
							if($row->IDStatusPihak>1){
								echo '<tr>';
									echo '<td>'.$i.'</td>';
									echo '<td>'.$row->statusPihak.'</td>';
									echo '<td>'.$row->nama.'</td>';
									echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglPenyerahanMemori).'</td>';
								echo '</tr>';
								$i++;
							}
						}
					}
				}
				?>
			</tbody>
		</table>
	</div>
	<div style="padding:5px;"></div>
	<table id='infoPerkara' style="font-size:14px;width:100%;"><tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>TANGGAL PENERIMAAN KONTRA MEMORI PK</b></td></tr></tbody></table>
	<div class="cssTable" style="margin:0px;padding:0px;">
		<table id="tableinfo" style="font-size:14px;width:100%;">
			<col width="5%" />
			<col width="25%" />
			<col width="35%" />
			<col width="15%" />
			<tbody>
				<tr>
					<td>No</td>
					<td>Status</td>
					<td>Nama</td>
					<td>Tanggal</td>
				</tr>
					<?php
				if($queryPKDetil!=''){
					if($queryPKDetil->num_rows>0){
						$i=1;
						foreach ($queryPKDetil->result() as $row) {
							if($row->IDStatusPihak==2 OR $row->IDStatusPihak==4 OR $row->IDStatusPihak==5){
								echo '<tr>';
									echo '<td>'.$i.'</td>';
									echo '<td>'.$row->statusPihak.'</td>';
									echo '<td>'.$row->nama.'</td>';
									echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglPenerimaanKontra).'</td>';
								echo '</tr>';
								$i++;
							}
						}
					}
				}
				?>
			</tbody>
		</table>
	</div>
	<div style="padding:5px;"></div>
	<table id='infoPerkara' style="font-size:14px;width:100%;"><tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>TANGGAL PENYERAHAN KONTRA MEMORI PK</b></td></tr></tbody></table>
	<div class="cssTable" style="margin:0px;padding:0px;">
		<table id="tableinfo" style="font-size:14px;width:100%;">
			<col width="5%" />
			<col width="25%" />
			<col width="35%" />
			<col width="15%" />
			<tbody>
				<tr>
					<td>No</td>
					<td>Status</td>
					<td>Nama</td>
					<td>Tanggal</td>
				</tr>
				<?php
				if($queryPKDetil!=''){
					if($queryPKDetil->num_rows>0){
						$i=1;
						foreach ($queryPKDetil->result() as $row) {
							if($row->IDStatusPihak==1 OR $row->IDStatusPihak==2 OR $row->IDStatusPihak==5){
								echo '<tr>';
									echo '<td>'.$i.'</td>';
									echo '<td>'.$row->statusPihak.'</td>';
									echo '<td>'.$row->nama.'</td>';
									echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglPenyerahanKontra).'</td>';
								echo '</tr>';
								$i++;
							}
						}
					}
				}
				?>
			</tbody>
		</table>
	</div>
	<div style="padding:5px;"></div>
	<table id='infoPerkara' style="font-size:14px;width:100%;"><tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>TANGGAL PENGIRIMAN BERKAS PK</b></td></tr></tbody></table>
	<table id='infoPerkara' style="font-size:14px;width:100%;">
		<col width="20%">
		<col width="80%">
		<tbody>
			<tr>
				<td id="first-child"><font color="white">Tanggal Pengiriman Berkas PK</font></td>
				<td><?php echo (!empty($pengirimanBerkasPK) ? $pengirimanBerkasPK : '');?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Nomor Surat Pengiriman Berkas PK</font></td>
				<td><?php echo (!empty($nomorSuratPengirimanBerkasPK) ? $nomorSuratPengirimanBerkasPK : '');?></td>
		</tr>
			<tr>
				<td colspan="2"></td>
			</tr>
		</tbody>
	</table>
	<div style="padding:5px;"></div>
	<table id='infoPerkara' style="font-size:14px;width:100%;"><tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>PUTUSAN PK</b></td></tr></tbody></table>
	<table id='infoPerkara' style="font-size:14px;width:100%;">
		<col width="20%">
		<col width="80%">
		<tbody>
			<tr>
				<td style="padding:1px;"></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Tanggal Putusan PK</font></td>
				<td><?php echo (!empty($tglPutusan) ? $tglPutusan : '');?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Nomor Putusan PK</font></td>
				<td><?php echo (!empty($noPutusanPK) ? $noPutusanPK : '');?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Amar Putusan PK</font></td>
				<td><?php echo (!empty($amarPutusan) ? $amarPutusan : '');?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Majelis Hakim PK</font></td>
				<td><?php echo (!empty($majelisHakim) ? $majelisHakim : '');?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Panitera Pengganti PK</font></td>
				<td><?php echo (!empty($paniteraPengganti) ? $paniteraPengganti : '');?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Tanggal Pengarsipan PK</font></td>
				<td><?php echo (!empty($tglMinutasi) ? $tglMinutasi : '');?></td>
			</tr>
			<tr>
				<td colspan="2"></td>
			</tr>
		</tbody>
	</table>
	<div style="padding:5px;"></div>
	<table id='infoPerkara' style="font-size:14px;width:100%;"><tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>TANGGAL PEMBERITAHUAN PUTUSAN PK</b></td></tr></tbody></table>
	
	<input type="hidden" id='close_form' value="Kembali" class="btn">
	<div class="cssTable" style="margin:0px;padding:0px;">
		<table id="tableinfo" style="font-size:14px;width:100%;">
			<col width="5%" />
			<col width="25%" />
			<col width="35%" />
			<col width="15%" />
			<tbody>
				<tr>
					<td>No</td>
					<td>Status</td>
					<td>Nama</td>
					<td>Tanggal</td>
				</tr>
				<?php
				if($queryPKDetil!=''){
					if($queryPKDetil->num_rows>0){
						$i=1;
						foreach ($queryPKDetil->result() as $row) {
							if($row->IDStatusPihak>1){
								echo '<tr>';
									echo '<td>'.$i.'</td>';
									echo '<td>'.$row->statusPihak.'</td>';
									echo '<td>'.$row->nama.'</td>';
									echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglPemberitahuanPutusan).'</td>';
								echo '</tr>';
								$i++;
							}
						}
					}
				}
				?>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	closeLoading();
</script>