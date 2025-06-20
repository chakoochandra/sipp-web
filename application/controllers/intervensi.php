<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intervensi extends CI_Controller {
	function index(){
		$enc = $this->nativesession->get_flash_session('enc');
		if(empty($enc)){
			show_404();
		}
		$idperkara = $this->encrypt->decode(base64_decode($enc));
		if(!is_numeric($idperkara)){
			echo "ERROR PERKARA NOT FOUND!";
		}
		$this->load->model('perkara/intervensi_m','intervensi');
		$data['enc'] = $enc;
		$data['idperkara'] = $idperkara;
		$data['data_intervensi'] = $this->intervensi->get_info_intervensi($idperkara);
		$this->load->vars($data);
		$this->load->view('perkara_tab/intervensi');
	}
}