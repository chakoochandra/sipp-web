<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verzet_m extends CI_Model{
	function get_info_verzet($idperkara){
		try {
			return $this->db->query('SELECT * FROM verzetweb AS v LEFT JOIN dataumumweb AS d ON v.IDPerkara = d.IDPerkara LEFT JOIN mediasiweb AS m ON v.IDPerkara=m.IDPerkara WHERE v.IDPerkara='.$idperkara.';');
		} catch (Exception $e) {
			return '';
		}
	}
	
}