<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class list_jadwal_sidang_m extends CI_Model{
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
			return "tglSidang"; 
		}else if($col==2){
			return "noPerkara"; 
		}else if($col==3){
			return "sidangKeliling"; 
		}else if($col==4){
			return "ruangan"; 
		}else if($col==5){
			return "agenda"; 
		}else{
			return "tglSidang";
		}
	}

	function getPerkaraList($idalurperkara='',$col=2,$type='DESC',$begin=0,$key='',$tglCari=''){
		$orderby = $this->parseOrderby($col);
		$where = ' ';
		
		if($idalurperkara>0){
			$where = " WHERE klasifikasiPerkara = ".$idalurperkara."";
		}else{
			$where = " WHERE tglSidang=".'"'.date("Y-m-d").'"';
		}

		if(!empty($key)){
			if($this->isNomorPerkara($key)){
				$where_like = ' WHERE noPerkara = "'.$key.'" ';
			}elseif(is_numeric($key)){
				$where_like = ' WHERE noPerkara LIKE "'.$key.'%" ';
			}else{
				$where_like = ' WHERE noPerkara LIKE "%'.$key.'%" OR tglSidang LIKE "%'.$key.'%" OR jamSidang LIKE "%'.$key.'%" OR selesaiSidang LIKE "%'.$key.'%" OR agenda LIKE "%'.$key.'%" OR ruangan LIKE "%'.$key.'%" OR alasanDitunda LIKE "%'.$key.'%" OR dihadiriOleh LIKE "%'.$key.'%"';
			}
		} else {
			$where_like =" ";
		}
		try {
			$query = $this->db->query("SELECT a.*, a.IDPerkara, b.klasifikasiPerkara, b.noPerkara, b.IDPerkara AS perkaraid
										FROM jadwalsidangweb AS a 
										LEFT JOIN dataumumweb AS b ON b.IDPerkara=a.IDPerkara
										".$where_like."
										ORDER BY ".$orderby." ".$type." ,tglSidang DESC LIMIT ".$begin.",100");
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
}