<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_detail_sidang extends CI_Controller {
	function index($enc=null){
		if(empty($enc)){
			$enc = '';
		}
		$this->show_form($enc);	
	}

	function show_form($enc){
		$arr=explode(';', $this->encrypt->decode(base64_decode($enc)));
		$params = $this->encrypt->decode(base64_decode($enc));
		$data = $this->parse_params($params);
		if(empty($data))
			$data['idalurperkara']=-1;
		$view_file='search/Search_detail_sidang';
		$this->load->model('default/search');
		if($data['idalurperkara']==-1 OR $data['idalurperkara']=='')
			$data['idalurperkara'] = '';
		$data['jenis_pengadilan'] = $this->tanggalhelper->getJenisPengadilan();
		$data['regular'] = $this->session->flashdata('regular');
		$data['klasifikasi_perkara'] = $this->search->getKlasifikasiPerkara($data['idalurperkara']);
		$data['jenis_putusan'] = $this->search->getJenisPutusanPerkara($data['idalurperkara'],$data['jenis_pengadilan']);
		//$data['tahapan_proses'] = $this->search->getTahapanPerkara($data['jenis_pengadilan']);
		$data['proses_perkara'] = $this->search->getProsesPerkara($data['idalurperkara']);
		$data['alur_perkara_list'] = $this->search->getAlurPerkara();
		$data['hakim'] = $this->search->getHakim();
		$data['panitera'] = $this->search->getPanitera();
		$data['jurusita'] = $this->search->getJurusita();
		$data['mediator'] = $this->search->getMediator();
		$data['enc'] = base64_encode($this->encrypt->encode($data['idalurperkara']));
		$data['alur_perkara']= '';
		foreach ($data['alur_perkara_list']->result() as $key) {
			if ($key->id==$data['idalurperkara']){
				$data['alur_perkara']= strtoupper($key->nama);
				break; 
			}
		}
		$this->load->vars($data);		
		$this->load->view($view_file);	
	}

	private function parse_params($params){
		$data['idalurperkara'] = '';
		$data['idtahapan'] = 10;
		if(!empty($params)){
			$tmp = explode(';', $params);
			if(count($tmp)>1){
				$temporary = explode('=', $tmp[0]);
				if(count($tmp)<2){
					echo "Parameter URL Not Setup Correctly";
					exit();
				}
				$data['idalurperkara'] = $temporary[1];

				$temporary = explode('=', $tmp[1]);
				if(count($tmp)<2){
					echo "Parameter URL Not Setup Correctly";
					exit();
				}
				$data['idtahapan'] = $temporary[1];

			}elseif (count($tmp)==1) {
				$temporary = explode('=', $tmp[0]);
				if(count($tmp)<2){
					echo "Parameter URL Not Setup Correctly";
					exit();
				}
				$data['idalurperkara'] = $temporary[1];
			}
			return $data;
		}
		return '';
	}

	
}

?>
