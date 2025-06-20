<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sub_pemberesan extends CI_Controller {
    public function index(){
		//
		$enc = $this->nativesession->get_flash_session('enc');
		if(empty($enc)){
			show_404();
		}
		$idperkara = $this->nativesession->get_flash_session('perkara_id');
		$idperkara = $this->encrypt->decode(base64_decode($enc));
		if(!is_numeric($idperkara)){
			echo "ERROR PERKARA NOT FOUND!";
		}		
		$data['enc'] = $enc;
		$urutan_pasca = $this->db->query("SELECT COUNT(*) as jmlpasca from perkarapascapailitweb where IDPerkara=".$idperkara)->row()->jmlpasca;
        $data['urutan_enc'] = base64_encode($this->encrypt->encode($urutan_pasca));

		$this->load->model('perkara/putusan_m','perkara_sub');

        $this->load->view("perkara_tab/pasca_pailit/sub_pemberesan",$data);
    }

    public function harta_pailit(){
        $segment = $this->uri->segment_array();
        $data['enc']= $this->uri->segment(2);
        $idperkara = $this->encrypt->decode(base64_decode($data['enc']));
        $data['idperkara'] = $idperkara;
        
        $data['harta_pailit'] = $this->db->query("SELECT * FROM penjualanhartapailitweb where jenisHartaPailit=1");
        $data['appraisal'] = $this->db->query("SELECT * FROM penjualanhartapailitweb where jenisHartaPailit=2");
        $data['lap_lelang'] = $this->db->query("SELECT * FROM penjualanhartapailitweb where jenisHartaPailit=3");
        $this->load->view("perkara_tab/pasca_pailit/tab_sub_harta_pailit",$data);
    }    

    public function pembagian_harta_pailit(){
        $segment = $this->uri->segment_array();
        $data['enc']= $this->uri->segment(2);
        $idperkara = $this->encrypt->decode(base64_decode($data['enc']));
        
        $data['pembagian_harta_pailit'] = $this->db->query("SELECT * FROM penjualanhartapailitweb where jenisHartaPailit=4");
        $this->load->view("perkara_tab/pasca_pailit/tab_sub_pembagian_harta_pailit",$data);
    } 

    public function keberatan_harta_pailit(){
        $segment = $this->uri->segment_array();
        $data['enc']= $this->uri->segment(2);
        $idperkara = $this->encrypt->decode(base64_decode($data['enc']));
        $data['cek_perkara_id_keberatan'] = $this->db->query("SELECT * FROM perkarajunctoweb where IDAlurPerkara=27 and IDPerkara=".$idperkara)->num_rows();
        if($data['cek_perkara_id_keberatan']>0){
            $perkara_id_keberatan = $this->db->query("SELECT * FROM perkarajunctoweb where IDAlurPerkara=27 and IDPerkara=".$idperkara)->row()->IDPerkaraPailit;
            $data['perkara_keberatan'] = $this->db->query("SELECT * FROM dataumumweb where IDPerkara=".$perkara_id_keberatan);
        }
        $this->load->view("perkara_tab/pasca_pailit/tab_sub_keberatan_harta_pailit",$data);
    } 

    public function tindakan_hakim_pengawas(){
        $segment = $this->uri->segment_array();
        $data['enc']= $this->uri->segment(2);
        $idperkara = $this->encrypt->decode(base64_decode($data['enc']));
        
        $data['tindakan_hakim_pengawas'] = $this->db->query("SELECT * FROM penjualanhartapailitweb where jenisHartaPailit=4");
        $this->load->view("perkara_tab/pasca_pailit/tab_sub_tindakan_hakim_pengawas",$data);
    } 

  
}