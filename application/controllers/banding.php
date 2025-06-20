<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banding extends CI_Controller {
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
		$this->load->model('perkara/banding_m','banding');
		$data['enc'] = $enc;

		$queryBanding = $this->banding->getDataBanding($idperkara);
		$data['noPerkarabanding'] = (!empty($queryBanding->row()->noPerkarabanding)? $queryBanding->row()->noPerkarabanding :'');
		$data['tglPermohonanBanding'] = (!empty($queryBanding->row()->tglPermohonanBanding)? $this->tanggalhelper->convertDayDate($queryBanding->row()->tglPermohonanBanding) :'');
		$data['pemohonBanding'] = (!empty($queryBanding->row()->pemohonBanding)? $queryBanding->row()->pemohonBanding :'');
		$data['tglPemberitahuanPermohonan'] = (!empty($queryBanding->row()->tglPemberitahuanPermohonan)? $this->tanggalhelper->convertDayDate($queryBanding->row()->tglPemberitahuanPermohonan) :'');
		$data['tglPenerimaanMemori'] = (!empty($queryBanding->row()->tglPenerimaanMemori)? $this->tanggalhelper->convertDayDate($queryBanding->row()->tglPenerimaanMemori) :'');
		$data['tglPenyerahanMemori'] = (!empty($queryBanding->row()->tglPenyerahanMemori)? $this->tanggalhelper->convertDayDate($queryBanding->row()->tglPenyerahanMemori) :'');
		$data['tglPenerimaanKontra'] = (!empty($queryBanding->row()->tglPenerimaanKontra)? $this->tanggalhelper->convertDayDate($queryBanding->row()->tglPenerimaanKontra) :'');
		$data['tglPenyerahanKontra'] = (!empty($queryBanding->row()->tglPenyerahanKontra)? $this->tanggalhelper->convertDayDate($queryBanding->row()->tglPenyerahanKontra) :'');
		$data['tglPemberitahuanInzagePembanding'] = (!empty($queryBanding->row()->tglPemberitahuanInzagePembanding)? $this->tanggalhelper->convertDayDate($queryBanding->row()->tglPemberitahuanInzagePembanding) :'');
		$data['tglPemberitahuanInzageTerbanding'] = (!empty($queryBanding->row()->tglPemberitahuanInzageTerbanding)? $this->tanggalhelper->convertDayDate($queryBanding->row()->tglPemberitahuanInzageTerbanding) :'');
		$data['tglPelaksanaanInzagePembanding'] = (!empty($queryBanding->row()->tglPelaksanaanInzagePembanding)? $this->tanggalhelper->convertDayDate($queryBanding->row()->tglPelaksanaanInzagePembanding) :'');
		$data['tglPelaksanaanInzageTerbanding'] = (!empty($queryBanding->row()->tglPelaksanaanInzageTerbanding)? $this->tanggalhelper->convertDayDate($queryBanding->row()->tglPelaksanaanInzageTerbanding) :'');
		$data['tglPengirimanBerkas'] = (!empty($queryBanding->row()->tglPengirimanBerkas)? $this->tanggalhelper->convertDayDate($queryBanding->row()->tglPengirimanBerkas) :'');
		$data['nomorSuratPengiriman'] = (!empty($queryBanding->row()->nomorSuratPengiriman)? $queryBanding->row()->nomorSuratPengiriman :'');
		$data['tglPenerimaanKembaliBerkas'] = (!empty($queryBanding->row()->tglPenerimaanKembaliBerkas)? $this->tanggalhelper->convertDayDate($queryBanding->row()->tglPenerimaanKembaliBerkas) :'');
		
		$data['paniteraPengganti'] = (!empty($queryBanding->row()->paniteraPengganti)? $queryBanding->row()->paniteraPengganti :'');
		$data['tglPutusan'] = (!empty($queryBanding->row()->tglPutusan)? $this->tanggalhelper->convertDayDate($queryBanding->row()->tglPutusan) :'');
		$data['noPutusanBanding'] = (!empty($queryBanding->row()->noPutusanBanding)? $queryBanding->row()->noPutusanBanding :'');
		$data['amarPutusan'] = (!empty($queryBanding->row()->amarPutusan)? $queryBanding->row()->amarPutusan :'');
		$data['tglMinutasi'] = (!empty($queryBanding->row()->tglMinutasi)? $this->tanggalhelper->convertDayDate($queryBanding->row()->tglMinutasi) :'');
		$data['tglPemberitahuanPutusanPembanding'] = (!empty($queryBanding->row()->tglPemberitahuanPutusanPembanding)? $this->tanggalhelper->convertDayDate($queryBanding->row()->tglPemberitahuanPutusanPembanding) :'');
		$data['tglPemberitahuanPutusanTerbanding'] = (!empty($queryBanding->row()->tglPemberitahuanPutusanTerbanding)? $this->tanggalhelper->convertDayDate($queryBanding->row()->tglPemberitahuanPutusanTerbanding) :'');
		$data['keterangan'] = (!empty($queryBanding->row()->keterangan)? $queryBanding->row()->keterangan :'');
		$data['queryBandingDetil'] = $this->banding->getDataBandingDetil($idperkara);

		$data['majelisHakim'] = '';
		if(empty($queryBanding->row()->hakimKedua) AND !empty($queryBanding->row()->hakimPertama)){
			$data['majelisHakim'] = 'Hakim Tunggal: '.$queryBanding->row()->hakimPertama;
		}elseif(!empty($queryBanding->row()->hakimPertama)){
			$data['majelisHakim'] = 'Hakim Ketua: '.$queryBanding->row()->hakimPertama.'</br>';
			$data['majelisHakim'] .= 'Hakim Anggota 1: '.$queryBanding->row()->hakimKedua.'</br>';
			$data['majelisHakim'] .= 'Hakim Anggota 2: '.$queryBanding->row()->hakimKetiga;
			if(!empty($row->hakimKeempat)){
				$data['majelisHakim'] .= '</br>Hakim Anggota 3: '.$queryBanding->row()->hakimKeempat;
			}
			if(!empty($row->hakimKelima)){
				$data['majelisHakim'] .= '</br>Hakim Anggota 4: '.$queryBanding->row()->hakimKelima;
			}
		}		
		$data['idalurperkara'] = $this->tanggalhelper->getIDAlurPerkara($idperkara);
		$data['data_mediasi'] = $this->banding->get_info_mediasi($idperkara);
		$this->load->vars($data);
		$this->load->view('perkara_tab/detil_banding');
	}
}