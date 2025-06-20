<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pk extends CI_Controller {
	function index(){
		$enc = $this->nativesession->get_flash_session('enc');
		if(empty($enc)){ show_404(); }
		$idperkara = $this->nativesession->get_flash_session('perkara_id');
		$idperkara = $this->encrypt->decode(base64_decode($enc));
		if(!is_numeric($idperkara)){ echo "ERROR PERKARA NOT FOUND!"; }
		
		$this->load->model('perkara/pk_m','perkaraPK');
		$data['enc'] = $enc;

		$queryPK = $this->perkaraPK->getDataPK($idperkara);
		$data['IDPerkara'] = (!empty($queryPK->row()->IDPerkara )? $queryPK->row()->IDPerkara :''); 
		$data['noPerkaraPK'] = (!empty($queryPK->row()->noPerkaraPK )? $queryPK->row()->noPerkaraPK :''); 
		$data['tglPermohonan'] = (!empty($queryPK->row()->tglPermohonan )? $this->tanggalhelper->convertDayDate($queryPK->row()->tglPermohonan) :''); 
		$data['pemohon'] = (!empty($queryPK->row()->pemohon )? $queryPK->row()->pemohon :''); 
		$data['tglPemberitahuanPermohonan'] = (!empty($queryPK->row()->tglPemberitahuanPermohonan )? $this->tanggalhelper->convertDayDate($queryPK->row()->tglPemberitahuanPermohonan) :''); 
		$data['tglPenerimaanMemori'] = (!empty($queryPK->row()->tglPenerimaanMemori )? $this->tanggalhelper->convertDayDate($queryPK->row()->tglPenerimaanMemori) :''); 
		$data['tglPenyerahanMemori'] = (!empty($queryPK->row()->tglPenyerahanMemori )? $this->tanggalhelper->convertDayDate($queryPK->row()->tglPenyerahanMemori) :''); 
		$data['tglPenerimaanKontra'] = (!empty($queryPK->row()->tglPenerimaanKontra )? $this->tanggalhelper->convertDayDate($queryPK->row()->tglPenerimaanKontra) :''); 
		$data['tglPenyerahanKontra'] = (!empty($queryPK->row()->tglPenyerahanKontra )? $this->tanggalhelper->convertDayDate($queryPK->row()->tglPenyerahanKontra) :''); 
		$data['tglPemberitahuanInzagePihak1'] = (!empty($queryPK->row()->tglPemberitahuanInzagePihak1 )? $this->tanggalhelper->convertDayDate($queryPK->row()->tglPemberitahuanInzagePihak1) :''); 
		$data['tglPemberitahuanInzagePihak2'] = (!empty($queryPK->row()->tglPemberitahuanInzagePihak2 )? $this->tanggalhelper->convertDayDate($queryPK->row()->tglPemberitahuanInzagePihak2) :''); 
		$data['tglPelaksanaanInzagePihak1'] = (!empty($queryPK->row()->tglPelaksanaanInzagePihak1 )? $this->tanggalhelper->convertDayDate($queryPK->row()->tglPelaksanaanInzagePihak1) :''); 
		$data['tglPelaksanaanInzagePihak2'] = (!empty($queryPK->row()->tglPelaksanaanInzagePihak2 )? $this->tanggalhelper->convertDayDate($queryPK->row()->tglPelaksanaanInzagePihak2) :''); 
		$data['tglPengirimanBerkas'] = (!empty($queryPK->row()->tglPengirimanBerkas )? $this->tanggalhelper->convertDayDate($queryPK->row()->tglPengirimanBerkas) :''); 
		$data['nomorSuratPengiriman'] = (!empty($queryPK->row()->nomorSuratPengiriman )? $queryPK->row()->nomorSuratPengiriman :''); 
		$data['tglPenerimaanKembaliBerkas'] = (!empty($queryPK->row()->tglPenerimaanKembaliBerkas )? $this->tanggalhelper->convertDayDate($queryPK->row()->tglPenerimaanKembaliBerkas) :''); 
		$data['majelisHakim'] = (!empty($queryPK->row()->majelisHakim )? $queryPK->row()->majelisHakim :''); 
		$data['paniteraPengganti'] = (!empty($queryPK->row()->paniteraPengganti )? $queryPK->row()->paniteraPengganti :''); 
		$data['tglPutusan'] = (!empty($queryPK->row()->tglPutusan )? $this->tanggalhelper->convertDayDate($queryPK->row()->tglPutusan) :''); 
		$data['noPutusanPK'] = (!empty($queryPK->row()->noPutusanPK )? $queryPK->row()->noPutusanPK :''); 
		$data['amarPutusan'] = (!empty($queryPK->row()->amarPutusan )? $queryPK->row()->amarPutusan :''); 
		$data['tglMinutasi'] = (!empty($queryPK->row()->tglMinutasi )? $this->tanggalhelper->convertDayDate($queryPK->row()->tglMinutasi) :''); 
		$data['tglPemberitahuanPutusanPihak1'] = (!empty($queryPK->row()->tglPemberitahuanPutusanPihak1 )? $this->tanggalhelper->convertDayDate($queryPK->row()->tglPemberitahuanPutusanPihak1) :''); 
		$data['tglPemberitahuanPutusanPihak2'] = (!empty($queryPK->row()->tglPemberitahuanPutusanPihak2 )? $this->tanggalhelper->convertDayDate($queryPK->row()->tglPemberitahuanPutusanPihak2) :''); 

		
		$queryMediasi = $this->perkaraPK->getDataMediasiPK($idperkara);
		$data['IDMediasi'] = (!empty($queryMediasi->row()->IDMediasi )? $queryMediasi->row()->IDMediasi :''); 
		$data['IDTahapan'] = (!empty($queryMediasi->row()->IDTahapan )? $queryMediasi->row()->IDTahapan :''); 
		$data['IDPerkara'] = (!empty($queryMediasi->row()->IDPerkara )? $queryMediasi->row()->IDPerkara :''); 
		$data['jenisMediasi'] = (!empty($queryMediasi->row()->jenisMediasi )? $queryMediasi->row()->jenisMediasi :''); 
		$data['tglPenetapan'] = (!empty($queryMediasi->row()->tglPenetapan )? $this->tanggalhelper->convertDayDate($queryMediasi->row()->tglPenetapan) :''); 
		$data['SKPenetapan'] = (!empty($queryMediasi->row()->SKPenetapan )? $queryMediasi->row()->SKPenetapan :''); 
		$data['IDMediator'] = (!empty($queryMediasi->row()->IDMediator )? $queryMediasi->row()->IDMediator :''); 
		$data['statusMediator'] = (!empty($queryMediasi->row()->statusMediator )? $queryMediasi->row()->statusMediator :''); 
		$data['nama'] = (!empty($queryMediasi->row()->nama )? $queryMediasi->row()->nama :''); 
		$data['tglMediasi'] = (!empty($queryMediasi->row()->tglMediasi )? $this->tanggalhelper->convertDayDate($queryMediasi->row()->tglMediasi) :''); 
		$data['tglPutusan'] = (!empty($queryMediasi->row()->tglPutusan )? $this->tanggalhelper->convertDayDate($queryMediasi->row()->tglPutusan) :''); 
		$data['hasil'] = (!empty($queryMediasi->row()->hasil )? $queryMediasi->row()->hasil :'');
		$hasilMediasi =  (!empty($queryMediasi->row()->jenis_hasil_mediasi )? $queryMediasi->row()->jenis_hasil_mediasi :'');
		if($hasilMediasi!=''){
			if($hasilMediasi=='Y'){
				$data['jenis_hasil_mediasi'] = 'Berhasil';
			} else if ($hasilMediasi=='S') {
				$data['jenis_hasil_mediasi'] = 'Berhasil Sebagian';
			} else if ($hasilMediasi=='T') {
				$data['jenis_hasil_mediasi'] = 'Tidak Berhasil';
			} else if ($hasilMediasi=='D') {
				$data['jenis_hasil_mediasi'] = 'Tidak Dapat Dilaksanakan';
			}
		} else {
			$data['jenis_hasil_mediasi'] = '';
		}
		$data['tglAkta'] = (!empty($queryMediasi->row()->tglAkta )? $this->tanggalhelper->convertDayDate($queryMediasi->row()->tglAkta) :''); 
		$data['isiAkta'] = (!empty($queryMediasi->row()->isiAkta )? $queryMediasi->row()->isiAkta :''); 
		$data['tglPermohonanMediasi'] = (!empty($queryMediasi->row()->tglPermohonanMediasi )? $this->tanggalhelper->convertDayDate($queryMediasi->row()->tglPermohonanMediasi) :''); 
		$data['tglBeritahu'] = (!empty($queryMediasi->row()->tglBeritahu )? $this->tanggalhelper->convertDayDate($queryMediasi->row()->tglBeritahu) :''); 
		$data['tglLaporan'] = (!empty($queryMediasi->row()->tglLaporan )? $this->tanggalhelper->convertDayDate($queryMediasi->row()->tglLaporan) :''); 
		$data['tglKirimKesepakatan'] = (!empty($queryMediasi->row()->tglKirimKesepakatan )? $this->tanggalhelper->convertDayDate($queryMediasi->row()->tglKirimKesepakatan) :'');

		$data['idalurperkara'] = $this->tanggalhelper->getIDAlurPerkara($idperkara);
		$data['queryPKDetil'] = $this->perkaraPK->getDataPKDetil($idperkara);

		$data['data_mediasi'] = $this->perkaraPK->get_info_mediasi($idperkara);
		
		$this->load->vars($data);
		$this->load->view('perkara_tab/detil_pk');
	}
}