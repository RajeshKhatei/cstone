<?php 
$careerId="";
$jobName="";
$shortjobDesc="";
$longjobDesc="";
foreach ($careerdetail->result()as $cd){
	$careerId=$cd->careerId;
	$jobName=$cd->jobName;
	$shortjobDesc=$cd->shortjobDesc;
	$longjobDesc=$cd->longjobDesc;
}
?>

<div class="widget_wrap">
    <div class="widget_top">
        <span class="h_icon list"></span>
        <h6>Add / Edit Career</h6>
    </div>
    <div class="widget_content">
        <form  id="addeditcareerform" class="form_container left_label" autocomplete="off">
        <input type="hidden" name="careerId" value="<?php echo $careerId;?>"/>
            <ul style="list-style:none;">
                <li>
                <div class="form_grid_12">
                    <label class="field_title">jobName<span class="req">*</span></label>
                    <div class="form_input">
                        <input type="text" name="jobName" id="jobName" class="clear_fields" value="<?php echo $jobName;?>"/>
                    </div>
                </div>
                </li> 
                <li>
                <div class="form_grid_12">
                    <div class="box border black">
                        <div class="box-title">
                            <h4><i class="fa fa-pencil-square"></i>Job Short Description</h4>
                            <div class="tools hidden-xs">
                            </div>
                        </div>
                        <div class="box-body">
                            <textarea name="shortjobDesc" id="shortjobDesc" class="clear_fields"><?php echo $shortjobDesc;?></textarea>
                        </div>
                    </div>
                </div>
                </li>  
                <li>
                <div class="form_grid_12">
                    <div class="box border black">
                        <div class="box-title">
                            <h4><i class="fa fa-pencil-square"></i>Job Long Description</h4>
                            <div class="tools hidden-xs">
                            </div>
                        </div>
                        <div class="box-body">
                            <textarea name="longjobDesc" id="longjobDesc" class="clear_fields"><?php echo $longjobDesc;?></textarea>
                        </div>
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
				
