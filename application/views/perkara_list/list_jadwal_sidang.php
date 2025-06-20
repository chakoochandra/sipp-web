<?php
$this->nativesession->set_flash_session('tanggal_cari',$tgl_cari);
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/simplePagination.css">
<hr class="thick-line" style="clear:both;">
<div id="left" style="width:80%;text-align:left;padding:0px;padding-left:5px;min-height:50px">
	<tr style="padding:0px;padding-left:5px;"
		<td>Cari tanggal sidang :</td>
		<td>
		<input style="padding:0px;padding-left:5px;min-height:30px" id="tgl_sidang" name="tgl_sidang" value="" class="datepicker" maxlength="10" placeholder="tgl/bln/tahun">
		<input type="hidden" id="tgl_sidang_value" name="tgl_sidang_value" value="">
		</td>
		<td>
		<input id="cari_sidang" onClick="cari()" type="submit" value="cari" class="btn"></input>
		</td>
		<td>
		<input id="sidang_hari_ini" onClick="cariHariIni('<?php echo date("d/m/Y");?>')" type="submit" value="Sidang Hari Ini" class="btn"></input>
		</td>
	</tr>
</div>
<div id="pages">
    <div id="selector"></div>
</div>
<div class="cssTable">
	<table id="tablePerkaraAll">
		<col  width="3%" />
        <col  width="10%" />
        <col  width="20%" />
        <col  width="8%" />
        <col  width="10%" />
        <col  width="20%" />
        <col  width="4%" />
		<tbody>
			<tr>
				<td>No</td>
				<td onclick="sorting(2)">Tanggal Sidang</td>
				<td onclick="sorting(1)">Nomor Perkara</td>
				<td onclick="sorting(3)">Sidang Keliling</td>
				<td onclick="sorting(4)">Ruangan</td>
				<td onclick="sorting(5)">Agenda</td>
				<td onclick="sorting(8)">Detil</td>
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
			    				echo '<td align="center">'.$this->tanggalhelper->convertDayDate($row->tglSidang).'</td>';
			    				echo '<td>'.$row->noPerkara.'</td>';
			    				if ($row->sidangKeliling=="Y") {
			    					echo '<td>YA</td>';
			    				}else{
			    					echo '<td>TIDAK</td>';
			    				}
			    				echo '<td>'.$row->ruangan.'</td>';
			    				echo '<td>'.$row->agenda.'</td>';
			    				echo '<td align="center">[<a id="detilJadwalSidang" href="#" onClick="detilSidang(\''.base64_encode($this->encrypt->encode($row->ID)).'\')" >Detil</a>]</td>';
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
$('.datepicker').keyup(function(e){
	if( (e.keyCode<8 || e.keyCode>57)){
		return;
	}

    if(e.keyCode != '8'){
    	if(e.target.value.length == 1){
    		if(e.target.value>3){
    			alert('Input Tidak Benar Format, Tanggal tidak boleh lebih dari 30')
    			e.target.value = '';
    		}
    	}

    	if(e.target.value.length == 4 && e.keyCode!='13'){
    		if(e.keyCode!=49 && e.keyCode!=48){
    			alert('Input Tidak Benar Format, Bulan Tidak Boleh dari 12')
    			var val = e.target.value;
    			val = val.substring(0, val.length - 1);
    			e.target.value = val;
    		}
    	}

    	if(e.target.value.length == 5){
    		var val = e.target.value;
    		var bln = val.substr(val.length -2);
    		if(bln>12){
    			alert('Input Tidak Benar Format, Bulan Tidak Boleh dari 12')
    			val = val.substring(0, val.length - 1);
    			e.target.value = val;
    		}
    	}
    	if(e.target.value.length == 7 && e.keyCode!='13'){
    		if( e.keyCode>50 && e.keyCode!=48){
    			alert('Anda Yakin dengan Tahun yang anda masukan?')
    			var val = e.target.value;
    			val = val.substring(0, val.length - 1);
    			e.target.value = val;
    		}
    	}
    	if(e.target.value.length == 10){
			if(isDateValid(e.target.value)==false){
				var val = e.target.value;
    			val = val.substring(0, val.length - 1);
    			e.target.value = val;
			}
		}
        if (e.target.value.length == 2) e.target.value = e.target.value + "/";
        if (e.target.value.length == 5) e.target.value = e.target.value + "/";
    }
})

$( document ).ready(function() {
    $( function() {
        $('#tgl_sidang').datepicker({
            inline: true,
            showOtherMonths: true,
            dateFormat: 'dd/mm/yy',
            dayNamesMin: ['Ming', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
            beforeShowDay: $.datepicker.noWeekends,
        });
    });
    
});

$("#tgl_sidang").change(function() {
	var tgl=$("#tgl_sidang").val();
	$('#tgl_sidang_value').val(tgl);
	// cari(tgl); 
});

function cari(){
		var key=$('#tgl_sidang_value').val();
		// console.log(key);
		window.open('<?php echo base_url();?>list_jadwal_sidang/search/'+'1'+'/'+key,'_self')
}

function detilSidang(IDperkara){	
	popup_form('<?php echo base_url();?>detil_jadwal_sidang/'+IDperkara)
}

function cariHariIni(tgl){
		var key=tgl;
		window.open('<?php echo base_url();?>list_jadwal_sidang/search/'+'1'+'/'+key,'_self')
}

</script>
