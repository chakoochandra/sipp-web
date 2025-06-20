<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keberatan_m extends CI_Model{
	function get_info_keberatan($idperkara){
		try {
			return $this->db->query('SELECT * FROM perkarakeberatanweb WHERE IDPerkara='.$idperkara.';');
		} catch (Exception $e) {
			return '';
		}
	}
}