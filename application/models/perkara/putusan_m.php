<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Putusan_m extends CI_Model{
	function get_info_putusan($idperkara){
		try {
			return $this->db->query("SELECT p.*,ap.sumber_hukum AS sumberHukumNama FROM perkaraputusanweb AS p
			LEFT JOIN (
			SELECT a.IDPerkara, CONCAT('- ',GROUP_CONCAT(b.nama SEPARATOR '<br>- ')) AS sumber_hukum FROM(
							SELECT t.IDPerkara,SUBSTRING_INDEX(SUBSTRING_INDEX(t.sumberhukum, ',', n.n), ',', -1) id_sumber_hukum
								  FROM perkaraputusanweb t CROSS JOIN 
								(
								   SELECT a.N + b.N * 10 + 1 n
									 FROM 
									(SELECT 0 AS N UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) a
								   ,(SELECT 0 AS N UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) b
									ORDER BY n
								) n
								 WHERE n.n <= 1 + (LENGTH(t.sumberhukum) - LENGTH(REPLACE(t.sumberhukum, ',', ''))) AND t.IDPerkara=".$idperkara." ORDER BY sumberhukum) AS a LEFT JOIN sumberhukumweb AS b ON a.id_sumber_hukum=b.ID
								 GROUP BY a.IDPerkara) AS ap ON p.IDPerkara = ap.IDPerkara
								 WHERE p.IDPerkara = ".$idperkara.";");
		} catch (Exception $e) {
			return '';
		}
	}

	function get_info_putusan_terdakwa($idperkara){
		try {
			return $this->db->query('SELECT * FROM perkaraputusanterdakwaweb WHERE IDPerkara='.$idperkara.';');
		} catch (Exception $e) {
			return '';
		}
	}

	function get_info_pemberitahuan_putusan($idperkara){
		try {
			return $this->db->query('SELECT * FROM putusanpemberitahuanweb WHERE IDPerkara='.$idperkara.';');
		} catch (Exception $e) {
			return '';
		}
	}

	//equalizr 23 oktober 2021
	function get_info_putusan_pkpu_sementara($idperkara){
		try {
			return $this->db->query('SELECT * FROM perkaraputusanpkpusementaraweb WHERE IDPerkara='.$idperkara.';');
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

	function get_info_pengurus($idperkara){
		try {
			return $this->db->query('SELECT * FROM kuratorweb WHERE jenis = 2 AND IDPerkara='.$idperkara.';');
		} catch (Exception $e) {
			return '';
		}
	}
	
	//equalizr edit 25 nov 2021
	function get_info_laporan_pengurus($idperkara){
		try {
			return $this->db->query('SELECT * FROM perkaralaporankuratorweb WHERE IDPerkara='.$idperkara.' AND IDPerkaraPascaPailit IS NULL ORDER BY tglLaporan ASC;');
		} catch (Exception $e) {
			return '';
		}
	}

	function get_info_jadwal_rapat($idperkara,$kategori,$jenis){
		try {
			return $this->db->query('SELECT * FROM perkararapatpkpuweb WHERE IDPerkara='.$idperkara.' AND kategoriRapat='.$kategori.' AND IDjenisRapat='.$jenis.' ORDER BY tglRapat ASC;');
		} catch (Exception $e) {
			return '';
		}
	}

	function get_info_rencana_perdamaian($idperkara){
		try {
			return $this->db->query('SELECT * FROM perkararapatpkpuweb WHERE IDPerkara='.$idperkara.' AND kategoriRapat=3 ORDER BY tglRapat ASC;');
		} catch (Exception $e) {
			return '';
		}
	}

	function get_info_penetapan_publisitas($idperkara){
		try {
			return $this->db->query('SELECT * FROM penetapanpublisitasweb WHERE IDPerkara='.$idperkara.' AND IDPerkaraPascaPailit IS NULL ORDER BY tglPenetapan ASC;');
		} catch (Exception $e) {
			return '';
		}
	}

	function get_info_laporan_publisitas($idperkara){
		try {
			return $this->db->query('SELECT * FROM laporanpublisitasweb WHERE IDPerkara='.$idperkara.' AND IDPerkaraPascaPailit IS NULL ORDER BY tglPublisitas ASC;');
		} catch (Exception $e) {
			return '';
		}
	}

	//equalizr 26 oktober 2021
	function get_info_tindakan_hakim_pengawas($idperkara,$kategori,$jenis){
		try {
			return $this->db->query('SELECT * FROM tindakanhakimpengawasweb WHERE IDPerkara='.$idperkara.' AND kategoriRapat='.$kategori.' AND IDJenisRapat='.$jenis.' ORDER BY tglSurat ASC;');
		} catch (Exception $e) {
			return '';
		}
	}

	function get_info_bantahan_tagihan($idperkara){
		try {
			return $this->db->query('SELECT * FROM bantahantagihanweb WHERE IDPerkara='.$idperkara.' AND IDPerkaraPascaPailit IS NULL ORDER BY tglPengajuan ASC;');
		} catch (Exception $e) {
			return '';
		}
	}

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

	//equalizr 26 nov 2021
	function get_info_pembetulan_ba($idperkara){
		try {
				$qry="SELECT p.IDPerkara,
							p.noPerkara,
							p.tglPendaftaran,
							p.jenisPerkara,
							p.statusAkhir
						FROM perkarajunctoweb pj
							LEFT JOIN dataumumweb p ON p.IDPerkara=pj.IDPerkaraPailit
						WHERE pj.IDPerkara=".$idperkara." AND pj.IDAlurPerkara=25";
			return $this->db->query($qry);
		} catch (Exception $e) {
			return '';
		}
	}

	function get_jenis_perkara_id($idperkara){
		try {
			$query = $this->db->query('SELECT IDJenisPerkara FROM dataumumweb WHERE IDPerkara='.$idperkara.';');
			return $query->row()->IDJenisPerkara;
		} catch (Exception $e) {
			return '';
		}
	}

}