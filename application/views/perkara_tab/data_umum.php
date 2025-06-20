<style type="text/css">
#infoPerkara .wrapword li {
  display: list-item !important;
  clear: both;
  float: none !important;
}
</style>
<?php
function isPihakKeExist($pihakke,$para_pihak){
	foreach ($para_pihak->result() as $row) {
		if($row->pihak_ke==$pihakke){
			return TRUE;
		}
	}
	return FALSE;
}
if($idalurperkara<100 OR $idalurperkara==119 ){
	$nama_doc = '';
}else{
	$nama_doc = 'Pelimpahan';
}
if($idalurperkara<100 AND $idalurperkara==9){
	$jenis_doc = 'Gugatan';
}elseif($idalurperkara<100){
	$jenis_doc = 'Petitum';
}elseif($idalurperkara==119){
	$jenis_doc = 'Petitum Permohonan';
}elseif($idalurperkara==124){
	$jenis_doc = 'Pendapat Ormil & Pappera';
}else{
	$jenis_doc = 'Dakwaan';
}
?>
<div style="font-size:14px;">
	<table id='infoPerkara' style="font-size:14px;width:100%;">
		<col width="15%">
		<col width="85%">
		<tbody>
			<tr>
				<td id="first-child"><font color="white">Tanggal Pendaftaran</font></td>
				<td><?php echo $this->tanggalhelper->convertDayDate($tglPendaftaran);?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Klasifikasi Perkara</font></td>
				<td><?php echo $jenisPerkara;?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Nomor Perkara</font></td>
				<td><?php echo $noPerkara;?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Tanggal Surat <?php echo $nama_doc;?></font></td>
				<td><?php echo $this->tanggalhelper->convertDayDate($tglSurat);?></td>
			</tr>
			<?php if ($idalurperkara!=114){ ?>
			<tr>
				<td id="first-child"><font color="white">Nomor Surat <?php echo $nama_doc;?></font></td>
				<td><?php echo $noSurat;?></td>
			</tr>
			<?php } ?>

			


			<?php if ($idalurperkara==114){ ?>
			<tr>
				<td id="first-child"><font color="white">Tanggal Penindakan</font></td>
				<td><?php echo (!empty($tanggalPenindakan))? $tanggalPenindakan:'';?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Ditindak Oleh</font></td>
				<td><?php echo (!empty($ditilangOleh))? $ditilangOleh:'';?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Jenis Surat Tilang</font></td>
				<td><?php echo (!empty($jenisTilang))? $jenisTilang:'';?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Nomor Seri Surat Tilang</font></td>
				<td><?php echo (!empty($nomorTilang))? $nomorTilang:'';?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Nomor Pembayaran</font></td>
				<td><?php echo (!empty($nomorPembayaran))? $nomorPembayaran:'';?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Jenis Kendaraan</font></td>
				<td><?php echo (!empty($jenisKendaraan))? $jenisKendaraan:'';?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Tanda Nomor Kendaraan Bermotor</font></td>
				<td><?php echo (!empty($nomorPolisi))? $nomorPolisi:'';?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Bukti</font></td>
				<td><?php echo (!empty($buktiTilang))? $buktiTilang:'';?></td>
			</tr>
			
			<?php 
			}
			if($this->session->userdata('jenispengadilan')==2){

			//equalizr 27 januari 2022
			if ($idalurperkara==124){ ?>
			<tr>
				<td id="first-child"><font color="white">Berkas Dari</font></td>
				<td><?php echo $BerkasDari;?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Tanggal Kejadian</font></td>
				<td><?php echo $tglKejadian;?></td>
			</tr>
			<tr>
				<td id="first-child"><font color="white">Tempat Kejadian</font></td>
				<td><?php echo $tempatKejadian;?></td>
			</tr>
			<?php } else { ?>

				<tr>
					<td id="first-child" style='vertical-align:top;'><font color="white">Informasi</font></td>
					<td>
						<div class="cssTable">
							<table>
								<col width="18%">
								<col width="32%">
								<col width="18%">
								<col width="32%">
								<tr>
									<td style='text-align:left;color:white;'>Tanggal Kejadian</td>
									<td style='text-align:left;background:white;color:black;'><?php echo (!empty($tglKejadian))? $$this->tanggalhelper->convertDayDate($tglKejadian):'';?></td>
									<td style='text-align:left;color:white;'>Nomor Surat Dakwaan</td>
									<td style='text-align:left;background:white;color:black;'><?php echo (!empty($noSuratDakwaan))? $noSuratDakwaan:'';?></td>
								</tr>
								<tr>
									<td style='text-align:left;background:#5FB85C;color:white;'>Tempat Kejadian</td>
									<td style='text-align:left;background:white;color:black;'><?php echo (!empty($tempatKejadian))? $tempatKejadian:'';?></td>
									<td style='text-align:left;background:#5FB85C;color:white;'>Pasal Dakwaan</td>
									<td style='text-align:left;background:white;color:black;'><?php echo (!empty($pasalDakwaan))? $pasalDakwaan:'';?></td>
								</tr>
								<tr>
									<td style='text-align:left;background:#5FB85C;color:white;'>Tanggal Skeppera</td>
									<td style='text-align:left;background:white;color:black;'><?php echo (!empty($tglSkeppera))? $this->tanggalhelper->convertDayDate($tglSkeppera):'';?></td>
									<td style='text-align:left;background:#5FB85C;color:white;'>Penyidik Militer</td>
									<td style='text-align:left;background:white;color:black;'><?php echo (!empty($penyidik))? $penyidik:'';?></td>
								</tr>
								<tr>
									<td style='text-align:left;background:#5FB85C;color:white;'>Nomor Skeppera</td>
									<td style='text-align:left;background:white;color:black;'><?php echo (!empty($noSkeppera))? $noSkeppera:'';?></td>
									<td style='text-align:left;background:#5FB85C;color:white;'>Nomor BAP Penyidik Militer</td>
									<td style='text-align:left;background:white;color:black;'><?php echo (!empty($noBAPPenyidik))? $noBAPPenyidik:'';?></td>
								</tr>
								<tr>
									<td style='text-align:left;background:#5FB85C;color:white;'>Pejabat Skeppera</td>
									<td style='text-align:left;background:white;color:black;'><?php echo (!empty($pejabatSKeppera))? $pejabatSKeppera:'';?></td>
									<td style='text-align:left;background:#5FB85C;color:white;'>Tanggal BAP Penyidik</td>
									<td style='text-align:left;background:white;color:black;'><?php echo (!empty($tglPenyidik))? $this->tanggalhelper->convertDayDate($tglPenyidik):'';?></td>
								</tr>
								<tr>
									<td style='text-align:left;background:#5FB85C;color:white;'>Tanggal Surat Dakwaan</td>
									<td style='text-align:left;background:white;color:black;'><?php echo (!empty($tglSuratDakwaan))? $this->tanggalhelper->convertDayDate($tglSuratDakwaan):'';?></td>
									<td style='text-align:left;background:#5FB85C;color:black;'></td>
									<td style='text-align:left;background:white;color:black;'></td>
								</tr>
							</table>
						</div>
					</td>
				</tr>
				<?php } ?>
			<?php 
			}
			if($idalurperkara!=114){ ?>
			<tr>
				<td id="first-child" style="vertical-align: top;"><font color="white"><?php echo $this->nativesession->getStatusPihak(10,$idalurperkara,1);?></font></td>
				<td>
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
							foreach ($para_pihak->result() as $row) {
								if($row->pihak_ke==1){
									echo "<tr>";
										echo "<td align='center'>".$i."</td>";
										echo "<td>".$row->nama."</td>";
									echo "</tr>";
									$i++;
								}
							}
									echo '</tbody>';
								echo '</table>';
							echo '</div>';
						}
					}
					?>	
				</td>
			</tr>
			<?php }
			if($idalurperkara<100){?>
			<tr>
				<td id="first-child" style="vertical-align: top;"><font color="white"><?php echo $this->nativesession->getStatusPihak(10,$idalurperkara,7);?></font></td>
				<td>
					<?php
					if($pengacara_pihak_pertama!=''){
						if($pengacara_pihak_pertama->num_rows>0){
							echo '<div class="cssTable">';
								echo '<table id="tableinfo" style="margin:0px;padding:0px;">';
									echo '<col width="5%">';
									echo '<col width="55%">';
									echo '<col width="45%">';
									echo '<tbody>';
										echo '<tr>';
											echo '<td>No</td>';
											echo '<td>Nama</td>';
											echo '<td>Nama Pihak</td>';
										echo '</tr>';
							$i=1;
							foreach ($pengacara_pihak_pertama->result() as $row) {
								echo "<tr>";
									echo "<td align='center'>".$i."</td>";
									echo "<td>".$row->pengacaraNama."</td>";
									echo "<td>".$row->pihakNama."</td>";
								echo "</tr>";
								$i++;
							}
									echo '</tbody>';
								echo '</table>';
							echo '</div>';
						}
					}
					?>	
				</td>
			</tr>
			<?php }?>
			<tr>
				<td id="first-child" style="vertical-align: top;"><font color="white"><?php echo $this->nativesession->getStatusPihak(10,$idalurperkara,2);?></font></td>
				<td>
					<?php
					$idAlurPenahanan = array('111','112','113','115','116','117','118');
					if($para_pihak!=''){
						if($para_pihak->num_rows>0 AND isPihakKeExist(2,$para_pihak)){
							echo '<div class="cssTable">';
								echo '<table id="tableinfo" style="margin:0px;padding:0px;">';
									if(in_array($idalurperkara,$idAlurPenahanan)){
										echo '<col width="5%">';
										echo '<col width="65%">';
										echo '<col width="30%">';
									} else {
										echo '<col width="5%">';
										echo '<col width="95%">';	
									}
									echo '<tbody>';
										echo '<tr>';
											echo '<td>No</td>';
											echo '<td>Nama</td>';
											if(in_array($idalurperkara,$idAlurPenahanan)){
												echo '<td>Penahanan</td>';
											}
										echo '</tr>';
							$i=1;
							foreach ($para_pihak->result() as $row) {
								if($row->pihak_ke==2){
									echo "<tr>";
										echo "<td align='center'>".$i."</td>";
										echo "<td>".$row->nama."</td>";
										if(in_array($idalurperkara,$idAlurPenahanan)){
											echo '<td align="center">[<a href="#" onClick="detilPenahanan(\''.base64_encode($this->encrypt->encode($idperkara)).'\' , \''.base64_encode($this->encrypt->encode($row->nama)).'\')" >Penahanan</a>]</td>';
		    					echo "</tr>";
										}
									echo "</tr>";
									$i++;
								}
							}
									echo '</tbody>';
								echo '</table>';
							echo '</div>';
						}
					}
					?>	
				</td>
			</tr>
			<?php if($idalurperkara!=114){ 

			if($idalurperkara!=124){ ?>
			<tr>
				<td id="first-child" style="vertical-align: top;"><font color="white"><?php echo $this->nativesession->getStatusPihak(10,$idalurperkara,8);?></font></td>
				<td>
					<?php
					if($pengacara_pihak_kedua!=''){
						if($pengacara_pihak_kedua->num_rows>0 AND isPihakKeExist(2,$para_pihak)){
							echo '<div class="cssTable">';
								echo '<table id="tableinfo" style="margin:0px;padding:0px;">';
									echo '<col width="5%">';
									echo '<col width="55%">';
									echo '<col width="45%">';
									echo '<tbody>';
										echo '<tr>';
											echo '<td>No</td>';
											echo '<td>Nama</td>';
											echo '<td>Nama Pihak</td>';
										echo '</tr>';
							$i=1;
							foreach ($pengacara_pihak_kedua->result() as $row) {
								echo "<tr>";
									echo "<td align='center'>".$i."</td>";
									echo "<td>".$row->pengacaraNama."</td>";
									echo "<td>".$row->pihakNama."</td>";
								echo "</tr>";
								$i++;
							}
									echo '</tbody>';
								echo '</table>';
							echo '</div>';
						}
					}
					?>	
				</td>
			</tr>
			<?php  
				}
			} if($idalurperkara==1){?>
				<tr>
					<td id="first-child" style="vertical-align: top;"><font color="white"><?php echo $this->nativesession->getStatusPihak(10,$idalurperkara,4);?></font></td>
					<td>
						<?php
						if($para_pihak!=''){
							if($para_pihak->num_rows>0 AND isPihakKeExist(4,$para_pihak)){
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
								foreach ($para_pihak->result() as $row) {
									if($row->pihak_ke==4){
										echo "<tr>";
											echo "<td align='center'>".$i."</td>";
											echo "<td>".$row->nama."</td>";
										echo "</tr>";
										$i++;
									}
								}
										echo '</tbody>';
									echo '</table>';
								echo '</div>';
							}else{
								echo '-';
							}
						}
						?>	
					</td>
				</tr>
				<tr>
				<td id="first-child" style="vertical-align: top;"><font color="white"><?php echo $this->nativesession->getStatusPihak(10,$idalurperkara,10);?></font></td>
				<td>
					<?php
					if($pengacara_pihak_keempat!=''){
						if($pengacara_pihak_keempat->num_rows>0 AND isPihakKeExist(4,$para_pihak)){
							echo '<div class="cssTable">';
								echo '<table id="tableinfo" style="margin:0px;padding:0px;">';
									echo '<col width="5%">';
									echo '<col width="55%">';
									echo '<col width="45%">';
									echo '<tbody>';
										echo '<tr>';
											echo '<td>No</td>';
											echo '<td>Nama</td>';
											echo '<td>Nama Pihak</td>';
										echo '</tr>';
							$i=1;
							foreach ($pengacara_pihak_keempat->result() as $row) {
								echo "<tr>";
									echo "<td align='center'>".$i."</td>";
									echo "<td>".$row->pengacaraNama."</td>";
									echo "<td>".$row->pihakNama."</td>";
								echo "</tr>";
								$i++;
							}
									echo '</tbody>';
								echo '</table>';
							echo '</div>';
						}else{
							echo '-';
						}
					}
					?>	
				</td>
			</tr>

			<?php  } if($idalurperkara==124){?>
				<tr>
					<td id="first-child" style="vertical-align: top;"><font color="white"><?php echo $this->nativesession->getStatusPihak(10,$idalurperkara,14);?></font></td>
					<td>
						<?php
						if($pihak_tersangka!=''){
							if($pihak_tersangka->num_rows>0){
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
								foreach ($pihak_tersangka->result() as $row) {
									
										echo "<tr>";
											echo "<td align='center'>".$i."</td>";
											echo "<td>".$row->nama."</td>";
										echo "</tr>";
										$i++;
									
								}
										echo '</tbody>';
									echo '</table>';
								echo '</div>';
							}else{
								echo '-';
							}
						}
						?>	
					</td>
				</tr>

			<?php
			}
			if($idalurperkara==111 OR $idalurperkara==112 OR $idalurperkara==113 OR $idalurperkara==118 OR $idalurperkara==125){ ?>
			<tr>
				<td id="first-child" style="vertical-align: top;"><font color="white">Anak Korban</font></td>
				<td>
					<?php
					if($ada_data_korban>0){
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
							foreach ($para_pihak->result() as $row) {
								if($row->pihak_ke==6){
									echo "<tr>";
										echo "<td align='center'>".$i."</td>";
										echo "<td>".$row->nama." ".$row->urutan."</td>";
									echo "</tr>";
									$i++;
								}
							}
									echo '</tbody>';
								echo '</table>';
							echo '</div>';
						}
					}
					?>	
				</td>
			</tr>
			<?php 
			}
			if($idalurperkara==8 OR $idalurperkara==1 OR $idalurperkara==7){
			?>
				<tr>
					<td id="first-child" style="vertical-align: top;"><font color="white">Nilai Sengketa(Rp)</font></td>
					<td class='wrapword'><?php echo (!empty($nilai_sengketa))? $nilai_sengketa:'';?></td>
				</tr>
			<?php 
			}?>
			<tr>
				<td id="first-child" style="vertical-align: top;"><font color="white"><?php echo $jenis_doc;?></font></td>
				<td class='wrapword'><?php echo $petitum;?></td>
			</tr>
			<tr>
				<td id="first-child" style="vertical-align: top;"><font color="white">Pihak Dipublikasikan</font></td>
				<td><?php echo $isPublish;?></td>
			</tr>
			<?php
			if($idalurperkara<100){
			?>
				<tr>
					<td id="first-child" style="vertical-align: top;"><font color="white">Prodeo</font></td>
					<td><?php echo $prodeo;?></td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	function detilPenahanan(IDPerkara,namaTerdakwa){	
		popup_form('<?php echo base_url();?>penahanan/'+IDPerkara+'/'+namaTerdakwa)
	}
</script>