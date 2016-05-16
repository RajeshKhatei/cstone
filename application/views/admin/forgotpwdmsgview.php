<?php 
	$class="alert alert-block alert-danger fade in";
	$alertmessage="Email doesn't exist!!!";
	if($result==1){
		$alertmessage="New Password sent to email !!!";
		$class="alert alert-block alert-success fade in";
	}else if($result==-1){
		$class="alert alert-block alert-danger fade in";
		$alertmessage="Failed to sent New Password!!!";
	}
?>
<div class="<?php echo $class?>">
	<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
	<?php echo $alertmessage?>
</div>