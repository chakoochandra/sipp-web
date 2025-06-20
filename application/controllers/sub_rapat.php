<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sub_rapat extends CI_Controller {

    public function index(){
		$enc = $this->nativesession->get_flash_session('enc');
		if(empty($enc)){
			show_404();
		}
		$idperkara = $this->nativesession->get_flash_session('perkara_id');
		$idperkara = $this->encrypt->decode(base64_decode($enc));
		if(!is_numeric($idperkara)){
			echo "ERROR PERKARA NOT FOUND!";
		}		
		$dataparse['enc'] = $enc;

        $encPerkaraId= $this->uri->segment(2);
        $dataParse=array('encryptKategori'=>$this->uri->segment(3),
                'encryptPerkaraId'=>$encPerkaraId,
                'encryptUrutanPascaPailit'=>$this->uri->segment(4)
        );
        $this->load->vars($dataParse);
        $this->load->view("perkara_tab/pasca_pailit/sub_rapat");
    }
}