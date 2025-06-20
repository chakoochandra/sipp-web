<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal_sidang_m extends CI_Model{
	function get_info_jadwal_sidang($idperkara){
		try {
			return $this->db->query('SELECT * FROM jadwalsidangweb WHERE IDPerkara='.$idperkara.' ORDER BY tglSidang;');
		} catch (Exception $e) {
			return '';
		}
	}

	function get_detil_jadwal_sidang($idsidang){
		try {
			return $this->db->query('SELECT a.*,
									 a.IDPerkara,
									 b.jenisPerkara,
									 b.*,
									 b.IDPerkara AS perkaraid,
									 IF(a.sidangKeliling="Y","Ya","Tidak") as sidangkeliling

									FROM jadwalsidangweb AS a 
									LEFT JOIN (SELECT IF(dipublikasikan="Y",pihakKedua,"Tidak dipublikasikan") AS pihak,IDPerkara,jenisPerkara,noPerkara,klasifikasiPerkara FROM dataumumweb) AS b
									ON b.IDPerkara=a.IDPerkara
									WHERE a.ID='.$idsidang.' ORDER BY tglSidang;');
		} catch (Exception $e) {
			return '';
		}
	}
}