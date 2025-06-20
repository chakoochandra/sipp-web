<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dismissal_m extends CI_Model{
	function get_info_dismissal($idperkara){
		try {
			return $this->db->query('SELECT * FROM perkaraputusanweb WHERE IDStatusPutusan = 28 AND IDPerkara='.$idperkara.';');
		} catch (Exception $e) {
			return '';
		}
	}

	function get_info_pen_dismissal($idperkara){
		try {
			return $this->db->query('SELECT tglPenetapan AS tglPutusan,amar,hasil,pemberitahuanPenggugat,pemberitahuanTergugat FROM penetapandismissalweb WHERE IDPerkara='.$idperkara.';');
		} catch (Exception $e) {
			return '';
		}
	}

	function get_info_panggilan($idperkara){
		try {
			return $this->db->query('SELECT * FROM panggilandismissalweb WHERE IDPerkara='.$idperkara.' ORDER BY tglPanggilan;');
		} catch (Exception $e) {
			return '';
		}
	}

	function get_info_pemberitahuan_putusan($idperkara){
		try {
			return $this->db->query('SELECT * FROM putusanpemberitahuanweb WHERE IDPerkara='.$idperkara.';');
		} catch (Exception $e) {
			return '';
		}
	}
}