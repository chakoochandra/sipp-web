
<?php 
if($data_barang_bukti->num_rows>0){
    foreach ($data_barang_bukti->result() as $row) {
?>
        <div class="detil" style="font-size:14px;margin-top:5px;margin: 0 0;border-color: #FFFFFF">
                <table id="tableDetilPerkara" style="font-size:14px; width: 100%;">
                    <col width="15%">
                    <col width="85%">
                    <tbody>
                        <tr>
                            <td><font color="white">Tanggal Penerimaan</font></td>
                            <td style="padding:0px;padding-left:5px;">
                                <?php echo $this->tanggalhelper->convertToInputDate($row->tglPenerimaan);?>
                            </td>
                        <tr>
                            <td valign="top" style="vertical-align:top;"><font color="white">Jenis dan Uraian lengkap Barang Bukti</font></td>
                            <td><?php echo $row->jenisBB; ?><td>
                        </tr>
                        <tr>
                            <td ><font color="white">Tempat Penyimpanan</font></td>
                            <td><?php echo $row->tempatSimpan; ?></td>
                        </tr>
                        <tr>
                            <td ><font color="white">Tempat Penyerahan</font></td>
                            <td><?php echo $row->tempatPenyerahan; ?></td>
                        </tr>
                        <tr>
                            <td ><font color="white">Nama Penerima</font></td>
                            <td><?php echo $row->penerima; ?></td>
                        </tr>
                        <tr>                    
                            <td><font color="white">Tgl Penyerahan Barang Bukti</font></td>
                            <td><?php echo $this->tanggalhelper->convertToInputDate($row->tglPenyerahan);?></td>
                        </tr>
                        <tr>
                            <td ><font color="white">Catatan<font color="white"></td>
                            <td><?php echo $row->Catatan; ?></td>
                        </tr>
                </table>
        </div>
<?php
    }
}else{
?>
    <table style='width:100%'>
        <tr>
            <td style='text-align:center;font-size:14px;'>Tidak Ada Pencatatan Register Barang Bukti</td>
        </tr>
    </table>
<?php
}
?>
<script type="text/javascript">
closeLoading();
</script>