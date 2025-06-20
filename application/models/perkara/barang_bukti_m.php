<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang_bukti_m extends CI_Model{
	function get_info_barang_bukti($idperkara){
		try {
			return $this->db->query('SELECT * FROM barangbuktiweb WHERE IDPerkara='.$idperkara.';');
		} catch (Exception $e) {
			return '';
		}
	}
}