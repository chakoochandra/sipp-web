<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Putusan_sela_m extends CI_Model{
	function get_info_putusan_sela($idperkara){
		try {
			return $this->db->query('SELECT * FROM putusanselaweb WHERE IDPerkara='.$idperkara.';');
		} catch (Exception $e) {
			return '';
		}
	}
}