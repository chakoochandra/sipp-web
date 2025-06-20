<div class="detil" style="font-size:14px;margin-top:15px;width: 99%;margin: 0 auto;border-color: #FFFFFF;">
	<table id='infoPerkara' style="font-size:14px;width:100%;"><tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>DAFTAR PUTUSAN BERKEKUATAN HUKUM TETAP</b></td></tr></tbody></table>
	<table id="tableDetilPerkara" style="font-size:14px;" width="99%">
        <col width="20%">
		<col width="80%">
		<tbody>
            <tr>
            	<td bgcolor='#5FB85C'><font color='white'>Nomor Perkara PN</font></td>
                <td style="padding:0px;padding-left:5px;"><?php echo $noPerkaraPN;?></td>
           	</tr>
			<tr>
				<td bgcolor='#5FB85C'><font color='white'>Tanggal Putusan PN</font></td>
				<td style="padding:0px;padding-left:5px;"><?php echo $PutusanPN;?></td>
			</tr>
			<tr class="banding_hide">
			    <td bgcolor='#5FB85C'><font color='white'>Nomor Perkara Banding</font></td>
			    <td style="padding:0px;padding-left:5px;"><?php echo $noPerkaraBanding;?></td>
			 </tr>
			 <tr class="banding_hide">
			    <td bgcolor='#5FB85C'><font color='white'>Tanggal Putusan Banding</font></td>
			    <td style="padding:0px;padding-left:5px;"><?php echo $putusanBanding;?></td>
			</tr>
			<tr class="kasasi_hide">
			    <td bgcolor='#5FB85C'><font color='white'>Nomor Perkara Kasasi</font></td>
			    <td style="padding:0px;padding-left:5px;"><?php echo $noPerkaraKasasi;?></td>
			 </tr>
			 <tr class="kasasi_hide">
			    <td bgcolor='#5FB85C'><font color='white'>Tanggal Putusan Kasasi</font></td>
			    <td style="padding:0px;padding-left:5px;"><?php echo $putusanKasasi;?></td>
			</tr>
			<tr class="pk_hide">
			    <td bgcolor='#5FB85C'><font color='white'>Nomor Perkara Peninjauan Kembali</font></td>
			    <td style="padding:0px;padding-left:5px;"><?php echo $noPerkaraPK;?></td>
			 </tr>
			 <tr class="pk_hide">
			    <td bgcolor='#5FB85C'><font color='white'>Tanggal Putusan Peninjauan Kembali</font></td>
			    <td style="padding:0px;padding-left:5px;"><?php echo $putusanPK;?></td>
			</tr>
            
		</tbody>
	</table>

    <div style="padding:5px;"></div>
	
	<table id='infoPerkara' style="font-size:14px;width:100%;"><tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>DATA PERMOHONAN EKSEKUSI</b></td></tr></tbody></table>
    <table id='infoPerkara' width="100%" class="cssTable" style="margin:0px;padding:0px; ">
    	<col width="15%">
    	<col width="55%">
    	<col width="30%">
    	
    	<tbody>
    		<tr>
    			<td bgcolor='#5FB85C'><font color='white'>Tanggal Permohonan</font></td>
    			<td bgcolor='#5FB85C'><font color='white'>Pemohon Eksekusi</font></td>
    			<td bgcolor='#5FB85C'><font color='white'>Pihak Yang dimohonkan Eksekusi</font></td>
    			
    		</tr>
    		<tr>
    			<td width='30%'><?php echo $permohonanEsekusi;?></td>
    			<td width='35%'><?php echo $pemohonEksekusi;?></td>
    			<td width='45%'><?php echo $paraPihak;?></td>
    			
    		</tr>
            <tr><td colspan="3" style='background:white;'></td></tr>
    	</tbody>
    </table>
 

	<table id='infoPerkara' style="font-size:14px;width:100%;"><tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>STATUS PARA PIHAK</b></td></tr></tbody></table>                    
	<table  id='infoPerkara' width="100%" class="cssTable" style="margin:0px;padding:0px; ">
		<col width="5%">
		<col width="65%">
		<col width="30%">
		<tbody>
		<tr>
			<td bgcolor='#5FB85C'><font color='white'>No.</font></td>
			<td bgcolor='#5FB85C'><font color='white'>Nama</font></td>
			<td bgcolor='#5FB85C'><font color='white'>Status</font></td>
		</tr>
		<?php
		$no=1;
        if($queryEksekusiDetil!=''){
			if($queryEksekusiDetil->num_rows>0){
				foreach ($queryEksekusiDetil->result() as $row) {
    				echo "<tr>";
    				echo "<td align=\"center\" style=\"padding-left:5px;\">".$no."</td>";
    				echo "<td style=\"padding-left:5px;\">".$row->nama."</td>";
    				echo "<td style=\"padding-left:5px;\">".$row->statusPihak."</td>";
    				$no++;
    				echo "</tr>";
				}
			}
		}
		?>
		</tbody>
	</table>
    
    <div style="padding:5px;"></div>
              
	<table id="tableDetilPerkara" style="font-size:14px;" width="99%" >
        <col width="20%">
		<col width="80%">
    	<tbody >
		    <tr><td colspan="2" style='background:white;'></td></tr>
		    <tr>
		        <td bgcolor='#5FB85C'><font color='white'>Nomor Perkara Yang Dieksekusi</font></td>
		        <td style="padding:0px;padding-left:5px;"><?php echo $eksekusiNomorPerkara;?></td>
		    </tr>
		    <tr>
		        <td bgcolor='#5FB85C'><font color='white'>Amar Putusan Yang Diesekusi</font></td>
		        <td style="padding:0px;padding-left:5px;"><?php echo $eksekusiAmarPutusan;?></td>
		    </tr>
		    <!-- untuk selain PN -->
		    <?php if($this->session->userdata('jenis_pengadilan')==3){ ?>
	        <tr>
	            <td bgcolor='#5FB85C'><font color='white'>Tanggal diterima permohonan</font></td>
	            <td style="padding:0px;padding-left:5px;"><?php echo $diterimaPermohonan; ?></td>
	        </tr>
	        <tr>
	            <td bgcolor='#5FB85C'><font color='white'>Panggilan Para Pihak</font></td>
	            <td style="padding:0px;padding-left:5px;"><?php echo $panggilanParapihak; ?></td>
	        </tr>
	        <tr>
	            <td bgcolor='#5FB85C'><font color='white'>Penetapan Ketua</font></td>
	            <td style="padding:0px;padding-left:5px;"><?php echo $penetapanKetua; ?></td>
	        </tr>
        <tr>
            <td bgcolor='#5FB85C'><font color='white'>Tanggal Surat Ketua Bahwa Objek Sengketa Tidak Mempunyai Kekuatan Hukum Lagi</font></td>
            <td style="padding:0px;padding-left:5px;"><?php echo $skObjekTidakPunyaKekuatanHukum; ?></td>
        </tr>
        <tr><td colspan="2" style="background-color:white;padding:5px;">&nbsp;</td></tr>
        <tr><td colspan="2" style="background-color:#A3DBA8;padding:5px;"><strong> Putusan Yang Tidak Dapat Dilaksanakan</font></td></tr>
        <tr>
            <td bgcolor='#5FB85C'><font color='white'>Tanggal Surat Tergugat Tentang Objek Sengketa Non Executable</font></td>
            <td style="padding:0px;padding-left:5px;"><?php echo $suratTergugatObjekNonExecutable; ?></td>
        </tr>
        <tr>
            <td bgcolor='#5FB85C'><font color='white'>Tanggal Panggilan Kepada Para Pihak</font></td>
            <td style="padding:0px;padding-left:5px;"><?php echo $panggilanPihakNonExecutable; ?></td>
        </tr>
        <tr>
            <td bgcolor='#5FB85C'><font color='white'>Tanggal Upaya Kesepakatan Kompensasi</font></td>
            <td style="padding:0px;padding-left:5px;"><?php echo $upayaKesepakatanKompensasi; ?></td>
        </tr>
        <tr>
            <td bgcolor='#5FB85C'><font color='white'>Tanggal Penetapan Ketua Tentang Kompensasi</font></td>
            <td style="padding:0px;padding-left:5px;"><?php echo $penetapanKetuaKompensasi; ?></td>
        </tr>
        <tr>
            <td bgcolor='#5FB85C'><font color='white'>Tanggal Upaya Hukum kepada Ketua MA</font></td>
            <td style="padding:0px;padding-left:5px;"><?php echo $upayaHukumKma; ?></td>
        </tr>
        <tr>
            <td bgcolor='#5FB85C'><font color='white'>Tanggal Penetapan Ketua MA Tentang Kompensasi</font></td>
            <td style="padding:0px;padding-left:5px;"><?php echo $penetapanKmaKompensasi; ?></td>
        </tr>
        <tr><td colspan="2" style="background-color:white;padding:5px;">&nbsp;</td></tr>
        <tr>
            <td bgcolor='#5FB85C'><font color='white'>Jumlah Uang Paksa (Rp) dalam Amar Putusan Hakim </font></td>
            <td style="padding:0px;padding-left:5px;"><?php echo number_format($uangpaksaPutusanHakim); ?></td>
        </tr>
        <tr>
            <td bgcolor='#5FB85C'><font color='white'>Jumlah Uang Paksa (Rp) dalam Amar Penetapan Ketua</font></td>
            <td style="padding:0px;padding-left:5px;"><?php echo number_format($uangpaksaPenetapanKetua); ?></td>
        </tr>
        <tr>
            <td bgcolor='#5FB85C'><font color='white'>Tanggal Surat Ketua kepada Tergugat tentang Pembayaran Uang Paksa</font></td>
            <td style="padding:0px;padding-left:5px;"><?php echo $suratKetuaTergugatUangpaksa; ?></td>
        </tr>
        <tr>
            <td bgcolor='#5FB85C'><font color='white'>Tanggal Surat Peringatan</font></td>
            <td style="padding:0px;padding-left:5px;"><?php echo $suratPeringatanUangpaksa; ?></td>
        </tr>

        <tr><td colspan="2" style="background-color:white;padding:5px;">&nbsp;</td></tr>
        <tr><td colspan="2" style="background-color:#A3DBA8;padding:5px;"><strong>Sanksi Administrastif</td></tr>
        <tr>
            <td bgcolor='#5FB85C'><font color='white'>Tanggal Perintah Ketua kepada Pejabat yang Berwenang Menjatuhkan Sanksi Administrastif</font></td>
            <td style="padding:0px;padding-left:5px;"><?php echo $perintahKetuaSaksiAdministratif; ?></td>
        </tr>
         <tr>
            <td bgcolor='#5FB85C'><font color='white'>Tanggal Penjatuhan Administastif dari Pejabat yang Berwenang</font> </td>
            <td style="padding:0px;padding-left:5px;"><?php echo $sanksiAdministratifDariPejabat; ?></td>
        </tr>
        <tr><td colspan="2" style="background-color:white;padding:5px;">&nbsp;</td></tr>
        <tr><td colspan="2" style="background-color:#A3DBA8;padding:5px;"><strong>Pengumuman Pada Media Massa/Surat Kepada Presiden dan Lembaga Perwakilan Rakyat</font></td></tr>
        <tr>
            <td bgcolor='#5FB85C'><font color='white'>Tanggal Penetapan Ketua kepada Panitera/Jurusita Pengganti</font></td>
            <td style="padding:0px;padding-left:5px;"><?php echo $pengumumanKetuaPaniteraJs; ?></td>
        </tr>
        <tr>
            <td bgcolor='#5FB85C'><font color='white'>Tanggal Pengumuman kepada Media Massa</font></td>
            <td style="padding:0px;padding-left:5px;"><?php echo $pengumumanMedia; ?></td>
        </tr>
        <tr>
            <td bgcolor='#5FB85C'><font color='white'>Tanggal Surat Kepada Presiden</font></td>
            <td style="padding:0px;padding-left:5px;"><?php echo $suratPresiden; ?></td>
        </tr>
        <tr>
            <td bgcolor='#5FB85C'><font color='white'>Tanggal Surat Kepada Lembaga Perwakilan Rakyat</font></td>
            <td style="padding:0px;padding-left:5px;"><?php echo $suratLembagaPerwakilanRakyat; ?></td>
        </tr>
    <?php } else { ?>
        <tr>
            <td bgcolor='#5FB85C'><font color='white'>Alasan Permohonan Eksekusi</font></td>
            <td style="padding:0px;padding-left:5px;"><?php echo $alasanEksekusi;?></td>
        </tr>
        <tr>
            <td bgcolor='#5FB85C'><font color='white'>Jurusita</font></td>
            <td style="padding:0px;padding-left:5px;"><?php echo $jurusitaNama;?></td>
        </tr>
        
        <?php } ?>
    
				        </tbody>
			         </table>
               
                </tbody>
    </table>

    <div style="padding:5px;"></div>

    <table id='infoPerkara' style="font-size:14px;width:100%;"><tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>PELAKSANAAN TEGURAN EKSEKUSI</b></td></tr></tbody></table>
	<table id="tableDetilPerkara" style="font-size:14px;" width="99%">
        <col width="20%">
		<col width="80%">
		<tbody>
            <tr>
                <td bgcolor='#5FB85C'><font color='white'>Tanggal Penetapan</font></td>
                <td style="padding:0px;padding-left:5px;"><?php echo $penetapanTeguranEksekusi;?></td>
            </tr>
            <tr>
                <td bgcolor='#5FB85C'><font color='white'>Nomor Penetapan</font></td>
                <td style="padding:0px;padding-left:5px;"><?php echo $nomorPenetapanTeguranEksekusi;?></td>
            </tr>
			<tr>
                <td bgcolor='#5FB85C'><font color='white'>Tanggal Pelaksanaan Pertama</font></td>
                <td style="padding:0px;padding-left:5px;"><?php echo $pelaksanaanTeguranEksekusi;?></td>
            </tr>
            <tr>
                <td bgcolor='#5FB85C'><font color='white'>Tanggal Pelaksanaan Kedua</font></td>
                <td style="padding:0px;padding-left:5px;"><?php echo $pelaksanaanTeguranEksekusiKedua;?></td>
            </tr>
		</tbody>
	</table>

    <div style="padding:5px;"></div>

    <table id='infoPerkara' style="font-size:14px;width:100%;"><tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>PELAKSANAAN SITA EKSEKUSI</b></td></tr></tbody></table>
	<table id="tableDetilPerkara" style="font-size:14px;" width="99%">
        <col width="20%">
		<col width="80%">
		<tbody>
            <tr>
                <td bgcolor='#5FB85C'><font color='white'>Tanggal Penetapan</font></td>
                <td style="padding:0px;padding-left:5px;"><?php echo $penetapanSitaEksekusi;?></td>
            </tr>
            <tr>
                <td bgcolor='#5FB85C'><font color='white'>Nomor Penetapan</font></td>
                <td style="padding:0px;padding-left:5px;"><?php echo $nomorPenetapanSitaEksekusi;?></td>
            </tr>
            <tr>
                <td bgcolor='#5FB85C'><font color='white'>Tanggal Pelaksanaan</font></td>
                <td style="padding:0px;padding-left:5px;"><?php echo $pelaksanaanSitaEksekusi;?></td>
            </tr>
		</tbody>
	</table>

    <div style="padding:5px;"></div>

    <table id='infoPerkara' style="font-size:14px;width:100%;"><tbody><tr><td style='padding-left:5px;color: #648C03;font-size: 15px;'><b>PELAKSANAAN EKSEKUSI</b></td></tr></tbody></table>
	<table id="tableDetilPerkara" style="font-size:14px;" width="99%">
		<col width="20%">
		<col width="80%">
		<tbody>
            <tr>
                <td bgcolor='#5FB85C'><font color='white'>Jenis Pelaksanaan</font></td>
                <td style="padding:0px;padding-left:5px;"><?php echo $pelaksanaanEksekusiNama; ?></td>
            </tr>
            <tr>
                <td bgcolor='#5FB85C'><font color='white'>Tanggal Penetapan Perintah Eksekusi</font></td>
                <td style="padding:0px;padding-left:5px;"><?php echo $penetapanPerintahEksekusiRill;?></td>
            </tr>
            <tr>
                <td bgcolor='#5FB85C'><font color='white'>Tanggal Pelaksanaan Eksekusi</font></td>
                <td style="padding:0px;padding-left:5px;"><?php echo $pelaksanaanEksekusiRill;?></td>
            </tr>
            <tr>
                <td bgcolor='#5FB85C'><font color='white'>Tanggal Penetapan Perintah Eksekusi Lelang</font></td>
                <td style="padding:0px;padding-left:5px;"><?php echo $penetapanPerintahEksekusiLelang;?></td>
            </tr>
            <tr>
                <td bgcolor='#5FB85C'><font color='white'>Tanggal Pelaksanaan Eksekusi Lelang</font></td>
                <td style="padding:0px;padding-left:5px;"><?php echo $pelaksanaanEksekusiLelang;?></td>
            </tr>
            <tr>
                <td bgcolor='#5FB85C'><font color='white'>Tanggal Penyerahan Hasil Lelang</font></td>
                <td style="padding:0px;padding-left:5px;"><?php echo $penyerahanHasilLelang;?></td>
            </tr>
            <tr>
                <td bgcolor='#5FB85C'><font color='white'>Tanggal Penetapan Non Executable</font></td>
                <td style="padding:0px;padding-left:5px;"><?php echo $penetapanNoneksekusi;?></td>
            </tr>
            <tr>
                <td bgcolor='#5FB85C'><font color='white'>Alasan Eksekusi Tidak Dapat Dilaksanakan</font></td>
                <td style="padding:0px;padding-left:5px;"><?php echo $alasanEksekusiTidakDilaksanakan; ?></td>
            </tr>
            <tr>
                <td bgcolor='#5FB85C'><font color='white'>Keterangan Lain</font></td>
                <td style="padding:0px;padding-left:5px;"><?php echo $catatanEksekusi;?></td>
            </tr>
		</tbody>
	</table>

</div>
            

<script type="text/javascript">
    closeLoading();
</script>