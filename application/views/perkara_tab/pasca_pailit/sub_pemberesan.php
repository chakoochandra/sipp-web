<div id="pageTitle">Pemberesan</div>
<hr class="thick-line" style="clear:both;">
<div class="btn-group" style="margin-top:-15px">
    <a role="button" href="#beres1" class="beresbut btn btn-success btn-sm" style="color:white" id="penjualan">Penjualan Harta Pailit</a>
    <a role="button" href="#beres2" class="beresbut btn btn-success btn-sm" style="color:white" id="pembagian">Pembagian Harta Pailit</a>
    <a role="button" href="#beres3" class="beresbut btn btn-success btn-sm" style="color:white" id="keberatan">Keberatan Atas Daftar Pembagian Harta Pailit</a>
    <a role="button" href="#beres4" class="beresbut btn btn-success btn-sm" style="color:white" id="tindakan_hakim">Tindakan Hakim Pengawas</a>
</div>

<div id="penjualandiv" class="konten" style="margin:0;padding:0"></div>

<div id="pembagiandiv" class="konten" style="margin:0;padding:0"></div>

<div id="keberatandiv" class="konten" style="margin:0;padding:0"></div>

<div id="tindakan_hakimdiv" class="konten" style="margin:5px 0 0 0;padding:0"></div>

<script>
$(".konten").hide();

$(function() {
  $(".beresbut").on("click",function(e) {
    e.preventDefault();
    $(".konten").hide();
    $("#"+this.id+"div").show();
    $(".beresbut").removeClass('active');
    $(".beresbut").css('color','white');
    $("#"+this.id).addClass('active');
    $("#"+this.id).css('color','orange');

    if($(this).attr('href')=='#beres1'){
        var enc = "<?php echo $enc ?>"
       openLoadingDialog(); 
       $('#penjualandiv').load('<?php echo base_url("sub_harta_pailit/".$enc);?>');
    }
    if($(this).attr('href')=='#beres2'){
        var enc = "<?php echo $enc ?>"
       openLoadingDialog(); 
       $('#pembagiandiv').load('<?php echo base_url("sub_pembagian_harta_pailit/".$enc);?>');
    }
    if($(this).attr('href')=='#beres3'){
        var enc = "<?php echo $enc ?>"
       openLoadingDialog(); 
       $('#keberatandiv').load('<?php echo base_url("sub_keberatan_harta_pailit/".$enc);?>');
    }    
    if($(this).attr('href')=='#beres4'){
        var perkaraid='<?php echo $enc;?>';
        var prosesid='<?php echo base64_encode($this->encrypt->encode('407')); ?>';
        var urutanpasca='<?php echo $urutan_enc; ?>';
        $.ajax({
            url: '<?php echo base_url('kepailitan/manageTindakanHakimPengawas/'); ?>',
            type: 'post',
            data: {perkara_id:perkaraid,proses_id:prosesid,urutan:urutanpasca},
            success: function(response){
                $('#jadwaldiv').hide();
                $('#tindakan_hakimdiv').show();
                $('#tindakan_hakimdiv').html(response);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('ada error ambil data tindakan hakim pengawas');
            }
        });

    }     
  });
});
closeLoading();
$("#penjualan").click();
</script>