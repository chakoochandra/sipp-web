<table style="width:100%;">
    <tr>
        <td style="width:240px;vertical-align:top">
        <div class="btn-group-vertical">
            <a role="button" id= 'tabInfos' href="#accor0" class="btn btn-success btn-sm" style="color:white">Hakim Pemeriksa & PP</a>
            <a role="button" id= 'tabInfos' href="#accor1" class="btn btn-success btn-sm" style="color:white">Penunjukan Hakim Pengawas</a>
            <a role="button" id= 'tabInfos' href="#accor2" class="btn btn-success btn-sm" style="color:white">Penunjukan Kurator</a>

            <a role="button" id= "tabInfos" href="#accor3" class="btn btn-success btn-sm" style="color:white">Publisitas</a>
            
            <a role="button" id= "tabInfos" href="#accor4" class="btn btn-success btn-sm" style="color:white">Rapat Kreditor</a>
            <a role="button" id= "tabInfos" href="#accor5" class="btn btn-success btn-sm" style="color:white">Pencabutan Pernyataan Pailit</a>
            <a role="button" id= "tabInfos" href="#accor6" class="btn btn-success btn-sm" style="color:white">Pencocokan Piutang</a>
            
            <a role="button" id= "tabInfos" href="#accor7" class="btn btn-success btn-sm" style="color:white">Gugatan Lain-Lain</a>
                
            <?php
            if($alur_perkara_id==3){//hanya ada di perkara kepailitan
                echo '<a role="button" id= "tabInfos" href="#accor8" class="btn btn-success btn-sm" style="color:white">Perdamaian</a>
                      <a role="button" id= "tabInfos" href="#accor9" class="btn btn-success btn-sm" style="color:white">Pembatalan Perdamaian</a>';
            }
            ?>
            
            <a role="button" id= "tabInfos" href="#accor10" class="btn btn-success btn-sm" style="color:white">Insolvensi</a>
            <a role="button" id= "tabInfos" href="#accor11" class="btn btn-success btn-sm" style="color:white">Pemberesan</a>
            <a role="button" id= "tabInfos" href="#accor12" class="btn btn-success btn-sm" style="color:white">Biaya Penyelesaian Kepailitan</a>
            <a role="button" id= "tabInfos" href="#accor13" class="btn btn-success btn-sm" style="color:white">Pengakhiran Kepailitan</a>
            <a role="button" id= "tabInfos" href="#accor14" class="btn btn-success btn-sm" style="color:white">Informasi Kepaniteraan</a>
            <a role="button" id= "tabInfos" href="#accor15" class="btn btn-success btn-sm" style="color:white">Laporan Berkala Kurator</a>

            
            <a role="button" id= "tabInfos" href="#accor16" class="btn btn-success btn-sm" style="color:white">Rehabilitasi</a>
                                                          
        </div>
        </td>
        <td style="height:100%;padding-left:10px;vertical-align:top">
            <div style="width:95%" id="tabs_from_accor"></div>
        </td>
    </tr>
</table>
<div style="margin-bottom:0px"></div>
<script type="text/javascript">
$( document ).ready(function() {
    var selector = 'a#tabInfos';

    $(selector).on('click', function(){
        $(selector).removeClass('active');
        $(this).addClass('active');
    });

	$('a#tabInfos').click(function(event){
			if($(this).attr('href')=='#accor0'){
                openLoadingDialog();
                $('#tabs_from_accor').load('<?php echo base_url("sub_pemeriksa/".$enc);?>');
            }else if($(this).attr('href')=='#accor1'){
                openLoadingDialog();
                $('#tabs_from_accor').load('<?php echo base_url("sub_pengawas/".$enc."/1");?>');
			}else if($(this).attr('href')=='#accor2'){
                openLoadingDialog();
                $('#tabs_from_accor').load('<?php echo base_url("sub_kurator/".$enc);?>');
			}else if($(this).attr('href')=='#accor3'){
                openLoadingDialog();
                $('#tabs_from_accor').load('<?php echo base_url("sub_publisitas/".$enc);?>');
			}else if($(this).attr('href')=='#accor4'){
                openLoadingDialog();
                $('#tabs_from_accor').load('<?php echo base_url("sub_rapat/".$enc."/".base64_encode($this->encrypt->encode(1))."/".base64_encode($this->encrypt->encode(1)));?>');
			}else if($(this).attr('href')=='#accor5'){
                openLoadingDialog();
                $('#tabs_from_accor').load('<?php echo base_url("sub_cabutpernyataan/".$enc);?>');
			}else if($(this).attr('href')=='#accor6'){
                openLoadingDialog();
                $('#tabs_from_accor').load('<?php echo base_url("sub_cocokverifikasi/".$enc."/".base64_encode($this->encrypt->encode(2))."/".base64_encode($this->encrypt->encode(1)));?>');
			}else if($(this).attr('href')=='#accor7'){
                openLoadingDialog();
                $('#tabs_from_accor').load('<?php echo base_url("sub_gugatanlain/".$enc);?>');
			}else if($(this).attr('href')=='#accor8'){
                openLoadingDialog();
                $('#tabs_from_accor').load('<?php echo base_url("sub_perdamaian/".$enc."/".base64_encode($this->encrypt->encode(3))."/".base64_encode($this->encrypt->encode(1)));?>');
			}else if($(this).attr('href')=='#accor9'){
                openLoadingDialog();
                $('#tabs_from_accor').load('<?php echo base_url("sub_bataldamai/".$enc);?>');
			}else if($(this).attr('href')=='#accor10'){
                openLoadingDialog();
                $('#tabs_from_accor').load('<?php echo base_url("sub_insolven/".$enc."/".base64_encode($this->encrypt->encode(5))."/".base64_encode($this->encrypt->encode(2)));?>');
			}else if($(this).attr('href')=='#accor11'){
                openLoadingDialog();
                $('#tabs_from_accor').load('<?php echo base_url("sub_pemberesan/".$enc);?>');
			}else if($(this).attr('href')=='#accor12'){
                openLoadingDialog();
                $('#tabs_from_accor').load('<?php echo base_url("sub_biayapenyelesaian/".$enc);?>');
			}else if($(this).attr('href')=='#accor13'){
                openLoadingDialog();
                $('#tabs_from_accor').load('<?php echo base_url("sub_pengakhiran/".$enc);?>');
			}else if($(this).attr('href')=='#accor14'){
                openLoadingDialog();
                $('#tabs_from_accor').load('<?php echo base_url("sub_pengumuman/".$enc);?>');
			}else if($(this).attr('href')=='#accor15'){
                openLoadingDialog();
                $('#tabs_from_accor').load('<?php echo base_url("sub_laporankurator/".$enc);?>');
			}else if($(this).attr('href')=='#accor16'){
                openLoadingDialog();
                $('#tabs_from_accor').load('<?php echo base_url("sub_rehabilitasi/".$enc);?>');
			}
            sessionStorage.setItem("accor",$(this).attr('href'));
	})
});

switch($(location).attr('hash')){
    case "#accor0":
        $('a[href=#accor0]').click();
        break;
    case "#accor1":
        $('a[href=#accor1]').click();
        break;
    case "#accor2":
        $('a[href=#accor2]').click();
        break;
    case "#accor3":
        $('a[href=#accor3]').click();
        break;
    case "#accor4":
        $('a[href=#accor4]').click();
        break;
    case "#accor5":
        $('a[href=#accor5]').click();
        break;
    case "#accor6":
        $('a[href=#accor6]').click();
        break;
    case "#accor7":
        $('a[href=#accor7]').click();
        break;
    case "#accor8":
        $('a[href=#accor8]').click();
        break;
    case "#accor9":
        $('a[href=#accor9]').click();
        break;
    case "#accor10":
        $('a[href=#accor10]').click();
        break;
    case "#accor11":
        $('a[href=#accor11]').click();
        break;
    case "#accor12":
        $('a[href=#accor12]').click();
        break;
    case "#accor13":
        $('a[href=#accor13]').click();
        break;
    case "#accor14":
        $('a[href=#accor14]').click();
        break;
    case "#accor15":
        $('a[href=#accor15]').click();
        break;

    default:
        if(sessionStorage.getItem("accor")!=''){
            $('a[href='+sessionStorage.getItem("accor")+']').click();
        }else{
            $('a[href=#accor1]').click();
        }
}

closeLoading();
</script>