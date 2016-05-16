<?php 
$adminId="";
$firstName="";
$lastName="";
$username="";
$password="";
$email="";
$roleId="";
foreach ($adminuser->result()as $admin){
	$adminId=$admin->adminId;
	$firstName=$admin->firstName;
	$lastName=$admin->lastName;
	$username=$admin->username;
	$password=$admin->password;
	$email=$admin->email;
	$roleId=$admin->roleId;
}
?>

<div class="widget_wrap">
    <div class="widget_top">
        <span class="h_icon list"></span>
        <h6>Add/Edit Admin Users</h6>
    </div>
    <div class="widget_content">
        <form  id="addeditadminuserform" class="form_container left_label" autocomplete="off">
        <input type="hidden" name="adminId" value="<?php echo $adminId;?>"/>
            <ul style="list-style:none;">
                <li>
                <div class="form_grid_12">
                    <label class="field_title" for="firstName">First Name<span class="req">*</span></label>
                    <div class="form_input">
                        <input name="firstName" id="firstName" value="<?php echo $firstName;?>" class="clear_fields" type="text" tabindex="1" />
                    </div>
                </div>
                </li>
                <li>
                <div class="form_grid_12">
                    <label class="field_title" for="firstName">Last Name<span class="req"></span></label>
                    <div class="form_input">
                        <input name="lastName" id="lastName" value="<?php echo $lastName;?>" class="clear_fields" type="text" tabindex="2" />
                    </div>
                </div>
                </li>
                <li>
                <div class="form_grid_12">
                    <label class="field_title" for="username">Username <span class="req">*</span></label>
                    <div class="form_input">
                        <input name="username" id="username" value="<?php echo $username;?>" type="text" class="clear_fields" tabindex="3" data-edit="<?php echo $username;?>" />
                    </div>
                </div>
                </li>
                <li>
                <div class="form_grid_12">
                    <label class="field_title" for="password">Login Password <span class="req">*</span></label>
                    <div class="form_input">
                        <input name="password" id="password" type="password" value="<?php echo $password;?>" class="clear_fields" tabindex="4" />
                    </div>
                </div>
                </li>
                <li>
                <div class="form_grid_12">
                    <label class="field_title" for="confirm_password">Retype Login Password <span class="req">*</span></label>
                    <div class="form_input">
                        <input name="confirm_password" id="confirm_password" value="<?php echo $password;?>" class="clear_fields" type="password" tabindex="4" />
                    </div>
                </div>
                </li>
                <li>
                <div class="form_grid_12">
                    <label class="field_title" for="email">Email <span class="req">*</span></label>
                    <div class="form_input">
                        <input name="email" id="email" value="<?php echo $email;?>" type="text" class="clear_fields" tabindex="3" data-edit="<?php echo $email;?>" />
                    </div>
                </div>
                </li>
                <li>
                <div class="form_grid_12">
                    <label class="field_title" for="username">Select Role<span class="req">*</span></label>
                    <div class="form_input">  
                        <select data-placeholder="Select Role" name="roleId" class="chzn-select-deselect clear_fields dd" tabindex="16">
                            <option value="">Select</option>
                            <?php 
                            $roles=$this->centaadminmodel->getroles();
                            foreach ($roles->result() as $r){?>
                            <option value="<?php echo $r->roleId;?>"<?php if ($r->roleId==$roleId){?>selected<?php }?>><?php echo $r->roleName;?></option>
                            <?php }?>
                        </select>
                    
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
				
