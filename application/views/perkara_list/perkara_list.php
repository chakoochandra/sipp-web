<?php
$this->nativesession->set_flash_session('search_keyword',$keyword_non_enc);
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/simplePagination.css">
<hr class="thick-line" style="clear:both;">
<div id="left">
	<form action="<?php echo base_url($page_url.'/search');?>" method="post" accept-charset="utf-8">
		<input name="search_keyword" value="<?php echo $keyword_non_enc;?>" id="search-box" size="50" placeholder="  Ketik kata kunci  " type="text">
		<input name="enc" value="<?php echo $enc;?>" type="hidden">
		<span></span>
		<input name="" value="Cari" id="search-btn1" type="submit">
	</form>
</div>
<div id="left">
<input type="submit" onClick="popup_form('<?php echo base_url();?>search/<?php echo $enc; ?>');" value="Pencarian Detil" id="search-btn1"></input>
</div>
<?php if ($idalurperkara=='114'){ ?>
<div id="left">
<input type="submit" onClick="popup_informasi();" value="Informasi" class="del_btn""></input>
</div>
<?php } ?>
<div id="pages">
    <div id="selector"></div>
</div>
<?php if ($idalurperkara=='114'){ ?>
<div class="cssTable">
	<table id="tablePerkaraAll">
		<col width="3%"/>
        <col width="15%"/>
        <col width="10%"/>
        <col width="10%"/>
        <col width="15%"/>
        <col width="10%"/>
        <col width="15%"/>
        <col width="4%"/>
		<tbody>
			<tr>
				<td>No</td>
				<td onclick="sorting(1)">Nomor Perkara</td>
				<td onclick="sorting(3)">Nomor Seri Tilang / No Pembayaran</td>
				<td onclick="sorting(4)">Tanda Nomor Kendaraan Bermotor</td>
				<td onclick="sorting(6)">Pelanggar</td>
				<td onclick="sorting(7)">Tanggal Sidang<br/>Ruang Sidang</td>
				<td>Putusan</td>
				<td>Link</td>
			</tr>
			<?php
				if($list_perkara!=''){
					if($list_perkara->num_rows>0){
						if($page_active<1){
							$con = 1;
						}else{
							$con = $page_active+1;
						}
		    			foreach ($list_perkara->result() as $row) {
		    				$date = new DateTime(str_replace("-","",$row->tglPendaftaran));
		    				$tglSidang = new DateTime(str_replace("-","",$row->tglSidangPertama));
		    				$NomorPolisi = str_replace(" ","",$row->nomorPolisi);
		    				$nomorTilang = str_replace(" ","",$row->nomorTilang);
		    				$amarPutusan = str_replace("Pidana","",$row->amar);
		    				echo "<tr>";
		    					echo '<td>'.$con.'</td>';
			    				echo '<td>'.$row->noPerkara.'</td>';
			    				echo '<td align="center">'.$nomorTilang.'<br/>'.$row->nomorPembayaran.'</td>';
			    				echo '<td align="center">'.$NomorPolisi.'</td>';
			    				echo '<td>'.$row->pihakKedua.'</td>';
			    				echo '<td align="center">'.$tglSidang->format('d M Y').'<br/>'.$row->ruangan.'</td>';
			    				echo '<td>'.$amarPutusan.'</td>';
			    				echo '<td align="center">[<a href="'.base_url('show_detil/'.base64_encode($this->encrypt->encode($row->IDPerkara))).'">detil</a>]</td>';
		    				echo "</tr>";
		    				$con++;
		    			}
			    	}else{
		    			echo "<tr><td colspan='8' align='center'>Data Tidak diTemukan</td></tr>";
		    		}
				}else{
		    		echo "<tr><td colspan='8' align='center'>Data Tidak diTemukan</td></tr>";
		    	}
			?>
		</tbody>
	</table>
</div>

<?php } else { ?>

<div class="cssTable">
	<table id="tablePerkaraAll">
		<col  width="3%" />
        <col  width="15%" />
        <col  width="7%" />
        <col  width="15%" />
        <col  width="23%" />
        <col  width="18%" />
        <col  width="5%" />
        <col  width="4%" />
		<tbody>
			<tr>
				<td>No</td>
				<td onclick="sorting(1)">Nomor Perkara</td>
				<td onclick="sorting(2)">Tanggal Register</td>
				<td onclick="sorting(3)">Klasifikasi Perkara</td>
				<td onclick="sorting(4)">Para Pihak</td>
				<td onclick="sorting(6)">Status Perkara</td>
				<td onclick="sorting(7)">Lama Proses</td>
				<td>Link</td>
			</tr>
			<?php
				if($list_perkara!=''){
					if($list_perkara->num_rows>0){
						if($page_active<1){
							$con = 1;
						}else{
							$con = $page_active+1;
						}
		    			foreach ($list_perkara->result() as $row) {
		    				$date = new DateTime(str_replace("-","",$row->tglPendaftaran));
		    				echo "<tr>";
		    					$lamaproses = ($row->durasi<1)? ($row->durasi+1):$row->durasi;
			    				echo '<td>'.$con.'</td>';
			    				echo '<td>'.$row->noPerkara.'</td>';
			    				echo '<td align="center">'.$date->format('d M Y').'</td>';
			    				echo '<td>'.$row->jenisPerkara.'</td>';
			    				echo '<td>';
			    				if(!empty($row->pihakPertama)){
			    					echo ''.$this->nativesession->getStatusPihak(10,$row->klasifikasiPerkara,1).':</br>'.$row->pihakPertama.'';
			    				}
				    			if(!empty($row->pihakKedua)){
				    				if($row->klasifikasiPerkara!=114){
				    					echo '<br/><br/>';
				    				}
				    				echo ''.$this->nativesession->getStatusPihak(10,$row->klasifikasiPerkara,2).':</br>'.$row->pihakKedua;
				    			}
				    			echo '</td>';
			    				echo '<td>'.$row->statusAkhir.'</td>';
			    				echo '<td style = "text-align:right;">'.$lamaproses.' Hari</td>';
			    				echo '<td align="center">[<a href="'.base_url('show_detil/'.base64_encode($this->encrypt->encode($row->IDPerkara))).'">detil</a>]</td>';
		    				echo "</tr>";
		    				$con++;
		    			}
			    	}else{
		    			echo "<tr><td colspan='8' align='center'>Data Tidak diTemukan</td></tr>";
		    		}
				}else{
		    		echo "<tr><td colspan='8' align='center'>Data Tidak diTemukan</td></tr>";
		    	}
			?>
		</tbody>
	</table>
</div>
<?php } ?>
<?php
if($keyword!==''){
	$keyword=$keyword;
} else {
	$keyword="0";
}
?>
<div id="pages_bottom" style="width:100%;padding-left:5px;padding-top:5px;">
    <div id="selector_bottom"></div>
</div>
<script type="text/javascript">
	function sorting(col){
		window.open('<?php echo base_url();?>list_perkara/sort/'+col+'/<?php echo $enc; ?>/<?php echo $keyword; ?>','_self')
	}
	<?php $enc = (!empty($enc)) ? "/".$enc : $enc;?>
	function searchDetilShow(){
		popup_form('<?php echo base_url();?>search<?php echo $enc; ?>');
	}
	$('#cetak_perkara_list').click(function(){
		window.open('<?php echo base_url(); echo "perkara_list_cetak/cetak/1".$enc."/".$keyword; ?>','_self')
	});
	function popup_informasi(){	
		popup_form('<?php echo base_url();?>detil_perkara/informasi');
	}
</script>
