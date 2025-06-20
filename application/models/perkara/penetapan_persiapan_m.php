<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penetapan_persiapan_m extends CI_Model{
	function get_info_penetapan_persiapan($idperkara){
		try {
			return $this->db->query('SELECT * FROM penetapanpersiapanweb WHERE IDPerkara='.$idperkara.';');
		} catch (Exception $e) {
			return '';
		}
	}

	function get_info_jadwal_musyawarah($idperkara){
		try {
			return $this->db->query('SELECT * FROM penetapanpersiapanprosesweb WHERE IDPerkara='.$idperkara.' ORDER BY urutan ASC;');
		} catch (Exception $e) {
			return '';
		}
	}
}