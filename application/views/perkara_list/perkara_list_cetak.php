<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=cetak_form.xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
?>
<div id="konten">
<div class="cssTable">
	<table border="1">
	<?php if($jenis_cetak=='1') { #PerkaraList ?>
		<tr>
			<td style="width:5%;background:green;" align="center">No</td>
			<td style="width:15%;background:green;" align="center">Nomor Perkara</td>
			<td style="width:10%;background:green;" align="center">Tanggal Register</td>
			<td style="width:10%;background:green;" align="center">Klasifikasi Perkara</td>
			<td style="width:15%;background:green;" align="center">Para Pihak</td>
			<td style="width:10%;background:green;" align="center">Tahapan</td>
			<td style="width:10%;background:green;" align="center">Status Perkara</td>
			<td style="width:8%;background:green;" align="center">Lama Proses</td>
			<td style="width:5%;background:green;" align="center">Link</td>
		</tr>
	<?php } else if ($jenis_cetak=='2') { #PerkaraListBanding ?>
		<tr>
			<td style="width:5%;background:green;" align="center">No</td>
			<td style="width:5%;background:green;" align="center">Nomor Perkara PN</td>
			<td style="width:5%;background:green;" align="center">Pemohon Banding</td>
			<td style="width:5%;background:green;" align="center">Tanggal Pengiriman Berkas</td>
			<td style="width:5%;background:green;" align="center">Tanggal Putusan Banding</td>
			<td style="width:5%;background:green;" align="center">Nomor Perkara Banding</td>
			<td style="width:5%;background:green;" align="center">Tanggal Penerimaan Kembali Berkas</td>
			<td style="width:5%;background:green;" align="center">Tanggal Pemberitahuan Putusan</td>
			<td style="width:5%;background:green;" align="center">Status Banding</td>
			<td style="width:5%;background:green;" align="center">Link</td>
		</tr>
	<?php } else if ($jenis_cetak=='3') { #PerkaraListKasasi ?>
		<tr>
			<td style="width:5%;background:green;" align="center">No</td>
			<td style="width:5%;background:green;" align="center">Nomor Perkara PN</td>
			<td style="width:5%;background:green;" align="center">Pemohon kasasi</td>
			<td style="width:5%;background:green;" align="center">Tanggal Pengiriman Berkas</td>
			<td style="width:5%;background:green;" align="center">Tanggal Putusan kasasi</td>
			<td style="width:5%;background:green;" align="center">Nomor Perkara kasasi</td>
			<td style="width:5%;background:green;" align="center">Tanggal Penerimaan Kembali Berkas</td>
			<td style="width:5%;background:green;" align="center">Tanggal Pemberitahuan Putusan</td>
			<td style="width:5%;background:green;" align="center">Status kasasi</td>
			<td style="width:5%;background:green;" align="center">Link</td>
		</tr>
	<?php } else if ($jenis_cetak=='4') { #PerkaraListPK  ?>
		<tr>
			<td style="width:5%;background:green;" align="center">No</td>
			<td style="width:5%;background:green;" align="center">Nomor Perkara PN</td>
			<td style="width:5%;background:green;" align="center">Pemohon PK</td>
			<td style="width:5%;background:green;" align="center">Tanggal Pemberitahuan PK</td>
			<td style="width:5%;background:green;" align="center">Tanggal Pengiriman Berkas PK</td>
			<td style="width:5%;background:green;" align="center">Nomor Putusan PK</td>
			<td style="width:5%;background:green;" align="center">Tanggal Putusan PK</td>
			<td style="width:5%;background:green;" align="center">Tanggal Penerimaan Berkas PK</td>
			<td style="width:5%;background:green;" align="center">Tanggal Pemberitahuan Putusan PK</td>
			<td style="width:5%;background:green;" align="center">Tanggal Pengarsipan PK</td>
			<td style="width:5%;background:green;" align="center">Status PK</td>
			<td style="width:5%;background:green;" align="center">Link</td>
		</tr>
	<?php } else if ($jenis_cetak=='5') { #PerkaraListGrasi  ? ?>
		<tr>
			<td style="width:5%;background:green;" align="center">No</td>
			<td style="width:5%;background:green;" align="center">Tanggal Permohonan</td>
			<td style="width:5%;background:green;" align="center">Nomor Perkara PN</td>
			<td style="width:5%;background:green;" align="center">Nama Terdakwa</td>
			<td style="width:5%;background:green;" align="center">Nama Pemohon</td>
			<td style="width:5%;background:green;" align="center">Pemberitahuan Putusan Tetap</td>
			<td style="width:5%;background:green;" align="center">Pengiriman Pertimbangan Hakim</td>
			<td style="width:5%;background:green;" align="center">Tanggal Putusan</td>
			<td style="width:5%;background:green;" align="center">Tanggal Penerimaan Berkas Kembali</td>
			<td style="width:5%;background:green;" align="center">Link</td>
		</tr>
	<?php } else if ($jenis_cetak=='6') { #PerkaraBarangBukti  ? ?>
		<tr>
			<td style="width:5%;background:green;" align="center">No</td>
			<td style="width:5%;background:green;" align="center">Nomor Perkara</td>
			<td style="width:5%;background:green;" align="center">Jenis dan Uraian Lengkap BB</td>
			<td style="width:5%;background:green;" align="center">Tanggal Terima dari PU</td>
			<td style="width:5%;background:green;" align="center">Tempat Penyimpanan</td>
			<td style="width:5%;background:green;" align="center">Tempat Penyerahan </td>
			<td style="width:5%;background:green;" align="center">Nama Penerima</td>
			<td style="width:5%;background:green;" align="center">Tanggal Penyerahan BB Setelah Putusan</td>
			<td style="width:5%;background:green;" align="center">Catatan Barang Bukti</td>
			<td style="width:5%;background:green;" align="center">Link</td>
		</tr>
	<?php } else if ($jenis_cetak=='7') { #PerkaraBarangBukti  ? ?>
		<tr>
			<td style="width:5%;background:green;" align="center">No</td>
			<td style="width:5%;background:green;" align="center">Nomor Perkara</td>
			<td style="width:5%;background:green;" align="center">Nama</td>
			<td style="width:5%;background:green;" align="center">Tempat Lahir</td>
			<td style="width:5%;background:green;" align="center">Tanggal Lahir</td>
			<td style="width:5%;background:green;" align="center">Umur</td>
			<td style="width:5%;background:green;" align="center">Jenis Kelamin</td>
			<td style="width:5%;background:green;" align="center">Alamat</td>
			<td style="width:5%;background:green;" align="center">Ditahan Oleh</td>
			<td style="width:5%;background:green;" align="center">Mulai</td>
			<td style="width:5%;background:green;" align="center">Sampai</td>
			<td style="width:5%;background:green;" align="center">Link</td>
		</tr>
	<?php }  else if ($jenis_cetak=='8') { #PerkaraEksekusi  ?>
		<tr>
			<td style="width:5%;background:green;" align="center">No</td>
			<td style="width:5%;background:green;" align="center">Nomor Perkara PN</td>
			<td style="width:5%;background:green;" align="center">Pemohon eksekusi</td>
			<td style="width:5%;background:green;" align="center">Tanggal Penetapan Teguran</td>
			<td style="width:5%;background:green;" align="center">Nomor Penetapan Teguran</td>
			<td style="width:5%;background:green;" align="center">Tanggal Pelaksanaan Teguran</td>
			<td style="width:5%;background:green;" align="center">Tanggal Penetapan Sita</td>
			<td style="width:5%;background:green;" align="center">Nomor Penetapan Sita</td>
			<td style="width:5%;background:green;" align="center">Tanggal Sita Eksekusi</td>
			<td>Link</td>
		</tr>
	<?php }  else if ($jenis_cetak=='9') { #PerkaraEksekusiHT  ?>
		<tr>
			<td style="width:5%;background:green;" align="center">No</td>
			<td style="width:5%;background:green;" align="center">Nomor Eksekusi Hak Tanggungan</td>
			<td style="width:5%;background:green;" align="center">Tanggal Permohonan</td>
			<td style="width:5%;background:green;" align="center">Pemohon Eksekusi</td>
			<td style="width:5%;background:green;" align="center">Tanggal Penetapan Teguran</td>
			<td style="width:5%;background:green;" align="center">Nomor Penetapan Teguran</td>
			<td style="width:5%;background:green;" align="center">Tanggal Pelaksanaan Teguran</td>
			<td style="width:5%;background:green;" align="center">Tanggal Penetapan Sita</td>
			<td style="width:5%;background:green;" align="center">Nomor Penetapan Sita</td>
			<td style="width:5%;background:green;" align="center">Tanggal Sita Eksekusi</td>
			<td>Link</td>
		</tr>
	<?php } ?>
		<?php
			if($list_perkara!=''){
				if($list_perkara->num_rows>0){
					$con = 1;
					function parse_date($date){
						if(!empty($date)){
							$date_fmt = new DateTime(str_replace("-","",$date));
							return $date_fmt->format('d M Y');
						}else{
							return '';
						}
					}

					foreach ($list_perkara->result() as $row) {
						if($jenis_cetak=='1') {
			    			$date = new DateTime(str_replace("-","",$row->tanggal_pendaftaran));
			    			echo "<tr>";
				    			echo '<td>'.$con.'</td>';
				    			echo '<td>'.$row->nomor_perkara.'</td>';
				    			echo '<td align="center">'.$date->format('d M Y').'</td>';
				    			echo '<td>'.$row->jenis_perkara_nama.'</td>';
				    			echo '<td>'.$row->para_pihak.'</td>';
				    			echo '<td>'.$row->tahapan_terakhir_text.'</td>';
				    			echo '<td>'.$row->proses_terakhir_text.'</td>';
				    			echo '<td  align="center">'.$row->durasi.'</td>';
				    			echo '<td align="center">detil</td>';
			    			echo "</tr>";
			    		}  else if ($jenis_cetak=='2') { 
			    			echo "<tr>";
			    				echo '<td>'.$con.'</td>';
			    				echo '<td>'.$row->nomor_perkara_pn.'</td>';
			    				echo '<td>'.parse_date($row->permohonan_banding);
			    				echo "<br>".$row->pemohon_banding.'</td>';
			    				echo '<td align="center">'.parse_date($row->pengiriman_berkas_banding).'</td>';
			    				echo '<td align="center">'.parse_date($row->putusan_banding).'</td>';
			    				echo '<td>'.$row->nomor_perkara_banding.'</td>';
			    				echo '<td align="center">'.parse_date($row->penerimaan_kembali_berkas_banding).'</td>';
			    				echo '<td align="center">'.parse_date($row->pemberitahuan_putusan_banding).'</td>';
			    				echo '<td>'.$row->status_banding_text.'</td>';
			    				echo '<td align="center">[detil]</td>';
		    				echo "</tr>";
			    		} else if ($jenis_cetak=='3') {
			    			echo "<tr>";
			    				echo '<td>'.$con.'</td>';
			    				echo '<td>'.$row->nomor_perkara_pn.'</td>';
			    				echo '<td>'.parse_date($row->permohonan_kasasi);
			    				echo "<br>".$row->pemohon_kasasi.'</td>';
			    				echo '<td align="center">'.parse_date($row->pengiriman_berkas_kasasi).'</td>';
			    				echo '<td align="center">'.parse_date($row->putusan_kasasi).'</td>';
			    				echo '<td>'.$row->nomor_perkara_kasasi.'</td>';
			    				echo '<td align="center">'.parse_date($row->penerimaan_berkas_kasasi).'</td>';
			    				echo '<td align="center">'.parse_date($row->pemberitahuan_putusan_kasasi).'</td>';
			    				echo '<td>'.$row->status_kasasi_text.'</td>';
			    				echo '<td align="center">[detil]</td>';
		    				echo "</tr>";
			    		} else if ($jenis_cetak=='4') {
			    			echo "<tr>";
		    					echo '<td>'.$con.'</td>';
			    				echo '<td>'.$row->nomor_perkara_pn.'</td>';
			    				echo '<td>'.$row->pemohon_pk.'</td>';
			    				echo '<td>'.parse_date($row->pemberitahuan_pk).'</td>';
			    				echo '<td>'.parse_date($row->pengiriman_berkas_pk).'</td>';
			    				echo '<td align="center">'.$row->nomor_perkara_pk.'</td>';
			    				echo '<td align="center">'.parse_date($row->putusan_pk).'</td>';
			    				echo '<td>'.parse_date($row->penerimaan_berkas_pk).'</td>';
			    				echo '<td align="center">'.parse_date($row->pemberitahuan_putusan_pk).'</td>';
			    				echo '<td align="center">'.parse_date($row->minutasi_pk).'</td>';
			    				echo '<td align="center">'.$row->status_pk_text.'</td>';
			    				echo '<td align="center">detil</td>';
		    				echo "</tr>";
			    		} else if ($jenis_cetak=='5') {
			    			echo "<tr>";
			    				echo '<td>'.$con.'</td>';
			    				echo '<td>'.parse_date($row->permohonan_grasi).'</td>';
			    				echo '<td>'.$row->nomor_perkara_pn.'</td>';
			    				echo '<td align="center">'.$row->terdakwa_nama.'</td>';
			    				echo '<td align="center">'.$row->pemohon_nama.'</td>';
			    				echo '<td>'.parse_date($row->pemberitahuan_putusan_tetap).'</td>';
			    				echo '<td align="center">'.parse_date($row->pengiriman_pertimbangan_hakim_grasi).'</td>';
			    				echo '<td align="center">'.parse_date($row->tanggal_putusan_grasi).'</td>';
			    				echo '<td>'.parse_date($row->tanggal_penerimaan_kembali_berkas_grasi).'</td>';
			    				echo '<td align="center">detil</td>';
		    				echo "</tr>";
			    		} else if ($jenis_cetak=='6') {
			    			$dateTerima = new DateTime(str_replace("-","",$row->tanggal_penerimaan));
		    				$dateSerah = new DateTime(str_replace("-","",$row->tanggal_penyerahan));
			    			echo "<tr>";
			    				echo '<td>'.$con.'</td>';
			    				echo '<td>'.$row->nomor_perkara.'</td>';
			    				echo '<td>'.$row->jenis_barang_bukti.'</td>';
			    				echo '<td align="center">'.$dateTerima->format('d M Y').'</td>';
			    				echo '<td>'.$row->tempat_penyimpanan.'</td>';
			    				echo '<td>'.$row->tempat_penyerahan.'</td>';
			    				echo '<td>'.$row->nama_penerima.'</td>';
			    				echo '<td align="center">'.$dateSerah->format('d M Y').'</td>';
			    				echo '<td>'.$row->catatan_barang_bukti.'</td>';
			    				echo '<td align="center">detil</td>';
		    				echo "</tr>";
			    		}  else if ($jenis_cetak=='7') {
			    			echo "<tr>";
			    				echo '<td>'.$con.'</td>';
			    				echo '<td>'.$row->nomor_perkara.'</td>';
			    				echo '<td>'.$row->nama.'</td>';
			    				echo '<td>'.$row->tempat_lahir.'</td>';
			    				echo '<td>'.$this->tanggalhelper->convertDate($row->tanggal_lahir).'</td>';
			    				echo '<td>'.$row->umur.'</td>';
			    				$row->jenis_kelamin = $row->jenis_kelamin=='L'?'Laki-Laki':'Perempuan';
			    				echo '<td>'.$row->jenis_kelamin.'</td>';
			    				echo '<td>'.$row->alamat.'</td>';
			    				echo '<td>'.$row->jenis_penahanan_nama.'</td>';
			    				echo '<td>'.$this->tanggalhelper->convertDate($row->mulai).'</td>';
			    				echo '<td>'.$this->tanggalhelper->convertDate($row->sampai).'</td>';
			    				echo '<td align="center">detil</td>';
		    				echo "</tr>";
			    		}  else if ($jenis_cetak=='8') {
			    			echo "<tr>";
			    				echo '<td>'.$con.'</td>';
			    				echo '<td>'.$row->nomor_perkara_pn.'</td>';
			    				echo '<td>'.parse_date($row->permohonan_eksekusi);
			    				echo "<br>".$row->pemohon_eksekusi.'</td>';
			    				echo '<td align="center">'.parse_date($row->penetapan_teguran_eksekusi).'</td>';
			    				echo '<td>'.$row->nomor_penetapan_teguran_eksekusi.'</td>';
			    				echo '<td align="center">'.parse_date($row->pelaksanaan_teguran_eksekusi).'</td>';
			    				echo '<td align="center">'.parse_date($row->penetapan_sita_eksekusi).'</td>';
			    				echo '<td>'.$row->nomor_penetapan_sita_eksekusi.'</td>';
			    				echo '<td align="center">'.parse_date($row->pelaksanaan_sita_eksekusi).'</td>';
			    				echo '<td align="center">detil</td>';
		    				echo "</tr>";
			    		}   else if ($jenis_cetak=='9') {
			    			echo "<tr>";
			    				echo '<td>'.$con.'</td>';
			    				echo '<td align="center">'.$row->eksekusi_nomor_perkara.'</td>';
			    				echo '<td align="center">'.parse_date($row->permohonan_eksekusi);
			    				echo "<td>".$row->pemohon_eksekusi.'</td>';
			    				echo '<td align="center">'.parse_date($row->penetapan_teguran_eksekusi).'</td>';
			    				echo '<td>'.$row->nomor_penetapan_teguran_eksekusi.'</td>';
			    				echo '<td align="center">'.parse_date($row->pelaksanaan_teguran_eksekusi).'</td>';
			    				echo '<td align="center">'.parse_date($row->penetapan_sita_eksekusi).'</td>';
			    				echo '<td>'.$row->nomor_penetapan_sita_eksekusi.'</td>';
			    				echo '<td align="center">'.parse_date($row->pelaksanaan_sita_eksekusi).'</td>';
			    				echo '<td align="center">detil</td>';
		    				echo "</tr>";
			    		}
		    			$con++;
		    		}
			    }else{
		    		echo "<tr><td colspan='9' align='center'>Data Tidak diTemukan</td></tr>";
		    	}
			}else{
		    	echo "<tr><td colspan='9' align='center'>Data Tidak diTemukan</td></tr>";
			}
		?>
	</table>
</div>
</div>