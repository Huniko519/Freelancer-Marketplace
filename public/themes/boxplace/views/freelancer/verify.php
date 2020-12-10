<?php
defined('FIR') OR exit();
/**
 * The template for displaying Example Read page
 */
?>
		
	    <div class="col-sm-8 col-md-9">
		 
	       <?=$this->validation()?>
		
		    <?php if($data['user']['verified'] === '2'): ?>
			
			  <div class="prop-info text-center"> 
				 <h3><?=$this->lang('your_email_is_not_verified')?>.</h3>
				 <p><a href="<?=$this->siteUrl()?>/user/verify/sendemail" class="kafe-btn kafe-btn-mint-small"><?=$this->lang('email_already_sent')?>.</a></p>
			  </div>		
		
		    <?php elseif($data['user']['verified'] === '0'): ?>
			
			  <div class="prop-info text-center"> 
				 <h3><?=$this->lang('your_email_is_not_verified')?>.</h3>
				 <p><a href="<?=$this->siteUrl()?>/user/verify/sendemail" class="kafe-btn kafe-btn-mint-small"><?=$this->lang('click_to_get_verification_code')?>.</a></p>
			  </div>	
		
		    <?php elseif($data['user']['verified'] === '1'): ?>
			
			  <div class="prop-info text-center"> 
				 <h3><?=$this->lang('email_is_verified')?></h3>
			  </div>
			  
		    <?php endif; ?>
  
		  
	    </div><!-- /.col-md-9 -->	