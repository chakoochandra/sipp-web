<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/simplePagination.css">
<hr class="thick-line" style="clear:both;">
<div id="left">
	<form action="<?php echo base_url($page_url.'/search');?>" method="post" accept-charset="utf-8">
		<input name="search_keyword" value="<?php echo $keyword_non_enc;?>" id="search-box" size="50" placeholder="  Ketik kata kunci  " type="text">
		<input name="enc" value="<?php echo $enc;?>" type="hidden">
		<span></span>
		<input name="" value="Search" id="search-btn1" type="submit">
	</form>
</div>
<div id="left">

</div>
<div id="pages">
    <div id="selector"></div>
</div>

<div class="cssTable">
	<table id="tablePerkaraAll">
		<col  width="3%" />
        <col  width="20%" />
        <col  width="17%" />
        <col  width="10%" />
        <col  width="13%" />
        <col  width="17%" />
        <col  width="5%" />
		<tbody>
			<tr>
				<td>No</td>
				<?php if ($idalurperkara==1) {
					echo '<td onclick="sorting(1)">Pengadilan Negeri Asal</td>';
				}else{
					echo '<td onclick="sorting(1)">Pengadilan Negeri Tujuan</td>';
				}
				?>
					<td onclick="sorting(2)">Nomor Perkara</td>
					<td onclick="sorting(3)">Tanggal Surat Pengantar</td>
					<td onclick="sorting(4)">Nomor Surat Pengantar</td>
					<td onclick="sorting(5)">Jenis Delegasi</td>
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
		    				echo "<tr>";
			    				echo '<td>'.$con.'</td>';
			    				if ($idalurperkara==1) {
			    					echo '<td>'.$row->pnAsalText.'</td>';
			    				}else{
			    					echo '<td>'.$row->pnTujuanText.'</td>';
			    				}
			    				echo '<td>'.$row->noPerkara.'</td>';
			    				echo '<td align="center">'.$this->tanggalhelper->convertDayDate($row->tglSurat).'</td>';
			    				echo '<td>'.$row->noSurat.'</td>';
			    				echo '<td>'.$row->jenisDelegasiText.'</td>';
			    				echo '<td align="center">[<a href="#" onClick="detilDelegasi(\''.base64_encode($this->encrypt->encode($idalurperkara)).'\' ,  \''.base64_encode($this->encrypt->encode($row->ID)).'\', \''.base64_encode($this->encrypt->encode($row->idPNAsal)).'\', \''.base64_encode($this->encrypt->encode($row->IDPNTujuan)).'\')" >Detil</a>]</td>';
		    					echo "</tr>";
		    				$con++;
		    			}
			    	}else{
		    			echo "<tr><td colspan='7' align='center'>Data Tidak diTemukan</td></tr>";
		    		}
				}else{
		    		echo "<tr><td colspan='7' align='center'>Data Tidak diTemukan</td></tr>";
		    	}
			?>
		</tbody>
	</table>
</div>
<div id="pages_bottom" style="width:100%;padding-left:5px;padding-top:5px;">
    <div id="selector_bottom"></div>
</div>
<script type="text/javascript">
	function detilDelegasi(IDalur,IDperkara,IDpnasal,IDPNTujuan){	
		popup_form('<?php echo base_url();?>detil_delegasi/'+IDalur+'/'+IDperkara+'/'+'/'+IDpnasal+'/'+IDPNTujuan)
	}
</script>