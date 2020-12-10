<?php
defined('FIR') OR exit();
/**
 * The template for displaying Example Create page
 */
?>
		

	 
	 <!-- ==============================================
	 Dashboard Section
	 =============================================== -->
     <section class="dashboard">
      <div class="container">
	   <div class="row">
		<div class="col-lg-12">
		
         <div class="headline">
		  <h3><?=$this->lang('withdrawal_method')?></h3>
		  <a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/withdrawals"><?=$this->lang('go_back')?></a>
		 </div>	
		 
	       <?=$this->validation()?>

         <div class="add-box">
           <form method="post" action="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/withdrawals/method">
		   
              <div class="form-group">	
			    <label><?=$this->lang('paypal_email_to_receive_payments')?></label>
                <input type="text" name="paypal_email" class="form-control" value="<?=e($data['user']['paypal_email'])?>"/>
              </div>   
		   
			  
              <?=$this->token()?>
              <button type="submit" name="add_method" class="kafe-btn kafe-btn-mint full-width"><?=$this->lang('submit')?></button>
			  
           </form>		 
		 </div><!--/ .add-box -->	
		

		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	  