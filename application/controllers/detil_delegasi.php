<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detil_delegasi extends CI_Controller {
	function index(){;
		$encalur = $this->nativesession->get_flash_session('encalur');
		$encperkara = $this->nativesession->get_flash_session('encperkara');
		$encpnasal = $this->nativesession->get_flash_session('encpnasal');
		$encpntujuan = $this->nativesession->get_flash_session('encpntujuan');

		if(empty($encpnasal) AND empty($encpntujuan) AND empty($encalur) AND empty($encperkara)){ show_404(); }
		$idalur = $this->encrypt->decode(base64_decode($encalur));
		$idperkara = $this->encrypt->decode(base64_decode($encperkara));
		$idpnasal = $this->encrypt->decode(base64_decode($encpnasal));
		$idpntujuan = $this->encrypt->decode(base64_decode($encpntujuan));

		if(!is_numeric($idperkara)){ echo "ERROR PERKARA NOT FOUND!"; }

		$this->load->model('perkara/list_delegasi_m','delegasi');
		
		$queryDelegasi = $this->delegasi->getDetilDelegasi($idalur,$idperkara,$idpnasal,$idpntujuan);
		$queryDelegasiProses = $this->delegasi->getDelegasiProses($idalur,$idperkara,$idpnasal,$idpntujuan);

		$data['noPerkara'] = (!empty($queryDelegasi->row()->noPerkara )? $queryDelegasi->row()->noPerkara :'');
		$data['kodeSatkerAsal'] = (!empty($queryDelegasi->row()->kodeSatkerAsal )? $queryDelegasi->row()->kodeSatkerAsal :'');
		$data['pnAsalText'] = (!empty($queryDelegasi->row()->pnAsalText )? $queryDelegasi->row()->pnAsalText :'');
		$data['kodeSatkerTujuan'] = (!empty($queryDelegasi->row()->kodeSatkerTujuan )? $queryDelegasi->row()->kodeSatkerTujuan :'');
		$data['pnTujuanText'] = (!empty($queryDelegasi->row()->pnTujuanText )? $queryDelegasi->row()->pnTujuanText :'');
		$data['tglDelegasi'] = (!empty($queryDelegasi->row()->tglDelegasi )? $this->tanggalhelper->convertDayDate($queryDelegasi->row()->tglDelegasi) :'');
		$data['jenisDelegasiText'] = (!empty($queryDelegasi->row()->jenisDelegasiText )? $queryDelegasi->row()->jenisDelegasiText :'');
		$data['tglSurat'] = (!empty($queryDelegasi->row()->tglSurat )? $this->tanggalhelper->convertDayDate($queryDelegasi->row()->tglSurat) :'');
		$data['tglPengiriman'] = (!empty($queryDelegasi->row()->tglPengiriman )? $this->tanggalhelper->convertDayDate($queryDelegasi->row()->tglPengiriman) :'');
		$data['noSurat'] = (!empty($queryDelegasi->row()->noSurat )? $queryDelegasi->row()->noSurat :'');

		$data['idproses'] = (!empty($queryDelegasiProses->row()->IDDelegasi)? $queryDelegasiProses->row()->IDDelegasi :'');
		$data['tglSuratDiterima'] = (!empty($queryDelegasiProses->row()->tglSuratDiterima)? $this->tanggalhelper->convertDayDate($queryDelegasiProses->row()->tglSuratDiterima) :'');
		$data['jurusitaNama'] = (!empty($queryDelegasiProses->row()->jurusitaNama)? $queryDelegasiProses->row()->jurusitaNama :'');
		$data['tglRelaas'] = (!empty($queryDelegasiProses->row()->tglRelaas)? $this->tanggalhelper->convertDayDate($queryDelegasiProses->row()->tglRelaas) :'');
		$data['nomorRelaas'] = (!empty($queryDelegasiProses->row()->nomorRelaas)? $queryDelegasiProses->row()->nomorRelaas :'');
		$data['tglPengirimanRelaas'] = (!empty($queryDelegasiProses->row()->tglPengirimanRelaas)? $this->tanggalhelper->convertDayDate($queryDelegasiProses->row()->tglPengirimanRelaas) :'');
		$data['noSuratPengantarRelaas'] = (!empty($queryDelegasiProses->row()->nomorSuratPengantarRelaas)? $queryDelegasiProses->row()->nomorSuratPengantarRelaas :'');
		$data['diterimaOleh'] = (!empty($queryDelegasiProses->row()->diterimaOleh)? $queryDelegasiProses->row()->diterimaOleh :'');
		#$data['wakilPenerima'] = (!empty($queryDelegasiProses->row()->wakilPenerima)? $queryDelegasiProses->row()->wakilPenerima :'');
		$data['statusDelegasi'] = (!empty($queryDelegasiProses->row()->statusDelegasi)? $queryDelegasiProses->row()->statusDelegasi :'Belum Dilaksanakan');
		$data['alasan'] = (!empty($queryDelegasiProses->row()->alasan)? $queryDelegasiProses->row()->alasan :'');
		$data['catatan_proses'] = (!empty($queryDelegasiProses->row()->catatan)? $queryDelegasiProses->row()->catatan :'');

		if ($idalur==1) {
			$data['pn'] = "Asal";
			$data['namaDelegasi'] = "MASUK";
			$data['namapn'] = $data['pnAsalText'];
		}else{
			$data['pn'] = "Tujuan";
			$data['namaDelegasi'] = "KELUAR";
			$data['namapn'] = $data['pnTujuanText'];
		}


		$this->load->vars($data);
		$this->load->view('detil_perkara/detil_delegasi');
	}
}