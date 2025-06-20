<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eksekusi extends CI_Controller {
	function index(){
		$enc = $this->nativesession->get_flash_session('enc');
		if(empty($enc)){ show_404(); }
		$idperkara = $this->nativesession->get_flash_session('perkara_id');
		$idperkara = $this->encrypt->decode(base64_decode($enc));
		if(!is_numeric($idperkara)){ echo "ERROR PERKARA NOT FOUND!"; }
		$this->load->model('perkara/eksekusi_m','eksekusi');
		$data['enc'] = $enc;

		$queryEksekusi = $this->eksekusi->getDataEksekusi($idperkara);
		$data['queryEksekusiDetil'] = $this->eksekusi->getDataEksekusiDetil($idperkara);
		$data['ID']= (!empty($queryEksekusi->row()->ID) ? $queryEksekusi->row()->ID : '');
		$data['IDPerkara']= (!empty($queryEksekusi->row()->IDPerkara) ? $queryEksekusi->row()->IDPerkara : '');
		$data['IDAlurPerkara']= (!empty($queryEksekusi->row()->IDAlurPerkara) ? $queryEksekusi->row()->IDAlurPerkara : '');
		$data['noPerkaraPN']= (!empty($queryEksekusi->row()->noPerkaraPN) ? $queryEksekusi->row()->noPerkaraPN : '');
		$data['PutusanPN']= (!empty($queryEksekusi->row()->PutusanPN) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->PutusanPN) : '');
		$data['noPerkaraBanding']= (!empty($queryEksekusi->row()->noPerkaraBanding) ? $queryEksekusi->row()->noPerkaraBanding : '');
		$data['putusanBanding']= (!empty($queryEksekusi->row()->putusanBanding) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->putusanBanding) : '');
		$data['noPerkaraKasasi']= (!empty($queryEksekusi->row()->noPerkaraKasasi) ? $queryEksekusi->row()->noPerkaraKasasi : '');
		$data['putusanKasasi']= (!empty($queryEksekusi->row()->putusanKasasi) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->putusanKasasi) : '');
		$data['noPerkaraPK']= (!empty($queryEksekusi->row()->noPerkaraPK) ? $queryEksekusi->row()->noPerkaraPK : '');
		$data['putusanPK']= (!empty($queryEksekusi->row()->putusanPK) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->putusanPK) : '');
		$data['eksekusiPutusan']= (!empty($queryEksekusi->row()->eksekusiPutusan) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->eksekusiPutusan) : '');
		$data['eksekusiNomorPerkara']= (!empty($queryEksekusi->row()->eksekusiNomorPerkara) ? $queryEksekusi->row()->eksekusiNomorPerkara : '');
		$data['eksekusiAmarPutusan']= (!empty($queryEksekusi->row()->eksekusiAmarPutusan) ? $queryEksekusi->row()->eksekusiAmarPutusan : '');
		$data['pihakPemohonEksekusi']= (!empty($queryEksekusi->row()->pihakPemohonEksekusi) ? $queryEksekusi->row()->pihakPemohonEksekusi : '');
		$data['permohonanEsekusi']= (!empty($queryEksekusi->row()->permohonanEsekusi) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->permohonanEsekusi) : '');
		$data['pemohonEksekusi']= (!empty($queryEksekusi->row()->pemohonEksekusi) ? $queryEksekusi->row()->pemohonEksekusi : '');
		$data['paraPihak']= (!empty($queryEksekusi->row()->paraPihak) ? $queryEksekusi->row()->paraPihak : '');
		$data['penetapanTeguranEksekusi']= (!empty($queryEksekusi->row()->penetapanTeguranEksekusi) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->penetapanTeguranEksekusi) : '');
		$data['nomorPenetapanTeguranEksekusi']= (!empty($queryEksekusi->row()->nomorPenetapanTeguranEksekusi) ? $queryEksekusi->row()->nomorPenetapanTeguranEksekusi : '');
		$data['pelaksanaanTeguranEksekusi']= (!empty($queryEksekusi->row()->pelaksanaanTeguranEksekusi) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->pelaksanaanTeguranEksekusi) : '');
		$data['pelaksanaanTeguranEksekusiKedua']= (!empty($queryEksekusi->row()->pelaksanaanTeguranEksekusiKedua) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->pelaksanaanTeguranEksekusiKedua) : '');
		$data['penetapanSitaEksekusi']= (!empty($queryEksekusi->row()->penetapanSitaEksekusi) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->penetapanSitaEksekusi) : '');
		$data['nomorPenetapanSitaEksekusi']= (!empty($queryEksekusi->row()->nomorPenetapanSitaEksekusi) ? $queryEksekusi->row()->nomorPenetapanSitaEksekusi : '');
		$data['pelaksanaanSitaEksekusi']= (!empty($queryEksekusi->row()->pelaksanaanSitaEksekusi) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->pelaksanaanSitaEksekusi) : '');
		$data['jurusitaNama']= (!empty($queryEksekusi->row()->jurusitaNama) ? $queryEksekusi->row()->jurusitaNama : '');
		$data['penetapanPerintahEksekusiLelang']= (!empty($queryEksekusi->row()->penetapanPerintahEksekusiLelang) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->penetapanPerintahEksekusiLelang) : '');
		$data['pelaksanaanEksekusiLelang']= (!empty($queryEksekusi->row()->pelaksanaanEksekusiLelang) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->pelaksanaanEksekusiLelang) : '');
		$data['penyerahanHasilLelang']= (!empty($queryEksekusi->row()->penyerahanHasilLelang) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->penyerahanHasilLelang) : '');
		$data['penetapanPerintahEksekusiRill']= (!empty($queryEksekusi->row()->penetapanPerintahEksekusiRill) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->penetapanPerintahEksekusiRill) : '');
		$data['pelaksanaanEksekusiRill']= (!empty($queryEksekusi->row()->pelaksanaanEksekusiRill) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->pelaksanaanEksekusiRill) : '');
		$data['penetapanNoneksekusi']= (!empty($queryEksekusi->row()->penetapanNoneksekusi) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->penetapanNoneksekusi) : '');
		$data['diterimaPermohonan']= (!empty($queryEksekusi->row()->diterimaPermohonan) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->diterimaPermohonan) : '');
		$data['panggilanParapihak']= (!empty($queryEksekusi->row()->panggilanParapihak) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->panggilanParapihak) : '');
		$data['penetapanKetua']= (!empty($queryEksekusi->row()->penetapanKetua) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->penetapanKetua) : '');
		$data['skObjekTidakPunyaKekuatanHukum']= (!empty($queryEksekusi->row()->skObjekTidakPunyaKekuatanHukum) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->skObjekTidakPunyaKekuatanHukum) : '');
		$data['suratTergugatObjekNonExecutable']= (!empty($queryEksekusi->row()->suratTergugatObjekNonExecutable) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->suratTergugatObjekNonExecutable) : '');
		$data['panggilanPihakNonExecutable']= (!empty($queryEksekusi->row()->panggilanPihakNonExecutable) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->panggilanPihakNonExecutable) : '');
		$data['upayaKesepakatanKompensasi']= (!empty($queryEksekusi->row()->upayaKesepakatanKompensasi) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->upayaKesepakatanKompensasi) : '');
		$data['penetapanKetuaKompensasi']= (!empty($queryEksekusi->row()->penetapanKetuaKompensasi) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->penetapanKetuaKompensasi) : '');
		$data['upayaHukumKma']= (!empty($queryEksekusi->row()->upayaHukumKma) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->upayaHukumKma) : '');
		$data['penetapanKmaKompensasi']= (!empty($queryEksekusi->row()->penetapanKmaKompensasi) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->penetapanKmaKompensasi) : '');
		$data['uangpaksaPutusanHakim']= (!empty($queryEksekusi->row()->uangpaksaPutusanHakim) ? $queryEksekusi->row()->uangpaksaPutusanHakim : '');
		$data['uangpaksaPenetapanKetua']= (!empty($queryEksekusi->row()->uangpaksaPenetapanKetua) ? $queryEksekusi->row()->uangpaksaPenetapanKetua : '');
		$data['suratKetuaTergugatUangpaksa']= (!empty($queryEksekusi->row()->suratKetuaTergugatUangpaksa) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->suratKetuaTergugatUangpaksa) : '');
		$data['suratPeringatanUangpaksa']= (!empty($queryEksekusi->row()->suratPeringatanUangpaksa) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->suratPeringatanUangpaksa) : '');
		$data['perintahKetuaSaksiAdministratif']= (!empty($queryEksekusi->row()->perintahKetuaSaksiAdministratif) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->perintahKetuaSaksiAdministratif) : '');
		$data['sanksiAministratifDariPejabat']= (!empty($queryEksekusi->row()->sanksiAministratifDariPejabat) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->sanksiAministratifDariPejabat) : '');
		$data['pengumumanKetuaPaniteraJs']= (!empty($queryEksekusi->row()->pengumumanKetuaPaniteraJs) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->pengumumanKetuaPaniteraJs) : '');
		$data['pengumumanMedia']= (!empty($queryEksekusi->row()->pengumumanMedia) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->pengumumanMedia) : '');
		$data['surat_Pesiden']= (!empty($queryEksekusi->row()->surat_Pesiden) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->surat_Pesiden) : '');
		$data['suratLembagaPerwakilanRakyat']= (!empty($queryEksekusi->row()->suratLembagaPerwakilanRakyat) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->suratLembagaPerwakilanRakyat) : '');
		$data['alasanEksekusi']= (!empty($queryEksekusi->row()->alasanEksekusi) ? $queryEksekusi->row()->alasanEksekusi : '');
		$data['alasanEksekusiTidakDilaksanakan']= (!empty($queryEksekusi->row()->alasanEksekusiTidakDilaksanakan) ? $queryEksekusi->row()->alasanEksekusiTidakDilaksanakan : '');
		$data['pelaksanaanEksekusiNama']= (!empty($queryEksekusi->row()->pelaksanaanEksekusiNama) ? $queryEksekusi->row()->pelaksanaanEksekusiNama : '');
		$data['catatanEksekusi']= (!empty($queryEksekusi->row()->catatanEksekusi) ? $queryEksekusi->row()->catatanEksekusi : '');
		$data['prodeoEksekusi']= (!empty($queryEksekusi->row()->prodeoEksekusi) ? $queryEksekusi->row()->prodeoEksekusi : '');
		$data['statusEksekusiText']= (!empty($queryEksekusi->row()->statusEksekusiText) ? $queryEksekusi->row()->statusEksekusiText : '');
		$data['prodeo']= (!empty($queryEksekusi->row()->prodeo) ? $queryEksekusi->row()->prodeo : '');
		$data['tglPendaftaranAction']= (!empty($queryEksekusi->row()->tglPendaftaranAction) ? $this->tanggalhelper->convertDayDate($queryEksekusi->row()->tglPendaftaranAction) : '');


		$this->load->vars($data);
		$this->load->view('perkara_tab/detil_eksekusi');
	}
}