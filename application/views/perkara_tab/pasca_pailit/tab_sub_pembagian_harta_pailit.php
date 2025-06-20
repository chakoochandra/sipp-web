
<div class="cssTable">
<table>
    <col  width="30px" />
    <col  width="" />
    <col  width="15%" />
    <col  width="" />
    
    <tbody>
    <tr>
        <td>No</td>
        <td>Nomor Surat</td>
        <td>Tanggal Surat</td>
        <td>Status</td>
        
    </tr>
    <?php
    if($pembagian_harta_pailit->num_rows() > 0 ) {
        $no=1;
        foreach ($pembagian_harta_pailit->result() as $row) {
            $datagab=base64_encode($this->encrypt->encode($this->encrypt->decode(base64_decode($enc)).'|'.$row->id));
            echo'<tr>
            <td style="text-align:center">'.$no++.'</td>
            <td style="text-align:center">'.$row->nomor.'</td>
            <td style="text-align:center">'.$this->tanggalhelper->convertDayDate($row->tanggal).'</td>
            <td style="text-align:center">'.$row->status.'</td>
            
            </tr>';

        }
    } else {

        echo ' <tr><td colspan="4" class="text-center">Data Tidak Ditemukan</td></tr>';
    }
    ?>
    </tbody>
</table>
</div>

<script>

$(function() {
  $(".penpublish").on("click",function(e) {
    $(".modal").modal('show');
});
});
closeLoading();
</script>