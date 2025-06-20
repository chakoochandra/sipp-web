<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang_bukti extends CI_Controller {
	function index(){
		$enc = $this->nativesession->get_flash_session('enc');
		if(empty($enc)){
			redirect('list_perkara');
		}
		$idperkara = $this->nativesession->get_flash_session('perkara_id');
		$idperkara = $this->encrypt->decode(base64_decode($enc));
		if(!is_numeric($idperkara)){
			redirect('list_perkara');
		}
		$this->load->model('perkara/barang_bukti_m','bb');
		$data['enc'] = $enc;
		$data['data_barang_bukti'] = $this->bb->get_info_barang_bukti($idperkara);
		$this->load->vars($data);
		$this->load->view('perkara_tab/barang_bukti');
	}
}