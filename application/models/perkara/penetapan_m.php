<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penetapan_m extends CI_Model{
	function get_info_penetapan_hakim($idperkara){
		try {
			return $this->db->query('SELECT * FROM hakimweb WHERE IDTahapan = 10 AND IDPerkara='.$idperkara.' ORDER BY tglPenetapan,urutan ASC;');
		} catch (Exception $e) {
			return '';
		}
	}

	function get_info_penetapan_pp($idperkara){
		try {
			return $this->db->query('SELECT * FROM ppweb WHERE IDTahapan = 10 AND IDPerkara='.$idperkara.' ORDER BY tglPenetapan,nama ASC;');
		} catch (Exception $e) {
			return '';
		}
	}

	function get_info_penetapan_jurusita($idperkara){
		try {
			return $this->db->query('SELECT * FROM jurusitaweb WHERE IDTahapan = 10 AND IDPerkara='.$idperkara.' ORDER BY tglPenetapan,nama ASC;');
		} catch (Exception $e) {
			return '';
		}
	}

	function get_info_penetapan_sidang($idperkara){
		try {
			return $this->db->query('SELECT * FROM sidangpertamaweb WHERE IDPerkara='.$idperkara.';');
		} catch (Exception $e) {
			return '';
		}
	}
	function get_jenis_perkara_id($idperkara){
		try {
			$query = $this->db->query('SELECT IDJenisPerkara FROM dataumumweb WHERE IDPerkara='.$idperkara.';');
			return $query->row()->IDJenisPerkara;
		} catch (Exception $e) {
			return '';
		}
	}
}