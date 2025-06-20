	<div id="footer">
		<table width="100%">
			<tr>
				<td width="90%" align="center" style="font-size: 12px;vertical-align:middle;">Hak Cipta &copy; Mahkamah Agung Republik Indonesia <?php echo date('Y') ?></td>
			    <td width="10%" align="right" style="font-size: 12px;padding-right:30px;vertical-align:middle;padding-right:10px;">SIPP Lokal Versi <?php echo $this->session->userdata('app_version');?></td>
			</tr>
		</table>
	</div>
	</div>
</body>
<script type="text/javascript">
$( document ).ready(function() {
    $("body").css({ overflow: 'inherit' })
	$('#loading').fadeOut();
	$('a').click(function(event){
		var id = $(this).attr('id');
		if($(this).attr('href')!='#' && $(this).attr('href').substring(1,0)!='#' && id !='noLoading'){
			openLoadingDialog()
		}
	});
});

function closeLoading(){
    $("body").css({ overflow: 'inherit' })
    $('#loading').fadeOut();
}

function openLoadingDialog(){
	$("body").css({overflow: 'hidden'});
	$('#loading').fadeIn();
}

</script>
</html>