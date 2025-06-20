<div class="cssTable" style="margin:0px;padding:0px;">
	<table id="tableinfo" style="font-size:14px;width:100%;">
		<col width="3%" />
		<col width="13%" />
		<col width="12%" />
		<col width="30%" />
		<col width="15%" />
		<col width="27%" />
		<tbody>
			<tr>
				<td>No</td>
				<td>Tanggal Sidang</td>
				<td>Jam</td>
				<td>Agenda</td>
				<td>Ruangan</td>
				<td>Alasan Ditunda</td>
			</tr>
			<?php
			$idalurperkara = $this->tanggalhelper->getIDAlurPerkara($idperkara);
			if($data_jadwal_sidang!=''){
				if($data_jadwal_sidang->num_rows>0){
					$i=1;
					foreach ($data_jadwal_sidang->result() as $row) {
						$selesai = (empty($row->selesaiSidang))? 'Selesai':$row->selesaiSidang;
						if($row->verzet=='Y'){
							if($idalurperkara==9)
								$status = '<br> Sidang Perlawanan';
							else
								$status = '<br> Sidang Verzet';
						}else{
							$status ='';
						}
						$ruangan = (!empty($row->ruangan))? $row->ruangan:'Belum Ditentukan';
						echo '<tr>';
							echo '<td>'.$i.'</td>';
							echo '<td>'.$this->tanggalhelper->convertDayDate($row->tglSidang).'</td>';
							echo '<td>'.$row->jamSidang.' s/d '.$selesai.'</td>';
							echo '<td>'.$row->agenda.$status.'</td>';
							echo '<td style="text-align:center;">'.$ruangan.' <br> ('.$row->dihadiriOleh.')</td>';
							echo '<td>'.$row->alasanDitunda.'</td>';
						echo '</tr>';
						$i++;
					}
				}
			}
			?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
closeLoading();
</script>