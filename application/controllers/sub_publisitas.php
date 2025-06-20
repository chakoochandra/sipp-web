<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sub_publisitas extends CI_Controller {
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

		$this->load->model('perkara/info_perkara','perkara');
		$this->load->model('perkara/putusan_pasca_m','perkara_sub');

		$query = $this->perkara->getInfoPerkara($idperkara);
		$idalur = $query->row()->klasifikasiPerkara;
		$data['idalurperkara'] = $idalur;

		//publisitas
		//$data['penetapan_publisitas'] = $this->perkara_sub->get_info_penetapan_publisitas($idperkara);
		//$data['laporan_publisitas'] = $this->perkara_sub->get_info_laporan_publisitas($idperkara);
		
		if($data['idalurperkara'] == 3) {
            $data['penetapan_publisitas'] = $this->perkara_sub->ambil_data_publisitas($perkara_pasca_pailit_id,$urutan);
			$data['laporan_publisitas'] = $this->perkara_sub->ambil_lap_publisitas($perkara_pasca_pailit_id,$urutan);
        } else if ($data['idalurperkara'] == 4){
            $data['penetapan_publisitas'] = $this->perkara_sub->ambil_data_publisitas_pkpu($idperkara);
			$data['laporan_publisitas'] = $this->perkara_sub->ambil_lap_publisitas_pkpu($idperkara);
        }

		//$this->load->vars($data);
		$this->load->view('perkara_tab/pasca_pailit/sub_publisitas');
	}

}