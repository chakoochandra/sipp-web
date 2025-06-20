<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Diversi extends CI_Controller {
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
		$this->load->model('perkara/diversi_m','diversi');
		$data['enc'] = $enc;
		$data['data_diversi'] = $this->diversi->get_info_diversi($idperkara);
		$this->load->model('perkara/info_perkara','perkara');
		$data['para_pihak'] = $this->perkara->getInfoPihak($idperkara);
		$this->load->vars($data);
		$this->load->view('perkara_tab/diversi');
	}
}