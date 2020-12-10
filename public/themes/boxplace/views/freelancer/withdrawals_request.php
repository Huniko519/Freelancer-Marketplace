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
		  <h3><?=$this->lang('withdrawals')?></h3>
		  <h4> <?=$this->lang('amount_in_your_account')?> - <?=$this->currency?><?=e($data['user']['credit_account'])?> .</h4>
		  <h5> <?=$this->lang('payments_will_be_processed')?> <?=$this->siteSettings('pay_freelancers')?> <?=$this->lang('days_of_request')?>.</h5>
		  <h5> <?=$this->lang('transaction_fee')?> - <?=$this->currency?><?=$this->siteSettings('transaction_fee')?>.</h5>
		  <h5> <?=$this->lang('withdrawal_limit')?> - <?=$this->currency?><?=$this->siteSettings('withdrawal_limit')?>.</h5>
		  <a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/withdrawals"><?=$this->lang('go_back')?></a>
		 </div>	
		 
	       <?=$this->validation()?>

         <div class="add-box">
           <form method="post" action="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/withdrawals/request">
		   
              <div class="form-group">	
			    <label><?=$this->lang('amount_you_want_to_withdraw')?></label>
                <input type="text" name="amount" class="form-control" placeholder="<?=$this->lang('amount')?> e.g 100" value=""/>
              </div>   
		   
			  
              <?=$this->token()?>
              <button type="submit" name="add_request" class="kafe-btn kafe-btn-mint full-width"><?=$this->lang('submit')?></button>
			  
           </form>		 
		 </div><!--/ .add-box -->	
		

		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	  