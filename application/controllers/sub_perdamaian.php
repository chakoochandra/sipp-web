<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sub_perdamaian extends CI_Controller {
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
		$this->load->model('perkara/putusan_m','perkara_sub');

		//perdamaian
		//$data['hakim_pemeriksa'] = $this->perkara_sub->get_info_hakim_pemeriksa($idperkara);
		//$data['pp_pemeriksa'] = $this->perkara_sub->get_info_pp_pemeriksa($idperkara);

		//$this->load->vars($data);
		$this->load->view('perkara_tab/pasca_pailit/sub_perdamaian');
	}
}