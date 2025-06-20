<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kasasi extends CI_Controller {
	function index(){
		$enc = $this->nativesession->get_flash_session('enc');
		if(empty($enc)){ show_404(); }
		$idperkara = $this->nativesession->get_flash_session('perkara_id');
		$idperkara = $this->encrypt->decode(base64_decode($enc));
		if(!is_numeric($idperkara)){ echo "ERROR PERKARA NOT FOUND!"; }

		$this->load->model('perkara/kasasi_m','kasasi');
		$data['enc'] = $enc;
		
		$queryKasasi = $this->kasasi->getDataKasasi($idperkara);
		$data['IDPerkara'] = (!empty($queryKasasi->row()->IDPerkara)? $queryKasasi->row()->IDPerkara :'');  
		$data['noPerkaraKasasi'] = (!empty($queryKasasi->row()->noPerkaraKasasi)? $queryKasasi->row()->noPerkaraKasasi :''); 
		$data['tglPermohonankasasi'] = (!empty($queryKasasi->row()->tglPermohonankasasi)? $this->tanggalhelper->convertDayDate($queryKasasi->row()->tglPermohonankasasi) :''); 
		$data['pemohonkasasi'] = (!empty($queryKasasi->row()->pemohonkasasi)? $queryKasasi->row()->pemohonkasasi :''); 
		$data['tglPengirimanBerkas'] = (!empty($queryKasasi->row()->tglPengirimanBerkas)? $this->tanggalhelper->convertDayDate($queryKasasi->row()->tglPengirimanBerkas) :''); 
		$data['noSuratPengiriman'] = (!empty($queryKasasi->row()->noSuratPengiriman)? $queryKasasi->row()->noSuratPengiriman :''); 
		$data['tglPenerimaanKembaliBerkas'] = (!empty($queryKasasi->row()->tglPenerimaanKembaliBerkas)? $this->tanggalhelper->convertDayDate($queryKasasi->row()->tglPenerimaanKembaliBerkas) :'');  
		$data['paniteraPengganti'] = (!empty($queryKasasi->row()->paniteraPengganti)? $queryKasasi->row()->paniteraPengganti :''); 
		$data['tglPutusan'] = (!empty($queryKasasi->row()->tglPutusan)? $this->tanggalhelper->convertDayDate($queryKasasi->row()->tglPutusan) :''); 
		$data['noPutusankasasi'] = (!empty($queryKasasi->row()->noPutusankasasi)? $queryKasasi->row()->noPutusankasasi :''); 
		$data['amarPutusan'] = (!empty($queryKasasi->row()->amarPutusan)? $queryKasasi->row()->amarPutusan :''); 
		$data['tglMinutasi'] = (!empty($queryKasasi->row()->tglMinutasi)? $this->tanggalhelper->convertDayDate($queryKasasi->row()->tglMinutasi) :''); 
		$data['tglBeritaPutusan'] = (!empty($queryKasasi->row()->tglBeritaPutusan)? $this->tanggalhelper->convertDayDate($queryKasasi->row()->tglBeritaPutusan) :''); 
		$data['namaMediaBerita'] = (!empty($queryKasasi->row()->namaMediaBerita)? $queryKasasi->row()->namaMediaBerita :''); 
		$data['tglSuratKabar'] = (!empty($queryKasasi->row()->tglSuratKabar)? $this->tanggalhelper->convertDayDate($queryKasasi->row()->tglSuratKabar) :''); 
		$data['namaSuratKabar'] = (!empty($queryKasasi->row()->namaSuratKabar)? $queryKasasi->row()->namaSuratKabar :''); 
		$data['prodeo'] = (!empty($queryKasasi->row()->prodeo)? $queryKasasi->row()->prodeo :''); 
		$data['keterangan'] = (!empty($queryKasasi->row()->keterangan)? $queryKasasi->row()->keterangan :'');
		$data['queryKasasiDetil'] = $this->kasasi->getDataKasasiDetil($idperkara);


		$data['majelisHakim'] = '';
		if(empty($queryKasasi->row()->hakimKedua) AND !empty($queryKasasi->row()->hakimPertama)){
			$data['majelisHakim'] = 'Hakim Tunggal: '.$queryKasasi->row()->hakimPertama;
		}elseif(!empty($queryKasasi->row()->hakimPertama)){
			$data['majelisHakim'] = 'Hakim Ketua: '.$queryKasasi->row()->hakimPertama.'</br>';
			$data['majelisHakim'] .= 'Hakim Anggota 1: '.$queryKasasi->row()->hakimKedua.'</br>';
			$data['majelisHakim'] .= 'Hakim Anggota 2: '.$queryKasasi->row()->hakimKetiga;
			if(!empty($row->hakimKeempat)){
				$data['majelisHakim'] .= '</br>Hakim Anggota 3: '.$queryKasasi->row()->hakimKeempat;
			}
			if(!empty($row->hakimKelima)){
				$data['majelisHakim'] .= '</br>Hakim Anggota 4: '.$queryKasasi->row()->hakimKelima;
			}
		}
		$data['idalurperkara'] = $this->tanggalhelper->getIDAlurPerkara($idperkara);
		$data['data_mediasi'] = $this->kasasi->get_info_mediasi($idperkara);

		$this->load->vars($data);
		$this->load->view('perkara_tab/detil_kasasi');
	}
}