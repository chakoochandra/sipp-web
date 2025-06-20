<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grasi_m extends CI_Model{
	function get_info_grasi($idperkara){
		try {
			return $this->db->query('SELECT * FROM grasiweb WHERE IDPerkara='.$idperkara.';');
		} catch (Exception $e) {
			return '';
		}
	}
	function get_info_perkara_pn($idperkara){
		try {
			return $this->db->query('SELECT * FROM dataumumweb WHERE IDPerkara='.$idperkara.';');
		} catch (Exception $e) {
			return '';
		}
	}
	function get_info_perkara_banding($idperkara){
		try {
			return $this->db->query('SELECT * FROM bandingweb WHERE IDPerkara='.$idperkara.';');
		} catch (Exception $e) {
			return '';
		}
	}
}