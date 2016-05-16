<?php 
$eventsId="";
$eventName="";
$eventDesciption="";
foreach ($eventsdetail->result()as $cd){
	$eventsId=$cd->eventsId;
	$eventName=$cd->eventName;
	$eventDesciption=$cd->eventDesciption;
}
?>

<div class="widget_wrap">
    <div class="widget_top">
        <span class="h_icon list"></span>
        <h6>Add/Edit Events</h6>
    </div>
    <div class="widget_content">
        <form  id="addediteventsform" class="form_container left_label" autocomplete="off">
        <input type="hidden" name="eventsId" id="eventsId" value="<?php echo $eventsId;?>"/>
            <ul style="list-style:none;">
                <li>
                <div class="form_grid_12">
                    <label class="field_title" for="title">Event Title<span class="req">*</span></label>
                    <div class="form_input">
                        <input name="eventName" id="eventName" value="<?php echo $eventName;?>" class="clear_fields" type="text"/>
                    </div>
                </div>
                </li>                   
                <li>
                <div class="form_grid_12">
                    <div class="box border black">
                        <div class="box-title">
                            <h4><i class="fa fa-pencil-square"></i>Events Long Content</h4>
                            <div class="tools hidden-xs">
                            </div>
                        </div>
                        <div class="box-body">
                            <textarea name="eventDesciption" id="eventDesciption" class="clear_fields"><?php echo $eventDesciption;?></textarea>
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
				
