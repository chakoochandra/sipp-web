<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pk_m extends CI_Model{

	function getDataPK($idperkara){
		try {
			$this->db->where('IDPerkara',$idperkara);
			return $this->db->get('pkweb');
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function getDataPKDetil($idperkara){
		try {
			$this->db->where('IDPerkara',$idperkara);
			return $this->db->get('pkdetilweb');
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function getDataMediasiPK($idperkara){
		try {
			$this->db->where('IDPerkara',$idperkara);
			$this->db->where('IDTahapan',40);
			return $this->db->get('mediasiweb');
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function get_info_mediasi($idperkara){
		try {
			return $this->db->query('SELECT * FROM mediasiweb WHERE IDTahapan = 40 AND IDPerkara='.$idperkara.' ORDER BY tglPenetapan ASC;');
		} catch (Exception $e) {
			return '';
		}
	}

}