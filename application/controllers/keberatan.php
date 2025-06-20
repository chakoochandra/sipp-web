<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keberatan extends CI_Controller {
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
		$this->load->model('perkara/keberatan_m','keberatan');
		$data['enc'] = $enc;
		$data['data_keberatan'] = $this->keberatan->get_info_keberatan($idperkara);
		$this->load->vars($data);
		$this->load->view('perkara_tab/keberatan');
	}
}