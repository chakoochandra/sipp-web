<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kewenangan_kppu extends CI_Controller {
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
		$this->load->model('perkara/info_perkara','perkara');
		$data['enc'] = $enc;
		$data['data_we_kppu'] = $this->perkara->getInfowekppu($idperkara);
        //echo"<pre>";
		//print_r($data['data_we_kppu']->result());exit;
		$this->load->vars($data);
		$this->load->view('perkara_tab/kewenangan_kppu');
	}
}