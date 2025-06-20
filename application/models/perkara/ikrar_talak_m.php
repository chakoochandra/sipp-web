<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ikrar_talak_m extends CI_Model{
	function get_info_ikrar($idperkara){
		try {
			return $this->db->query('SELECT * FROM ikrarweb AS v LEFT JOIN dataumumweb AS d ON v.IDPerkara = d.IDPerkara WHERE v.IDPerkara='.$idperkara.';');
		} catch (Exception $e) {
			return '';
		}
	}
}