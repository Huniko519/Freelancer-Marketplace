<?php
defined('FIR') OR exit();
/**
 * The template for displaying the footer section
 */
?>
	 	
	  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2><?=$this->lang('payment_settings')?></h2>
        </section>

        <!-- Main content -->
        <section class="content">	 	
		 <div class="row">	
		 	
		 <div class="col-lg-12">
		 
	       <?=$this->message()?>
	       <?=$this->validation()?>
		   
          </div>	
           
          <div class="col-lg-4">
          	<?php $paypal = ($data['m'] == 'paypal') ? ' active' : ''; ?>
          	<?php $stripe = ($data['m'] == 'stripe') ? ' active' : ''; ?>
          	<?php $razorpay_active = ($data['m'] == 'razorpay') ? ' active' : ''; ?>
          	<?php $paystack_active = ($data['m'] == 'paystack') ? ' active' : ''; ?>
          	<?php $bank_active = ($data['m'] == 'bank_transfer') ? ' active' : ''; ?>
	         <div class="list-group">
	         <a href="<?=$this->siteUrl()?>/admin/payment_settings/paypal" class="list-group-item<?php echo e($paypal); ?>">
	          <em class="fa fa-fw fa-paypal text-white"></em>&nbsp;&nbsp;&nbsp;Paypal
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/payment_settings/stripe" class="list-group-item<?php echo e($stripe); ?>">
	          <em class="fa fa-fw fa-sheqel text-white"></em>&nbsp;&nbsp;&nbsp;Stripe
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/payment_settings/razorpay" class="list-group-item<?php echo e($razorpay_active); ?>">
	          <em class="fa fa-fw fa-rupee text-white"></em>&nbsp;&nbsp;&nbsp;Razorpay
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/payment_settings/paystack" class="list-group-item<?php echo e($paystack_active); ?>">
	          <em class="fa fa-fw fa-rupee text-white"></em>&nbsp;&nbsp;&nbsp;Paystack
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/payment_settings/bank_transfer" class="list-group-item<?php echo e($bank_active); ?>">
	          <em class="fa fa-fw fa-edit text-white"></em>&nbsp;&nbsp;&nbsp;Bank Transfer
			 </a>
			 
	         </div>
          </div>
          
		 <div class="col-lg-8">
		 <?php if ($data['m'] == 'paypal') : ?>
		 
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Paypal <?=$this->lang('settings')?></h3>
                </div>
                <div class="box-body">
                 <form role="form" action="<?=$this->siteUrl()?>/admin/payment_settings" method="post"> 
				 
                  <div class="form-group">	
                    <label><?=$this->lang('active')?></label>
					<select class="form-control" name="paypal_active">
					 <option value="1" <?=(e($data['settings']['paypal_active']) == '1' ? ' selected' : '')?>><?=$this->lang('no')?></option>
					 <option value="2" <?=(e($data['settings']['paypal_active']) == '2' ? ' selected' : '')?>><?=$this->lang('yes')?></option>
					</select>
                  </div>
				 
                  <div class="form-group">	
                    <label><?=$this->lang('sandbox')?></label>
					<select class="form-control" name="sandbox">
					 <option value="1" <?=(e($data['settings']['sandbox']) == '1' ? ' selected' : '')?>><?=$this->lang('yes')?></option>
					 <option value="2" <?=(e($data['settings']['sandbox']) == '2' ? ' selected' : '')?>><?=$this->lang('no')?></option>
					</select>
                  </div>
				 
                  <div class="form-group">	
                    <label>Paypal <?=$this->lang('email')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="paypal_email" class="form-control" value="<?=e($data['settings']['paypal_email'])?>"/>
                   </div>
                  </div>
                                   
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="postpaypal" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  
		 <?php elseif ($data['m'] == 'stripe') : ?>
		 
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Stripe <?=$this->lang('settings')?></h3>
                </div>
                <div class="box-body">
                 <form role="form" action="<?=$this->siteUrl()?>/admin/payment_settings" method="post"> 
				 
                  <div class="form-group">	
                    <label><?=$this->lang('active')?></label>
					<select class="form-control" name="stripe_active">
					 <option value="1" <?=(e($data['settings']['stripe_active']) == '1' ? ' selected' : '')?>><?=$this->lang('no')?></option>
					 <option value="2" <?=(e($data['settings']['stripe_active']) == '2' ? ' selected' : '')?>><?=$this->lang('yes')?></option>
					</select>
                  </div>
				 
                  <div class="form-group">	
                    <label>Secret Key</label>
                    <input type="text" name="stripe_secret_key" class="form-control" value="<?=e($data['settings']['stripe_secret_key'])?>"/>
                  </div>
				 
                  <div class="form-group">	
                    <label>Publishable Key</label>
                    <input type="text" name="stripe_public_key" class="form-control" value="<?=e($data['settings']['stripe_public_key'])?>"/>
                  </div>
                                   
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="poststripe" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  
		 <?php elseif ($data['m'] == 'razorpay') : ?>
		 
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Razorpay <?=$this->lang('settings')?></h3>
                </div>
                <div class="box-body">
                 <form role="form" action="<?=$this->siteUrl()?>/admin/payment_settings" method="post"> 
				 
                  <div class="form-group">	
                    <label><?=$this->lang('active')?></label>
					<select class="form-control" name="razorpay_active">
					 <option value="1" <?=(e($data['settings']['razorpay_active']) == '1' ? ' selected' : '')?>><?=$this->lang('no')?></option>
					 <option value="2" <?=(e($data['settings']['razorpay_active']) == '2' ? ' selected' : '')?>><?=$this->lang('yes')?></option>
					</select>
                  </div>
				 
                  <div class="form-group">	
                    <label>Razorpay Key Id</label>
                    <input type="text" name="razorpay_key_id" class="form-control" value="<?=e($data['settings']['razorpay_key_id'])?>"/>
                  </div>
                                   
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="postrazorpay" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  
		 <?php elseif ($data['m'] == 'paystack') : ?>
		 
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Paystack <?=$this->lang('settings')?></h3>
                </div>
                <div class="box-body">
                 <form role="form" action="<?=$this->siteUrl()?>/admin/payment_settings" method="post"> 
				 
                  <div class="form-group">	
                    <label><?=$this->lang('active')?></label>
					<select class="form-control" name="paystack_active">
					 <option value="1" <?=(e($data['settings']['paystack_active']) == '1' ? ' selected' : '')?>><?=$this->lang('no')?></option>
					 <option value="2" <?=(e($data['settings']['paystack_active']) == '2' ? ' selected' : '')?>><?=$this->lang('yes')?></option>
					</select>
                  </div>
				 
                  <div class="form-group">	
                    <label>Paystack Key Id</label>
                    <input type="text" name="paystack_key" class="form-control" value="<?=e($data['settings']['paystack_key'])?>"/>
                  </div>
                                   
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="post_paystack" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  
		 <?php elseif ($data['m'] == 'bank_transfer') : ?>
		 
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Bank Transfer <?=$this->lang('settings')?></h3>
                </div>
                <div class="box-body">
                 <form role="form" action="<?=$this->siteUrl()?>/admin/payment_settings" method="post"> 
				 
                  <div class="form-group">	
                    <label><?=$this->lang('active')?></label>
					<select class="form-control" name="bank_active">
					 <option value="1" <?=(e($data['settings']['bank_active']) == '1' ? ' selected' : '')?>><?=$this->lang('no')?></option>
					 <option value="2" <?=(e($data['settings']['bank_active']) == '2' ? ' selected' : '')?>><?=$this->lang('yes')?></option>
					</select>
                  </div>
				 
                  <div class="form-group">	
                    <label><?=$this->lang('bank_details')?></label>
                    <textarea type="text" name="bank_description" id="summernote" class="form-control" rows="4"><?=e($data['settings']['bank_description'])?></textarea>
                  </div>
                                   
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="post_bank" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
	    			 
	    			 
		 <?php endif; ?>
		 
		</div><!-- /.col -->
		
        
			 
	    </div><!-- /.row -->		  		  
	   </section><!-- /.content -->
      </div><!-- /.content-wrapper -->