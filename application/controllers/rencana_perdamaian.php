<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rencana_perdamaian extends CI_Controller {
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
		$this->load->model('perkara/putusan_m','perkara');

		//rencana perdamaian
		$data['rencana_perdamaian'] = $this->perkara->get_info_rencana_perdamaian($idperkara);

		//hasil pemungutan suara perdamaian
		$data['pemungutansuaraperdamaian'] = $this->perkara->get_info_pemungutan_suara($idperkara);

		//pembetulan ba
		$data['pembetulanba'] = $this->perkara->get_info_pembetulan_ba($idperkara);

		$this->load->vars($data);
		$this->load->view('perkara_tab/rencana_perdamaian');
	}
}