<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penetapan_gugur_m extends CI_Model{
	function get_info_gugur($idperkara){
		try {
			return $this->db->query('SELECT * FROM perkaraputusanweb WHERE IDStatusPutusan = 29 AND IDPerkara='.$idperkara.';');
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