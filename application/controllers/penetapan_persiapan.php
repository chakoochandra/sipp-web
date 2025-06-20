<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penetapan_persiapan extends CI_Controller {
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
		$this->load->model('perkara/penetapan_persiapan_m','persiapan');
		$data['enc'] = $enc;
		$data['data_penetapan'] = $this->persiapan->get_info_penetapan_persiapan($idperkara);
		$data['data_jadwal_musyawarah'] = $this->persiapan->get_info_jadwal_musyawarah($idperkara);
		$this->load->vars($data);
		$this->load->view('perkara_tab/penetapan_persiapan');
	}
}