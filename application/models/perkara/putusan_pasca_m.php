<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Putusan_pasca_m extends CI_Model{

	function get_info_putusan_pkpu_tetap($idperkara,$tahap){
		try {
			if ($tahap == 1){
				return $this->db->query('SELECT * FROM perkaraputusanpkputetapweb WHERE IDPerkara='.$idperkara.' AND urutan = 1;');
			} else if ($tahap > 1){
				return $this->db->query('SELECT * FROM perkaraputusanpkputetapweb WHERE IDPerkara='.$idperkara.' AND urutan > 1;');
			}
		} catch (Exception $e) {
			return '';
		}
	}
	
	function get_info_pemungutan_suara($idperkara){
		try {
			return $this->db->query('SELECT * FROM hasilpemungutansuaraweb WHERE IDPerkara='.$idperkara.' AND IDPerkaraPascaPailit IS NULL;');
		} catch (Exception $e) {
			return '';
		}
	}

	function get_info_pembatalan_perdamaian($idperkara){
		try {
			return $this->db->query('SELECT a.noPerkara, a.tglPendaftaran, a.jenisPerkara, a.statusAkhir, b.IDPerkaraPailit
			FROM dataumumweb as a
			LEFT JOIN perkarajunctoweb as b ON a.IDPerkara=b.IDPerkaraPailit
			WHERE b.IDPerkara='.$idperkara.' AND b.IDAlurPerkara = 24
			ORDER BY a.tglPendaftaran ASC;');
		} catch (Exception $e) {
			return '';
		}
	}

	//equalizr 25 nov 2021
	function get_info_hakim_pemeriksa($idperkara){
		try {
			return $this->db->query('SELECT * FROM hakimweb WHERE IDPerkara='.$idperkara.' ORDER BY tglPenetapan,urutan ASC;');
		} catch (Exception $e) {
			return '';
		}
	}

	function get_info_pp_pemeriksa($idperkara){
		try {
			return $this->db->query('SELECT * FROM ppweb WHERE IDPerkara='.$idperkara.' ORDER BY tglPenetapan,nama ASC;');
		} catch (Exception $e) {
			return '';
		}
	}

	function get_info_hakim_pengawas($idperkara){
		try {
			return $this->db->query('SELECT * FROM hakimpengawasweb WHERE IDPerkara='.$idperkara.';');
		} catch (Exception $e) {
			return '';
		}
	}

	function get_info_kurator($idperkara){
		try {
			return $this->db->query('SELECT * FROM kuratorweb WHERE jenis = 1 AND IDPerkara='.$idperkara.';');
		} catch (Exception $e) {
			return '';
		}
	}

	function get_info_rehabilitasi($idperkara){
		try {
				$qry="SELECT p.IDPerkara,
							p.noPerkara,
							p.tglPendaftaran,
							p.jenisPerkara,
							p.statusAkhir
						FROM perkarajunctoweb pj
							LEFT JOIN dataumumweb p ON p.IDPerkara=pj.IDPerkaraPailit
						WHERE pj.IDPerkara=".$idperkara." AND pj.IDAlurPerkara='30'";
						
			return $this->db->query($qry);
		} catch (Exception $e) {
			return '';
		}
	}

	function get_info_lapkurator($idperkara, $where_add = []){
        try{
			if (!empty($where_add)){
				foreach ($where_add as $_key => $_value){
					$where =  "AND ".$_key ."='". $_value."' ";
				}
			} else {
				$where = " ";
			}
			$qry="SELECT * FROM perkaralaporankuratorweb WHERE IDPerkara=".$idperkara." ".$where." AND IDPerkaraPascaPailit IS NOT NULL ORDER BY tglLaporan ASC;";	
			return $this->db->query($qry);
		}catch(exception $e){
            return FALSE;
        }
	}

	function get_info_pengumuman($idperkara){
        try{
			$qry="SELECT * FROM perkarapengumumankepailitanweb WHERE IDPerkara=".$idperkara." ORDER BY tanggal ASC;";
			return $this->db->query($qry);
		}catch(exception $e){
            return FALSE;
        }

	}

	function get_info_gugatanlainlain($idperkara){
		try {
				$qry="SELECT p.IDPerkara,
							p.noPerkara,
							p.tglPendaftaran,
							p.jenisPerkara,
							p.statusAkhir
						FROM perkarajunctoweb pj
							LEFT JOIN dataumumweb p ON p.IDPerkara=pj.IDPerkaraPailit
						WHERE pj.IDPerkara=".$idperkara." ";
						
			return $this->db->query($qry);
		} catch (Exception $e) {
			return '';
		}
	}

	function get_info_cabut($idperkara){
        try{
			$qry="SELECT 
			j.IDPerkaraPailit,
			p.noPerkara,
			p.jenisPerkara,
			p.tglPendaftaran,
			p.statusAkhir
			FROM perkarajunctoweb AS j 
			LEFT JOIN dataumumweb AS p ON p.IDPerkara=j.IDPerkaraPailit
			WHERE j.IDPerkara=".$idperkara." AND j.IDAlurPerkara=26 
			ORDER BY j.urutan ASC;";
			return $this->db->query($qry);
		}catch(exception $e){
            return '';
        }
	}

	function get_info_insolvensi($idperkara){
		try {
			return $this->db->query('SELECT * FROM perkararapatpascakepailitanweb WHERE IDPerkaraPascaPailit='.$idperkara.' AND kategoriRapat=5 ORDER BY tglRapat ASC;');
		} catch (Exception $e) {
			return '';
		}
	}

	//equalizr 1 februari 2022
	public function  ambil_data_publisitas($perkara_pasca_pailit_id,$urutan) {
		try {
			$this->db->select('*');
			$this->db->from('penetapanpublisitasweb');
			$this->db->where('IDPerkaraPascaPailit',$perkara_pasca_pailit_id);
			$this->db->where('IDUrutan',$urutan);
			return $this->db->get();
		} catch (Exception $e) {
			return '';
		}
    }

    public function  ambil_data_publisitas_pkpu($perkara_id) {
		try {
			$this->db->select('*');
			$this->db->from('penetapanpublisitasweb');
			$this->db->where('IDPerkara',$perkara_id);
			return $this->db->get();
		} catch (Exception $e) {
			return '';
		}
    }


	//equalizr 2 februari 2022
	public function  ambil_lap_publisitas($perkara_pasca_pailit_id,$urutan) {
		try {
			$this->db->select('*');
			$this->db->from('laporanpublisitasweb');
			$this->db->where('IDPerkaraPascaPailit',$perkara_pasca_pailit_id);
			$this->db->where('IDUrutan',$urutan);
			$this->db->order_by('ID desc');
			return $this->db->get();
		} catch (Exception $e) {
			return '';
		}
    }

    public function  ambil_lap_publisitas_pkpu($perkara_id) {
		try {
			$this->db->select('*');
			$this->db->from('laporanpublisitasweb');
			$this->db->where('IDPerkara',$perkara_id);
			$this->db->order_by('ID desc');
			return $this->db->get();
		} catch (Exception $e) {
			return '';
		}
    }

}