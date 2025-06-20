<?php
$minut_diversi=false;
if ($idalurperkara==118 && $ada_data_diversi==1){
	$minut_diversi=true;
} else if ($idalurperkara==125 && $ada_data_diversi==1){
	$minut_diversi=true;
}
$ses_keyword = $this->nativesession->get_flash_session('search_keyword');
$this->nativesession->set_flash_session('search_keyword_detil',$ses_keyword);

?>
<hr class="thick-line" style="clear:both;">
<style type="text/css">
	#submenus td{ padding-left: 5px; font-size:13px;}
	#submenus a {font-size:13px;color:#3598db;text-decoration: none;}
	#submenus a:visited {color:#3598db;text-decoration: none;}  /* visited link */
	#submenus a:hover {font-size:13px;color:#3598db;text-decoration: none;}  /* mouse over link */
	#submenus a:active {color:#3598db;text-decoration: none;}
</style>
<table width="100%" id="submenus" style="font-size:13px;" >
	<tr>
		<td id="backlist"><a href="<?php echo $main_history;?>">Kembali</a></td>
	</tr>
</table>
<hr class="thick-line" style="clear:both;">
<div class="cssTable" style="margin-top:5px;">
	<table id="tableinfo">
		<col  width="20%"/>
        <col  width="30%"/>
        <col  width="30%"/>
        <col  width="20%"/>
		<tbody>
			<tr>
				<td>Nomor Perkara</td>
				<td><?php if($idalurperkara==114) {  } else {echo $this->nativesession->getStatusPihak(10,$idalurperkara,1); } ?></td>
				<td><?php echo $this->nativesession->getStatusPihak(10,$idalurperkara,2); ?></td>
				<td>Status Perkara</td>
			</tr>
			<tr>
				<td><?php echo $noPerkara;?></td>
				<td><?php if($idalurperkara==114){} else { echo $pihak1; } ?></td>
				<td><?php echo $pihak2;?></td>
				<td><?php echo $statuTerakhir;?></td>
			</tr>
		</tbody>
	</table>
</div>
<input type="hidden" id="ref_dataumum" value="0">
<div id='content' style="margin: 5px;margin-top:10px;">
	<div id="usual2" class="usual"> 
		<ul>
			<?php
			
				echo "<li class='tab'><a href=\"#tabs1\" id= 'tabInfo' class=\"selected\">Data Umum</a></li>";
			
			if($IDJenisPerkara==624){
				echo "<li class='tab' ><a href=\"#tabs25\" id= 'tabInfo'>Mediasi Di Luar Pengadilan</a></li>";
			}

			if (($idalurperkara==8 OR $idalurperkara==9) AND $ada_data_dismissal==1){
				
						echo "<li class='tab'><a href=\"#tabs20\" id= 'tabInfo'>Penetapan Dismissal</a></li>";
				
			}

			if ($idalurperkara==9 && $ada_data_verzet>0){
				
					echo "<li class='tab'><a href=\"#tabs5\" id= 'tabInfo'>Perlawanan</a></li>";
				
			}

			if ($idProses>=20 AND $ada_penetapan>0){
				
					echo "<li class='tab'><a href=\"#tabs2\" id= 'tabInfo'>Penetapan</a></li>";
				
			}

			if ($ada_perbaikan_gugatan>0){
				
				echo "<li class='tab'><a href=\"#tabs33\" id= 'tabInfo'>Perbaikan Gugatan</a></li>";
			
			}

			if ($ada_data_pen_persiapan==1){
				
					echo "<li class='tab'><a href=\"#tabs23\" id= 'tabInfo'>Pemeriksaan Persiapan</a></li>";
				
			}

			if ($idalurperkara==118 && $idProses>=65 && $ada_data_diversi>0 || $idalurperkara==125 && $idProses>=65 && $ada_data_diversi>0){
				
					echo "<li class='tab'><a href=\"#tabs3\" id= 'tabInfo'>Diversi</a></li>";
				
			}
			if ($ada_data_jadwal_sidang>0){
				if (!$minut_diversi AND ($ada_data_dismissal==0 OR $idalurperkara==9)){
					
						echo "<li class='tab'><a href=\"#tabs4\" id= 'tabInfo'>Jadwal Sidang</a></li>";
					
				} 
			}

			//equalizr
			//22 oktober 2021
			if ($idalurperkara==4 && $ada_data_put_pkpu_sementara>0 && $idProses>=81){
				echo "<li class='tab'><a href=\"#tabs27\" id= 'tabInfo'>PKPU Sementara</a></li>";
			}

			if($idalurperkara==4 && $ada_rapat_pkpu==1 && $idProses>=81){
				echo "<li class='tab'><a href=\"#tabs28\" id= 'tabInfo'>PKPU Tetap</a></li>";
			}

			if($idalurperkara==4 && $ada_rencana_perdamaian==1 && $idProses>=81){
				echo "<li class='tab'><a href=\"#tabs29\" id= 'tabInfo'>Rencana Perdamaian</a></li>";
			}

			if ($idalurperkara==4 && $idProses>=200 && $ada_lap_pengurus_pkpu==1){
				echo "<li class='tab'><a href=\"#tabs30\" id= 'tabInfo'>Laporan Pengurus</a></li>";
			}
			//end

			if ($idalurperkara==19) {
					if ($wekppu->num_rows()>0){
						echo "<li class='tab'><a href=\"#tabs55\" id= 'tabInfo'>Kewenangan KPPU</a></li>";
					}
			} 

			if ($ada_data_saksi>0){				
				echo "<li class='tab'><a href=\"#tabs26\" id= 'tabInfo'>Saksi</a></li>";				
			}
			
			if (($idalurperkara==1 OR $idalurperkara==7 OR $idalurperkara==15) && $idProses>=80 && $ada_data_mediasi>0 && $IDJenisPerkara!=624){
				
					echo "<li class='tab'><a href=\"#tabs6\" id= 'tabInfo'>Mediasi </a></li>";
				
			}
			if ($ada_data_intervensi>0){
				
					echo "<li class='tab'><a href=\"#tabs7\" id= 'tabInfo'>Intervensi</a></li>";
				
			}
			if ($idProses>=81 && $ada_data_rekonvensi>0 && $idalurperkara<100){
				
					echo "<li class='tab'><a href=\"#tabs22\" id= 'tabInfo'>Rekonvensi</a></li>";
				
			}
			if($idalurperkara>=111 && $ada_data_penuntutan==1 && $idalurperkara!=119){
					
						echo "<li class='tab'><a href=\"#tabs8\" id= 'tabInfo'>Penuntutan</a></li>";
					
			}
			if ($ada_data_putusan_sela==1){
				
					echo "<li class='tab'><a href=\"#tabs9\" id= 'tabInfo'>Putusan Sela</a></li>";
				
			}
			if ($idProses>=210 AND $idProses!=214){
				if (($idalurperkara==9) OR ($ada_data_dismissal==0 AND $ada_data_gugur==0)){
					if($idalurperkara==2 OR $penghentian_perkara==1){
						$pen_put = 'Penetapan';
					}else if($idalurperkara==124){
						$pen_put = 'Penetapan ( Putusan Akhir )';
					}else{
						$pen_put = 'Putusan';
					}
						echo "<li class='tab'><a href=\"#tabs10\" id= 'tabInfo'>";
							echo $pen_put;
							echo "</a></li>";										
				}
			}

			//begin terusan kepailitan & pkpu
			if ($idalurperkara==4 && $idProses>=210 && $ada_batal_damai_pkpu==1){
				echo "<li class='tab'><a href=\"#tabs32\" id= 'tabInfo'>Pembatalan Perdamaian</a></li>";
			}

			if(($idalurperkara==3 OR $idalurperkara==4) && $ada_pasca>0){
				echo "<li class='tab'><a href=\"#tabs31\" id= 'tabInfo'>Setelah Putusan Pernyataan Pailit</a></li>";
			}
			//end

			if (($idalurperkara==1 OR $idalurperkara==7 OR $idalurperkara==15) && $ada_data_verzet>0){
				
					echo "<li class='tab'><a href=\"#tabs5\" id= 'tabInfo'>Verzet</a></li>";
				
			}
			
			if ($idProses>=212 AND $idalurperkara==8 AND $ada_data_gugur==1){
				
						echo "<li class='tab'><a href=\"#tabs21\" id= 'tabInfo'>Penetapan Gugur</a></li>";
				
			}
			if ($idalurperkara==8 && $idProses>=210 && $ada_data_keberatan==1){
				
					echo "<li class='tab'><a href=\"#tabs19\" id= 'tabInfo'>Keberatan</a></li>";
				
			}
			if ($ada_data_banding>0){
				
					echo "<li class='tab'><a href=\"#tabs13\" id= 'tabInfo'>Banding</a></li>";
				
			}
			if ($ada_data_kasasi>0){
				
					echo "<li class='tab'><a href=\"#tabs14\" id= 'tabInfo'>Kasasi</a></li>";
				
			}
			if ($ada_data_PK>0){
				
					echo "<li class='tab'><a href=\"#tabs15\" id= 'tabInfo'>Peninjauan Kembali</a></li>";
				
			}
			if ($idalurperkara>100 && $idProses>=650 AND $ada_data_grasi>0){
				
					echo "<li class='tab'><a href=\"#tabs16\" id= 'tabInfo'>Grasi</a></li>";
				
			}else if(($idalurperkara==1 || $idalurperkara==6 || $idalurperkara==9 || $idalurperkara==15) && $idProses>=600 && $ada_data_eksekusi>0){
				
					echo "<li class='tab'><a href=\"#tabs17\" id= 'tabInfo'>Eksekusi</a></li>";
				
			}
			if($idalurperkara<100){
				
					echo "<li class='tab'><a href=\"#tabs11\" id= 'tabInfo'>Biaya Perkara</a></li>";
				
			}
			if($idalurperkara==15 AND ($IDJenisPerkara == 346 OR $IDJenisPerkara == 347) AND $ikrar_talak!=0){
				
					echo "<li class='tab'><a href=\"#tabs24\" id= 'tabInfo'>Ikrar Talak</a></li>";
				
			}
			if($idalurperkara>=111 && $idalurperkara!=119 && $idalurperkara!=114 && $idalurperkara!=124){
				
					echo "<li class='tab'><a href=\"#tabs18\" id= 'tabInfo'>Barang Bukti</a></li>";
				
			}
			
				echo "<li class='tab'><a href=\"#tabs12\" id= 'tabInfo'>Riwayat Perkara</a></li>";
			
			?>
		</ul>
		<input type="hidden" id="refresh_dest" value="<?php echo $history;?>">
		<div id="tabs1">
		<?php 
			$this->load->view('perkara_tab/data_umum');
		?>
		</div>
		<?php
		if($IDJenisPerkara==624){
				echo '<div id="tabs25"></div>';
			} 
		if ($idProses>=20){ 
			echo '<div id="tabs2"></div>';
		}
		if (($idalurperkara==8 OR $idalurperkara==9) AND $ada_data_dismissal==1){
			echo '<div id="tabs20"></div>';
		}

		if ($idalurperkara==9 && $ada_data_verzet>0){
			echo '<div id="tabs5"></div>';
		}

		if ($idalurperkara==118 && $idProses>=65 && $ada_data_diversi>0 || $idalurperkara==125 && $idProses>=65 && $ada_data_diversi>0){
			echo '<div id="tabs3"></div>';
		}
		
		if ($ada_data_pen_persiapan==1){
			echo '<div id="tabs23"></div>';
		}

		if (($idalurperkara==8 OR $idalurperkara==9) AND $ada_data_dismissal==1){
			echo '<div id="tabs20"></div>';
		}

		if ($ada_data_jadwal_sidang>0){
			if (!$minut_diversi AND ($ada_data_dismissal==0 OR $idalurperkara==9)){
				echo '<div id="tabs4"></div>';
			}
		}

		if($ada_data_saksi>0){
			echo '<div id="tabs26"></div>';
		}

		//equalizr
		//23 oktober 2021
		if ($idalurperkara==4 && $ada_data_put_pkpu_sementara>0 && $idProses>=81){
			echo '<div id="tabs27"></div>';
		}
		if($idalurperkara==4 && $ada_rapat_pkpu==1 && $idProses>=81){
			echo '<div id="tabs28"></div>';
		}
		if($idalurperkara==4 && $ada_rencana_perdamaian==1 && $idProses>=81){
			echo '<div id="tabs29"></div>';
		}
		if ($idalurperkara==4 && $idProses>=200 && $ada_lap_pengurus_pkpu==1){
			echo '<div id="tabs30"></div>';
		}
		if(($idalurperkara==3 OR $idalurperkara==4) && $ada_pasca>0){
			echo '<div id="tabs31"></div>';
		}
		if ($idalurperkara==4 && $idProses>=210 && $ada_batal_damai_pkpu==1){
			echo '<div id="tabs32"></div>';
		}
		//end
		//21 desember 2022
		if ($ada_perbaikan_gugatan>0){
			echo '<div id="tabs33"></div>';
		}
		
		if (($idalurperkara==1 OR $idalurperkara==7 OR $idalurperkara==15) && $idProses>=80 && $ada_data_mediasi>0 && $IDJenisPerkara!=624){
			echo '<div id="tabs6"></div>';
		}
		if ($ada_data_intervensi>0){
			echo '<div id="tabs7"></div>';
		}
		if ($idProses>=81 && $ada_data_rekonvensi>0 && $idalurperkara<100){
			echo '<div id="tabs22"></div>';
		}
		if($idalurperkara>=111 && $ada_data_penuntutan==1){
			echo '<div id="tabs8"></div>';
		}
		if($idalurperkara>=111){
			echo '<div id="tabs18"></div>';
		}
		if ($ada_data_putusan_sela==1){
			if (!$minut_diversi){
				echo '<div id="tabs9"></div>';
			}
		}
		if ($idProses>=210 AND $idProses!=214){
			if (($idalurperkara==9 AND $idProses!=213) OR ($ada_data_dismissal==0 AND $ada_data_gugur==0)){
				echo '<div id="tabs10"></div>';
			}
		}
		if (($idalurperkara==1 OR $idalurperkara==7 OR $idalurperkara==15) && $ada_data_verzet>0){
			echo '<div id="tabs5"></div>';
		}
		if ($idProses>=212 AND $idalurperkara==8 AND $ada_data_gugur==1){
			echo '<div id="tabs21"></div>';
		}
		if ($ada_data_banding>0){ 
			echo '<div id="tabs13"></div>';
		}
		if ($idalurperkara==8 && $idProses>=210 && $ada_data_keberatan==1){
			echo '<div id="tabs19"></div>';
		}
		if ($ada_data_kasasi>0){
			echo '<div id="tabs14"></div>';
		}
		if ($ada_data_PK>0){
			echo '<div id="tabs15"></div>';
		}
		if ($idalurperkara>100 && $idProses>=650 AND $ada_data_grasi>0){
			echo '<div id="tabs16"></div>';
		}
		if (($idalurperkara==1 || $idalurperkara==6 || $idalurperkara==9 || $idalurperkara==15) && $idProses>=600 && $ada_data_eksekusi>0){
			echo '<div id="tabs17"></div>';
		}
		if($idalurperkara==15 AND ($IDJenisPerkara == 346 OR $IDJenisPerkara == 347)){
			echo '<div id="tabs24"></div>';
		}
		if($idalurperkara<100){
			echo '<div id="tabs11"></div>';
		}
		if ($idalurperkara==19){
			echo '<div id="tabs55"></div>';
		}

		
		?>
		<div id="tabs12"></div>
	</div>
</div>
<script type="text/javascript"> 
$("#usual2 ul").idTabs("tabs2");
$( document ).ready(function() {
	$('a#tabInfo').click(function(event){
		if (!$(this).hasClass('loaded')){
			if($(this).attr('href')=='#tabs2'){
				openLoadingDialog();
				$('#tabs2').load('<?php echo base_url("show_penetapan/".$enc);?>');
				$('a[href=#tabs2]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs33'){
				openLoadingDialog();
				$('#tabs33').load('<?php echo base_url("show_perbaikan_gugatan/".$enc);?>');
				$('a[href=#tabs33]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs3'){
				openLoadingDialog();
				$('#tabs3').load('<?php echo base_url("show_diversi/".$enc);?>');
				$('a[href=#tabs3]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs4'){
				openLoadingDialog();
				$('#tabs4').load('<?php echo base_url("show_jadwal_sidang/".$enc);?>');
				$('a[href=#tabs4]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs5'){
				$('#tabs5').load('<?php echo base_url("show_verzet/".$enc);?>');
				$('a[href=#tabs5]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs6'){
				openLoadingDialog();
				$('#tabs6').load('<?php echo base_url("show_mediasi/".$enc);?>');
				$('a[href=#tabs6]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs7'){
				openLoadingDialog();
				$('#tabs7').load('<?php echo base_url("show_intervensi/".$enc);?>');
				$('a[href=#tabs7]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs8'){
				openLoadingDialog();
				$('#tabs8').load('<?php echo base_url("show_penuntutan/".$enc);?>');
				$('a[href=#tabs8]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs9'){
				openLoadingDialog();
				$('#tabs9').load('<?php echo base_url("show_putusan_sela/".$enc);?>');
				$('a[href=#tabs9]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs10'){
				openLoadingDialog();
				$('#tabs10').load('<?php echo base_url("show_putusan/".$enc);?>');
				$('a[href=#tabs10]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs19'){
				openLoadingDialog();
				$('#tabs19').load('<?php echo base_url("show_keberatan/".$enc);?>');
				$('a[href=#tabs19]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs11'){
				openLoadingDialog();
				$('#tabs11').load('<?php echo base_url("show_biaya_perkara/".$enc);?>');
				$('a[href=#tabs11]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs12'){
				openLoadingDialog();
				$('#tabs12').load('<?php echo base_url("show_riwayat_perkara/".$enc);?>');
				$('a[href=#tabs12]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs13'){
				openLoadingDialog();
				$('#tabs13').load('<?php echo base_url("show_banding/".$enc);?>');
				$('a[href=#tabs13]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs14'){
				openLoadingDialog();
				$('#tabs14').load('<?php echo base_url("show_kasasi/".$enc);?>');
				$('a[href=#tabs14]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs15'){
				openLoadingDialog();
				$('#tabs15').load('<?php echo base_url("show_pk/".$enc);?>');
				$('a[href=#tabs15]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs16'){
				openLoadingDialog();
				$('#tabs16').load('<?php echo base_url("show_grasi/".$enc);?>');
				$('a[href=#tabs16]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs17'){
				$('#tabs17').load('<?php echo base_url("show_eksekusi/".$enc);?>');
				$('a[href=#tabs17]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs18'){
				openLoadingDialog();
				$('#tabs18').load('<?php echo base_url("show_barang_bukti/".$enc);?>');
				$('a[href=#tabs18]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs20'){
				openLoadingDialog();
				$('#tabs20').load('<?php echo base_url("show_dismissal/".$enc);?>');
				$('a[href=#tabs20]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs21'){
				openLoadingDialog();
				$('#tabs21').load('<?php echo base_url("show_penetapan_gugur/".$enc);?>');
				$('a[href=#tabs21]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs22'){
				openLoadingDialog();
				$('#tabs22').load('<?php echo base_url("show_rekonvensi/".$enc);?>');
				$('a[href=#tabs21]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs23'){
				openLoadingDialog();
				$('#tabs23').load('<?php echo base_url("show_pen_persiapan/".$enc);?>');
				$('a[href=#tabs23]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs24'){
				openLoadingDialog();
				$('#tabs24').load('<?php echo base_url("show_ikrar_talak/".$enc);?>');
				$('a[href=#tabs24]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs25'){
				openLoadingDialog();
				$('#tabs25').load('<?php echo base_url("show_mediasi_luar/".$enc);?>');
				$('a[href=#tabs25]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs26'){
				openLoadingDialog();
				$('#tabs26').load('<?php echo base_url("show_saksi/".$enc);?>');
				$('a[href=#tabs26]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs27'){
				openLoadingDialog();
				$('#tabs27').load('<?php echo base_url("show_pkpu_sementara/".$enc);?>');
				$('a[href=#tabs27]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs28'){
				openLoadingDialog();
				$('#tabs28').load('<?php echo base_url("show_pkpu_tetap/".$enc);?>');
				$('a[href=#tabs28]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs29'){
				openLoadingDialog();
				$('#tabs29').load('<?php echo base_url("show_rencana_perdamaian/".$enc);?>');
				$('a[href=#tabs29]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs30'){
				openLoadingDialog();
				$('#tabs30').load('<?php echo base_url("show_laporan_pengurus/".$enc);?>');
				$('a[href=#tabs30]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs31'){
				openLoadingDialog();
				$('#tabs31').load('<?php echo base_url("show_setelah_putusan_pernyataan_pailit/".$enc);?>');
				$('a[href=#tabs31]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs32'){
				openLoadingDialog();
				$('#tabs32').load('<?php echo base_url("show_pembatalan_perdamaian/".$enc);?>');
				$('a[href=#tabs32]').addClass('loaded');
			}else if($(this).attr('href')=='#tabs55'){
			    openLoadingDialog();
				$('#tabs55').load('<?php echo base_url("show_we_kppu/".$enc);?>');
				$('a[href=#tabs55]').addClass('loaded');
		    }
		}
	});	
});

$('#backlist').click(function(){
    window.open("<?php echo $main_history;?>","_self");
});
</script>
