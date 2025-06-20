<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detil_penahanan extends CI_Controller {
	function index(){
	$encIDPerkara = $this->nativesession->get_flash_session('encIDPerkara');
	$encNamaTerdakwa = $this->nativesession->get_flash_session('encNamaTerdakwa');


	$IDPerkara = $this->encrypt->decode(base64_decode($encIDPerkara));
	$NamaTerdakwa = trim($this->encrypt->decode(base64_decode($encNamaTerdakwa)));

	$this->load->model('perkara/perkara_m','panahanan');
	$data['queryPenahanan'] = $this->panahanan->getDataPenahanan($IDPerkara,$NamaTerdakwa);
	$data['nomorPerkara'] = $data['queryPenahanan']->row()->noPerkara;
	$data['NamaTerdakwa'] = $NamaTerdakwa;


	$this->load->vars($data);
	$this->load->view('detil_perkara/detil_penahanan');


	}
}