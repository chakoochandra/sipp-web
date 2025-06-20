<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class perkara_m extends CI_Model{


	function getDataPenahanan($IDPerkara,$NamaTerdakwa){
		try{
			$this->db->select('penahananweb.*,dataumumweb.noPerkara');
			$this->db->where('penahananweb.IDPerkara',$IDPerkara);
			$this->db->where('penahananweb.terdakwa',$NamaTerdakwa);
			$this->db->order_by('penahananweb.ID','ASC');
			$this->db->join('dataumumweb', 'dataumumweb.IDPerkara=penahananweb.IDPerkara','left');
			return $this->db->get('penahananweb');
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}


	function getJenisPerkara($idalurperkara){
		if(empty($idalurperkara)) return '';
		try {
			$this->db->where('id',$idalurperkara);
			$result = $this->db->get('alurperkaraweb');
			if($result->num_rows>0){
				return $result->row()->nama;
			}else{
				return 'Alur Perkara Tidak Ditemukan';
			}
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}
	
	function isNomorPerkara($txt){
		$re1='(\\d+)';	# Integer Number 1
		$re2='(\\/)';	# Any Single Character 1
		$re3='.*?';	# Non-greedy match on filler
		$re4='(\\/)';	# Any Single Character 2
		$re5='((?:(?:[1]{1}\\d{1}\\d{1}\\d{1})|(?:[2]{1}\\d{3})))(?![\\d])';	# Year 1
		$re6='(\\/)';	# Any Single Character 3
		$re7='(PN)';	# Variable Name 1
		if ($c=preg_match_all ("/".$re1.$re2.$re3.$re4.$re5.$re6.$re7."/is", $txt, $matches)){
		      $int1=$matches[1][0];
		      $c1=$matches[2][0];
		      $c2=$matches[3][0];
		      $year1=$matches[4][0];
		      $c3=$matches[5][0];
		      $var1=$matches[6][0];
		      return 1;
		}else{
			return 0;
		}
	}


	function parseOrderby($col){
		if($col==1){
			return "noPerkara"; 
		}else if($col==2){
			return "tglPendaftaran"; 
		}else if($col==3){
			return "jenisPerkara"; 
		}else if($col==4){
			return "pihakPertama,pihakKedua"; 
		}else if($col==5){
			return "statusAkhir"; 
		}else if($col==6){
			return "statusAkhir"; 
		}else if($col==7){
			return "durasi"; 
		}else{
			return "tglPendaftaran";
		}
	}

	function parseOrderLLby($col){
		if($col==1){
			return "A.noPerkara"; 
		}else if($col==2){
			return "A.tglPendaftaran"; 
		}else if($col==3){
			return "B.nomorTilang"; 
		}else if($col==4){
			return "B.nomorPolisi"; 
		}else if($col==5){
			return "A.pihakKedua"; 
		}else if($col==6){
			return "C.tglSidangPertama"; 
		}else if($col==7){
			return "D.ruangan"; 
		}else{
			return "A.tglPendaftaran";
		}
	}


	function getPerkaraListLL($idalurperkara='',$col=2,$type='DESC',$begin=0,$key=''){
		$orderby = $this->parseOrderLLby($col);
		$where = '';
		
		if($idalurperkara>0){
			$where = "AND A.klasifikasiPerkara IN (".$idalurperkara.")";
		}else{
			$where = "";
		}

		if(!empty($key)){
			if($this->isNomorPerkara($key)){
				$where_like = ' WHERE A.noPerkara = "'.$key.'" ';
			}elseif(is_numeric($key)){
				$where_like = ' WHERE A.noPerkara LIKE "'.$key.'%" ';
			}else{
				$where_like = ' WHERE (
									A.noPerkara LIKE "%'.$key.'%" OR 
									A.tglPendaftaran LIKE "%'.$key.'%" OR 
									A.jenisPerkara LIKE "%'.$key.'%" OR 
									A.pihakKedua LIKE "%'.$key.'%" OR 
									A.statusAkhir LIKE "%'.$key.'%" OR
									B.ditilangOleh LIKE "%'.$key.'%" OR
									B.nomorTilang LIKE "%'.$key.'%" OR
									B.jenisKendaraan LIKE "%'.$key.'%" OR
									B.nomorPolisi LIKE "%'.$key.'%" OR
									B.buktiTilang LIKE "%'.$key.'%") ';
			}
		}else{
			$where_like =" ";
			if($idalurperkara>0){
				$where = " WHERE A.klasifikasiPerkara IN (".$idalurperkara.")";
			}
		}
		try {
			$query = $this->db->query("SELECT 
						SQL_CALC_FOUND_ROWS 
						A.IDPerkara, 
						A.klasifikasiPerkara,
						A.jenisPerkara,
						A.statusAkhir,
						A.noPerkara,
						A.tglPendaftaran, 
						A.pihakKedua,
						(CASE 
							WHEN A.IDProses<220 AND A.tglMinutasi IS NULL THEN DATEDIFF(CURDATE(),A.tglPendaftaran)
							WHEN A.IDProses=220 AND A.tglMinutasi IS NOT NULL THEN DATEDIFF(A.tglMinutasi,A.tglPendaftaran)
							WHEN A.IDProses<220 AND A.tglMinutasi IS NOT NULL THEN DATEDIFF(A.tglMinutasi,A.tglPendaftaran)
							ELSE DATEDIFF(A.tglMinutasi,A.tglPendaftaran) END
						) AS durasi,
						B.ditilangOleh,
						B.nomorTilang,
						B.jenisKendaraan,
						B.nomorPolisi,
						B.buktiTilang,
						C.tglSidangPertama,
						D.ruangan,
						E.amar,
						B.tanggalPenindakan,
						B.jenisTilang,
						B.nomorPembayaran
						FROM dataumumweb AS A
						LEFT JOIN perkaralalulintasweb AS B ON B.IDPerkara=A.IDPerkara
						LEFT JOIN sidangpertamaweb AS C ON C.IDPerkara=A.IDPerkara
						LEFT JOIN jadwalsidangweb AS D ON D.IDPerkara=A.IDPerkara AND D.tglSidang=C.tglSidangPertama 
						LEFT JOIN perkaraputusanweb AS E ON E.IDPerkara=A.IDPerkara 
						".$where_like." ".$where." ORDER BY ".$orderby." ".$type." ,tglPendaftaran DESC LIMIT ".$begin.",20");
			return $query;			
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}


	function getPerkaraList($idalurperkara='',$col=2,$type='DESC',$begin=0,$key=''){
		$orderby = $this->parseOrderby($col);
		$where = '';		

		if($idalurperkara>0){
			$where = "AND klasifikasiPerkara IN (".$idalurperkara.")";
		}else{
			$where = "";
		}

		if(!empty($key)){
			if($this->isNomorPerkara($key)){
				$where_like = ' WHERE noPerkara = "'.$key.'" ';
			}elseif(is_numeric($key)){
				$where_like = ' WHERE noPerkara LIKE "'.$key.'%" ';
			}else{
				$where_like = ' WHERE (noPerkara LIKE "%'.$key.'%" OR tglPendaftaran LIKE "%'.$key.'%" OR jenisPerkara LIKE "%'.$key.'%" OR pihakPertama LIKE "%'.$key.'%" OR pihakKedua LIKE "%'.$key.'%" OR statusAkhir LIKE "%'.$key.'%") ';
			}
		}else{
			$where_like =" ";
			if($idalurperkara>0){
				$where = " WHERE klasifikasiPerkara IN (".$idalurperkara.")";
			}
		}
		try {
			$sql="SELECT 
					SQL_CALC_FOUND_ROWS 
					IDPerkara, 
					klasifikasiPerkara,
					jenisPerkara,
					statusAkhir,
					noPerkara,
					tglPendaftaran,
					pihakPertama, 
					pihakKedua,
					(CASE 
						WHEN IDProses<220 THEN DATEDIFF(CURDATE(),tglPendaftaran)-IFNULL(med.durasi_mediasi,0) 
						ELSE DATEDIFF(tglPutusan,tglPendaftaran)-IFNULL(med.durasi_mediasi,0)END
					)AS durasi 
					FROM dataumumweb
					LEFT JOIN (SELECT IDPerkara AS id_perkara, SUM(DATEDIFF(IF(tglLaporan IS NULL,NOW(),tglLaporan),tglMulaiMediasi)) AS durasi_mediasi FROM mediasiweb WHERE IDTahapan = 10 GROUP BY IDPerkara) AS med ON dataumumweb.IDPerkara = med.id_perkara
					".$where_like." ".$where." ORDER BY ".$orderby." ".$type." ,tglPendaftaran DESC LIMIT ".$begin.",20";
			// print_r($sql);die;
			
			$query = $this->db->query($sql);

			return $query;
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function getPerkaraListSearchDetilLL($where,$col=2,$type='DESC',$begin=0){
		$orderby = $this->parseOrderby($col);
		try {
			$query = $this->db->query("SELECT 
						SQL_CALC_FOUND_ROWS 
						dataumumweb.IDPerkara, 
						dataumumweb.klasifikasiPerkara,
						dataumumweb.jenisPerkara,
						dataumumweb.statusAkhir,
						dataumumweb.noPerkara,
						dataumumweb.tglPendaftaran, 
						dataumumweb.pihakKedua,
						B.ditilangOleh,
						B.nomorTilang,
						B.jenisKendaraan,
						B.nomorPolisi,
						B.buktiTilang,
						C.tglSidangPertama,
						D.ruangan
						B.tanggalPenindakan,
						B.jenisTilang,
						B.nomorPembayaran
						FROM dataumumweb
						LEFT JOIN perkaralalulintasweb AS B ON B.IDPerkara=dataumumweb.IDPerkara
						LEFT JOIN sidangpertamaweb AS C ON C.IDPerkara=dataumumweb.IDPerkara
						LEFT JOIN jadwalsidangweb AS D ON D.IDPerkara=dataumumweb.IDPerkara AND D.tglSidang=C.tglSidangPertama
						 ".$where." GROUP BY dataumumweb.IDPerkara ORDER BY ".$orderby." ".$type." ,dataumumweb.tglPendaftaran DESC LIMIT ".$begin.",20");
			return $query;
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function getPerkaraListSearchDetil($where,$col=2,$type='DESC',$begin=0){
		$orderby = $this->parseOrderby($col);
		try {
			$query = $this->db->query("SELECT 
				SQL_CALC_FOUND_ROWS 
				dataumumweb.IDPerkara, 
				klasifikasiPerkara,
				jenisPerkara,
				statusAkhir,
				noPerkara,
				tglPendaftaran,
				pihakPertama,
				pihakKedua,
				(CASE 
						WHEN IDProses<220 THEN DATEDIFF(CURDATE(),tglPendaftaran)-IFNULL(med.durasi_mediasi,0) 
						ELSE DATEDIFF(tglPutusan,tglPendaftaran)-IFNULL(med.durasi_mediasi,0)END
				)AS durasi 
				FROM dataumumweb 
				LEFT JOIN 
			    (SELECT IDPerkara AS id_perkara, SUM(DATEDIFF( IF(tglLaporan IS NULL, NOW(), tglLaporan), tglMulaiMediasi)) AS durasi_mediasi 
			    FROM mediasiweb WHERE IDTahapan=10 GROUP BY IDPerkara) AS med ON dataumumweb.IDPerkara = med.id_perkara

				".$where." GROUP BY dataumumweb.IDPerkara ORDER BY ".$orderby." ".$type." ,tglPendaftaran DESC LIMIT ".$begin.",20");
			return $query;
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

	function fecth_data_num(){
		$query = $this->db->query("SELECT FOUND_ROWS() as cnt;");
		if($query->num_rows>0){
			foreach ($query->result() as $row) {
				return $row->cnt;
			}
    		return $query->num_rows;
    	}else{
    		return 0;
    	}
	}

	//equalizr 22 Desember 2022
	function get_perbaikan_gugatan($idperkara){
		try {
			return $this->db->query('SELECT * FROM perbaikangugatanweb WHERE IDPerkara='.$idperkara.';');
		} catch (Exception $e) {
			return '';
		}
	}
}