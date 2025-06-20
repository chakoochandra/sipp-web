
<div style="margin:5px 0 0 0;padding-bottom:0">
<table style="width:100%;">
    <tr>
        <td>
        <div id="pageTitle" style="margin:0;padding:0;width:100%;text-align:right">Daftar Harta Pailit</div>
        </td></tr>
</table>
</div>

<div class="cssTable">
<table>
    <col  width="30px" />
    <col  width="" />
    <col  width="15%" />
 
    
    <tbody>
    <tr>
        <td>No</td>
        <td>Nomor Surat</td>
        <td>Tanggal Surat</td>
 
        
    </tr>
    <?php
    if($harta_pailit->num_rows() > 0 ) {
        $no=1;
        foreach ($harta_pailit->result() as $row) {
            $datagab=base64_encode($this->encrypt->encode($this->encrypt->decode(base64_decode($enc)).'|'.$row->id));
            echo'<tr>
            <td style="text-align:center">'.$no++.'</td>
            <td style="text-align:center">'.$row->nomor.'</td>
            <td style="text-align:center">'.$this->tanggalhelper->convertDayDate($row->tanggal).'</td>
            
            </td>
            
            </tr>';

        }
    } else {

        echo ' <tr><td colspan="3" class="text-center">Data Tidak Ditemukan</td></tr>';
    }
    ?>
    </tbody>
</table>
</div>


<div style="margin:5px 0 0 0;padding-bottom:0">
<table style="width:100%;">
    <tr>
        <td>
        <div id="pageTitle" style="margin:0;padding:0;width:100%;text-align:right">Appraisal</div>
        </td></tr>
</table>
</div>
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
        <td>Nama Pelaksana</td>
        
        
    </tr>
    <?php
    if($appraisal->num_rows() > 0 ) {
        $no=1;
        foreach ($appraisal->result() as $row) {
            $datagab=base64_encode($this->encrypt->encode($this->encrypt->decode(base64_decode($enc)).'|'.$row->id));
            echo'<tr>
            <td style="text-align:center">'.$no++.'</td>
            <td style="text-align:center">'.$row->nomor.'</td>
            <td style="text-align:center">'.$this->tanggalhelper->convertDayDate($row->tanggal).'</td>
            <td style="text-align:center">'.$row->nama_pelaksana_appraisal.'</td>
            
                
            </tr>';

        }
    } else {

        echo ' <tr><td colspan="4" class="text-center">Data Tidak Ditemukan</td></tr>';
    }
    ?>
    </tbody>
</table>
</div>

<div style="margin:5px 0 0 0;padding-bottom:0">
<table style="width:100%;">
    <tr>
        <td>
        <div id="pageTitle" style="margin:0;padding:0;width:100%;text-align:right">Laporan Lelang</div>
        </td></tr>
</table>
</div>
<div class="cssTable">
<table>
    <col  width="30px" />
    <col  width="" />
    <col  width="15%" />
    
    <tbody>
    <tr>
        <td>No</td>
        <td>Nomor Laporan</td>
        <td>Tanggal Laporan</td>
        
    </tr>
    <?php
    if($lap_lelang->num_rows() > 0 ) {
        $no=1;
        foreach ($lap_lelang->result() as $row) {
            $datagab=base64_encode($this->encrypt->encode($this->encrypt->decode(base64_decode($enc)).'|'.$row->id));
            echo'<tr>
            <td style="text-align:center">'.$no++.'</td>
            <td style="text-align:center">'.$row->nomor.'</td>
            <td style="text-align:center">'.$this->tanggalhelper->convertDayDate($row->tanggal).'</td>
           
           
       
            </tr>';

        }
    } else {

        echo ' <tr><td colspan="3" class="text-center">Data Tidak Ditemukan</td></tr>';
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