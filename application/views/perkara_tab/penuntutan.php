<style type="text/css">
#infoPerkara .wrapword li {
  display: list-item !important;
  clear: both;
  float: none !important;
}
</style>
<div style="font-size:14px;">
	<table id='infoPerkara' style="font-size:14px;width:100%;">
		<col width="15%">
		<col width="85%">
		<tbody>
			<?php
			if(!empty($data_penuntutan)){
				if($data_penuntutan->num_rows>0){
					foreach ($data_penuntutan->result() as $row) {
			?>
						<tr>
							<td id="first-child"><font color="white">Tanggal Tuntutan</font></td>
							<td><?php echo $this->tanggalhelper->convertDayDate($row->tglPenuntutan);?></td>
						</tr>
						<tr>
							<td id="first-child" style="vertical-align: top;"><font color="white">Isi Tuntutan</font></td>
							<td class='wrapword'><?php echo $row->isiTuntutan;?></td>
						</tr>
			<?php

					}
				}else{
					echo "<tr><td colspan='2'>DATA TIDAK DITEMUKAN</td></tr>";
				}
			}else{
				echo "<tr><td colspan='2'>DATA TIDAK DITEMUKAN</td></tr>";
			}
			?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
closeLoading();
</script>