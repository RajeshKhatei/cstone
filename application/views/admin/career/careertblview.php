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
                        <th>Job Name</th>
                        <th>Job Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
				<?php 
                    if($career->num_rows()>0){
                        foreach ($career->result() as $rowcareer){
                ?>
                    <tr id="odd">		
                        <td>
                            <?php echo $rowcareer->jobName;?>
                        </td>
                        <td>
                        <?php echo $rowcareer->shortjobDesc;?>
                        </td>
                        <td>
                        <?php 
                            if($rowcareer->status==1){
                        ?>
                        	<span class="badge_style b_done">Approved</span>
                        <?php 
                            }else if($rowcareer->status==0){
                        ?>
                        	<span class="badge_style b_suspend">Pending</span>
                        <?php 
                            }
                        ?>
                        </td>
                        <td>
                        <span><a class="action-icons c-edit addcareer" data-id="<?php echo $rowcareer->careerId;?>" href="javascript:void(0);" title="Edit">Edit</a></span>                        
                        <?php 
                            if($rowcareer->status==1){
                        ?>
                        <span><a class="action-icons c-suspend status_career" href="javascript:void(0);" data-id="<?php echo $rowcareer->careerId;?>" title="Suspend">Suspend</a></span>
                        <?php 
                            }else if($rowcareer->status==0){
                        ?>
                        <span><a class="action-icons c-approve status_career" href="javascript:void(0);" data-id="<?php echo $rowcareer->careerId;?>" title="Activate">Activate</a></span>
                        <?php 
                            }
                        ?>
                        <span><a class="action-icons c-delete del_career" href="javascript:void(0);" data-id="<?php echo $rowcareer->careerId;?>" title="delete" id="confirm1">Delete</a></span>
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