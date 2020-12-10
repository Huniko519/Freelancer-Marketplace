<?php
defined('FIR') OR exit();
/**
 * The template for displaying Example Read page
 */
?>
		
	    <div class="col-sm-8 col-md-9">
		 
	       <?=$this->validation()?>
		   
		    <?php if($data['has_transactions'] === false): ?>
			
			  <div class="prop-info text-center"> 
				 <h3><?=$this->lang('you_have_no_purchases')?>.</h3>
				 <p><a href="<?=$this->siteUrl()?>" class="kafe-btn kafe-btn-mint-small"><?=$this->lang('look_for_products')?></a></p>
			  </div>		
		
		    <?php else: ?>
		   
		 		<div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"> <?=$this->lang('products_you_have_purchased')?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					   <th><?=$this->lang('image')?></th>
					   <th><?=$this->lang('name')?></th>
					   <th><?=$this->lang('price_paid')?></th>
					   <th><?=$this->lang('download')?></th>
                      </tr>
                    </thead>
                    <tbody>
				    <?php
						foreach($data['transactions'] as $row) {	
						
					    echo '<tr>';
					    echo '<td><img src="'. $this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH .'/admin/products/'. e($row["imagelocation"]) .'" width="100" height="70" /></td>';
					    echo '<td><a href="'. $this->siteUrl().'/product/'. e($row["productid"]) .'/'. e($row["slug"]) .'" target="_blank">'. e($row["name"]) .'</a></td>';
					    echo '<td>'. e(e($this->currency)) .''. e($row["price_paid"]) .'</td>';
						
						
					    echo '<td>
					      <a href="'. $this->siteUrl() .'/user/download/' . e($row["productid"]) . '" class="kafe-btn kafe-btn-mint-small"><span class="fa fa-download"></span> '. $this->lang('download') .'</a>
						  
                          </td>';
					    echo '</tr>';
					   }
			        ?>
                    </tbody>
                    <tfoot>
                      <tr>
					   <th><?=$this->lang('image')?></th>
					   <th><?=$this->lang('name')?></th>
					   <th><?=$this->lang('price_paid')?></th>
					   <th><?=$this->lang('download')?></th>
                      </tr>
                    </tfoot>
                  </table>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box --> 	
			  
		    <?php endif; ?>
  
		  
	    </div><!-- /.col-md-9 -->	