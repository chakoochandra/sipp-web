<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class grasi extends CI_Controller {
	
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

		$this->load->model('perkara/grasi_m','grasi');
		$data['enc'] = $enc;
		
		$data['infoperkarapn'] = $this->grasi->get_info_perkara_pn($idperkara);
		$data['infoperkarabanding'] = $this->grasi->get_info_perkara_banding($idperkara);
		$data['infoperkaragrasi'] = $this->grasi->get_info_grasi($idperkara);

		$this->load->vars($data);
		$this->load->view('perkara_tab/detil_grasi');
	}
}