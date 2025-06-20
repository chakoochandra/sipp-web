<div id="konten">
	<div id="pageTitle">
		<b><?php echo $page_title;?></b>
	</div>
	<div id="right">
    	<div class="total_perkara">
        	Pembaharuan Data : <?php
            if($this->session->userdata('sink') != '-'){
                echo $this->session->userdata('sink'); 
                echo ' '; 
                echo $this->session->userdata('zonaWaktu');
            }else{
                echo '<font color = "red"> tanggal gagal dimuat </font>'; 
            }
            ?> 
            <?php  ?>, Total : <?php  echo number_format($total_rows, 0, ',', '.');?> Perkara
    	</div>
	</div>
    <br>
<?php $this->load->view($main_body); ?>
 
<script type="text/javascript" src="<?php echo base_url();?>resources/js/jquery.simplePagination.js"></script>
<?php
$url = base_url().$page_url.'/page/';
?>


<script type="text/javascript">
$(function() {
    var totalPage = '<?php echo $total_rows; ?>';
    var page = '<?php echo $page_number;?>';
    $('#selector').pagination({
        items: totalPage,
        itemsOnPage: 20,
        displayedPages: 3,
        cssStyle: 'light-theme',
        currentPage:page,
        onPageClick: function(pageNumber){
            window.open('<?php echo $url;?>'+pageNumber+'/<?php echo $enc; ?>/<?php echo $keyword; ?>/col/<?php echo $column_sorted; ?>','_self')
        	}
        });
    $('#selector_bottom').pagination({
        items: totalPage,
        itemsOnPage: 20,
        displayedPages: 3,
        cssStyle: 'light-theme',
        currentPage:page,
        onPageClick: function(pageNumber){
            window.open('<?php echo $url;?>'+pageNumber+'/<?php echo $enc; ?>/<?php echo $keyword; ?>/col/<?php echo $column_sorted; ?>','_self')
        	}
        });
    });
</script>
</div>
<?php $this->load->view('footer'); ?>
