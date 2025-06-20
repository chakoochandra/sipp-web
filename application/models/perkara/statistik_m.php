<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statistik_m extends CI_Model{
	
  function getJenisPerkara($idalurperkaraweb){
    if(empty($idalurperkaraweb)) return '';
    try {
      if($this->db=='xxx'){
        show_error('Database belum disetting.');
      }
      $this->db->where('aktif','Y');
      return $this->db->get('alurperkaraweb')->row()->nama;
    } catch (Exception $e) {
      log_message('error', $e);
    }
  }

   function getTahunPerkara(){
    try {
      if($this->db=='xxx'){
        show_error('Database belum disetting.');
      }
      return $this->db->query('SELECT DISTINCT YEAR(tglPendaftaran) as tahun FROM dataumumweb ORDER BY tglPendaftaran DESC');
    } catch (Exception $e) {
      log_message('error', $e);
    }
  }
  function getIndikator($tahun=NULL,$bulan=NULL){
      try {
          if($this->db=='xxx'){
            show_error('Database belum disetting.');
          }
          if (($bulan==NULL) and ($tahun==NULL)) {
              $tahun=date("Y");
              $bulan=date("m");
          }
          $tahunlalu=$tahun-1;
          
          $val=$tahun.''.'-'.''.$bulan;
           return $this->db->query('SELECT  
                      IDPerkara,
                      KlasifikasiPerkara,
                      a.nama,
                      sum(
                        CASE 
                          WHEN LEFT(tglPendaftaran,7) < "'.$val.'" AND (tglPutusan IS NULL OR LEFT(tglPutusan,7) >= "'.$val.'") THEN 1
                          ELSE 0
                        END
                      ) AS sisablnlalu,
                      sum(
                        CASE 
                          WHEN LEFT(tglPendaftaran,7) = "'.$val.'" THEN 1
                          ELSE 0
                        END
                      ) AS masuk,
                      sum(
                        CASE 
                          WHEN LEFT(tglPutusan,7) = "'.$val.'" THEN 1
                          ELSE 0
                        END
                      ) AS putus,
                      sum(
                        CASE 
                          WHEN LEFT(tglPutusan,7) = "'.$val.'" AND tglMinutasi IS NOT NULL AND LEFT(tglMinutasi,7) = "'.$val.'"THEN 1
                          ELSE 0
                        END
                      ) AS putussudahminutasi,
                      sum(
                        CASE 
                          WHEN LEFT(tglPutusan,7) = "'.$val.'" AND tglMinutasi IS NULL THEN 1
                          ELSE 0
                        END
                      ) AS belumMinutasi

                      FROM alurperkaraweb AS a
                      LEFT JOIN (SELECT IDPerkara, klasifikasiPerkara, tglPendaftaran, tglPutusan, tglMinutasi FROM dataumumweb WHERE LEFT(tglPendaftaran,7) <= "'.$val.'") AS p
                      ON a.id = p.KlasifikasiPerkara
                      GROUP BY id;');                                                  
      } catch (Exception $e) {
        log_message('error', $e);
      }
  }

  //equalizr 29 januari 2022
  function getIndikatorTama($tahun=NULL,$bulan=NULL){
    try {
        if($this->db=='xxx'){
          show_error('Database belum disetting.');
        }
        if (($bulan==NULL) and ($tahun==NULL)) {
            $tahun=date("Y");
            $bulan=date("m");
        }
        $tahunlalu=$tahun-1;
        
        $val=$tahun.''.'-'.''.$bulan;
         return $this->db->query('SELECT  
                    IDPerkara,
                    KlasifikasiPerkara,
                    a.nama,
                    sum(
                      CASE 
                        WHEN LEFT(tglPendaftaran,7) < "'.$val.'" AND (tglPutusan IS NULL OR LEFT(tglPutusan,7) >= "'.$val.'") THEN 1
                        ELSE 0
                      END
                    ) AS sisablnlalu,
                    sum(
                      CASE 
                        WHEN LEFT(tglPendaftaran,7) = "'.$val.'" THEN 1
                        ELSE 0
                      END
                    ) AS masuk,
                    sum(
                      CASE 
                        WHEN LEFT(tglPutusan,7) = "'.$val.'" THEN 1
                        ELSE 0
                      END
                    ) AS putus,
                    sum(
                      CASE 
                        WHEN LEFT(tglPutusan,7) = "'.$val.'" AND tglMinutasi IS NOT NULL AND LEFT(tglMinutasi,7) = "'.$val.'"THEN 1
                        ELSE 0
                      END
                    ) AS putussudahminutasi,
                    sum(
                      CASE 
                        WHEN LEFT(tglPutusan,7) = "'.$val.'" AND tglMinutasi IS NULL THEN 1
                        ELSE 0
                      END
                    ) AS belumMinutasi

                    FROM alurperkaraweb AS a
                    LEFT JOIN (SELECT IDPerkara, klasifikasiPerkara, tglPendaftaran, tglPutusan, tglMinutasi FROM dataumumweb WHERE LEFT(tglPendaftaran,7) <= "'.$val.'") AS p
                    ON a.id = p.KlasifikasiPerkara
                    WHERE a.id = 124
                    GROUP BY id;');                                                  
    } catch (Exception $e) {
      log_message('error', $e);
    }
  }

  function getIndikatorMil($tahun=NULL,$bulan=NULL){
  try {
      if($this->db=='xxx'){
        show_error('Database belum disetting.');
      }
      if (($bulan==NULL) and ($tahun==NULL)) {
          $tahun=date("Y");
          $bulan=date("m");
      }
      $tahunlalu=$tahun-1;
      
      $val=$tahun.''.'-'.''.$bulan;
       return $this->db->query('SELECT  
                  IDPerkara,
                  KlasifikasiPerkara,
                  a.nama,
                  sum(
                    CASE 
                      WHEN LEFT(tglPendaftaran,7) < "'.$val.'" AND (tglPutusan IS NULL OR LEFT(tglPutusan,7) >= "'.$val.'") THEN 1
                      ELSE 0
                    END
                  ) AS sisablnlalu,
                  sum(
                    CASE 
                      WHEN LEFT(tglPendaftaran,7) = "'.$val.'" THEN 1
                      ELSE 0
                    END
                  ) AS masuk,
                  sum(
                    CASE 
                      WHEN LEFT(tglPutusan,7) = "'.$val.'" THEN 1
                      ELSE 0
                    END
                  ) AS putus,
                  sum(
                    CASE 
                      WHEN LEFT(tglPutusan,7) = "'.$val.'" AND tglMinutasi IS NOT NULL AND LEFT(tglMinutasi,7) = "'.$val.'"THEN 1
                      ELSE 0
                    END
                  ) AS putussudahminutasi,
                  sum(
                    CASE 
                      WHEN LEFT(tglPutusan,7) = "'.$val.'" AND tglMinutasi IS NULL THEN 1
                      ELSE 0
                    END
                  ) AS belumMinutasi

                  FROM alurperkaraweb AS a
                  LEFT JOIN (SELECT IDPerkara, klasifikasiPerkara, tglPendaftaran, tglPutusan, tglMinutasi FROM dataumumweb WHERE LEFT(tglPendaftaran,7) <= "'.$val.'") AS p
                  ON a.id = p.KlasifikasiPerkara
                  WHERE a.id NOT IN (124)
                  GROUP BY id;');                                                  
    } catch (Exception $e) {
      log_message('error', $e);
    }
  }

}