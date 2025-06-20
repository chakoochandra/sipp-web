<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class List_delegasi extends CI_Controller {
	public function index(){
		$data['page_title'] = 'DATA SELURUH PERKARA';
		$data['idalurperkara'] = '-1';
		$data['enc'] = base64_encode($this->encrypt->encode('var_id=-1;'));
		$this->nativesession->set_flash_session('params','var_id=-1;');
		$this->session->set_userdata('asc_desc','DESC');
		$this->showpage($data);
	}

	public function type($params){
		$this->nativesession->set_flash_session('params',$params);
		$params = $this->encrypt->decode(base64_decode($params));
		$data = $this->parse_params($params);
		$data['enc'] = base64_encode($this->encrypt->encode($params));
		$this->session->set_userdata('asc_desc','DESC');
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
		// print_r($keyword);
		// print_r($data);die;
		$this->showpage($data,2,0,$keyword);
	}

	function showpage($data,$col_sort=2,$start_page=0,$keyword=''){
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
		// print_r($data['idalurperkara']);die;
		
		$ses_page = $this->nativesession->get_flash_session('page_number');
		if($start_page==0 AND !empty($ses_page))
			$start_page == $ses_page;
		if($start_page>0){
			$begin_limit = ($start_page-1)*20;
		}else{
			$begin_limit = 0;
			$start_page = 1;
		}
		$this->load->model('perkara/list_delegasi_m','delegasi');
		$data['list_perkara'] = $this->delegasi->getPerkaraList($data['idalurperkara'],$col_sort,$asc_desc,$begin_limit,$keyword);
		$data['total_rows'] = $this->delegasi->fecth_data_num();
		$data['page_active'] = $begin_limit;
		$data['column_sorted'] = $col_sort;
		$data['page_active'] = $begin_limit;
		if(empty($data['page_title'])){
			if ($data['idalurperkara']==1) {
				$data['page_title'] = 'LIST PERKARA - DELEGASI MASUK ';
			}else{
				$data['page_title'] = 'LIST PERKARA - DELEGASI KELUAR ';
			}
		}
		
		$data['page_number'] = $start_page;
		$data['page_url'] = 'list_delegasi';
		$data['main_body'] = 'perkara_list/list_delegasi';
		$this->load->vars($data);
		$this->load->view('header');
		$this->load->view('body/body');

	}
	private function parse_params($params){
		$data['idalurperkara'] = '';
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
		print_r($data['idalurperkara']);
		exit;
		return '';
	}
}