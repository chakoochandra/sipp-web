<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Biaya_perkara_m extends CI_Model{
	function get_info_biaya_perkara($idperkara){
		try {
			return $this->db->query('SELECT * FROM perkarabiayaweb WHERE IDPerkara='.$idperkara.' ORDER BY IDTahapan,tglTransaksi,ID ASC;');
		} catch (Exception $e) {
			return '';
		}
	}
}