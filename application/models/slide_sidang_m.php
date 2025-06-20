<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slide_sidang_m extends CI_Model{
	function getJadwalSidang($alurPerkara,$tanggalSidang){
		try {
			$query = "SELECT a.*, a.IDPerkara,b.pihakPertama,b.jenisPerkara, b.klasifikasiPerkara, b.noPerkara, b.IDPerkara AS perkaraid
										FROM jadwalsidangweb AS a 
										LEFT JOIN dataumumweb AS b ON b.IDPerkara=a.IDPerkara
				WHERE a.tglSidang='".$tanggalSidang."' ";
			
			$sql=$this->db->query($query);
			return $sql;
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function getNamaPN(){
		try {
			$sql=$this->db->query("SELECT value AS namaPN FROM sys_config WHERE NAME='NamaPN'");
			return $sql->result();
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

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
}
?>