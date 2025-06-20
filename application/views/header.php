<?php
date_default_timezone_set("Asia/Jakarta"); 
if($this->session->userdata('namapn')==''){
	$modelClass =& get_instance();
	$modelClass->load->model('default/Validated','system_info');
	$data = $modelClass->system_info->getSystemInfo();
	$dataSink = $modelClass->system_info->getSinkronisasi();
	if(!empty($dataSink->row())){
		$tanggalSink = explode(" ", $dataSink->row()->time_stamp);
		$tanggal=$this->tanggalhelper->convertDayDate($tanggalSink[0]);
        $waktu = $tanggalSink[1];
		
        $tanggalSinkIndo = $tanggal." ".$waktu;
		$this->session->set_userdata('sink',$tanggalSinkIndo);
	} else {
		$this->session->set_userdata('sink','-');
	}
	if(!empty($data)){
		if($data->num_rows>0){
			foreach ($data->result() as $row) {
				if($row->id==62){
					$this->session->set_userdata('namapn',$row->value);
				}
				if($row->id==63){
					$this->session->set_userdata('alamatpn',$row->value);
				}
				if($row->id==75){
					$this->session->set_userdata('zonaWaktu',$row->value);
				}
				if($row->id==80){
					$this->session->set_userdata('app_version',$row->value);
				}
				if($row->id == 83){
					if(!empty($row->value)){
						$this->session->set_userdata('jenispengadilan',$row->value);
					}else{
						$this->session->set_userdata('jenispengadilan',1);
					}
				}
			}
		}else{
			$namapn = 'Database Belum Disetting';
		}
	}else{
		$namapn = 'Database Belum Disetting';
	}
}

if($this->nativesession->isStatusPihak()!=TRUE){
	$modelClass =& get_instance();
	$modelClass->load->model('default/Validated','system_info');
	$modelClass->system_info->setup();
}
?>
<html>
<head>
	<link rel="shortcut icon" href="<?php echo base_url();?>resources/img/favicon.ico" type="image/png">
	<title>SIPP</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/table.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/date-css.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/simplePagination.css">
	<script type="text/javascript" src="<?php echo base_url();?>resources/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>resources/js/jquery-sipp.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>resources/js/jquery-ui-1.8.18.custom.min.js"></script>
	<script src="<?php echo base_url();?>resources/js/Modernizr.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>resources/js/jquery.idTabs.min.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/bootstrap.css">
</head>
<div id="loading" class="popup_loading">
	<div style="margin: 0px auto;margin-left: 40%;margin-top: 15%;width:0;">
		<img src="<?php echo base_url();?>resources/img/loading_ma.gif">
	</div>
</div>
<body>
	<script type="text/javascript">
		$("body").css({overflow: 'hidden'});
		$('#loading').fadeIn();
	</script>
	<div id="wrapper">
		<div id="atas">		
			<div class="logo">
				<a href="<?php echo base_url();?>">
				<img src="<?php echo base_url();?>resources/img/logo.png"></a>
			</div>
			<div class="front">
				<font><b>Sistem Informasi Penelusuran Perkara</b><span><br><strong><?php echo $this->session->userdata('namapn');?></strong></br></span></font>
			</div>
			<div class="h_right">
			</div>
			<div class="version_shading">
				<label><?php echo str_replace('.','','5.2.0');?></label>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<?php
	$this->load->view('menu/menu');
	?>
	<div id="content">