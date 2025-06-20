<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Model{

	

	function getKlasifikasiPerkara(){
		try {
			return $this->db->query("SELECT * FROM jenisperkaraweb ORDER BY nama ASC;");
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function getJenisPutusanPerkara($idalurperkara,$jenis_pengadilan){
		try {
			if($idalurperkara<100)
				$where = 'IDJenisPerkara = 1 AND jenis_pengadilan = '.$jenis_pengadilan.' ';
			elseif($idalurperkara>100)
				$where = 'IDJenisPerkara = 2 AND jenis_pengadilan = '.$jenis_pengadilan.' ';
			else
				$where = 'IDJenisPerkara = '.$jenis_pengadilan.' ';
			return $this->db->query("SELECT id, nama FROM statusputusanweb WHERE ".$where." ORDER BY nama ASC");
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function getTahapanPerkara($jenis_pengadilan){
		try {
			$this->db->where('jenis_pengadilan',$jenis_pengadilan);
			return $this->db->get("tahapan_proses");
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}
	
	function getAlurPerkara(){
		try {
			return $this->db->get("alurperkaraweb");
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function getHakim(){
		try {
			return $this->db->query('SELECT DISTINCT nama FROM hakimweb WHERE nama <> "Belum Dapat Ditampilkan";');
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function getPanitera(){
		try {
			return $this->db->query('SELECT nama,IDPP FROM ppweb WHERE nama <> "Belum Dapat Ditampilkan" GROUP BY nama;');
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function getJurusita(){
		try {
			return $this->db->query('SELECT DISTINCT nama FROM jurusitaweb WHERE nama <> "Belum Dapat Ditampilkan";');
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function getMediator(){
		try {
			return $this->db->get("mediatorweb");
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function getProsesPerkara($idalurperkara){
		try {
			if(!empty($idalurperkara)){
				$this->db->where('idalurperkara',$idalurperkara);
			}
			return $this->db->get("prosesweb");
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}


	function getProsesPerkaraTahapan($idalurperkara,$idtahapan){
		try {
			if(!empty($idalurperkara)){
				$this->db->where_in('alur_perkara_id',$idalurperkara);
			}
			$this->db->where('tahapan_id',$idtahapan);
			return $this->db->get("proses_alur_perkara");
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}



}