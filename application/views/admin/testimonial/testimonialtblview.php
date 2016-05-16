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
                        <th>Testimonial</th>
                        <th>Testimonial Given By</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
				<?php 
                    if($testimonial->num_rows()>0){
                        foreach ($testimonial->result() as $rowtestimonial){
                ?>
                    <tr id="odd">		
                        <td>
                            <?php echo $rowtestimonial->comments;?>
                        </td>
                        <td>
                        <?php echo $rowtestimonial->commentedBy;?>
                        </td>
                        <td>
                        <?php 
                            if($rowtestimonial->status==1){
                        ?>
                        	<span class="badge_style b_done">Approved</span>
                        <?php 
                            }else if($rowtestimonial->status==0){
                        ?>
                        	<span class="badge_style b_suspend">Pending</span>
                        <?php 
                            }
                        ?>
                        </td>
                        <td>
                        <span><a class="action-icons c-edit addtestimonial" data-id="<?php echo $rowtestimonial->testimonialId;?>" href="javascript:void(0);" title="Edit">Edit</a></span>                        
                        <?php 
                            if($rowtestimonial->status==1){
                        ?>
                        <span><a class="action-icons c-suspend status_testimonial" href="javascript:void(0);" data-id="<?php echo $rowtestimonial->testimonialId;?>" title="Suspend">Suspend</a></span>
                        <?php 
                            }else if($rowtestimonial->status==0){
                        ?>
                        <span><a class="action-icons c-approve status_testimonial" href="javascript:void(0);" data-id="<?php echo $rowtestimonial->testimonialId;?>" title="Activate">Activate</a></span>
                        <?php 
                            }
                        ?>
                        <span><a class="action-icons c-delete del_testimonial" href="javascript:void(0);" data-id="<?php echo $rowtestimonial->testimonialId;?>" title="delete" id="confirm1">Delete</a></span>
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