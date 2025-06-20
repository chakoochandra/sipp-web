<h2 align="center">STATISTIK PERKARA </h2>
<h3 align="center">Bulan : <?php echo $nama_bulan[$bulan_terpilih];?> <?php echo $tahun_terpilih;?>   </h3>
<?php $jenis_pengadilan = $this->session->userdata('jenis_pengadilan'); ?>
<div id='dashboard' style="margin-left: auto; margin-right:auto; margin-top:10px; width:85%;">
	<div id="usual2" class="usual" > 
		<ul>
			<li class='tab'><a href="#tabs1" id='tabInfo' class="selected">Laporan Statistik Perkara</a></li>
			<li class='tab'><a href="#tabs2" id='tabInfo2' class="selected">Laporan Banding Perkara</a></li>
			<!-- <li class='tab'><a href="#tabs3" id='tabInfo' class="selected">Laporan Kasasi Perkara</a></li>
			<li class='tab'><a href="#tabs4" id='tabInfo' class="selected">Laporan Peninjauan Kembali Perkara</a></li> -->
		</ul>
		<div id="tabs1">
			<div id='key_indikator' style="background:white;padding:5px;">
				<form id="form_tanggal" method="post" action='<?php echo base_url("statistik_perkara/");?>' target="_self">
					<table width="100%" margin-left="10px" bgcolor='snow'>
					<tr>
						<td align='center'>
							<?php $curM=date('m'); ?>
							<font style='font-size:13px;font-weight:bold;'>Pilih periode laporan :</font>
								<span class="custom-dropdown custom-dropdown--emerald" style="width:150px">
								<?php
									$js='id="bulan" style="width:150px;" class="custom-dropdown__select custom-dropdown__select--white"';
									echo form_dropdown('bulan', $nama_bulan, $bulan_terpilih, $js);
								?>
								</span>
								<?php 
								if($tahun_perkara!=''){
									if($tahun_perkara->num_rows>0){
										echo '<span class="custom-dropdown custom-dropdown--emerald" style="width:100px">';
										$js='id="tahun" style="width:80px;" class="custom-dropdown__select custom-dropdown__select--white"';
										foreach ($tahun_perkara->result_array() as $key) {
											$arr_tahun[$key['tahun']]=$key['tahun'];
										}
										echo form_dropdown('tahun', $arr_tahun, $tahun_terpilih, $js);
										echo '</span>';
									}else{
										echo '<span style="font-family: Century Gothic,sans-serif;font-size: 13px;padding-left:5px;">'.date('Y').'</span>';
									}
								}else{
									echo '<span style="font-family: Century Gothic,sans-serif;font-size: 13px;padding-left:5px;">'.date('Y').'</span>';
								}
								?>
								<input type='hidden' id='post_bulan' name="bulan" value="" />
								<input type='hidden' id='post_tahun' name="tahun" value="" />
						</td><div id='green_loading'></div>
					</tr>
					</table>
				</form>
					<div class="cssTable">
						<table id="tablePerkaraAll">
							<col width="4%"/>
							<col width="20%"/>
							<col width="8%"/>
							<col width="8%"/>
							<col width="8%"/>
							<col width="8%"/>
							<col width="8%"/>
							<col width="8%"/>
							<tbody>
							<tr height="50px">
								<td>No</td>
								<td>Klasifikasi</td>
								<td>Sisa Bulan Lalu</td>
								<td>Perkara Masuk</td>
								<td>Putus</td>
								<td>Minutasi</td>
								<td>Belum Minutasi</td>
								<td>Sisa</td>
							</tr>
							<?php
							$con=1;
							$sisa='0';
							$totalSisa=0;
							if($data_keyindikator->num_rows>0){
								foreach ($data_keyindikator->result() as $row) {
									$sisa=$row->sisablnlalu+$row->masuk-$row->putus;
									echo "<tr>";
									echo '<td align="center">'.$con.'</td>';
									echo '<td>'.$row->nama.'</td>
											<td style="text-align:center">'.$row->sisablnlalu.'</td>
											<td style="text-align:center">'.$row->masuk.'</td>
											<td style="text-align:center">'.$row->putus.'</td>
											<td style="text-align:center">'.$row->putussudahminutasi.'</td>
											<td style="text-align:center">'.$row->belumMinutasi.'</td>
											<td style="text-align:center">'.$sisa.'</td>
											</tr>';
									$totalSisa=$totalSisa+$sisa;
									$con++;
								}
								echo "<tr>";
								echo "<td colspan='7' style='text-align:right;font-weight:bold'>Total</td>";
								echo "<td style='text-align:center;font-weight:bold' >".$totalSisa."</td></tr>";
							}else{
								echo "<tr><td colspan='8' align='center'>Data Tidak diTemukan</td></tr>";
							}
							?>
							</tbody>
						</table>
					</div>
			</div>
		</div>
		<br>
		<div id="tabs2"></div>
		<div id="tabs3"></div>
	</div>
</div>
<div style="padding:20px;" ></div>
<script type="text/javascript"> 

$('#bulan').change(function(){
	$('#post_bulan').val(this.value);
	ngerefresh();	
});

$('#tahun').change(function(){
  	$('#post_tahun').val(this.value);
  	ngerefresh();	
})

function ngerefresh(){
	$('#post_bulan').val($('#bulan').val());
	$('#post_tahun').val($('#tahun').val());
	$('#form_tanggal').submit();
}

$("#usual2 ul").idTabs("tabs1");
</script>