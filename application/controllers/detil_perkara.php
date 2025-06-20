<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detil_perkara extends CI_Controller {
	function index(){
		$enc = $this->nativesession->get_flash_session('enc');
		if(empty($enc)){ redirect('list_perkara');}
		$idperkara = $this->nativesession->get_flash_session('perkara_id');
		$idperkara = $this->encrypt->decode(base64_decode($enc));
		if(!is_numeric($idperkara)){ redirect('list_perkara'); }
		$this->show_data($idperkara,$enc);
	}

	function show_data($idperkara,$enc){
		$this->load->model('perkara/info_perkara','perkara');
		$query = $this->perkara->getInfoPerkara($idperkara);
		$data['idalurperkara'] = $query->row()->klasifikasiPerkara;
		$data['IDJenisPerkara'] = $query->row()->IDJenisPerkara;
		$data['noPerkara'] = $query->row()->noPerkara;
		$data['tglSurat'] = $query->row()->tglSurat;
		$data['noSurat'] = $query->row()->noSurat;
		$data['idProses'] = $query->row()->IDProses;
		$data['prosesText'] = $query->row()->statusAkhir;
		$data['pihak1'] = $query->row()->pihakPertama;
		$data['pihak2'] = $query->row()->pihakKedua;
		$data['pihak3'] = $query->row()->pihakKetiga;
		$data['pihak4'] = $query->row()->pihakKeempat;
		$data['tglPendaftaran'] = $query->row()->tglPendaftaran;
		$data['statuTerakhir'] = $query->row()->statusAkhir;
		$data['tglPutusan'] = $query->row()->tglPutusan;
		$data['jenisPerkara'] = $query->row()->jenisPerkara;
		$data['isPublish'] = ($query->row()->dipublikasikan=='Y')? 'Ya':'Tidak';
		$data['petitum'] = $query->row()->petitumDakwaan;
		$data['pasalDakwaan'] = $query->row()->pasalDakwaan;
		$data['nilai_sengketa'] = number_format($query->row()->nilai_sengketa,2,",",".");
		$data['prodeo'] = ($query->row()->prodeo=='1')? 'Ya':'Tidak';
		
		if($query->row()->klasifikasiPerkara=='114'){
			$queryLL = $this->perkara->getInfoLalulintas($idperkara);
			$data['ditilangOleh']=$queryLL->row()->ditilangOleh;
			$data['nomorTilang']=$queryLL->row()->nomorTilang;
			$data['jenisKendaraan']=$queryLL->row()->jenisKendaraan;
			$data['nomorPolisi']=$queryLL->row()->nomorPolisi;
			$data['buktiTilang']=$queryLL->row()->buktiTilang;
		}


		$data['idperkara']=$idperkara;
		$data['para_pihak'] = $this->perkara->getInfoPihak($idperkara);
		$data["ada_data_verzet"] = 0;
		$data["ada_data_intervensi"] = 0;
		$data["ada_data_diversi"] = 0;
		$data["ada_data_eksekusi"] = 0;
		$data['terdakwa_tidak_hadir'] = 0;
		$data['ada_data_rekonvensi'] = 0;
		$data["ada_data_banding"] = $this->perkara->getInfoBanding($idperkara);
		$data["ada_data_kasasi"] = $this->perkara->getInfoKasasi($idperkara);
		$data["ada_data_PK"] = $this->perkara->getInfoPK($idperkara);
		$data["ada_data_grasi"] = '';
		$data["ada_data_dismissal"] = 0;
		$data["ada_data_gugur"] = 0;
		$data["ada_data_penuntutan"] = 0;
		$data["ada_data_putusan_sela"] = $this->perkara->getInfoPutusanSela($idperkara);
		$data['ada_data_mediasi'] = 0;
		$data["ikrar_talak"] = 0;
		$data['ada_data_jadwal_sidang'] = $this->perkara->getInfoJadwalSidang($idperkara);;
		$data['ada_data_pen_persiapan'] = $this->perkara->getInfoPenPersiapan($idperkara);
		if($data['idalurperkara']<100){
			$data["ada_data_verzet"] = $this->perkara->getInfoVerzet($idperkara);
			$data["ada_data_rekonvensi"] = $this->perkara->getInfoRekonvensi($idperkara);
			$data["ada_data_intervensi"] = $this->perkara->getInfoIntervensi($idperkara);
			$data["ada_data_eksekusi"] = $this->perkara->getInfoEksekusi($idperkara);
			if($data['idalurperkara']==8){
				$data["ada_data_keberatan"] = $this->perkara->getInfoKeberatan($idperkara);
				$infos = $this->perkara->getInfoPutusanPerdata($idperkara);
				if($infos==28){
					$data["ada_data_dismissal"] = 1;
				}elseif ($infos==29) {
					$data["ada_data_gugur"] = 1;
				}
			}
			$data['ada_data_mediasi'] = $this->perkara->getInfoMediasi($idperkara);
			if($data['idalurperkara']==9){
				$data["ada_data_dismissal"] = $this->perkara->getInfoPenDismissal($idperkara);
			}
		}else{
			$data["ada_data_diversi"] = $this->perkara->getInfoDiversi($idperkara);
			$data["ada_data_grasi"] = $this->perkara->getInfoGrasi($idperkara);
			$data["ada_data_penuntutan"] = $this->perkara->getInfoPenuntutan($idperkara);
			$data['ada_data_korban'] = $this->perkara->getPihakKorban($idperkara);
		}
		//penyesuaian jinayat anak 19 desember 2022 equalizr
		if($data['idalurperkara']==118 || $data['idalurperkara']==125){
			$data['penghentian_perkara'] = $this->perkara->getPenghentianPerkara($idperkara);
		}
		$data['ada_data_saksi'] = $this->perkara->getPihakSaksi($idperkara);

		//penyesuaian perbaikan gugatan 21 desember 2022 equalizr
		$data['ada_perbaikan_gugatan'] = $this->perkara->getInfoPerbaikanGugatan($idperkara);

		if($this->session->userdata('jenispengadilan')==2){
			$queryMatra = $this->perkara->getInfoMatra($idperkara);

			//equalizr 28 januari 2022
			$data['BerkasDari'] 		= $queryMatra->row()->asalBerkas;

			$data['tglKejadian']		= $queryMatra->row()->tglKejadian;
			$data['noSuratDakwaan']		= $queryMatra->row()->noSuratDakwaan;
			$data['tempatKejadian']		= $queryMatra->row()->tempatKejadian;
			$data['tglSkeppera']		= $queryMatra->row()->tglSkeppera;
			$data['penyidik']			= $queryMatra->row()->penyidik;
			$data['noSkeppera']			= $queryMatra->row()->noSkeppera;
			$data['noBAPPenyidik']		= $queryMatra->row()->noBAPPenyidik;
			$data['asalBerkas']			= $queryMatra->row()->asalBerkas;
			$data['pejabatSKeppera']	= $queryMatra->row()->pejabatSkeppera;
			$data['tglPenyidik']		= $queryMatra->row()->tglPenyidik;
			$data['tglSuratDakwaan']	= $queryMatra->row()->tglSuratDakwaan;

		}elseif($this->session->userdata('jenispengadilan')==4){
			$data["ikrar_talak"] = $this->perkara->getInfoIkrarTalak($idperkara);
		}
		
		if($query->row()->klasifikasiPerkara=='19'){
			$kweri = $this->perkara->getInfowekppu($idperkara);
			$data['wekppu']=$kweri;
		}

		//equalizr 23 oktober 2021
		$data['ada_data_put_pkpu_sementara'] = $this->perkara->getInfoPutPKPUSementara($idperkara);
		$data['ada_data_laporan_kurator'] = $this->perkara->getInfoLaporanKurator($idperkara);
		//$data['ada_data_rencana_perdamaian'] = $this->perkara->getInfoRencanaPerdamaian($idperkara);

		//equalizr 28 oktober 2021
		//$data['ada_data_pembatalan_perdamaian'] = $this->perkara->getInfoPembatalanPerdamaian($idperkara);
		
		//equalizr 27 januari 2022
		if($data['idalurperkara']==124){
			$data['pihak_tersangka'] = $this->perkara->getInfoPihakTersangka($idperkara);
		}

		//equalizr 31 januari 2022
		if($data['idalurperkara']==4){
			$data['ada_rapat_pkpu'] 		= $this->perkara->getInfoRapatPKPU($idperkara,4);
			//$data['ada_pts_pkpu_sementara'] = $this->perkara->getInfoPtsPKPUSementara($idperkara);
			$data['ada_rencana_perdamaian'] = $this->perkara->getInfoRapatPKPU($idperkara,3);
			$data['ada_lap_pengurus_pkpu'] = $this->perkara->getLapPengurusPKPU($idperkara);
			$data['ada_batal_damai_pkpu'] = $this->perkara->getJunctoPKPU($idperkara,24);				
		}
		if($data['idalurperkara']==3 OR $data['idalurperkara']==4){
			$data['ada_pasca'] = $this->db->query("SELECT COUNT(IDPerkara) AS ada_pasca FROM perkarapascapailitweb WHERE IDPerkara =".$idperkara)->row()->ada_pasca;
		}	

		$data["pengacara_pihak_pertama"] = $this->perkara->getInfoPengacara($idperkara,1);
		$data["pengacara_pihak_kedua"] = $this->perkara->getInfoPengacara($idperkara,2);
		$data["pengacara_pihak_keempat"] = $this->perkara->getInfoPengacara($idperkara,4);

		$data["ada_penetapan"] = $this->perkara->getInfoPenetapan($idperkara,4);
		
		$data['page_title'] = 'INFORMASI DETAIL PERKARA';
		$data['enc'] = $enc;
		$data['main_body'] = 'detil_perkara/detil_perkara';
		$data['main_history'] = $this->nativesession->get_flash_session('url_requested');
		$data['history'] = $data['main_history'];
		$this->load->vars($data);
		$this->load->view('header');
		$this->load->view('body/body_new');
	}

	function informasi(){
		$this->load->model('perkara/info_perkara','perkara');
		$query = $this->perkara->getSatker();	
		$data['satker'] = ucwords(strtolower($query->row()->value));		
		$this->load->view('detil_perkara/detil_informasi',$data);
	}

}