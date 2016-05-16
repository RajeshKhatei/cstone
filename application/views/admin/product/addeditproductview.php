<?php 
$productId="";
$productName="";
$shortDesc="";
$longDesc="";
foreach ($productdetail->result()as $cd){
	$productId=$cd->productId;
	$productName=$cd->productName;
	$shortDesc=$cd->shortDesc;
	$longDesc=$cd->longDesc;
}
?>

<div class="widget_wrap">
    <div class="widget_top">
        <span class="h_icon list"></span>
        <h6>Add / Edit Product</h6>
    </div>
    <div class="widget_content">
        <form  id="addeditproductform" class="form_container left_label" autocomplete="off">
        <input type="hidden" name="productId" value="<?php echo $productId;?>"/>
            <ul style="list-style:none;">
                <li>
                <div class="form_grid_12">
                    <label class="field_title" for="productName">Product Name<span class="req">*</span></label>
                    <div class="form_input">
                        <input name="productName" id="productName" value="<?php echo $productName;?>" class="clear_fields" type="text"/>
                    </div>
                </div>
                </li>                
                <li>
                <div class="form_grid_12">
                    <label class="field_title" for="shortDesc">Product Short Description<span class="req">*</span></label>
                    <div class="form_input">
                        <input name="shortDesc" id="shortDesc" value="<?php echo $shortDesc;?>" class="clear_fields" type="text"/>
                    </div>
                </div>
                </li>
                <li>
                <div class="form_grid_12">
                    <div class="box border black">
                        <div class="box-title">
                            <h4><i class="fa fa-pencil-square"></i>Product Long Description</h4>
                            <div class="tools hidden-xs">
                            </div>
                        </div>
                        <div class="box-body">
                            <textarea name="longDesc" id="longDesc" class="clear_fields"><?php echo $longDesc;?></textarea>
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
				
