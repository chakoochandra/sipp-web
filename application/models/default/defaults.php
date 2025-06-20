<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Defaults extends CI_Model{

	function getSystemInfo(){
		try {
			if($this->db=='xxx'){
                show_error('Database belum disetting.');
            }
			$this->db->select('*');
			$this->db->where('id >=', 61); 
			return $this->db->get('sys_config');
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	

	// function getParentMenu3(){
	// 	try {
	// 		$jenispengadilan = $this->session->userdata('jenispengadilan');
	// 		if(empty($jenispengadilan)){
	// 			$jenispengadilan = '-1';
	// 		}
	// 		return $this->db->query("SELECT * FROM menu WHERE publish='Y' AND (jenis_pengadilan IS NULL OR jenis_pengadilan = ".$jenispengadilan.") ORDER BY urutan;");
	// 	} catch (Exception $e) {
	// 		log_message('error', $e);
	// 	}
	// }

	// function getParentMenu2(){
	// 	$cek_jenis_pengadilan = $this->db->query("SELECT * FROM sys_config WHERE id = 83")->result_object();
	// 	foreach ($cek_jenis_pengadilan as $row){
	// 		$jns = $row->value;
	// 	}
	// 	try {
			
	// 		if(empty($jns)) { 
	// 			$jns = '-1'; 
	// 		}
	// 		$cek_menu_dilmiltama = $this->db->query("SELECT * FROM sys_config WHERE value LIKE '%tama%' AND id = 62");
			
	// 		if ($cek_menu_dilmiltama->num_rows() >0){
	// 			$query = $this->db->query("SELECT * FROM menu WHERE id NOT IN (38,39) AND publish='Y' AND (jenis_pengadilan IS NULL OR jenis_pengadilan = '.$jns.') ORDER BY urutan;");
	// 		} else {
	// 			$query = $this->db->query("SELECT * FROM menu WHERE publish='Y' AND (jenis_pengadilan IS NULL OR jenis_pengadilan = '.$jns.') ORDER BY urutan;");
	// 		}
		
		
	// 		return $query;
	// 	} catch (Exception $e) {
	// 		log_message('error', $e);
	// 	}
	// }

	function getParentMenu(){
		try {
			$jenispengadilan = $this->session->userdata('jenispengadilan');
			if(empty($jenispengadilan)){
				$jenispengadilan = '-1';
			}
			$cek_menu_dilmiltama = $this->db->query("SELECT value FROM sys_config WHERE id = 81")->result();
			foreach ($cek_menu_dilmiltama as $row){
				$cek_dilmiltama = $row->value;
			}
			if ($jenispengadilan == 2){
				if ($cek_dilmiltama == 769){
					return $this->db->query("SELECT * FROM menu WHERE publish='Y' AND (jenis_pengadilan IS NULL OR jenis_pengadilan = 2) ORDER BY urutan;");
				} else {
					return $this->db->query("SELECT * FROM menu WHERE id NOT IN (45,46) AND publish='Y' AND (jenis_pengadilan IS NULL OR jenis_pengadilan = 2) ORDER BY urutan;");
				}
			} else {
				return $this->db->query("SELECT * FROM menu WHERE publish='Y' AND (jenis_pengadilan IS NULL OR jenis_pengadilan = ".$jenispengadilan.") ORDER BY urutan;");
			}
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}
}
?>