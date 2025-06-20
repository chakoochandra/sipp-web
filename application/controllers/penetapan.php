<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penetapan extends CI_Controller {
	function index(){
		$enc = $this->nativesession->get_flash_session('enc');
		if(empty($enc)){
			show_404();
		}
		$idperkara = $this->nativesession->get_flash_session('perkara_id');
		$idperkara = $this->encrypt->decode(base64_decode($enc));
		if(!is_numeric($idperkara)){
			echo "ERROR PERKARA NOT FOUND!";
			return;
		}
		$this->load->model('perkara/penetapan_m','penetapan');
		$data['enc'] = $enc;
		$data['idperkara'] = $idperkara;
		$data['jenis_perkara_id'] = $this->penetapan->get_jenis_perkara_id($idperkara);
		$data['data_penetapan_hakim'] = $this->penetapan->get_info_penetapan_hakim($idperkara);
		$data['data_penetapan_pp'] = $this->penetapan->get_info_penetapan_pp($idperkara);
		$data['data_penetapan_jurusita'] = $this->penetapan->get_info_penetapan_jurusita($idperkara);
		$data['data_penetapan_sidang'] = $this->penetapan->get_info_penetapan_sidang($idperkara);
		$data['idalurperkara'] = $this->tanggalhelper->getIDAlurPerkara($idperkara);
		// print_r($data);die;
		$this->load->vars($data);
		$this->load->view('perkara_tab/penetapan');
	}
}