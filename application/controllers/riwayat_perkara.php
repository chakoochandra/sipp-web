<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Riwayat_perkara extends CI_Controller {
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
		$this->load->model('perkara/riwayat_perkara_m','riwayat');
		$data['enc'] = $enc;
		$data['data_riwayat'] = $this->riwayat->get_info_riwayat_perkara($idperkara);
		$this->load->vars($data);
		$this->load->view('perkara_tab/riwayat_perkara');
	}
}