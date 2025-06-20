<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dismissal extends CI_Controller {
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
		$this->load->model('perkara/dismissal_m','dismissal');
		$data['enc'] = $enc;
		$data['idperkara'] = $idperkara;
		$data['idalurperkara'] = $this->tanggalhelper->getIDAlurPerkara($idperkara);
		if($data['idalurperkara']==8)
			$data['data_dismissal'] = $this->dismissal->get_info_dismissal($idperkara);
		elseif ($data['idalurperkara']==9) {
			$data['data_dismissal'] = $this->dismissal->get_info_pen_dismissal($idperkara);
			$data['data_panggilan'] = $this->dismissal->get_info_panggilan($idperkara);;
		}
		$data['data_pemberitahuan'] = $this->dismissal->get_info_pemberitahuan_putusan($idperkara);
		$this->load->vars($data);
		$this->load->view('perkara_tab/dismissal');
	}
}