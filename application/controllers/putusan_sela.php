<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Putusan_sela extends CI_Controller {
	function index(){
		$enc = $this->nativesession->get_flash_session('enc');
		if(empty($enc)){ show_404(); }
		$idperkara = $this->nativesession->get_flash_session('perkara_id');
		$idperkara = $this->encrypt->decode(base64_decode($enc));
		if(!is_numeric($idperkara)){ echo "ERROR PERKARA NOT FOUND!"; }
		$this->load->model('perkara/putusan_sela_m','putusan_sela');
		$data['enc'] = $enc;
		$data['idperkara'] = $idperkara;

		$queryPutsel = $this->putusan_sela->get_info_putusan_sela($idperkara);
		$data['tglPutusanSela'] = (!empty($queryPutsel->row()->tglPutusanSela)? $this->tanggalhelper->convertDayDate($queryPutsel->row()->tglPutusanSela):'');
		$data['amarSela'] = (!empty($queryPutsel->row()->amarSela)? $queryPutsel->row()->amarSela:'');
		$data['tglBerita'] = (!empty($queryPutsel->row()->tglBerita)? $this->tanggalhelper->convertDayDate($queryPutsel->row()->tglBerita):'');
		$data['tglPenetapanHakim'] = (!empty($queryPutsel->row()->tglPenetapanHakim)? $this->tanggalhelper->convertDayDate($queryPutsel->row()->tglPenetapanHakim):'');
		$data['tglSuratKabar'] = (!empty($queryPutsel->row()->tglSuratKabar)? $this->tanggalhelper->convertDayDate($queryPutsel->row()->tglSuratKabar):'');
		$data['hakimPengawas'] = (!empty($queryPutsel->row()->hakimPengawas)? $queryPutsel->row()->hakimPengawas:'');
		$data['pengurusNama'] = (!empty($queryPutsel->row()->pengurusNama)? $queryPutsel->row()->pengurusNama:'');
		$data['tglPerpanjangan'] = (!empty($queryPutsel->row()->tglPerpanjangan)? $this->tanggalhelper->convertDayDate($queryPutsel->row()->tglPerpanjangan):'');
		$data['mulaiPerpanjangan'] = (!empty($queryPutsel->row()->mulaiPerpanjangan)? $this->tanggalhelper->convertDayDate($queryPutsel->row()->mulaiPerpanjangan):'');
		$data['sampaiPerpanjangan'] = (!empty($queryPutsel->row()->sampaiPerpanjangan)? $this->tanggalhelper->convertDayDate($queryPutsel->row()->sampaiPerpanjangan):'');
		$data['penetapanSitaJaminan'] = (!empty($queryPutsel->row()->penetapanSitaJaminan)? $queryPutsel->row()->penetapanSitaJaminan:'');
		$data['pelaksanaanSitaJaminan'] = (!empty($queryPutsel->row()->pelaksanaanSitaJaminan)? $this->tanggalhelper->convertDayDate($queryPutsel->row()->pelaksanaanSitaJaminan):'');
		$data['tglPemberitahuanPihak1'] = (!empty($queryPutsel->row()->tglPemberitahuanPihak1)? $this->tanggalhelper->convertDayDate($queryPutsel->row()->tglPemberitahuanPihak1):'');
		$data['tglPemberitahuanPihak2'] = (!empty($queryPutsel->row()->tglPemberitahuanPihak2)? $this->tanggalhelper->convertDayDate($queryPutsel->row()->tglPemberitahuanPihak2):'');
		$data['tglPemberitahuanPihak3'] = (!empty($queryPutsel->row()->tglPemberitahuanPihak3)? $this->tanggalhelper->convertDayDate($queryPutsel->row()->tglPemberitahuanPihak3):'');
		$data['idalurperkara'] = $this->tanggalhelper->getIDAlurPerkara($idperkara);


		$this->load->vars($data);
		$this->load->view('perkara_tab/putusan_sela');
	}
}