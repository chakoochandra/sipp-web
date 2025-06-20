<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/date-css.css" />
<?php
$pihak1 = ($idalurperkara>=111)? 'Jaksa':'Penggugat';
$pihak2 = ($idalurperkara>=111)? 'Terdakwa':'Tergugat';
$option_tgl = array('1' => 'Sama Dengan', 
					'2' => 'Lebih Besar Dari', 
					'3' => 'Lebih Besar Sama Dengan', 
					'4' => 'Kurang Dari',
					'5' => 'Kurang Dari Sama Dengan',
					'6' => 'Antara'
					);
$option_text = array('1' => 'Sama Dengan', 
					'8' => 'Berisi'
					);
$col1width="185px";
$col2width="245px";
?>
<div class="centering" style="width:640px;margin-top: 1%;">
	<div id='search_detil' style="border: 1px solid #ffffff;">
	<?php echo $this->nativesession->get_flash_session('where'); ?>
    <div class="detil" style="padding: 2px;background-color: white;">
		<form method="post" id="frm_search_detil" action="<?php echo base_url('list_perkara/search_detail'); ?>">
		<table id="tableDetilPerkara" style="background: #dedbdb;">
			<col width="275px">
			<col width="100px">
			<col width="">
			<tbody>
				<tr>
					<td colspan="3" style='text-align:center;background:#A3DBA8;color:#fff;border:2px solid #fff;margin-bottom:10px;font-size: 20px;'>PENCARIAN DETIL <?php print_r($alur_perkara); ?></td>
				</tr>
				<?php
				if(empty($idalurperkara) OR $regular){
					$modelClass =& get_instance();
					$this->session->set_flashdata('regular', TRUE);
				?>
				<tr>
					<td><font color="white">Jenis Perkara</font></td>
					<td style="padding:0px;padding-left:11px;">Sama Dengan</td>
					<td style="padding:0px;padding-left:5px;">
						<span class="custom-dropdown custom-dropdown--emerald" style='width:<?php echo $col1width;?>'>
							<select style='width:100%' name="id_alur_perkara" id="id_alur_perkara" onchange="" class="custom-dropdown__select custom-dropdown__select--white">
								<option value="-1"></option>
								<?php
								if(!empty($alur_perkara_list)){
									if($alur_perkara_list->num_rows>0){
										foreach ($alur_perkara_list->result() as $row) {
											$selected = '';
											if($row->id==$idalurperkara){
												$selected = ' selected ';
											}
											echo '<option value="'.$row->id.'" '.$selected.'>'.$row->nama.'</option>';
										}
									}
								}
								?>
							</select>
						</span>
					</td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td><font color="white">Tanggal Pendaftaran</font></td>
					<td style="padding:0px;padding-left:5px;">
						<span class="custom-dropdown custom-dropdown--emerald" style="width:<?php echo $col1width;?>">
							<?php
								$js="id='tgl_pendaftaran_select' class='custom-dropdown__select custom-dropdown__select--white' style='width:100%' ";
								echo form_dropdown('tgl_pendaftaran_select', $option_tgl, '1', $js);
							?>
						</span>
					</td>
					<td style="padding:0px;padding-left:5px;">
					<input id="from_tgl_pendaftaran" name="from_tgl_pendaftaran" class="datepicker" maxlength="10" placeholder="tgl/bln/tahun" style="color: #000;background: #fff;"><input id= "a_tgl_pendaftaran" class='antara tgl_pendaftaran_select' value="s/d" disabled="true" style="width:30px"><input id="to_tgl_pendaftaran" name="to_tgl_pendaftaran" class="datepicker a_date tgl_pendaftaran_select" maxlength="10" placeholder="tgl/bln/tahun" style="color: #000;background: #fff;">
					</td>
				</tr>
				<?php if($idalurperkara!=114){ ?>
				<tr>
					<td><font color="white">Klasifikasi Perkara</font></td>
					<td style="padding:0px;padding-left:11px;">Sama Dengan</td>
					<td style="padding:0px;padding-left:5px;">
						<span class="custom-dropdown custom-dropdown--emerald" style="width:<?php echo $col2width;?>">
							<select style='width:100%' name="klasifikasi_perkara" id="klasifikasi_perkara" onchange="" class="custom-dropdown__select custom-dropdown__select--white">
								<option value="-1"></option>
								<?php
								if($klasifikasi_perkara!=''){
									if($klasifikasi_perkara->num_rows>0){
										foreach ($klasifikasi_perkara->result() as $row) {
											$style = '';
											if(!empty($idalurperkara))
												if($row->idalurperkara!=$idalurperkara)
													$style='display: none;';
											echo '<option class="klasifikasiperkara" id="no_'.$row->idalurperkara.'" style = "'.$style.'" value="'.$row->id.'">'.$row->nama.'</option>';
										}
									}
								}
								?>
							</select>
						</span>
					</td>
				</tr>
				<?php } ?>
				<tr>
					<td><font color="white">Nomor Perkara</font></td>
					<td style="padding:0px;padding-left:5px;">
						<span class="custom-dropdown custom-dropdown--emerald" style="width:<?php echo $col1width;?>">
							<?php
								$js="id='no_perkara_select' class='custom-dropdown__select custom-dropdown__select--white' style='width:100%;' ";
								echo form_dropdown('no_perkara_select', $option_text, '8', $js);
							?>
						</span>
					</td>
					<td style="padding:0px;padding-left:5px;"><input id='no_perkara' name='no_perkara' class="standard-input">
					</td>
				</tr>
				<?php 
				if(empty($idalurperkara) OR $idalurperkara==-1){
				?>
				<tr>
					<td><font color="white">Para Pihak</font></td>
					<td style="padding:0px;padding-left:11px;">Berisi</td>
					<td style="padding:0px;padding-left:5px;"><input id='pihak_para' name='para_pihak' class="standard-input"></td>
				</tr>
				<?php
				} 
				if(!empty($idalurperkara)){
					if($idalurperkara!=114){
				?>
				<tr>
					<td><font color="white"><?php echo $pihak1;?></font></td>
					<td style="padding:0px;padding-left:11px;">Berisi</td>
					<td style="padding:0px;padding-left:5px;"><input id='pihak1' name='pihak1' class="standard-input"></td>
				</tr>
				<?php } ?>
				<tr>
					<td><font color="white"><?php echo $pihak2;?></font></td>
					<td style="padding:0px;padding-left:11px;">Berisi</td>
					<td style="padding:0px;padding-left:5px;"><input id='pihak2' name='pihak2' class="standard-input"></td>
				</tr>
				<?php
				} 
				if($idalurperkara<111 AND !empty($idalurperkara)){
				?>
				<tr>
					<td><font color="white">Turut Tergugat</font></td>
					<td style="padding:0px;padding-left:11px;">Berisi</td>
					<td style="padding:0px;padding-left:5px;"><input id='pihak3' name='pihak3' class="standard-input"></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td><font color="white">Hakim</font></td>
					<td style="padding:0px;padding-left:11px;">Sama Dengan</td>
					<td style="padding:0px;padding-left:5px;">
						<span class="custom-dropdown custom-dropdown--emerald" style='width:<?php echo $col2width;?>'>
							<select style='width:100%' name="hakim" id="hakim" onchange="" class="custom-dropdown__select custom-dropdown__select--white">
								<option value="-1"></option>
								<?php
								if(!empty($hakim)){
									if($hakim->num_rows>0){
										foreach ($hakim->result() as $row) {
											echo '<option value="'.$row->nama.'">'.$row->nama.'</option>';
										}
									}
								}
								?>
							</select>
						</span>
					</td>
				</tr>
				<tr>
					<td><font color="white">Panitera Pengganti</font></td>
					<td style="padding:0px;padding-left:11px;">Sama Dengan</td>
					<td style="padding:0px;padding-left:5px;">
						<span class="custom-dropdown custom-dropdown--emerald" style='width:<?php echo $col2width;?>'>
							<select style='width:100%' name="panitera" id="panitera" onchange="" class="custom-dropdown__select custom-dropdown__select--white">
								<option value="-1"></option>
								<?php
								if(!empty($panitera)){
									if($panitera->num_rows>0){
										foreach ($panitera->result() as $row) {
											echo '<option value="'.$row->IDPP.'">'.$row->nama.'</option>';
										}
									}
								}
								?>
							</select>
						</span>
					</td>
				</tr>
				<?php 
				if($idalurperkara<111 AND !empty($idalurperkara)){
				?>
				<tr>
					<td><font color="white">Mediator</font></td>
					<td style="padding:0px;padding-left:11px;">Sama Dengan</td>
					<td style="padding:0px;padding-left:5px;">
						<span class="custom-dropdown custom-dropdown--emerald" style='width:<?php echo $col2width;?>'>
							<select style='width:100%' name="mediator" id="mediator" onchange="" class="custom-dropdown__select custom-dropdown__select--white">
								<option value="-1"></option>
								<?php
								if(!empty($mediator)){
									if($mediator->num_rows>0){
										foreach ($mediator->result() as $row) {
											echo '<option value="'.$row->IDMediator.'">'.$row->namaGelar.'</option>';
										}
									}
								}
								?>
							</select>
						</span>
					</td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td><font color="white">Tanggal Putusan</font></td>
					<td style="padding:0px;padding-left:5px;">
						<span class="custom-dropdown custom-dropdown--emerald" style="width:<?php echo $col1width;?>">
							<?php
								$js="id='putusan_select' class='custom-dropdown__select custom-dropdown__select--white' style='width:100%' ";
								echo form_dropdown('putusan_select', $option_tgl, '1', $js);
							?>
						</span>
					</td>
					<td style="padding:0px;padding-left:5px;"><input id="from_tgl_putusan" name="from_tgl_putusan" class="datepicker" maxlength="10" placeholder="tgl/bln/tahun" style="color: #000;background: #fff;"><input id= "a_tgl_putusan" class='antara putusan_select' value="s/d" disabled="true" style="width:30px"><input style="padding:0px;padding-left:5px;" id="to_tgl_putusan" name="to_tgl_putusan" class="datepicker a_date putusan_select" maxlength="10" placeholder="tgl/bln/tahun" style="color: #000;background: #fff;"></td>
				</tr>
				<tr>
					<td><font color="white">Tanggal Minutasi</font></td>
					<td style="padding:0px;padding-left:5px;">
						<span class="custom-dropdown custom-dropdown--emerald" style="width:<?php echo $col1width;?>">
							<?php
								$js="id='minutasi_select' class='custom-dropdown__select custom-dropdown__select--white' style='width:100%' ";
								echo form_dropdown('minutasi_select', $option_tgl, '1', $js);
							?>
						</span>
					</td>
					<td style="padding:0px;padding-left:5px;"><input id="from_tgl_minutasi" name="from_tgl_minutasi" class="datepicker" maxlength="10" placeholder="tgl/bln/tahun" style="color: #000;background: #fff;"><input id= "a_tgl_minutasi" class='antara minutasi_select' value="s/d" disabled="true" style="width:30px"><input style="padding:0px;padding-left:5px;" id="to_tgl_minutasi" name="to_tgl_minutasi" class="datepicker a_date minutasi_select" maxlength="10" placeholder="tgl/bln/tahun" style="color: #000;background: #fff;"></td>
				</tr>
				<tr>
					<td><font color="white">Sidang Keliling</font></td>
					<td style="padding:0px;padding-left:11px;">Berisi</td>
					<td style="padding:0px;padding-left:5px;">
						<span class="custom-dropdown custom-dropdown--emerald" style='width:70px'>
							<select name="sidang_keliling" id="sidang_keliling" style='width:70px' onchange="" class="custom-dropdown__select custom-dropdown__select--white">
								<option value="-1"></option>
								<option value="Y">Ya</option>
								<option value="T">Tidak</option>
							</select>
						</span>
					</td>
				</tr>
				<?php if($idalurperkara!=114){ ?>
				<tr>
					<td><font color="white">Proses Perkara</font></td>
					<td style="padding:0px;padding-left:5px;">
						<span class="custom-dropdown custom-dropdown--emerald" style="width:<?php echo $col1width;?>">
							<select name="proses_select" id="proses_select" class="custom-dropdown__select custom-dropdown__select--white" style="width:100%">
								<option value="1">Sama Dengan</option>
								<option value="2">Lebih Besar Dari</option>
								<option value="3">Lebih Besar Sama Dengan</option>
								<option value="4">Kurang Dari</option>
								<option value="5">Kurang Dari Sama Dengan</option>
								<option value="7">Tidak Sama Dengan</option>
								<option value="8">Memiliki</option>
							</select>
						</span>
					</td>
					<td style="padding:0px;padding-left:5px;">
						<span class="custom-dropdown custom-dropdown--emerald" style="width:<?php echo $col2width;?>">
							<select style="width:100%" name="id_proses" id="id_proses" class="custom-dropdown__select custom-dropdown__select--white">
								<option value="-1"></option>
								<?php
								if($proses_perkara!=''){
									if($proses_perkara->num_rows>0){
										$already = array();
										foreach ($proses_perkara->result() as $row) {
											echo '<option class="prosesperkara" id="no_'.$row->idalurperkara.'" value="'.$row->ID.'">'.$row->nama.'</option>';
										}
									}
								}
								?>
							</select>
						</span>
					</td>
				</tr>
				<?php } ?>
				<tr><td colspan="3" style='text-align:center;background:#5fb85c;color:#fff;border:2px solid #fff;margin-bottom:10px;font-size: 20px;'></td></tr>
				<input type="hidden" value="<?php echo $enc;?>" name ="enc" id ="enc" class='btn'>
				<tr>
					<td colspan="3" style="background:white;" align="center">
						<input type="button" id='close_form_search_detail' value="Kembali" class="btn">
						<input type="submit" value="Cari" class="btn"></input>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
	</div>
	</div>
</div>

<script type="text/javascript">
	$('#close_form_search_detail').closingFormWin();

    $( function() {
        $('#from_tgl_pendaftaran').datepicker({
            inline: true,
            showOtherMonths: true,
            dateFormat: 'dd/mm/yy',
            dayNamesMin: ['Ming', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
            });
        $('#to_tgl_pendaftaran').datepicker({
            inline: true,
            showOtherMonths: true,
            dateFormat: 'dd/mm/yy',
            dayNamesMin: ['Ming', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
            });
    });
    $( function() {
        $('#from_tgl_pen_hakim').datepicker({
            inline: true,
            showOtherMonths: true,
            dateFormat: 'dd/mm/yy',
            dayNamesMin: ['Ming', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
            });
        $('#to_tgl_pen_hakim').datepicker({
            inline: true,
            showOtherMonths: true,
            dateFormat: 'dd/mm/yy',
            dayNamesMin: ['Ming', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
            });
    });
    $( function() {
        $('#from_tgl_pen_sidang').datepicker({
            inline: true,
            showOtherMonths: true,
            dateFormat: 'dd/mm/yy',
            dayNamesMin: ['Ming', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
            });
        $('#to_tgl_pen_sidang').datepicker({
            inline: true,
            showOtherMonths: true,
            dateFormat: 'dd/mm/yy',
            dayNamesMin: ['Ming', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
            });
    });
    $( function() {
        $('#from_tgl_sidang1').datepicker({
            inline: true,
            showOtherMonths: true,
            dateFormat: 'dd/mm/yy',
            dayNamesMin: ['Ming', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
            });
        $('#to_tgl_sidang1').datepicker({
            inline: true,
            showOtherMonths: true,
            dateFormat: 'dd/mm/yy',
            dayNamesMin: ['Ming', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
            });
    });
    $( function() {
        $('#from_tgl_putusan').datepicker({
            inline: true,
            showOtherMonths: true,
            dateFormat: 'dd/mm/yy',
            dayNamesMin: ['Ming', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
            });
        $('#to_tgl_putusan').datepicker({
            inline: true,
            showOtherMonths: true,
            dateFormat: 'dd/mm/yy',
            dayNamesMin: ['Ming', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
            });
    });
    $( function() {
        $('#from_tgl_minutasi').datepicker({
            inline: true,
            showOtherMonths: true,
            dateFormat: 'dd/mm/yy',
            dayNamesMin: ['Ming', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
            });
        $('#to_tgl_minutasi').datepicker({
            inline: true,
            showOtherMonths: true,
            dateFormat: 'dd/mm/yy',
            dayNamesMin: ['Ming', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
            });
    });
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

$('.antara').hide()
$('.a_date').hide()

$('.custom-dropdown__select').change(function(e) {
    var val = $('#'+e.target.id).val();
    if(val==6){
    	$('.'+e.target.id).show();
    }else{
    	$('.'+e.target.id).hide();
    }

    if(e.target.id=='id_tahapan'){
    	var tahapan_id = $('#id_tahapan').val()
    	$('.pros').show();
    	$('.pros').not('#'+tahapan_id).hide();
    }
   
    if(e.target.id=='id_alur_perkara'){
    	var val = $('#id_alur_perkara').val();
    	$('.klasifikasiperkara').show();
    	$('.prosesperkara').show();
    	$('.klasifikasiperkara').not('#no_'+val).hide();
    	$('.prosesperkara').not('#no_'+val).hide();
    }
});

function clearAll(){
	$('#search_detil :input').not('.btn').val('');
}

$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
	
</script>