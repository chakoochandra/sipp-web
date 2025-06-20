<style type="text/css">
#infoPerkara .wrapword li {
  display: list-item !important;
  clear: both;
  float: none !important;
}
</style>
<?php
if(!empty($data_ikrar)){
    if($data_ikrar->num_rows>0){
        foreach ($data_ikrar->result() as $row) {
?>
            <div style="font-size:14px;margin:0px;border:0px;">
                <table id='infoPerkara' style="font-size:14px;width:100%;">
                    <col width="15%">
                    <col width="85%">
                    <tbody>
                        <tr>
                            <td style="background-color:#A3DBA8;padding:5px;" colspan="2">Data Permohonan Verzet</td>
                        </tr>
                    </tbody>
                </table>
            	<table id="infoPerkara" style="font-size:14px;width:100%;">
                	<col width="20%">
                    <col width="80%">
                    <tbody>
                        <tr>
                            <td id="first-child">Tanggal Putusan Tingkat Pertama</td>
                            <td>
                                <span><?php echo $this->tanggalhelper->convertDayDate($row->tglPutusan);?></span>
                            </td>
                        </tr>
                        <tr>
                        	<td id="first-child">Tanggal Berkekuatan Hukum Tetap</td>
                            <td>
                            	<span><?php echo $this->tanggalhelper->convertDayDate($row->tglBHT);?></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div style="padding:3px;"></div>
                <table id='infoPerkara' style="font-size:14px;width:100%;">
                    <col width="15%">
                    <col width="85%">
                    <tbody>
                        <tr>
                            <td style="background-color:#A3DBA8;padding:5px;" colspan="2">Data Penetapan</td>
                        </tr>
                    </tbody>
                </table>
                <table id="infoPerkara" style="font-size:14px;width:100%;">
                    <col width="20%">
                    <col width="80%">
                    <tbody>
                        <tr>
                            <td id="first-child">Tanggal Penetapan Majelis</td>
                            <td>
                                <span>
                                    <?php echo $this->tanggalhelper->convertDayDate($row->tglPenetapanMajelis);?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td id="first-child">Majelis Hakim</td>
                            <td>
                                <span><?php echo $row->majelisHakim;?></span>
                            </td>
                        </tr>
                        <tr><td colspan="2" style='background:white;'></td></tr>
                        <tr>
                            <td id="first-child">Tanggal Penetapan Panitera Pengganti</td>
                            <td>
                                <span>
                                    <?php echo $this->tanggalhelper->convertDayDate($row->tglPenetapanPP);?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td id="first-child">Panitera Pengganti</td>
                            <td>
                                <span><?php echo $row->paniteraPengganti;?></span>
                            </td>
                        </tr>
                        <tr><td colspan="2" style='background:white;'></td></tr>
                        <tr>
                            <td id="first-child">Tanggal Penetapan Jurusita</td>
                            <td>
                                <span>
                                    <?php echo $this->tanggalhelper->convertDayDate($row->tglPenetapanJurusita);?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td id="first-child">Jurusita</td>
                            <td>
                                <span><?php echo $row->jurusita;?></span>
                            </td>
                        </tr>
                        <tr><td colspan="2" style='background:white;'></td></tr>
                        <tr>
                        	<td id="first-child">Tanggal Penetapan Sidang Ikrar Talak</td>
                            <td>
            	                <span>
            	                	<?php echo $this->tanggalhelper->convertDayDate($row->tglPenetapanSidang);?>
            	                </span>
                            </td>
                      	</tr>
                        <tr>
                        	<td id="first-child">Tanggal Sidang Pertama Ikrar Talak</td>
                            <td>
                            	<span><?php echo $this->tanggalhelper->convertDayDate($row->tglSidangPertama);?></span>
                           	</td>
                       	</tr>
                    </tbody>
                </table>
                <div style="padding:3px;"></div>
                <table id='infoPerkara' style="font-size:14px;width:100%;">
                    <col width="15%">
                    <col width="85%">
                    <tbody>
                        <tr>
                            <td style="background-color:#A3DBA8;padding:5px;" colspan="2">Data Penetapan</td>
                        </tr>
                    </tbody>
                </table>
                <table id="infoPerkara" style="font-size:14px;width:100%;">
                    <col width="20%">
                    <col width="80%">
                    <tbody>
                        <tr>
                        	<td id="first-child">Tanggal Ikrar</td>
                            <td>
                             	<span>
                                	
                                	<?php echo $this->tanggalhelper->convertDayDate($row->tglIkrar);?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                        	<td id="first-child">Status Penetapan Ikrar</td>
                            <td>
                             	<span><?php
                                if($row->IDStatusPenetapan==1)
                                    echo 'Diikrarkan';
                                elseif($row->IDStatusPenetapan==2)
                                    echo 'Pemohon Tidak Hadir';
                                elseif($row->IDStatusPenetapan==3)
                                    echo 'Rukun Kembali';
                                else
                                    echo "";
                                ?></span>
                            </td>
                        </tr>
                        <tr>
                        	<td id="first-child">Amar Penetapan Ikrar Talak</td>
                            <td style="background:white;" class="wrapword">
            					<span><?php echo $row->amarPutusan; ?></span>
            				</td>
                        </tr>
                    </tbody>
                </table>
<?php
        }
    }
}

?>
<script type="text/javascript">
closeLoading();
</script>