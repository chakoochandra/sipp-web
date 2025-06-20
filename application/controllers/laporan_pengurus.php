<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_pengurus extends CI_Controller {
	function index(){
		$enc = $this->nativesession->get_flash_session('enc');
		if(empty($enc)){
			show_404();
		}
		$idperkara = $this->nativesession->get_flash_session('perkara_id');
		$idperkara = $this->encrypt->decode(base64_decode($enc));
		if(!is_numeric($idperkara)){
			echo "ERROR PERKARA NOT FOUND!";
		}		
		$data['enc'] = $enc;
		$this->load->model('perkara/putusan_m','perkara');
		$data['laporanpengurus'] = $this->perkara->get_info_laporan_pengurus($idperkara);
		$this->load->vars($data);
		$this->load->view('perkara_tab/laporan_pengurus');
	}
}