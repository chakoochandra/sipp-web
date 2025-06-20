<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Putusan extends CI_Controller {
	function index(){
		$enc = $this->nativesession->get_flash_session('enc');
		if(empty($enc)){ show_404(); }

		$idperkara = $this->nativesession->get_flash_session('perkara_id');
		$idperkara = $this->encrypt->decode(base64_decode($enc));
		if(!is_numeric($idperkara)){ echo "ERROR PERKARA NOT FOUND!"; }
		$this->load->model('perkara/putusan_m','putusan');
		$data['enc'] = $enc;
				
		$queryPutusan = $this->putusan->get_info_putusan($idperkara);
		$data['tanggal_putusan'] = (!empty($queryPutusan->row()->tglPutusan)? $this->tanggalhelper->convertDayDate($queryPutusan->row()->tglPutusan):'');
		$data['amar'] = (!empty($queryPutusan->row()->amar)? $queryPutusan->row()->amar:'');
		$data['status_putusan_nama'] = (!empty($queryPutusan->row()->statusPutusan)? $queryPutusan->row()->statusPutusan:'');
		$data['tanggal_minutasi'] = (!empty($queryPutusan->row()->tglMinutasi)? $this->tanggalhelper->convertDayDate($queryPutusan->row()->tglMinutasi):'');
		$data['verstek'] = (!empty($queryPutusan->row()->isVerstek)? $queryPutusan->row()->isVerstek:'');
		$data['sumber_hukum_put'] = (!empty($queryPutusan->row()->sumberHukumNama)? $queryPutusan->row()->sumberHukumNama:'');
		$data['penetapan_hakim_pengawas'] =  (!empty($queryPutusan->row()->tglPenetapanHakimPengawas)? $this->tanggalhelper->convertDayDate($queryPutusan->row()->tglPenetapanHakimPengawas):'');
		$data['nomor_penetapan_hakim_pengawas'] = (!empty($queryPutusan->row()->noPenetapanHakimPengawas)? $queryPutusan->row()->noPenetapanHakimPengawas:'');
		$data['nilai_ganti_sengketa'] = (!empty($queryPutusan->row()->nilaiGantiRugi)? $queryPutusan->row()->nilaiGantiRugi:'');
		$data['tanggal_berita_putusan'] = (!empty($queryPutusan->row()->tglMediaBerita)? $this->tanggalhelper->convertDayDate($queryPutusan->row()->tglMediaBerita):'');
		$data['tanggal_surat_kabar_putusan'] = (!empty($queryPutusan->row()->tglSuratKabar)? $this->tanggalhelper->convertDayDate($queryPutusan->row()->tglSuratKabar):'');
		$data['nama_surat_kabar_putusan'] = (!empty($queryPutusan->row()->namaSuratKabar)? $queryPutusan->row()->namaSuratKabar:'');
		$data['kirim_salinan_putusan_penyidik'] =  (!empty($queryPutusan->row()->TglKirimSalinanPenyidik)? $this->tanggalhelper->convertDayDate($queryPutusan->row()->TglKirimSalinanPenyidik):'');
		$data['catatan_putusan'] = (!empty($queryPutusan->row()->keterangan)? $queryPutusan->row()->keterangan:'');
		$data['status_putusan_id'] = (!empty($queryPutusan->row()->IDStatusPutusan)? $queryPutusan->row()->IDStatusPutusan:'');
		$data['status_putusan'] = $this->putusan->get_info_putusan_terdakwa($idperkara);
		$data['data_pemberitahuan'] = $this->putusan->get_info_pemberitahuan_putusan($idperkara);
		$data['idalurperkara'] = $this->tanggalhelper->getIDAlurPerkara($idperkara);
		$data['jenis_perkara_id'] = $this->putusan->get_jenis_perkara_id($idperkara);

		$this->load->vars($data);
		$this->load->view('perkara_tab/putusan_akhir');
	}
}