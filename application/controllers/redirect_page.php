<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Redirect_page extends CI_Controller {
	function redir_detil_perkara(){
		$this->setParams();
		redirect('detil_perkara');
	}

	function redir_penetapan(){
		$this->setParams();
		redirect('penetapan');
	}

	function redir_riwayat_perkara(){
		$this->setParams();
		redirect('riwayat_perkara');
	}

	function redir_mediasi(){
		$this->setParams();
		redirect('mediasi');
	}

	function redir_penuntutan(){
		$this->setParams();
		redirect('penuntutan');
	}

	function redir_banding(){
		$this->setParams();
		redirect('banding');
	}

	function redir_kasasi(){
		$this->setParams();
		redirect('kasasi');
	}

	function redir_pk(){
		$this->setParams();
		redirect('pk');
	}
	function redir_grasi(){
		$this->setParams();
		redirect('grasi');
	}

	function redir_eksekusi(){
		$this->setParams();
		redirect('eksekusi');
	}
	function redir_putusan(){
		$this->setParams();
		redirect('putusan');
	}

	function redir_barang_bukti(){
		$this->setParams();
		redirect('barang_bukti');
	}

	function redir_intervensi(){
		$this->setParams();
		redirect('intervensi');
	}
	function redir_jadwal_sidang(){
		$this->setParams();
		redirect('jadwal_sidang');
	}

	function redir_detil_jadwal_sidang(){
		$this->setParams();
		redirect('detil_jadwal_sidang');
	}

	function redir_verzet(){
		$this->setParams();
		redirect('verzet');
	}

	function redir_putusan_sela(){
		$this->setParams();
		redirect('putusan_sela');
	}

	function redir_rekonvensi(){
		$this->setParams();
		redirect('rekonvensi');
	}
	function redir_dismissal(){
		$this->setParams();
		redirect('dismissal');
	}

	function redir_penetapan_gugur(){
		$this->setParams();
		redirect('penetapan_gugur');
	}

	function redir_diversi(){
		$this->setParams();
		redirect('diversi');
	}

	function redir_keberatan(){
		$this->setParams();
		redirect('keberatan');
	}

	function redir_biaya_perkara(){
		$this->setParams();
		redirect('biaya_perkara');
	}
	
	function redir_pen_persiapan(){
		$this->setParams();
		redirect('penetapan_persiapan');
	}

	function redir_ikrar(){
		$this->setParams();
		redirect('ikrar_talak');
	}

	function redir_mediasi_luar(){
		$this->setParams();
		redirect('mediasi_luar');
	}

	function redir_detil_penahanan(){
		$segment = $this->uri->segment_array();
		$this->nativesession->set_flash_session('encIDPerkara', $this->uri->segment(2));
		$this->nativesession->set_flash_session('encNamaTerdakwa', $this->uri->segment(3));
		redirect('detil_penahanan');
	}
	function redir_saksi(){
		$this->setParams();
		redirect('saksi');
	}

	//equalizr 22 oktober 2021
	function redir_pkpu_sementara(){
		$this->setParams();
		redirect('pkpu_sementara');
	}

	function redir_pkpu_tetap(){
		$this->setParams();
		redirect('pkpu_tetap');
	}

	function redir_rencana_perdamaian(){
		$this->setParams();
		redirect('rencana_perdamaian');
	}

	function redir_laporan_pengurus(){
		$this->setParams();
		redirect('laporan_pengurus');
	}

	function redir_setelah_putusan_pernyataan_pailit(){
		$this->setParams();
		redirect('putusan_pernyataan_pailit');
	}

	function redir_pembatalan_perdamaian(){
		$this->setParams();
		redirect('pembatalan_perdamaian');
	}

	//equalizr 27 oktober 2021
	function redir_sub_pemeriksa(){
		$this->setParams();
		redirect('sub_pemeriksa');
	}

	function redir_sub_pengawas(){
		$this->setParams();
		redirect('sub_pengawas');
	}

	function redir_sub_kurator(){
		$this->setParams();
		redirect('sub_kurator');
	}
	
	function redir_sub_publisitas(){
		$this->setParams();
		redirect('sub_publisitas');
	}

	function redir_sub_rapat(){
		$this->setParams();
		redirect('sub_rapat');
	}

	function redir_sub_cabutpernyataan(){
		$this->setParams();
		redirect('sub_cabutpernyataan');
	}

	function redir_sub_cocokverifikasi(){
		$this->setParams();
		redirect('sub_cocokverifikasi');
	}

	function redir_sub_gugatanlain(){
		$this->setParams();
		redirect('sub_gugatanlain');
	}

	function redir_sub_perdamaian(){
		$this->setParams();
		redirect('sub_perdamaian');
	}

	function redir_sub_bataldamai(){
		$this->setParams();
		redirect('sub_bataldamai');
	}

	function redir_sub_insolven(){
		$this->setParams();
		redirect('sub_insolven');
	}

	function redir_sub_pemberesan(){
		$this->setParams();
		redirect('sub_pemberesan');
	}

	function redir_sub_biayapenyelesaian(){
		$this->setParams();
		redirect('sub_biayapenyelesaian');
	}

	function redir_sub_pengakhiran(){
		$this->setParams();
		redirect('sub_pengakhiran');
	}

	function redir_sub_pengumuman(){
		$this->setParams();
		redirect('sub_pengumuman');
	}

	function redir_sub_laporankurator(){
		$this->setParams();
		redirect('sub_laporankurator');
	}

	function redir_sub_rehabilitasi(){
		$this->setParams();
		redirect('sub_rehabilitasi');
	}

	function redir_perbaikan_gugatan(){
		$this->setParams();
		redirect('perbaikan_gugatan');
	}


	function redir_detil_delegasi(){
		$segment = $this->uri->segment_array();
		$this->nativesession->set_flash_session('encalur', $this->uri->segment(2));
		$this->nativesession->set_flash_session('encperkara', $this->uri->segment(3));
		$this->nativesession->set_flash_session('encpnasal', $this->uri->segment(4));
		$this->nativesession->set_flash_session('encpntujuan', $this->uri->segment(5));
		redirect('detil_delegasi');
	}
	function setParams(){
		$segment = $this->uri->segment_array();
		$this->nativesession->set_flash_session('enc', $this->uri->segment(2));
	}

	
}