<div class="cssTable" style="margin-top:100px;width:99%;background:none;border:none">
	<div style="margin-left:10px; margin-right:10px; width:99%;border:1px solid #eee;max-height:70%;overflow:vscroll;">
	<form id="" style="background:white;margin:0;border:1px solid #ddd;">
		<table id="tableDetilPerkara" style="font-size:12px;;">
			<col width="40%">
			<col width="60%">
			<tbody>
				<tr><th colspan="2"><h2>DETIL PENAHANAN</h2></th></tr>
				<tr>
					<td>Nomor Perkara</td>
					<td><?php  echo $nomorPerkara;?></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td><?php  echo $NamaTerdakwa;?></td>
				</tr>
		</table>
	<br/><br/>
	<table id="tablePerkaraAll">
		<col width="3%"/>
        <col width="20%"/>
        <col width="10%"/>
        <col width="10%"/>
        <col width="10%"/>
        <col width="20%"/>
        <col width="10%"/>
        <col width="10%"/>
		<tbody>
			<tr>
				<td>No</td>
				<td>Ditahan Oleh</td>
				<td>Jenis Tahanan</td>
				<td>Status Penahanan</td>
				<td>Tanggal Surat</td>
				<td>Nomor Surat</td>
				<td>Mulai</td>
				<td>Sampai</td>
			</tr>
			<?php
			if($queryPenahanan!=''){
				if($queryPenahanan->num_rows>0){
					$con = 1;
					foreach ($queryPenahanan->result() as $row) {
						echo "<tr>";
		    				echo '<td>'.$con.'</td>';
		    				echo '<td>'.$row->ditahanOleh.'</td>';
		    				echo '<td>'.$row->jenisTahanan.'</td>';
		    				echo '<td>'.$row->statusPenahanan.'</td>';
		    				echo '<td>'.$row->tglSurat.'</td>';
		    				echo '<td>'.$row->noSurat.'</td>';
		    				echo '<td>'.$row->mulai.'</td>';
		    				echo '<td>'.$row->sampai.'</td>';
		    			echo "</tr>";
		    			$con++;
					}
				}
			}
			?>

			</tbody>
			</table>
			





	
		<table id="tableDetilPerkara" style="font-size:12px;;">
			<tr>
				<td colspan="2" style="background:#fff;text-align:center;"><input type="button" id="kembaliKeList" value="Tutup" class="btn"></td>
			</tr>
		</table>
	</form>

</div>
<script type="text/javascript">
closeLoading();
$('#kembaliKeList').closingFormWin();
</script>