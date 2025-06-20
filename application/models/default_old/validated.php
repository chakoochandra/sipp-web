<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Validated extends CI_Model{
	function getSystemInfo(){
		try {
            if($this->db=='xxx'){
                show_error('Database belum disetting.');
            }
			$this->db->select('*');
			$this->db->where('id >=', 61); 
			return $this->db->get('sys_config');
		} catch (Exception $e) {
			log_message('error', $e);
		}
	}

    function getSinkronisasi(){
        try {
            return $this->db->query('SELECT time_stamp FROM sys_sinkronisasi WHERE id=1');
        } catch (Exception $e) {
            log_message('error', $e);
        }   
    }

	function getListPihakStatus($idtahapan){
    	try {
    		$this->db->where('IDTahapan',$idtahapan);
            $this->db->select('IDTahapan AS tahapan_id,IDAlurPerkara AS alur_perkara_id,PihakKe AS pihak_ke,nama');
            return $this->db->get('statuspihakweb');
        } catch (Exception $e) {
            return '';
        }
    }

    function getListTahapan(){
        try {
            return $this->db->query('SELECT DISTINCT IDTahapan AS tahapan_id FROM statuspihakweb;');
        } catch (Exception $e) {
            return '';
        }
    }

    function setup(){
        $listTahapan = $this->getListTahapan();
        if($listTahapan!=''){
            foreach ($listTahapan->result() as $row) {
                $tahapan = $this->parseStatusPihak($row->tahapan_id);
                $this->nativesession->set('is_status_pihak', TRUE);
                $this->nativesession->set('var_'.$row->tahapan_id, $tahapan);
            }
        }
	}

    function parseStatusPihak($idtahapan){
    	$listStatusPihak = $this->getListPihakStatus($idtahapan);
    	$statuspihak = '';
    	if($listStatusPihak!=''){
			if($listStatusPihak->num_rows>0){
				foreach ($listStatusPihak->result() as $row) {
					$statuspihak[$row->alur_perkara_id] = $this->parsePihakKe($listStatusPihak,$row->alur_perkara_id);
				}
			}else{
				$this->error_handle();
			}
		}else{
			$this->error_handle();
		}

		return $statuspihak;
    }

    function parsePihakKe($listStatusPihak,$idalurperkara){
    	$listpihakke = '';
    	foreach ($listStatusPihak->result() as $row) {
    		if($row->alur_perkara_id==$idalurperkara){
    			$listpihakke[$row->pihak_ke] = $row->nama;
    		}
		}
		return $listpihakke;
    }

    function error_handle(){
    	echo "DATABASE ERROR, TABLE TIDAK DITEMUKAN";
    	exit();
    }
}