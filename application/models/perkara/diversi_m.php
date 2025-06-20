<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Diversi_m extends CI_Model{
	function get_info_diversi($idperkara){
		try {
			return $this->db->query('SELECT * FROM diversiweb WHERE perkara_id='.$idperkara.';');
		} catch (Exception $e) {
			return '';
		}
	}
}