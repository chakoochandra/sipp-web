<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banding_m extends CI_Model{

	function getDataBanding($idperkara){
		try {
			$this->db->where('IDPerkara',$idperkara);
			return $this->db->get('bandingweb');
		} catch (Exception $e) {
			return '';
		}
	}

	function getDataBandingDetil($idperkara){
		try {
			$this->db->where('IDPerkara',$idperkara);
			$this->db->order_by('IDStatusPihak', 'ASC');
			return $this->db->get('bandingdetilweb');
		} catch (Exception $e) {
			return '';
		}
	}

	function get_info_mediasi($idperkara){
		try {
			return $this->db->query('SELECT * FROM mediasiweb WHERE IDTahapan = 20 AND IDPerkara='.$idperkara.' ORDER BY tglPenetapan ASC;');
		} catch (Exception $e) {
			return '';
		}
	}

}