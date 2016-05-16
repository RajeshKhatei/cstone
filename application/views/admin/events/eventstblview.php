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
                        <th>Event Title</th>
                        <th>Event Desciption</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
				<?php 
                    if($events->num_rows()>0){
                        foreach ($events->result() as $rowevents){
                ?>
                    <tr id="odd">		
                        <td>
                            <?php echo $rowevents->eventName;?>
                        </td>
                        <td>
                        	<?php echo $rowevents->eventDesciption;?>
                        </td>
                        <td>
                        <?php 
                            if($rowevents->status==1){
                        ?>
                        	<span class="badge_style b_done">Approved</span>
                        <?php 
                            }else if($rowevents->status==0){
                        ?>
                        	<span class="badge_style b_suspend">Pending</span>
                        <?php 
                            }
                        ?>
                        </td>
                        <td>
                        <span><a class="action-icons c-edit addevents" data-id="<?php echo $rowevents->eventsId;?>" href="javascript:void(0);" title="Edit">Edit</a></span>                        
                        <?php 
                            if($rowevents->status==1){
                        ?>
                        <span><a class="action-icons c-suspend status_events" href="javascript:void(0);" data-id="<?php echo $rowevents->eventsId;?>" title="Suspend">Suspend</a></span>
                        <?php 
                            }else if($rowevents->status==0){
                        ?>
                        <span><a class="action-icons c-approve status_events" href="javascript:void(0);" data-id="<?php echo $rowevents->eventsId;?>" title="Activate">Activate</a></span>
                        <?php 
                            }
                        ?>
                        <span><a class="action-icons c-delete del_events" href="javascript:void(0);" data-id="<?php echo $rowevents->eventsId;?>" title="delete" id="confirm1">Delete</a></span>
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