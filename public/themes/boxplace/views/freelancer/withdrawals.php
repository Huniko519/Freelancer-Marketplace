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
		  <a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/withdrawals/request"><?=$this->lang('request_withdrawal')?></a>
		 </div>	
		 
		<?php if($data['has_withdrawals'] === false): ?> 
		  
		  <div class="prop-info text-center">
		     <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.$this->themePath().'/'.$this->theme()?>/assets/img/graphic.png" class="img-responsive" alt="Image" />
			 <h3><?=$this->lang('no_withdrawals')?>.</h3>
          </div><!-- /.prop-info -->	
		  
		<?php elseif($data['has_withdrawals'] === true): ?> 
		
		
		   <?php foreach($data['withdrawals_pagination'] as $row) { ?>  
			  

			 <div class="withdraw-box">
			  <div class="withdraw-bid">
			   <div class="withdraw-bid-inner">
				 <h2><?=$this->lang('amount_requested')?></h2>
				 <h4><?=e($this->currency)?><?=e($row["amount"])?></h4>
			   </div>
			  </div><!--/ .withdraw-bid -->
			  <div class="withdraw-details">
			   <div class="withdraw-description">
				<h4><?=$this->lang('you_will_be_paid')?> - <?=e($this->currency)?><?=e($row["freelancer_receive"])?></h4>
				<h4><?=$this->lang('transaction_fee')?> - <?=e($this->currency)?><?=e($row["transaction_fee"])?></h4>
				<h4>PayPal <?=$this->lang('email')?>  - <?=e($row["paypal_email"])?></h4>
				<h4><?=$this->lang('date_requested')?> - <?=strftime("%b %d, %Y, %H : %M %p ", strtotime($row['date_added'])); ?></h4>
				<h4><?=$this->lang('date_to_be_paid')?> - <?=strftime("%b %d, %Y, %H : %M %p ", strtotime($row['date_to_be_paid'])); ?></h4>
			   </div>
			  </div><!--/ .job-box-details -->
			  <div class="withdraw-bid">
			   <div class="withdraw-bid-inner">
				<?php if(e($row["action"]) === "1"): ?> 	 
					<h2><?=$this->lang('waiting_to_be_paid_by')?>  <?=$this->siteSettings('sitename')?>.</h2>
				<?php elseif(e($row["action"]) === "2"): ?> 
					<h2><?=$this->lang('you_got_paid_on')?> <?=strftime("%b %d, %Y, %H : %M %p ", strtotime($row['date_paid'])); ?>.</h2>
				<?php endif; ?> 
			   
			   </div>
			  </div><!--/ .withdraw-bid -->	
			 </div><!--/ .withdraw-box -->	
				
			  <?php } ?>	
			
			<?=$data['pagination']?>		
			  
		<?php endif; ?>  
		

		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	  