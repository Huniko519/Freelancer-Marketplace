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
		  <h3><?=$this->lang('payments')?></h3>
		  <h5><?=$this->lang('money_released_from_escrow')?></h5>
		 </div>	
		 
		<?php if($data['has_payments'] === false): ?> 
		  
		  <div class="prop-info text-center">
		     <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.$this->themePath().'/'.$this->theme()?>/assets/img/graphic.png" class="img-responsive" alt="Image" />
			 <h3><?=$this->lang('no_payments')?>.</h3>
          </div><!-- /.prop-info -->	
		  
		<?php elseif($data['has_payments'] === true): ?> 
		
		
		   <?php foreach($data['payments_pagination'] as $row) { ?>  
			  
			 
			 <div class="withdraw-box">
			  <div class="withdraw-bid">
			   <div class="withdraw-bid-inner">
				 <h2><?=$this->lang('you_got_paid')?>:</h2>
				 <h4><?=e($this->currency)?><?=e($row["freelancer_money"])?></h4>
			   </div>
			  </div><!--/ .withdraw-bid -->
			  <div class="withdraw-details">
			   <div class="withdraw-description">
				 <h4><?=$this->client_name()?> <?=$this->lang('paid')?> - <?=e($this->currency)?><?=e($row["client_money"])?></h4>
				 <h4><?=$this->lang('company_fees')?> (<?=e($this->siteSettings('revenue'))?>%)  - <?=e($this->currency)?><?=e($row["company_money"])?></h4>
				 <h4><?=$this->lang('payment_date')?> - <?=strftime("%b %d, %Y, %H : %M %p ", strtotime($row['date_added'])); ?> </h4>
			   </div>
			  </div><!--/ .job-box-details -->
			 </div><!--/ .withdraw-box -->
				
			  <?php } ?>	
			
			<?=$data['pagination']?>		
			  
		<?php endif; ?>  
		

		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	  