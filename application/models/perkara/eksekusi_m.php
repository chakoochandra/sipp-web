<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eksekusi_m extends CI_Model{

	function getDataEksekusi($idperkara){
		try {
			$this->db->where('IDPerkara',$idperkara); 
			return $this->db->get('eksekusiweb');
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function getDataEksekusiDetil($idperkara){
		try {
			$this->db->where('IDPerkara',$idperkara); 
			return $this->db->get('eksekusidetilweb');
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}
}