<style type="text/css">
	.has-sub i{
		font-weight: bold;
		color:#defc3b;
		position: absolute;
		top:10px;
		left:7px;
	}
</style>
<?php
$modelClass =& get_instance();

$modelClass->load->model('default/defaults');
$query = $modelClass->defaults->getParentMenu();
$this->nativesession->set('menu_list',$query);

function print_child($data,$parent_id,$title,$link){
	$modelClass =& get_instance();
	if($data->num_rows()>0){
		echo '<li class="has-sub">';
			echo '<a href="'.$link.'">'.$title.'</a>';
			echo "<ul>";
			foreach ($data->result() as $child) {
				$link = '';
				if($child->parent==$parent_id){
					if(empty($child->link)){
						$link = '#';
					}else{
						$link = base_url().$child->link;
						if(!empty($child->params)){
							$tmp = explode('=', $child->params);
							if(count($tmp)>0){
								$link .= '/type/'.base64_encode($modelClass->encrypt->encode($child->params));
							}
						}
					}
					print_child($data,$child->id,$child->title,$link);
				}
			}
			echo "</ul>";
		echo "</li>";
	}else{
		echo '<li>';
			echo '<a href="'.$link.'"><span>'.$title.'</span></a>';
		echo "</li>";
	}
}



if($query!=false){
	echo '<div class="cssmenu">';
		echo "<ul>";
		foreach ($query->result() as $row) {
			$parent_id = $row->id;
			if($row->parent==''){
				if($row->link==''){
					$link = '#';
				}else{
					$link = base_url().$row->link;
					if(!empty($row->params)){
						$tmp = explode('=', $row->params);
						if(count($tmp)>0){
							$link .= '/'.base64_encode($modelClass->encrypt->encode($row->params));
						}
					}
				}
				print_child($query,$parent_id,$row->title,$link);
			}
		}
		echo "</ul>";
	echo '</div>';
}?>

<script type="text/javascript">
$()
  $(window).bind("scroll", function() {
  if ($(window).scrollTop() + 50 > 110) {
    $(".cssmenu").addClass("menufixed");
    $(".cssmenu").removeClass("has-sub");
    
  } else {
    $(".cssmenu").removeClass("menufixed");
  }
  
});

</script>
