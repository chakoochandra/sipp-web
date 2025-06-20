<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penuntutan_m extends CI_Model{
	function get_info_penuntutan($idperkara){
		try {
			return $this->db->query('SELECT * FROM perkarapenuntutanweb WHERE IDPerkara='.$idperkara.';');
		} catch (Exception $e) {
			return '';
		}
	}
}