<?php 
	$class="alert alert-block alert-danger fade in";
	$alertmessage="User Name or Password is wrong !!!";
	if($result==1){
		$alertmessage="Successfully Logged in!!!";
		$class="alert alert-block alert-success fade in";
	}else if($result==-1){
		$class="alert alert-block alert-danger fade in";
		$alertmessage="Your account is suspended !!!";
	}
?>
<div class="<?php echo $class?>">
	<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
	<?php echo $alertmessage?>
</div>