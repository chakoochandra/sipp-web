<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verzet extends CI_Controller {
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
		$this->load->model('perkara/verzet_m','verzet');
		$data['enc'] = $enc;
		$data['idperkara'] = $idperkara;
		$data['data_verzet'] = $this->verzet->get_info_verzet($idperkara);
		$this->load->vars($data);
		$this->load->view('perkara_tab/verzet');
	}
}