<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mediasi_m extends CI_Model{
	function get_info_mediasi($idperkara){
		try {
			return $this->db->query('SELECT * FROM mediasiweb WHERE IDTahapan = 10 AND IDPerkara='.$idperkara.' ORDER BY tglPenetapan ASC;');
		} catch (Exception $e) {
			return '';
		}
	}
}