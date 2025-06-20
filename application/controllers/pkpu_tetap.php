<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pkpu_tetap extends CI_Controller {
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
		$this->load->model('perkara/putusan_m','putusan');
		
		//equalizr 27 oktober 2021
		//pengambilan suara
		$kategori1 = 4;
		$jenis1 = 6;
		$data['rapatpengambilansuara'] = $this->putusan->get_info_jadwal_rapat($idperkara,$kategori1,$jenis1);

		//putusan pkpu tetap pertama
		$tahap = 1;
		$data['putusan_pkpu_tetap_pertama'] = $this->putusan->get_info_putusan_pkpu_tetap($idperkara,$tahap);

		//putusan pkpu tetap lanjutan
		$tahap = 2;
		$data['putusan_pkpu_tetap_lanjutan'] = $this->putusan->get_info_putusan_pkpu_tetap($idperkara,$tahap);

		$this->load->vars($data);
		$this->load->view('perkara_tab/pkpu_tetap');
	}
}