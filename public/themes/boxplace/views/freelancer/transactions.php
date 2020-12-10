<?php
defined('FIR') OR exit();
/**
 * The template for displaying Example Read page
 */
?>
		
	    <div class="col-sm-8 col-md-9">
		   
		    <?php if($data['has_transactions'] === false): ?>
			
			  <div class="prop-info text-center"> 
				 <h3><?=$this->lang('you_have_no_transactions')?>.</h3>
				 <p><a href="<?=$this->siteUrl()?>" class="kafe-btn kafe-btn-mint-small"><?=$this->lang('look_for_products')?></a></p>
			  </div>		
		
		    <?php else: ?>
		   
		 		<div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"> <?=$this->lang('transactions')?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					   <th><?=$this->lang('product')?></th>
					   <th><?=$this->lang('paymentid')?></th>
					   <th><?=$this->lang('price_paid')?></th>
					   <th><?=$this->lang('payment_type')?></th>
					   <th><?=$this->lang('date_paid')?></th>
                      </tr>
                    </thead>
                    <tbody>
				    <?php
						foreach($data['transactions'] as $row) {	
						
						$date_added = strftime("%b %d, %Y, %H : %M %p ", strtotime($row["date_added"]));
						
					    echo '<tr>';
					    echo '<td><a href="'. $this->siteUrl().'/product/'. e($row["productid"]) .'/'. e($row["slug"]) .'" target="_blank">'. e($row["name"]) .'</a></td>';
					    echo '<td>'. e($row["paymentid"]) .'</td>';
					    echo '<td>'. e(e($this->currency)) .''. e($row["price_paid"]) .'</td>';
					    echo '<td>'. e($row["type"]) .'</td>';
					    echo '<td>'. e($date_added) .'</td>';
					    echo '</tr>';
					   }
			        ?>
                    </tbody>
                    <tfoot>
                      <tr>
					   <th><?=$this->lang('product')?></th>
					   <th><?=$this->lang('paymentid')?></th>
					   <th><?=$this->lang('price_paid')?></th>
					   <th><?=$this->lang('payment_type')?></th>
					   <th><?=$this->lang('date_paid')?></th>
                      </tr>
                    </tfoot>
                  </table>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box --> 	
			  
		    <?php endif; ?>
  
		  
	    </div><!-- /.col-md-9 -->	