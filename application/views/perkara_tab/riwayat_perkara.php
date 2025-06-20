<div class="cssTable" style="margin-top:5px;">
    <table id="tableinfo">
        <colgroup>
            <col width="3%">
            <col width="20%">
            <col width="37%">
            <col width="30%">
        </colgroup>
        <tbody>
            <tr>
                <td><b>No</b></td>
                <td>Tanggal</td>
                <td>Tahapan</td>
                <td>Proses</td>
            </tr>
			<?php
			if ((isset($data_riwayat)) and (!empty($data_riwayat))){
                if($data_riwayat->num_rows>0){
                    $no=1;
                    foreach ($data_riwayat->result() as $row){
                        echo '<tr>';
                            echo '<td>'.$no.'</td>';
                            echo '<td>'.$this->tanggalhelper->convertDayDate($row->tanggal).'</td>';
                            echo '<td>'.$row->tahapan.'</td>';
                            echo '<td>'.$row->proses.'</td>';
                        echo '</tr>';
                        $no++;
                    }
                }else{
                    echo '<tr><td align="center" colspan="4">DATA TIDAK DITEMUKAN</td></tr>';
                }
			}else{
                    echo '<tr><td align="center" colspan="4">DATA TIDAK DITEMUKAN</td></tr>';
                }
			?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
closeLoading();
</script>
