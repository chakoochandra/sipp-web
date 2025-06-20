<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sub_kurator extends CI_Controller {
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
		$data['enc'] = $enc;
		$this->load->model('perkara/putusan_pasca_m','perkara_sub');

		//penunjukan kurator
		$data['kurator'] = $this->perkara_sub->get_info_kurator($idperkara);

		$this->load->vars($data);
		$this->load->view('perkara_tab/pasca_pailit/sub_kurator');
	}
}