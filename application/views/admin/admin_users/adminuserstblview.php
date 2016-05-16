<div class="row">
<div class="col-md-12">
    <div class="box border">
        <div class="box-title">
            <h4><i class="fa fa-table"></i></h4>
            <div class="tools hidden-xs">
            </div>
        </div>
        <div class="box-body">
            <table id="" cellpadding="0" cellspacing="0" border="0" class="data_tbl datatable table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Admin Name</th>
                        <th>User Name</th>
                        <th>Email </th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
				<?php 
                    if($adminusers->num_rows()>0){
                        foreach ($adminusers->result() as $rowadminuser){
                ?>
                    <tr id="odd">		
                        <td>
                            <?php echo $rowadminuser->firstName?> <?php echo $rowadminuser->lastName?>
                        </td>
                        <td><?php echo $rowadminuser->username?></td>
                        <td>
                        <?php echo $rowadminuser->email?>
                        </td>
                        <td>
                        <?php echo $rowadminuser->roleName?>
                        </td>
                        <td>
                        <?php 
                            if($rowadminuser->status==1){
                        ?>
                        	<span class="badge_style b_done">Active</span>
                        <?php 
                            }else if($rowadminuser->status==0){
                        ?>
                        	<span class="badge_style b_suspend">Suspended</span>
                        <?php 
                            }
                        ?>
                        </td>
                        <td>
                        <span><a class="action-icons c-edit addadminuser" data-id="<?php echo $rowadminuser->adminId;?>" href="javascript:void(0);" title="Edit">Edit</a></span>                        
                        <?php 
                            if($rowadminuser->status==1){
                        ?>
                        <span><a class="action-icons c-suspend status_admin_user" href="javascript:void(0);" data-id="<?php echo $rowadminuser->adminId;?>" title="Suspend">Suspend</a></span>
                        <?php 
                            }else if($rowadminuser->status==0){
                        ?>
                        <span><a class="action-icons c-approve status_admin_user" href="javascript:void(0);" data-id="<?php echo $rowadminuser->adminId;?>" title="Activate">Activate</a></span>
                        <?php 
                            }
                        ?>
                        <span><a class="action-icons c-delete del_admin_user" href="javascript:void(0);" data-id="<?php echo $rowadminuser->adminId;?>" title="delete" id="confirm1">Delete</a></span>
                        </td>		
                    </tr>
                <?php 
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>