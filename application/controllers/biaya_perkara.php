<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Biaya_perkara extends CI_Controller {
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
		$this->load->model('perkara/biaya_perkara_m','biaya_perkara');
		$data['enc'] = $enc;
		$data['data_biaya'] = $this->biaya_perkara->get_info_biaya_perkara($idperkara);
		$this->load->vars($data);
		$this->load->view('perkara_tab/biaya_perkara');
	}
}