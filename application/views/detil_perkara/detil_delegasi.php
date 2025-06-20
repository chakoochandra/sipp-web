<div class="cssTable" style="margin:10px 20%;padding-right:10px;width:96%;background:none;border:none">
	<div style="margin:0px 20px;width:60%;border:1px solid #eee;align:center;max-height:70%;overflow:vscroll;">
	<form id="frm_edit_delegasi_keluar" style="background:white;margin:0;border:1px solid #ddd;padding:10px">
		<table id="tableDetilPerkara" style="font-size:14px;;">
			<col width="40%">
			<col width="60%">
			<tbody>
				<tr><th colspan="2"><h2>DETIL DELEGASI <?php echo $namaDelegasi;?></h2></th></tr>
				<tr>
					<td>Pengadilan Negeri <?php echo $pn;?></td>
					<td><?php  echo $namapn;?></td>
				</tr>
				<tr>
					<td>Nomor Perkara</td>
					<td><?php echo $noPerkara;?></td>
				</tr>
				<tr>
					<td>Tanggal Permohonan Delegasi</td>
					<td><?php echo $tglDelegasi;?></td>
				</tr>
				<tr>
					<td>Jenis Delegasi</td>
					<td><?php echo $jenisDelegasiText;?></td>
				</tr>
				<tr>
					<td>Nomor Surat Pengantar</td>
					<td><?php echo $noSurat;?></td>
				</tr>
				<tr>
					<td>Tanggal Surat Pengantar</td>
					<td><?php echo $tglSurat;?></td>
				</tr>
				<tr>
					<td>Tanggal Pengiriman</td>
					<td><?php echo $tglPengiriman;?></td>
				</tr>
				<tr>
					<th colspan="2" style="background:#5fb85c;color:#fff;">PELAKSANAAN DELEGASI</th>
				</tr>
				<?php if (($idproses!='') OR ($idproses!=NULL)) { ?>
				<tr>
					<td>Tanggal Surat Diterima</td>
					<td><?php echo $tglSuratDiterima;?></td>
				</tr>
				<tr>
					<td>Jurusita</td>
					<td><?php echo $jurusitaNama;?></td>
				</tr>
				<tr>
					<td>Tanggal Pelaksanaan</td>
					<td><?php echo $tglRelaas;?></td>
				</tr>
				<tr>
					<td>Nomor Surat</td>
					<td><?php echo $nomorRelaas;?></td>
				</tr>
				<tr>
					<td>Tanggal Pengiriman Kembali Berkas</td>
					<td><?php echo $tglPengirimanRelaas;?></td>
				</tr>
				<tr>
					<td>Nomor Surat Pengantar</td>
					<td><?php echo $noSuratPengantarRelaas;?></td>
				</tr>
				<tr>
					<td>Status Pelaksanaan Delegasi</td>
					<td><?php echo $statusDelegasi;?></td>
				</tr>
				<tr>
					<td>Alsasan</td>
					<td><?php echo $alasan;?></td>
				</tr>
				<tr>
					<td>Catatan</td>
					<td><?php echo $catatan_proses;?></td>
				</tr>
				<?php }else{ ?>
				<tr>
					<td colspan="2">Belum dilaksanakan</td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan="2" style="background:#fff;text-align:center;"><input type="button" id="kembaliKeList" value="Tutup" class="btn"></td>
				</tr>
			</tbody>
		</table>
	</form>
</div>
<script type="text/javascript">
closeLoading();
$('#kembaliKeList').closingFormWin();
</script>