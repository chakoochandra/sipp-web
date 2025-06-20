<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Riwayat_perkara_m extends CI_Model{
	function get_info_riwayat_perkara($idperkara){
		try {
			return $this->db->query('SELECT * FROM perkaraprosesweb WHERE IDPerkara='.$idperkara.' ORDER BY IDProses,tanggal ASC;');
		} catch (Exception $e) {
			return '';
		}
	}
}