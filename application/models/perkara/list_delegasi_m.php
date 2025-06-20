<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class List_delegasi_m extends CI_Model
{
	function getJenisPerkara($idalurperkara)
	{
		if (empty($idalurperkara)) return '';
		try {
			$this->db->where('id', $idalurperkara);
			$result = $this->db->get('alurperkara');
			if ($result->num_rows > 0) {
				return $result->row()->nama;
			} else {
				return 'Alur Perkara Tidak Ditemukan';
			}
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function isNomorPerkara($txt)
	{
		$re1 = '(\\d+)';	# Integer Number 1
		$re2 = '(\\/)';	# Any Single Character 1
		$re3 = '.*?';	# Non-greedy match on filler
		$re4 = '(\\/)';	# Any Single Character 2
		$re5 = '((?:(?:[1]{1}\\d{1}\\d{1}\\d{1})|(?:[2]{1}\\d{3})))(?![\\d])';	# Year 1
		$re6 = '(\\/)';	# Any Single Character 3
		$re7 = '(PN)';	# Variable Name 1
		if ($c = preg_match_all("/" . $re1 . $re2 . $re3 . $re4 . $re5 . $re6 . $re7 . "/is", $txt, $matches)) {
			$int1 = $matches[1][0];
			$c1 = $matches[2][0];
			$c2 = $matches[3][0];
			$year1 = $matches[4][0];
			$c3 = $matches[5][0];
			$var1 = $matches[6][0];
			return 1;
		} else {
			return 0;
		}
	}

	function parseOrderby($col, $idalurperkara)
	{
		if ($col == 1) {
			if ($idalurperkara == 1) {
				return "pn_asal_text";
			}
			if ($idalurperkara == 2) {
				return "pnTujuanText";
			}
		} else if ($col == 2) {
			return "noPerkara";
		} else if ($col == 3) {
			return "tglSurat";
		} else if ($col == 4) {
			return "nomorSurat";
		} else if ($col == 5) {
			return "jenis_delegasitext";
		} else if ($col == 6) {
			return "statusDelegasi";
		} else {
			return "tglDelegasi";
		}
	}

	function getPerkaraList($idalurperkara = '', $col = 2, $type = 'DESC', $begin = 0, $key = '')
	{
		$orderby = $this->parseOrderby($col, $idalurperkara);
		$where = $where_like = '';
		if (!empty($key)) {
			if ($this->isNomorPerkara($key)) {
				$where_like = " WHERE noPerkara = '" . $key . "' ";
			} elseif (is_numeric($key)) {
				$where_like = " WHERE noPerkara LIKE '" . $key . "%' ";
			} else {
				$where_like = " WHERE (pnAsalText LIKE '%" . $key . "%' OR pnTujuanText LIKE '%" . $key . "%' OR noPerkara LIKE '%" . $key . "%' OR kodeSatkerTujuan LIKE '%" . $key . "%' OR tglDelegasi LIKE '%" . $key . "%' OR tglSurat LIKE '%" . $key . "%' OR tglPengiriman LIKE '%" . $key . "%') ";
			}
		}
		// print_r($where_like);die;
		if ($idalurperkara == 1) {
			$dbName = 'masuk';
		} else {
			$dbName = 'keluar';
		}
		try {
			$query = $this->db->query("SELECT SQL_CALC_FOUND_ROWS * FROM delegasi" . $dbName . "web" . $where_like . " " . $where . " ORDER BY " . $orderby . " " . $type . " ,tglDelegasi DESC LIMIT " . $begin . ",20");

			return $query;
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function fecth_data_num()
	{
		$query = $this->db->query("SELECT FOUND_ROWS() as cnt;");
		if ($query->num_rows > 0) {
			foreach ($query->result() as $row) {
				return $row->cnt;
			}
			return $query->num_rows;
		} else {
			return 0;
		}
	}


	function getDetilDelegasi($idalur, $idperkara, $idpnasal, $idpntujuan)
	{
		if ($idalur == 1) {
			$dbName = "masuk";
		} else {
			$dbName = "keluar";
		}
		try {
			$this->db->where('ID', $idperkara);
			$this->db->where('idPNAsal', $idpnasal);
			$this->db->where('idPNTujuan', $idpntujuan);
			return $this->db->get('delegasi' . $dbName . 'web');
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function getDelegasiProses($idalur, $idperkara, $idpnasal, $idpntujuan)
	{
		if ($idalur == 1) {
			$dbName = "masuk";
		} else {
			$dbName = "keluar";
		}
		try {
			$this->db->where('IDDelegasi', $idperkara);
			$this->db->where('idPNAsal', $idpnasal);
			$this->db->where('idPNTujuan', $idpntujuan);
			return $this->db->get('delegasiproses' . $dbName . 'web');
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}
}
