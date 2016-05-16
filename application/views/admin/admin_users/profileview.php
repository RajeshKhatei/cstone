<?php 
$userId="";
$firstName="";
$lastName="";
$name="";
$username="";
$email="";
$password="";
foreach ($profile->result()as $p){
	
	if($utype=="admin"){
		
		$userId=$p->adminId;
		$firstName=$p->firstName;
		$lastName=$p->lastName;
		
	}else if($utype == "user"){
		
		$userId=$p->userId;
		$name=$p->name;
	}
	
	$username=$p->username;
	$email=$p->email;
	$password=$p->password;
}
?>

<div class="widget_wrap">
    <div class="widget_top">
        <span class="h_icon list"></span>
        <h6>Edit My Profile</h6>
    </div>
    <div class="widget_content">
        <form  id="addeditprofileform" class="form_container left_label" method="post" autocomplete="off">
        <input type="hidden" name="userId" value="<?php echo $userId;?>"/>
        <input type="hidden" name="username" value="<?php echo $username;?>"/>
            <ul style="list-style:none;">
            <?php if($utype=="admin"){?>
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
                    <label class="field_title" for="firstName">Last Name<span class="req">*</span></label>
                    <div class="form_input">
                        <input name="lastName" id="lastName" value="<?php echo $lastName;?>" class="clear_fields" type="text"/>
                    </div>
                </div>
                </li>
			<?php }else if($utype == "user"){?>
            	<li>
                <div class="form_grid_12">
                    <label class="field_title" for="name">Name<span class="req">*</span></label>
                    <div class="form_input">
                        <input name="name" id="name" value="<?php echo $name;?>" class="clear_fields" type="text"/>
                    </div>
                </div>
                </li>
            <?php } ?>
                <li>
                <div class="form_grid_12">
                    <label class="field_title" for="email">Email <span class="req">*</span></label>
                    <div class="form_input">
                        <input name="email" id="email" value="<?php echo $email;?>" type="text" class="clear_fields" tabindex="3" data-edit="<?php echo $email;?>" disabled=""/>
                    </div>
                </div>
                </li>
                <?php if($utype=="admin"){?>
                <li>
                <div class="form_grid_12">
                    <label class="field_title" for="username">Username <span class="req">*</span></label>
                    <div class="form_input">
                        <input name="username" id="username" type="text" value="<?php echo $username;?>" class="clear_fields" tabindex="4" />
                    </div>
                </div>
                </li>
                <?php } ?>
                <li>
                <div class="form_grid_12">
                    <label class="field_title" for="password">Password <span class="req">*</span></label>
                    <div class="form_input">
                        <input name="password" id="password" type="password" value="<?php echo $password;?>" class="clear_fields" tabindex="4" />
                    </div>
                </div>
                </li>
                <li>
                <div class="form_grid_12">
                    <label class="field_title" for="confirm_password">Retype Password <span class="req">*</span></label>
                    <div class="form_input">
                        <input name="confirm_password" id="confirm_password" value="<?php echo $password;?>" class="clear_fields" type="password" tabindex="4" />
                    </div>
                </div>
                </li>								
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
				
