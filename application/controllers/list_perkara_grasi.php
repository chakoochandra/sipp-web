<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class List_perkara_grasi extends CI_Controller {
	public function index(){
		$data['page_title'] = 'DATA SELURUH PERKARA';
		$data['idalurperkara'] = '-1';
		$data['idtahapan'] = 10;
		$data['enc'] = base64_encode($this->encrypt->encode('var_id=-1;var_tahapan=10;'));
		$this->nativesession->set_flash_session('params','var_id=-1;var_tahapan=10;');
		$this->session->set_userdata('asc_desc','DESC');
		$this->nativesession->set_flash_session('url_requested', base_url(uri_string()));
		//$this->nativesession->set_flash_session('search_keyword','');
		$this->showpage($data);
	}

	public function type($params){
		$this->nativesession->set_flash_session('params',$params);
		$params = $this->encrypt->decode(base64_decode($params));
		$data = $this->parse_params($params);
		$data['enc'] = base64_encode($this->encrypt->encode($params));
		$this->session->set_userdata('asc_desc','DESC');
		$this->nativesession->set_flash_session('url_requested', base_url(uri_string()));
		$this->showpage($data);
	}

	public function sort($col_sort,$enc_params,$keyword){
		if($keyword=='key'){
			$keyword = '';
		}else{
			$keyword = $this->encrypt->decode(base64_decode($keyword));
		}
		$this->nativesession->set_flash_session('params',$enc_params);
		if($this->session->userdata('asc_desc')){
			if($this->session->userdata('asc_desc')=="DESC"){
				$this->session->set_userdata('asc_desc','ASC');
			}else{
				$this->session->set_userdata('asc_desc','DESC');
			}
		}else{
			$this->session->set_userdata('asc_desc','ASC');
		}
		$params = $this->encrypt->decode(base64_decode($enc_params));
		$data = $this->parse_params($params);
		$data['enc'] = base64_encode($this->encrypt->encode($params));
		$this->showpage($data,$col_sort,0,$keyword);
	}


	public function page($page_number,$params,$keyword,$str_col,$col_sort){
		if($keyword=='key'){
			$keyword = '';
		}else{
			$keyword = $this->encrypt->decode(base64_decode($keyword));
		}
		$params = $this->encrypt->decode(base64_decode($params));
		$data = $this->parse_params($params);
		$data['enc'] = base64_encode($this->encrypt->encode($params));
		$this->nativesession->set_flash_session('page_number',$page_number);
		$this->showpage($data,$col_sort,$page_number,$keyword);
	}

	public function search(){
		if(empty($_POST)){
			$params =  $this->nativesession->get_flash_session('params');
			$this->type($params);
			return;
		}
		$keyword = $this->input->post('search_keyword',TRUE);
		$params = $this->input->post('enc',TRUE);
		$params = $this->encrypt->decode(base64_decode($params));
		$data = $this->parse_params($params);
		$data['enc'] = $this->input->post('enc',TRUE);
		$this->nativesession->set_flash_session('search_keyword',$keyword);
		$this->showpage($data,2,0,$keyword);
	}

	function showpage($data,$col_sort=2,$start_page=0,$keyword=''){
		$ses_keyword = $this->nativesession->get_flash_session('search_keyword_detil');
		if(empty($keyword) AND !empty($ses_keyword))
			$keyword = $ses_keyword;
		//$this->nativesession->set_flash_session('search_keyword',$keyword_non_enc);
		$asc_desc = $this->session->userdata('asc_desc');
		$data['page_active'] =0;
		if(!empty($keyword)){
			$data['keyword_non_enc'] = $keyword;
			$data['keyword'] = base64_encode($this->encrypt->encode($keyword));
			$keyword = $keyword;
		}else{
			$data['keyword'] = 'key';
			$data['keyword_non_enc'] = '';
		}
		
		$ses_page = $this->nativesession->get_flash_session('page_number');
		if($start_page==0 AND !empty($ses_page))
			$start_page == $ses_page;
		if($start_page>0){
			$begin_limit = ($start_page-1)*20;
		}else{
			$begin_limit = 0;
			$start_page = 1;
		}
		$this->load->model('perkara/perkara_m','perkara');
		$data['list_perkara'] = $this->perkara->getPerkaraList($data['idalurperkara'],$col_sort,$asc_desc,$begin_limit,$keyword);
		$data['total_rows'] = $this->perkara->fecth_data_num();

		$data['page_active'] = $begin_limit;
		$data['column_sorted'] = $col_sort;
		$data['page_active'] = $begin_limit;
		if(empty($data['page_title']) AND $data['idalurperkara']!=-1){
			$data['page_title'] = 'DAFTAR PERKARA '.strtoupper($this->perkara->getJenisPerkara($data['idalurperkara']));
		}else{
			$data['page_title'] = 'DATA SELURUH PERKARA';
		}
		
		$data['page_number'] = $start_page;
		$this->nativesession->set_flash_session('page_number',$start_page);
		$data['page_url'] = 'list_perkara';
		$data['main_body'] = 'perkara_list/perkara_list';
		$this->load->vars($data);
		$this->load->view('header');
		$this->load->view('body/body');

	}

	function showpagesearchdetail($data,$col_sort=2,$start_page=0,$where){
		$asc_desc = $this->session->userdata('asc_desc');
		$ses_page = $this->nativesession->get_flash_session('page_number');
		if($start_page==0 AND !empty($ses_page))
			$start_page == $ses_page;
		if($start_page>0){
			$begin_limit = ($start_page-1)*20;
		}else{
			$begin_limit = 0;
			$start_page = 1;
		}
		$data['keyword'] = 'key';
		$data['keyword_non_enc'] = '';
		$this->load->model('perkara/perkara_m','perkara');
		$data['list_perkara'] = $this->perkara->getPerkaraListSearchDetil($where,$col_sort,$asc_desc,$begin_limit);
		$data['total_rows'] = $this->perkara->fecth_data_num();

		$data['page_active'] = $begin_limit;
		$data['column_sorted'] = $col_sort;
		$data['page_active'] = $begin_limit;
		if(!empty($data['idalurperkara']) AND $data['idalurperkara']!=-1){
			$data['page_title'] = 'DAFTAR PERKARA '.strtoupper($this->perkara->getJenisPerkara($data['idalurperkara']));
		}else{
			$data['enc'] = base64_encode($this->encrypt->encode('var_id=-1;var_tahapan=10;'));
			$data['page_title'] = 'DATA SELURUH PERKARA'.$data['idalurperkara'];
		}
		
		$data['page_number'] = $start_page;
		$this->nativesession->set_flash_session('page_number',$start_page);
		$data['page_url'] = 'list_perkara';
		$data['main_body'] = 'perkara_list/perkara_list';
		$this->load->vars($data);
		$this->load->view('header');
		$this->load->view('body/body');

	}

	private function parse_params($params){
		$data['idalurperkara'] = '';
		$data['idtahapan'] = 10;
		if(!empty($params)){
			$tmp = explode(';', $params);
			if(count($tmp)>1){
				$temporary = explode('=', $tmp[0]);
				if(count($tmp)<2){
					echo "Parameter URL Not Setup Correctly";
					exit();
				}
				$data['idalurperkara'] = $temporary[1];

				$temporary = explode('=', $tmp[1]);
				if(count($tmp)<2){
					echo "Parameter URL Not Setup Correctly";
					exit();
				}
				$data['idtahapan'] = $temporary[1];

			}elseif (count($tmp)==1) {
				$temporary = explode('=', $tmp[0]);
				if(count($tmp)<2){
					echo "Parameter URL Not Setup Correctly";
					exit();
				}
				$data['idalurperkara'] = $temporary[1];
			}
			return $data;
		}
		return '';
	}

	function search_detail(){
		$where =  $this->parsePostValue();
		$data['page_title'] = '';
		$data['enc'] = $this->input->post('enc',TRUE);
		$data['idalurperkara'] = $this->encrypt->decode(base64_decode($data['enc']));
		$this->showpagesearchdetail($data,2,0,$where);

	}
	function parsePostValue(){
		$where = '';
		$join = ' ';
		if($this->input->post('id_alur_perkara',TRUE) OR $this->input->post('enc',TRUE)){
			$enc = '';
			if ($this->input->post('enc',TRUE)!=''){
				$enc = $this->input->post('enc',TRUE);
				$idalurperkara = $this->encrypt->decode(base64_decode($enc));
			}
			if($this->input->post('id_alur_perkara',TRUE)){
				if ($this->input->post('id_alur_perkara',TRUE)!=''){
					$idalurperkara = $this->input->post('id_alur_perkara',TRUE);
				}
			}
			if($idalurperkara==-1)
				$idalurperkara = '';
			if(!empty($idalurperkara)){
				$where .= ' (klasifikasiPerkara IN ('.$idalurperkara.')) ';
			}
		}

		if($this->input->post('no_perkara',TRUE)!=''){
			if(!empty($where)){
				$where .= ' AND ';
			}
			if($this->input->post('no_perkara_select',TRUE)==8){
				$where .= " (noPerkara LIKE '%".$this->input->post('noPerkara',TRUE)."%') ";
			}else{
				$where .= " (noPerkara ='".$this->input->post('noPerkara',TRUE)."') ";
			}
		}

		if($this->input->post('from_tgl_pendaftaran',TRUE)){
			$where .= $this->parseWhereOnTanggal($where,'from_tgl_pendaftaran','to_tgl_pendaftaran','tgl_pendaftaran_select','tglPendaftaran');
		}

		if($this->input->post('klasifikasi_perkara',TRUE)){
			if(!empty($where) AND $this->input->post('klasifikasi_perkara',TRUE)!=-1){
				$where .= ' AND ';
			}
			if($this->input->post('klasifikasi_perkara',TRUE) != -1){
				$where .= " (IDJenisPerkara ='".$this->input->post('klasifikasi_perkara',TRUE)."') ";
			}
		}

		if($this->input->post('para_pihak',TRUE)){
			if(!empty($where))
				$where .= ' AND ';
			$where .= " (pihakPertama LIKE '%".$this->input->post('para_pihak',TRUE)."%' 
				OR pihakKedua LIKE '%".$this->input->post('para_pihak',TRUE)."%'
				OR pihakKetiga LIKE '%".$this->input->post('para_pihak',TRUE)."%'
				OR pihakKeempat LIKE '%".$this->input->post('para_pihak',TRUE)."%') ";
		}

		if($this->input->post('pihak1',TRUE)){
			$where .= " (pihakPertama LIKE '%".$this->input->post('pihak1',TRUE)."%') ";
		}

		if($this->input->post('pihak2',TRUE)){
			if(!empty($where))
				$where .= ' AND ';
			$where .= " (pihakKedua LIKE '%".$this->input->post('pihak2',TRUE)."%') ";
		}

		if($this->input->post('pihak3',TRUE)){
			if(!empty($where))
				$where .= ' AND ';
			$where .= " (pihakKetiga LIKE '%".$this->input->post('pihak3',TRUE)."%') ";
		}

		if($this->input->post('from_tgl_putusan',TRUE)){
			$where .= $this->parseWhereOnTanggal($where,'from_tgl_putusan','to_tgl_putusan','putusan_select','tglPutusan');
		}

		if($this->input->post('from_tgl_minutasi',TRUE)){
			$where .= $this->parseWhereOnTanggal($where,'from_tgl_minutasi','to_tgl_minutasi','minutasi_select','tglMinutasi');
		}

		if($this->input->post('id_putusan',TRUE)){
			if(!empty($where) AND $this->input->post('id_putusan',TRUE)!=-1){
				$where .= ' AND ';
			}
			if($this->input->post('id_putusan',TRUE) != -1){
				if($this->input->post('id_putusan',TRUE)>7){
					$where .= " (status_putusan_id ='".$this->input->post('id_putusan',TRUE)."') ";
				}else{
					$where .= " (status_putusan_id LIKE '%".$this->input->post('id_putusan',TRUE)."%') ";
				}
			}
		}
		if($this->input->post('id_proses',TRUE)!=-1){
			if(!empty($where)){
				$where .= ' AND ';
			}
			if($this->input->post('id_proses',TRUE) != -1){
				if($this->input->post('proses_select',TRUE)==8){
					$join .= ' LEFT JOIN perkaraprosesweb ON perkaraprosesweb.IDPerkara = dataumumweb.IDPerkara ';
					$where .= " (perkaraprosesweb.IDProses = '".$this->input->post('id_proses',TRUE)."') ";
				}else{
					$cond = $this->getSimbolValue($this->input->post('proses_select',TRUE));
					$where .= " (IDProses ".$cond." '".$this->input->post('id_proses',TRUE)."') ";
				}
			}
		}
		if($this->input->post('hakim',TRUE)!=''){
			if(!empty($where)){
				$where .= ' AND ';
			}
			$join .= ' LEFT JOIN hakimweb ON hakimweb.IDPerkara = dataumumweb.IDPerkara ';
			$where .= " (hakimweb.nama LIKE '%".$this->input->post('hakim',TRUE)."%')";
		}
		/*
		if(!empty($where))
			$where = ' WHERE '.$where;
		$sql = ' SELECT * FROM dataumumweb '.$join.' '.$where;*/
		if(!empty($where))
			$where = ' WHERE '.$where;
		return $join.$where;
	}

	function parseWhereOnPihak($where,$pihakNo,$col){
		if($this->input->post($pihakNo,TRUE)){
			$wheres='';
			if(!empty($where) AND $this->input->post($pihakNo,TRUE)!=''){
				$wheres .= ' AND ';
			}
			if($this->input->post($pihakNo,TRUE) != ''){
				$wheres .= " (".$col." LIKE '%".$this->input->post($pihakNo,TRUE)."%') ";
			}
		}
		return $wheres;
	}
	
	function parseWhereOnTanggal($where,$from,$to,$select,$col){
		if($this->input->post($from,TRUE)){
			$wheres='';
			if(!empty($where) AND $this->input->post($from,TRUE)!=''){
				$wheres .= ' AND ';
			}
			if($this->input->post($select,TRUE)==6){
				if($this->input->post($to,TRUE)==''){
					$date = $this->tanggalhelper->convertToMysqlDate($this->input->post($from,TRUE));
					$wheres .= " (".$col." ='".$date."') ";
				}else{
					$dateFrom = $this->tanggalhelper->convertToMysqlDate($this->input->post($from,TRUE));
					$dateTo = $this->tanggalhelper->convertToMysqlDate($this->input->post($to,TRUE));
					$wheres .= " (".$col." >='".$dateFrom."' AND ".$col." <= '".$dateTo."') ";
				}
			}else{
				$date = $this->tanggalhelper->convertToMysqlDate($this->input->post($from,TRUE));
				$cond = $this->getSimbolValue($this->input->post($select,TRUE));
				$wheres .= " (".$col." ".$cond." '".$date."') ";
			}
		}
		return $wheres;
	}
	
	function getColumnName($val){
		if($val=='alur'){
			return "klasifikasiPerkara";
		}elseif($val=='klasifikasi_perkara'){
			return "IDJenisPerkara";
		}elseif($val=='id_proses'){
			return "IDProses";
		}elseif($val=='pihak1'){
			return "pihakPertama";
		}elseif($val=='pihak2'){
			return "pihakKedua";
		}elseif($val=='pihak3'){
			return "pihakKetiga";
		}elseif($val=='pihak3'){
			return "pihakKeempat";
		}
	}

	function getSimbolValue($val){
		if($val<0 OR $val>8 OR $val==1){
			return " = ";
		}elseif ($val==2) {
			return " > ";
		}elseif ($val==3) {
			return " >= ";
		}elseif ($val==4) {
			return " < ";
		}elseif ($val==5) {
			return " <= ";
		}elseif ($val==6) {
			return " AND ";
		}elseif ($val==7) {
			return " != ";
		}elseif ($val==8) {
			return " LIKE ";
		}
	}
}