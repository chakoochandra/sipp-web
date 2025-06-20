<?php
function parse_day_to_year($vonis){
	$result = array();
	$month = (int)($vonis/30);
	$year = (int) ($month/12);
	$month = (int) ($month%12);
	$total = (int)($year*12*30+$month*30);
	$day = intval($vonis-$total);
	$result['year'] = $year;
	$result['month'] = $month;
	$result['day'] = $day;
	return $result;
}
function fetchStatusPutusanText($data,$idpihak){
	$status ='';
	foreach ($data->result() as $row) {
		if($row->ID==$idpihak){
			$satuan = $row->satuan;
			$infohukuman = '';
			if($satuan==1){
				$infohukuman = parse_day_to_year($row->durasiNominal);
				$year = '';$month = '';$day = '';
				if(!empty($infohukuman['year'])){
					$year = $infohukuman['year'].' Tahun ';
				}
				if(!empty($infohukuman['month'])){
					$month = $infohukuman['month'].' Bulan ';
				}
				if(!empty($infohukuman['day'])){
					$day = $infohukuman['day'].' Hari';
				}
				$infohukuman = '('.$year.$month.$day.')';
			}elseif($satuan==2){
				$infohukuman = 'Rp.'.number_format($row->durasiNominal,2,',','.');
			}
			$status .= $row->statusPutusan.' '.$infohukuman.'<br>';
		}
	}
	return $status;
}

function isPihakKeExist($pihakke,$data){
	foreach ($data->result() as $row) {
		if($row->pihakke==$pihakke){
			return TRUE;
		}
	}
	return FALSE;
}
if($status_putusan_id==91){
	$status_kata = 'Penetapan';
}else{
	if($idalurperkara==124){
		$status_kata = 'Penetapan';
	} else {
		$status_kata = 'Putusan';
	}
}

//equalizr 29 januari 2022
if($idalurperkara==124){
	$amar_kata = 'Petikan';
}else{
	$amar_kata = 'Amar';
}

?>
<div style="font-size:14px;">
	<table id='infoPerkara' style="font-size:14px; width: 100%;">
		<col width="15%">
		<col width="85%">
		<tbody>
			<tr>
				<td id="first-child"><font color="white">Tanggal <?php echo $status_kata; ?></font></td>
				<td><?php echo $tanggal_putusan;?></td>
			</tr>
			<?php 
			if(($idalurperkara<100)||($idalurperkara==114)){
			echo '<tr>';
				echo '<td id="first-child"><font color="white">Putusan Verstek</font></td>';
				echo '<td>'.($verstek=='Y'?'Ya':'Tidak').'</td>';
			echo '</tr>';
			}
			if($idalurperkara<100){
			echo '<tr>';
				echo '<td id="first-child"><font color="white">Sumber Hukum</font></td>';
				echo '<td>'.(!empty($sumber_hukum_put)?$sumber_hukum_put:'').'</td>';
			echo '</tr>';
			}
			if($status_putusan_id!=91){
				if($idalurperkara!=124){
			?>
			<tr>
				<td id="first-child"><font color="white">Status Putusan</font></td>
				<td>
					<?php
					if($idalurperkara>100 AND $idalurperkara!=119){
						if($status_putusan!=''){
							if($status_putusan->num_rows>0){
					?>
					<div class="cssTable">
						<table id="tableinfo" style="margin:0px;padding:0px;">
							<col width="3%">
							<col width="37%">
							<col width="15%">
							<col width="45%">
							<tbody>
								<tr>
									<td>No</td>
									<td>Nama</td>
									<td>Tanggal Putusan</td>
									<td>Putusan</td>
								</tr>
							<?php
								$i=0;
								$repeat = True;
								$idss = 0;
								foreach ($status_putusan->result() as $rows) {
									if($idss!=$rows->ID){
										$repeat = False;
										$i++;
										$idss = $rows->ID;
									}else{
										$repeat = True;
									}
									if($repeat==False){
										echo "<tr>";
											$status_putusan_terdakwa = fetchStatusPutusanText($status_putusan,$rows->ID);
											echo "<td>".$i."</td>";
											echo "<td>".$rows->nama."</td>";
											echo "<td>".$this->tanggalhelper->convertDayDate($rows->tglPutusan)."</td>";
											echo "<td>".$status_putusan_terdakwa."</td>";
										echo "</tr>";
									}
									if(empty($idss)){
										$idss = $rows->ID;
									}
								}?>
							</tbody>
						</table>
					</div>
				<?php
						}
					}
				}else{
					echo $status_putusan_nama;
				}
				?>
				</td>
			</tr>
			<?php }
			}
			if($idalurperkara<100 AND $idalurperkara!=2){
			?>
				<tr>
					<td id="first-child"><font color="white">Nilai Ganti Kerugian (Rp.)</font></td>
					<td><?php echo $nilai_ganti_sengketa;?></td>
				</tr>
			<?php
			}
			?>
			<tr>
				<td id="first-child"><font color="white"><?php echo $amar_kata; ?> <?php echo $status_kata; ?></font></td>
				<td class='wrapword'><?php echo ($idjenisprk==200 || $idalurperkara==118?'Disamarkan':$amar);?></td>
			</tr>
			<?php
			if($idalurperkara==3){
			?>
				<tr>
					<td id="first-child"><font color="white">Tanggal Penetapan Hakim Pengawas</font></td>
					<td style="padding:0px;padding-left:5px;"><?php echo $penetapan_hakim_pengawas;?></td>
				</tr>
				<tr>
					<td id="first-child"><font color="white">Nomor Penetapan Hakim Pengawas</font></td>
					<td style="padding:0px;padding-left:5px;"><?php echo $nomor_penetapan_hakim_pengawas;?></td>
				</tr>
				<tr>
					<td id="first-child"><font color="white">Hakim Pengawas</font></td>
					<td style="padding:0px;padding-left:5px;"><?php echo $hakim_pengawas_nama;?></td>
				</tr>
				<tr>
					<td id="first-child"><font color="white">Kurator</font></td>
					<td style="padding:0px;padding-left:5px;"><?php echo $kurator_nama;?></td>
				</tr>
				<tr>
					<td id="first-child"><font color="white">Tanggal pengumuman dalam Berita Negara RI</font></td>
					<td style="padding:0px;padding-left:5px;"><?php echo $tanggal_berita_putusan;?></td>
				</tr>
				<tr>
					<td id="first-child"><font color="white">Tanggal dimuat dalam Surat Kabar</font></td>
					<td style="padding:0px;padding-left:5px;"><?php echo $tanggal_surat_kabar_putusan;?></td>
				</tr>
				<tr>
					<td id="first-child"><font color="white">Nama Surat Kabar</font></td>
					<td style="padding:0px;padding-left:5px;"><?php echo $nama_surat_kabar_putusan;?></td>
				</tr>
			<?php
				}
			?>			
			<tr>
				<td id="first-child" style="vertical-align:top;"><font color="white">Pemberitahuan <?php echo $status_kata; ?></font></td>
					<td>
					<?php
					if($idalurperkara!=114){
						if($data_pemberitahuan!=''){
							if($data_pemberitahuan->num_rows>0){?>
							<div class="cssTable">
								<table id="tableinfo" style="margin:0px;padding:0px;">
									<col width="20%">
									<col width="55%">
									<col width="25%">
									<tbody>
										<tr>
											<td>Status</td>
											<td>Nama</td>
											<td>Tanggal Pemberitahuan Putusan</td>
										</tr>
									<?php
										$i=1;
										foreach ($data_pemberitahuan->result() as $row) {
											if($row->pihakke==1){
												echo '<tr>';
													echo '<td>'.$this->nativesession->getStatusPihak(10,$idalurperkara,1).' '.$row->urutan.'</td>';
													if($jenis_perkara_id == 282 || $jenis_perkara_id == 13){
														echo '<td>Data disamarkan</td>';
													}else{
													echo '<td>'.$row->nama.'</td>';
													}
													$tgl = (!empty($row->tglPemberitahuan))? $this->tanggalhelper->convertDayDate($row->tglPemberitahuan):'';
													echo '<td>'.$tgl.'</td>';
												echo '</tr>';
											}
											
										}?>
									</tbody>
								</table>
							</div>
							<?php
							}
						}
					}
					?>	
						<br>
						<?php
						if($data_pemberitahuan!=''){
							if($data_pemberitahuan->num_rows>0 AND isPihakKeExist(2,$data_pemberitahuan)){?>
							<div class="cssTable">
								<table id="tableinfo" style="margin:0px;padding:0px;">
									<col width="20%">
									<col width="55%">
									<col width="25%">
									<tbody>
										<tr>
											<td>Status</td>
											<td>Nama</td>
											<td>Tanggal Pemberitahuan Putusan</td>
										</tr>
									<?php
										$i=1;
										foreach ($data_pemberitahuan->result() as $row) {
											if($row->pihakke==2){
												echo '<tr>';
													echo '<td>'.$this->nativesession->getStatusPihak(10,$idalurperkara,2).' '.$row->urutan.'</td>';
													echo '<td>'.$row->nama.'</td>';
													$tgl = (!empty($row->tglPemberitahuan))? $this->tanggalhelper->convertDayDate($row->tglPemberitahuan):'';
													echo '<td>'.$tgl.'</td>';
												echo '</tr>';
											}
										}?>
										</tbody>
									</table>
								</div>
							<?php
								}
							}
							?>
							<br>
						<?php
						if($data_pemberitahuan!=''){
							if($data_pemberitahuan->num_rows>0 AND isPihakKeExist(3,$data_pemberitahuan)){?>
							<div class="cssTable">
								<table id="tableinfo" style="margin:0px;padding:0px;">
									<col width="20%">
									<col width="55%">
									<col width="25%">
									<tbody>
										<tr>
											<td>Status</td>
											<td>Nama</td>
											<td>Tanggal Pemberitahuan Putusan</td>
										</tr>
									<?php
										$i=1;
										foreach ($data_pemberitahuan->result() as $row) {
											if($row->pihakke==3){
												echo '<tr>';
													echo '<td>'.$this->nativesession->getStatusPihak(10,$idalurperkara,3).' '.$row->urutan.'</td>';
													echo '<td>'.$row->nama.'</td>';
													$tgl = (!empty($row->tglPemberitahuan))? $this->tanggalhelper->convertDayDate($row->tglPemberitahuan):'';
													echo '<td>'.$tgl.'</td>';
												echo '</tr>';
											}
										}?>
										</tbody>
									</table>
								</div>
							<?php
								}
							}
							?>
								<br>
						<?php
						if($data_pemberitahuan!=''){
							if($data_pemberitahuan->num_rows>0 AND isPihakKeExist(4,$data_pemberitahuan)){?>
							<div class="cssTable">
								<table id="tableinfo" style="margin:0px;padding:0px;">
									<col width="20%">
									<col width="55%">
									<col width="25%">
									<tbody>
										<tr>
											<td>Status</td>
											<td>Nama</td>
											<td>Tanggal Pemberitahuan Putusan</td>
										</tr>
									<?php
										$i=1;
										foreach ($data_pemberitahuan->result() as $row) {
											if($row->pihakke==4){
												echo '<tr>';
													echo '<td>'.$this->nativesession->getStatusPihak(10,$idalurperkara,4).' '.$row->urutan.'</td>';
													echo '<td>'.$row->nama.'</td>';
													$tgl = (!empty($row->tglPemberitahuan))? $this->tanggalhelper->convertDayDate($row->tglPemberitahuan):'';
													echo '<td>'.$tgl.'</td>';
												echo '</tr>';
											}
										}?>
										</tbody>
									</table>
								</div>
							<?php
								}
							}
							?>
				</td>
			</tr>

			<!-- equalizr 28 januari 2022 -->
			<?php
			
			if($idalurperkara>100 AND $idalurperkara!=119 AND $idalurperkara!=124){
				if($status_putusan_id!=91){
			?>
			<tr>
				<td id="first-child" style="vertical-align:top;"><font color="white">Menerima Putusan</font></td>
				<td>
					<?php
					if($idalurperkara!=114){
						if($data_pemberitahuan!=''){
							if($data_pemberitahuan->num_rows>0){?>
							<div class="cssTable">
								<table id="tableinfo" style="margin:0px;padding:0px;">
									<col width="20%">
									<col width="55%">
									<col width="25%">
									<tbody>
										<tr>
											<td>Status</td>
											<td>Nama</td>
											<td>Tanggal Pemberitahuan Putusan</td>
										</tr>
									<?php
										$i=1;
										foreach ($data_pemberitahuan->result() as $row) {
											if($row->pihakke==1){
												echo '<tr>';
													echo '<td>'.$this->nativesession->getStatusPihak(10,$idalurperkara,1).' '.$row->urutan.'</td>';
													if($jenis_perkara_id == 282 || $jenis_perkara_id == 13){
														echo '<td>Data disamarkan</td>';
													}else{
													echo '<td>'.$row->nama.'</td>';
													}
													$tgl = (!empty($row->tglMenerimaPutusan))? $this->tanggalhelper->convertDayDate($row->tglMenerimaPutusan):'';
													echo '<td>'.$tgl.'</td>';
												echo '</tr>';
											}
											
										}?>
									</tbody>
								</table>
							</div>
							<?php
							}
						}
					}
					?>	
						<br>
						<?php
						if($data_pemberitahuan!=''){
							if($data_pemberitahuan->num_rows>0 AND isPihakKeExist(2,$data_pemberitahuan)){?>
								<div class="cssTable">
									<table id="tableinfo" style="margin:0px;padding:0px;">
										<col width="20%">
										<col width="55%">
										<col width="25%">
										<tbody>
											<tr>
												<td>Status</td>
												<td>Nama</td>
												<td>Tanggal Pemberitahuan Putusan</td>
											</tr>
										<?php
											$i=1;
											foreach ($data_pemberitahuan->result() as $row) {
												if($row->pihakke==2){
													echo '<tr>';
														echo '<td>'.$this->nativesession->getStatusPihak(10,$idalurperkara,2).' '.$row->urutan.'</td>';
														echo '<td>'.$row->nama.'</td>';
														$tgl = (!empty($row->tglMenerimaPutusan))? $this->tanggalhelper->convertDayDate($row->tglMenerimaPutusan):'';
														echo '<td>'.$tgl.'</td>';
													echo '</tr>';
												}
											}?>
										</tbody>
									</table>
								</div>
							<?php
							}
						}
						if($idalurperkara==120 OR $idalurperkara==121){
							
						}
						?>
				</td>
			</tr>
			<?php
			}
			?>
			<tr>
			<td id="first-child" style="vertical-align:top;"><font color="white">Kirim Salinan <?php echo $status_kata; ?></font></td>
				<td>
					<?php
					if($idalurperkara!=114){
						if($data_pemberitahuan!=''){
							if($data_pemberitahuan->num_rows>0){?>
							<div class="cssTable">
								<table id="tableinfo" style="margin:0px;padding:0px;">
									<col width="20%">
									<col width="55%">
									<col width="25%">
									<tbody>
										<tr>
											<td>Status</td>
											<td>Nama</td>
											<td>Tanggal Pemberitahuan Putusan</td>
										</tr>
									<?php
										$i=1;
										foreach ($data_pemberitahuan->result() as $row) {
											if($row->pihakke==1){
												echo '<tr>';
													echo '<td>'.$this->nativesession->getStatusPihak(10,$idalurperkara,1).' '.$row->urutan.'</td>';
													if($jenis_perkara_id == 282 || $jenis_perkara_id == 13){
														echo '<td>Data disamarkan</td>';
													}else{
														echo '<td>'.$row->nama.'</td>';
													}
													$tgl = (!empty($row->tglKirimSalinan))? $this->tanggalhelper->convertDayDate($row->tglKirimSalinan):'';
													echo '<td>'.$tgl.'</td>';
												echo '</tr>';
											}
											
										}?>
									</tbody>
								</table>
							</div>
							<?php
							}
						}
					}
					?>	
						<br>
						<?php
						if($data_pemberitahuan!=''){
							if($data_pemberitahuan->num_rows>0 AND isPihakKeExist(2,$data_pemberitahuan)){?>
							<div class="cssTable">
								<table id="tableinfo" style="margin:0px;padding:0px;">
									<col width="20%">
									<col width="55%">
									<col width="25%">
									<tbody>
										<tr>
											<td>Status</td>
											<td>Nama</td>
											<td>Tanggal Pemberitahuan Putusan</td>
										</tr>
									<?php
										$i=1;
										foreach ($data_pemberitahuan->result() as $row) {
											if($row->pihakke==2){
												echo '<tr>';
													echo '<td>'.$this->nativesession->getStatusPihak(10,$idalurperkara,2).' '.$row->urutan.'</td>';
													echo '<td>'.$row->nama.'</td>';
													$tgl = (!empty($row->tglMenerimaPutusan))? $this->tanggalhelper->convertDayDate($row->tglMenerimaPutusan):'';
													echo '<td>'.$tgl.'</td>';
												echo '</tr>';
											}
										}?>
										</tbody>
									</table>
								</div>
							<?php
								}
							}
							?>
				</td>
		</tr>
			<!-- equalizr 28 januari 2022 -->
			<?php
			if($idalurperkara!=124){
			?>
			<tr>
				<td id="first-child" style="vertical-align:top;"><font color="white">Kirim Salinan <?php echo $status_kata; ?> Kepada Penyidik</font></td>
				<td style="padding:0px;padding-left:5px;"><?php echo (!empty($kirim_salinan_putusan_penyidik)? $kirim_salinan_putusan_penyidik:'');?></td>
			</tr>
			<?php } ?>
		<?php
		}
		?>
		<tr>
			<td id="first-child"><font color="white">Tanggal Minutasi</font></td>
			<td style="padding:0px;padding-left:5px;"><?php echo (!empty($tanggal_minutasi)? $tanggal_minutasi:'');?></td>
		</tr>
		<tr>
			<td id="first-child"><font color="white">Keterangan</font></td>
			<td style="padding:0px;padding-left:5px;"><?php echo (!empty($catatan_putusan)? $catatan_putusan:'');?></td>
		</tr>
		</tbody>
	</table>
</div>
<script type="text/javascript">
closeLoading();
</script>
