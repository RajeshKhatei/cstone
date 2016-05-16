<div class="row">
<div class="col-md-12">
<!-- BOX -->
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
                    <th>Role Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
				<?php 
                if($roles->num_rows()>0){
                    foreach ($roles->result() as $rowrole){
                ?>
                <tr>
                    
                    <td>
                        <?php echo $rowrole->roleName?>
                    </td>
                    <td>
                    <span><a class="action-icons c-edit basic-modal addadminrole" data-id="<?php echo $rowrole->roleId;?>" href="javascript:void(0);" title="Edit">Edit</a></span>
                    <span><a class="action-icons c-delete roledelete" data-id="<?php echo $rowrole->roleId;?>" href="javascript:void(0)" title="delete">Delete</a></span>
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
<!-- /BOX -->
</div>
</div>