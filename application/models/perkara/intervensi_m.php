<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intervensi_m extends CI_Model{
	function get_info_intervensi($idperkara){
		try {
			return $this->db->query('SELECT * FROM pihakintervensiweb WHERE IDPerkara='.$idperkara.';');
		} catch (Exception $e) {
			return '';
		}
	}
}