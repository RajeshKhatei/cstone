<?php 
	$class="alert-error";
	$alertmessage="";
	if($result>0){
		$alertmessage="Thank you for your interest !!!";
		$class="alert-success";
	}else{
		$class="alert-error";
		$alertmessage="Error occoured !!!";
	}
?>
<div class="alert <?php echo $class?>">
	<button class="close" type="button" data-dismiss="alert">×</button> 
    <strong><?php echo $alertmessage?></strong>
</div>