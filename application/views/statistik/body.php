<div id="konten">
    <div id="pageTitle">
        <?php echo $page_title;?>
    </div>
    <hr class="thick-line" style="clear:both;">
    <?php $this->load->view($main_body); ?>
</div>
<?php $this->load->view('footer'); ?>
