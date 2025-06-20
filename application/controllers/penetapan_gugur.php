<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penetapan_gugur extends CI_Controller {
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
		$this->load->model('perkara/penetapan_gugur_m','gugur');
		$data['enc'] = $enc;
		$data['idperkara'] = $idperkara;
		$data['data_pen_gugur'] = $this->gugur->get_info_gugur($idperkara);
		$data['data_pemberitahuan'] = $this->gugur->get_info_pemberitahuan_putusan($idperkara);
		$this->load->vars($data);
		$this->load->view('perkara_tab/penetapan_gugur');
	}
}