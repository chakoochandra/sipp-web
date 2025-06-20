<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detil_jadwal_sidang extends CI_Controller {
	function index(){;
		$enc = $this->nativesession->get_flash_session('enc');
		if(empty($enc)){
			show_404();
		}
		
		$idperkara = $this->encrypt->decode(base64_decode($enc));
		if(!is_numeric($idperkara)){
			echo "ERROR PERKARA NOT FOUND!";
		}
		$this->load->model('perkara/jadwal_sidang_m','jadwal_sidang');
		$data['enc'] = $enc;
		$data['data_jadwal_sidang'] = $this->jadwal_sidang->get_detil_jadwal_sidang($idperkara);
		$this->load->vars($data);
		$this->load->view('detil_perkara/detil_jadwal_sidang');
	}
}