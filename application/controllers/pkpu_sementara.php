<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pkpu_sementara extends CI_Controller {
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
		$this->load->model('perkara/putusan_m','putusan');

		//putusan pkpu sementara
		$data['putusan_pkpu_sementara'] = $this->putusan->get_info_putusan_pkpu_sementara($idperkara);

		//penunjukan hakim pengawas
		$data['hakim_pengawas'] = $this->putusan->get_info_hakim_pengawas($idperkara);

		//penunjukan pengurus
		$data['pengurus'] = $this->putusan->get_info_pengurus($idperkara);

		//rapat kreditor pertama
		$kategori1 = 1;
		$jenis1 = 1;
		$data['rapatkreditorpertama'] = $this->putusan->get_info_jadwal_rapat($idperkara,$kategori1,$jenis1);
		$data['thprapatkreditorpertama'] = $this->putusan->get_info_tindakan_hakim_pengawas($idperkara,$kategori1,$jenis1);

		//rapat kreditor lanjutan
		$kategori2 = 1;
		$jenis2 = 2;
		$data['rapatkreditorlanjutan'] = $this->putusan->get_info_jadwal_rapat($idperkara,$kategori2,$jenis2);
		$data['thprapatkreditorlanjutan'] = $this->putusan->get_info_tindakan_hakim_pengawas($idperkara,$kategori2,$jenis2);

		//rapat pencocokan piutang & verifikasi
		$kategori3 = 2;
		$jenis3 = 3;
		$data['rapatpencocokanpiutangverifikasi'] = $this->putusan->get_info_jadwal_rapat($idperkara,$kategori3,$jenis3);
		$data['thprapatpencocokanpiutangverifikasi'] = $this->putusan->get_info_tindakan_hakim_pengawas($idperkara,$kategori3,$jenis3);
		$data['bantahantagihan'] = $this->putusan->get_info_bantahan_tagihan($idperkara);

		//publisitas
		$data['penetapanpublisitas'] = $this->putusan->get_info_penetapan_publisitas($idperkara);
		$data['laporanpublisitas'] = $this->putusan->get_info_laporan_publisitas($idperkara);

		$this->load->vars($data);
		$this->load->view('perkara_tab/pkpu_sementara');
	}
}