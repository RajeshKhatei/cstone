<?php 
$testimonialId="";
$comments="";
$commentedBy="";
foreach ($testimonialdetail->result()as $cd){
	$testimonialId=$cd->testimonialId;
	$comments=$cd->comments;
	$commentedBy=$cd->commentedBy;
}
?>

<div class="widget_wrap">
    <div class="widget_top">
        <span class="h_icon list"></span>
        <h6>Add / Edit Testimonial</h6>
    </div>
    <div class="widget_content">
        <form  id="addedittestimonialform" class="form_container left_label" autocomplete="off">
        <input type="hidden" name="testimonialId" value="<?php echo $testimonialId;?>"/>
            <ul style="list-style:none;">
                <li>
                <div class="form_grid_12">
                    <label class="field_title" for="comments">Testimonial<span class="req">*</span></label>
                    <div class="form_input">
                        <textarea name="comments" id="comments" class="clear_fields"><?php echo $comments;?></textarea>
                    </div>
                </div>
                </li>                
                <li>
                <div class="form_grid_12">
                    <label class="field_title" for="commentedBy">Testimonial Given By<span class="req">*</span></label>
                    <div class="form_input">
                        <textarea name="commentedBy" id="commentedBy" class="clear_fields"><?php echo $commentedBy;?></textarea>
                    </div>
                </div>
                </li>            
                <li>
                <div class="form_grid_12">
                    <div class="form_input">
                        <button type="submit" class="btn btn-primary btndisable">Submit</button>
                    	<button type="button" class="btn btn-primary clear_button btndisable">Reset</button>
                    </div>
                </div>
                </li>
            </ul>
        </form>
    </div>
</div>
				
