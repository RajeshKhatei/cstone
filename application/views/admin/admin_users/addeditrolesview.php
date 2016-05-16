<?php 
$roleId="";
$roleName="";
foreach ($role->result() as $r){
	$roleId=$r->roleId;
	$roleName=$r->roleName;
}
?>
<div class="widget_wrap">
<div class="widget_top">
    <span class="h_icon list"></span>
    <h6>Add/Edit Roles</h6>
</div>
<div class="widget_content">
    <form action="#" method="post" id="saverolesform" class="form_container left_label">
    <input type="hidden" name="roleId" id="roleId" value="<?php echo $roleId;?>"/>
        <ul style="list-style:none;">
            <li>
            <div class="form_grid_12">
                <label class="field_title" for="roleName">Role Name<span class="req">*</span></label>
                <div class="form_input">
                    <input name="roleName" id="roleName" value="<?php echo $roleName;?>" data-edit="<?php echo $roleName; ?>" type="text" class="clear_fields" tabindex="1" />
                </div>
            </div>
            </li>
            
            <?php 
            if($modules->num_rows()>0){
            foreach ($modules->result()as $rowmod){
            
                $viewchecked="";
                $addchecked="";
                $editchecked="";
                $deletechecked="";
                $adddisabled="";
                $editdisabled="";
                $deletedisabled="";
                if($rowmod->view==1){
                    $viewchecked="checked";
                }
                if($rowmod->add==1){
                    $addchecked="checked";
                }
                if($rowmod->edit==1){
                    $editchecked="checked";
                }
                if($rowmod->delete==1){
                    $deletechecked="checked";
                }	
            ?>
            
            <li>
            <div class="form_grid_12">
                <label class="field_title" for="<?php echo $rowmod->moduleName;?>"><?php echo $rowmod->moduleName;?>: </label>
                <div class="form_input">
                <input name="view_<?php echo $rowmod->moduleId;?>" <?php echo $viewchecked?> id="" type="checkbox" class="clear_check" />View&nbsp;	&nbsp;	&nbsp;&nbsp;
                <input name="add_<?php echo $rowmod->moduleId;?>" <?php echo $addchecked?> id="" type="checkbox" class="clear_check" />Add 	&nbsp;	&nbsp;	&nbsp; &nbsp;
                <input name="edit_<?php echo $rowmod->moduleId;?>" <?php echo $editchecked?> id="" type="checkbox" class="clear_check" />Edit&nbsp;	&nbsp;	&nbsp;&nbsp;
                <input name="delete_<?php echo $rowmod->moduleId;?>" <?php echo $deletechecked?> id="" type="checkbox" class="clear_check" />Delete	&nbsp;	&nbsp;	&nbsp;&nbsp;
                
                </div>
            </div>
            </li>
            <?php }
            }else{
                $modules=$this->adminmodel->getmodules();
                foreach ($modules->result()as $m){?>
                
                <li>
                <div class="form_grid_12">
                    <label class="field_title" for="<?php echo $m->moduleName;?>"><?php echo $m->moduleName;?>: </label>
                    <div class="form_input">
                    <input name="view_<?php echo $m->moduleId;?>"  id="" type="checkbox" class="clear_check" />View&nbsp;	&nbsp;	&nbsp;&nbsp;
                    <input name="add_<?php echo $m->moduleId;?>" id="" type="checkbox" class="clear_check" />Add 	&nbsp;	&nbsp;	&nbsp; &nbsp;
                    <input name="edit_<?php echo $m->moduleId;?>"  id="" type="checkbox" class="clear_check" />Edit&nbsp;	&nbsp;	&nbsp;&nbsp;
                    <input name="delete_<?php echo $m->moduleId;?>"  id="" type="checkbox" class="clear_check" />Delete	&nbsp;	&nbsp;	&nbsp;&nbsp;
                    
                    </div>
                </div>
                </li>
                <?php }
            
             }?>
            
            <li>
            <div class="form_grid_12">
                <div class="form_input">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-primary clear_button">Reset</button>
                </div>
            </div>
            </li>
        </ul>
    </form>
</div>
</div>