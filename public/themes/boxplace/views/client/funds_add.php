<?php
defined('FIR') OR exit();
/**
 * The template for displaying Example Create page
 */
?>
		

	 
	 <!-- ==============================================
	 Latest Jobs Section
	 =============================================== -->
     <section class="dashboard">
      <div class="container">
	   <div class="row">
		<div class="col-lg-12">
		 
	       <?=$this->validation()?>
		
         <div class="headline">
		  <h3><?=$this->lang('add_funds')?></h3>
		  <h4><?=$this->lang('transaction_fee')?> :- <?=e($this->currency)?><?=e($this->siteSettings('transaction_fee'))?></h4>
		  <a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/funds"><?=$this->lang('go_back')?></a>
		 </div>	

         <div class="add-box">
           <form method="post" action="<?=$this->siteUrl()?>/<?=$this->client_url()?>/addfunds">
		   
              <div class="form-group">	
			    <label><?=$this->lang('amount_to_add_to_funds_account')?></label>
                <input type="text" name="amount" class="form-control" placeholder="<?=$this->lang('amount')?>"/>
              </div>  
		   
			  
              <?=$this->token()?>
              <button type="submit" name="add_funds" class="kafe-btn kafe-btn-mint full-width"><?=$this->lang('submit')?></button>
			  
           </form>		 
		 </div><!--/ .add-box -->	
		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	