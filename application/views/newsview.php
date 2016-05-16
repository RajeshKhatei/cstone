<?php 
	if($news->num_rows()>0){
		foreach ($news->result() as $n){
?>
<li>
  <blockquote type="cite"><?php echo $n->eventDesciption;?></blockquote>
</li><br/>
<?php } } ?>