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