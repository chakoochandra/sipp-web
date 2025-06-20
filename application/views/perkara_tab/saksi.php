<style type="text/css">
#infoPerkara .wrapword li {
  display: list-item !important;
  clear: both;
  float: none !important;
}
</style>
<div class="cssTable">
	<table id="tableinfo" style="margin:0px;padding:0px;">
		<col width="5%">
		<col width="95%">
		<tbody>						
        			<?php        			
					echo '<tr>';
						echo '<td>No</td>';
						echo '<td>Nama</td>';
					echo '</tr>';
        			if($para_pihak!=''){
						if($para_pihak->num_rows>0){							
							$i=1;
							foreach ($para_pihak->result() as $pihak) {
								if($pihak->pihak_ke==5){
									echo "<tr>";
										echo "<td align='center'>".$i."</td>";
										if($jenis_perkara_id == 282 || $jenis_perkara_id == 13){
											echo '<td>Data disamarkan</td>';
										}else{
										echo "<td>".$pihak->nama."</td>";
										}
									echo "</tr>";
									$i++;
								}
							}									
						}
					}?>								        										
		</tbody>
	</table>
</div>
<script type="text/javascript">
closeLoading();
</script>