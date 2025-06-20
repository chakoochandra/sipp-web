<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perbaikan_gugatan extends CI_Controller {
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
		$this->load->model('perkara/perkara_m','model');
		$data['enc'] = $enc;
		$data['data_perbaikan_gugatan'] = $this->model->get_perbaikan_gugatan($idperkara);
		// print_r($data['data_perbaikan_gugatan']);die();
		$this->load->vars($data);
		$this->load->view('perkara_tab/perbaikan_gugatan');
	}
}