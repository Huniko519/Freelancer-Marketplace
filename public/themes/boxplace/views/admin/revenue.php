<?php
defined('FIR') OR exit();
/**
 * The template for displaying Home page content
 */
?>
	  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2><?=$this->lang('revenue_settings')?></h2>
        </section>

        <!-- Main content -->
        <section class="content">	 	
		 <div class="row">	
		 	
		 <div class="col-lg-12">	
		  
	       <?=$this->message()?>
	       <?=$this->validation()?>
		   
          </div>
           
		 <div class="col-lg-12">
		  
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
                </div>
                <div class="box-body">
                 <form role="form" action="<?=$this->siteUrl()?>/admin/revenue" method="post"> 
                  
                  <div class="form-group">	
                    <label><?=$this->lang('percentage_of_each_project')?></label>	
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="revenue" class="form-control" value="<?=e($data['settings']['revenue'])?>"/>
                   </div>
                  </div>
                  <div class="form-group">	
                    <label><?=$this->lang('transaction_fee')?></label>	
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="transaction_fee" class="form-control" value="<?=e($data['settings']['transaction_fee'])?>"/>
                   </div>
                  </div>
                  <div class="form-group">	
                    <label><?=$this->lang('withdrawal_limit')?></label>	
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="withdrawal_limit" class="form-control" value="<?=e($data['settings']['withdrawal_limit'])?>"/>
                   </div>
                  </div>
                  <div class="form-group">	
                    <label><?=$this->lang('how_long_to_pay')?> <?=$this->freelancer_name_plural()?></label>	
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="pay_freelancers" class="form-control" value="<?=e($data['settings']['pay_freelancers'])?>"/>
                   </div>
				   <h4><?=$this->lang('note_days')?></h4>
                  </div>
                                   
                  <div class="box-footer">
                       <?=$this->token()?>
                    <button type="submit" name="post_revenue" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->			 
                  
		 
		</div><!-- /.col -->
		
        
			 
	    </div><!-- /.row -->		  		  
	   </section><!-- /.content -->
 	 
      </div><!-- /.content-wrapper -->