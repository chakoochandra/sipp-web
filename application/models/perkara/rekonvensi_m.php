<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rekonvensi_m extends CI_Model{
	function get_info_rekonvensi($idperkara){
		try {
			return $this->db->query('SELECT * FROM rekonvensiweb WHERE IDPerkara='.$idperkara.';');
		} catch (Exception $e) {
			return '';
		}
	}
}