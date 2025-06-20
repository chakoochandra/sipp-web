<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statistik_perkara extends CI_Controller {

	function index(){
		$data['page_title'] = 'STATISTIK PERKARA';
		$data['idalurperkara'] = '-1';
		$data['idtahapan'] = 10;

		$data['enc'] = base64_encode($this->encrypt->encode('var_id=-1;var_tahapan=10;'));
		$this->nativesession->set_flash_session('params','var_id=-1;var_tahapan=10;');
		$this->session->set_userdata('asc_desc','DESC');
		$this->load->model('perkara/statistik_m','statistik');
		$tahun=$this->input->post('tahun',TRUE);
		$bulan=$this->input->post('bulan',TRUE);
		$data['tahun_terpilih']=($tahun=='' ? (date('Y')) : $tahun);
		$data['bulan_terpilih']=($bulan=='' ? (date('m')) : $bulan);
	
		$data['nama_bulan']=array('01'=>'Januari', '02'=>'Februari', '03'=>'Maret', '04'=>'April', 
							'05'=>'Mei', '06'=>'Juni', '07'=>'Juli', '08'=>'Agustus', '09'=>'September', 
							'10'=>'Oktober', '11'=>'November', '12'=>'Desember');
		$data['tahun_perkara']=$this->statistik->getTahunPerkara();


		//equalizr 29 januari 2022
		$cek_jenis_pengadilan = $this->db->query("SELECT * FROM sys_config WHERE id = 83")->result_object();
		foreach ($cek_jenis_pengadilan as $row){
			$jns = $row->value;
		}
		if($jns==2){
			$cek_menu_dilmiltama = $this->db->query("SELECT * FROM sys_config WHERE value LIKE '%utama%' AND id = 62");
			if ($cek_menu_dilmiltama->num_rows()>0){
				$data['data_keyindikator']=$this->statistik->getIndikatorTama($tahun,$bulan);
			} else {
				$data['data_keyindikator']=$this->statistik->getIndikatorMil($tahun,$bulan);
			}
		} else {
			$data['data_keyindikator']=$this->statistik->getIndikator($tahun,$bulan);
		}

		$this->load->view('header');
		$this->load->vars($data);
		$this->load->view('statistik/dashboard');
		$this->load->view('footer');
	}
}
