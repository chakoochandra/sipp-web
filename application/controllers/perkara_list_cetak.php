<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perkara_list_cetak extends CI_Controller {
	function cetak(){
		$segment = $this->uri->segment_array();
		$jenis_cetak = intval($segment[3]);
		$alur_perkara_id = $this->encrypt->decode(base64_decode($segment[4]));
		$keyword_segment = $segment[5];
		#Pencarian
		if($keyword_segment!==0){
			$keyword = $keyword_segment;
		} else {
			$keyword = "";
		}

		#Perkara
		if($jenis_cetak==1){
			$this->load->model('perkara/perkara_m');
			$query = $this->perkara->getPerkaraList($alur_perkara_id,$keyword);
		}

		$data['list_perkara'] = $query;
		$data['idalurperkara'] = $alur_perkara_id;
		$data['jenis_cetak'] = $jenis_cetak;
		
		$this->load->vars($data);
		$this->load->view('perkara_list/perkara_list_cetak');
	}
}