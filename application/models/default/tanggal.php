<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tanggal extends CI_Model{

	function getIDAlurPerkara($idperkara){
		try {
			$result = $this->db->query('SELECT klasifikasiPerkara FROM dataumumweb WHERE IDPerkara ='.$idperkara);
			if($result->num_rows>0){
				return $result->row()->klasifikasiPerkara;
			}else{
				return '';
			}
		} catch (Exception $e) {
			return '';
		}
	}

	function getNomorPerkara($idperkara){
		try {
			$result = $this->db->query('SELECT nomor_perkara FROM dataumumweb WHERE perkara_id ='.$idperkara);
			if($result->num_rows>0){
				return $result->row()->nomor_perkara;
			}else{
				return '';
			}
		} catch (Exception $e) {
			return '';
		}
	}

	function getJenisPengadilan(){
		try {
			$result = $this->db->query('SELECT value FROM sys_config WHERE id = 83;');
			if($result->num_rows>0){
				return $result->row()->value;
			}else{
				return 1;
			}
		} catch (Exception $e) {
			return '';
		}
	}
}