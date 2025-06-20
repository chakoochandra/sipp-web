<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kasasi_m extends CI_Model{

	function getDataKasasi($idperkara){
		try {
			$this->db->where('IDPerkara',$idperkara);
			return $this->db->get('kasasiweb');
		} catch (Exception $e) {
			return '';
		}
	}

	function getDataKasasiDetil($idperkara){
		try {
			$this->db->where('IDPerkara',$idperkara);
			$this->db->order_by('IDStatusPihak', 'ASC');
			return $this->db->get('kasasidetilweb');
		} catch (Exception $e) {
			return '';
		}
	}

	function get_info_mediasi($idperkara){
		try {
			return $this->db->query('SELECT * FROM mediasiweb WHERE IDTahapan = 30 AND IDPerkara='.$idperkara.' ORDER BY tglPenetapan ASC;');
		} catch (Exception $e) {
			return '';
		}
	}



}