
<div class="cssTable">
<table>
        <col  width="30px" />
        <col  width="" />
        <col  width="15%" />
        <col  width="" />
        <col  width="" />

    <tbody>
    <tr>
        <td>No</td>
        <td>Nomor Perkara</td>
        <td>Tanggal Register</td>
        <td>Klasifikasi Perkara</td>
        <td>Status Perkara</td>
       
    </tr>
    <?php
    if($cek_perkara_id_keberatan>0){
        $no=1;
        foreach ($perkara_keberatan->result() as $row) {
            echo'<tr>
            <td style="text-align:center">'.$no++.'</td>
            <td style="text-align:center">'.$row->nomor_perkara.'</td>
            <td style="text-align:center">'.$this->tanggalhelper->convertDayDate($row->tanggal_pendaftaran).'</td>
            <td style="text-align:center">'.$row->jenis_perkara_nama.'</td>
            <td style="text-align:center">'.$row->tahapan_terakhir_text.'</td>
            
       
            </tr>';

        }
    } else {
        echo ' <tr><td colspan="5">Data Tidak Ditemukan</td></tr>';
    }
    ?>
    </tbody>
</table>
</div>


<script>

closeLoading();
</script>