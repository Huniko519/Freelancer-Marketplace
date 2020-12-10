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
		  <h3><?=$this->lang('checkout')?></h3>
		  <h4><?=$this->lang('amount')?> :- <?=e($this->currency)?><?=e($data['amount'])?></h4>
		  <a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/funds"><?=$this->lang('go_back')?></a>
		 </div>	


		   
		   <?php if($data['settings']['paypal_active'] === "2"): ?> 
	
	
		   
			 <div class="payment-box">
			  <div class="payment-details">
			   <div class="payment-description">
				<h4>PayPal</h4>
				<p><?=$this->lang('purchase_via')?> PayPal.</p>
				<p><?=$this->lang('click_return_to_merchant')?>.</p>
			   </div>
			  </div><!--/ .job-box-details -->
			  <div class="payment-bid">
			   <div class="payment-bid-inner">
				<?=$data["paypal_form"]->submit_formnull_post()?>
				<?=$data["paypal_form"]->submit_paypal_post()?>
			   </div>
			  </div><!--/ .payment-bid -->	
			 </div><!--/ .payment-box -->

           <?php endif; ?>	
		   
		   <?php if($data['settings']['stripe_active'] === "2"): ?>
		   
			 <div class="payment-box">
			  <div class="payment-details">
			   <div class="payment-description">
				<h4>Stripe</h4>
				<p><?=$this->lang('purchase_via')?> Stripe.</p>
			   </div>
			  </div><!--/ .job-box-details -->
			  <div class="payment-bid">
			   <div class="payment-bid-inner">
				
			
				<form action="<?=$this->siteUrl()?>/<?=$this->client_url()?>/stripe/success" method="post">
				  <script src="//checkout.stripe.com/checkout.js" class="stripe-button"
						  data-key="<?=e($data["settings"]['stripe_public_key'])?>"
						  data-description="Funds Checkout"
						  data-email="<?=e($data["user"]["email"])?>"
						  data-currency="<?=e($data["currency_code"])?>"
						  data-amount="<?=e($data['amount_cents'])?>"
						  data-locale="auto"></script>
                    <?=$this->token()?>
				</form>	
				
				
			   </div>
			  </div><!--/ .payment-bid -->	
			 </div><!--/ .payment-box -->	

           <?php endif; ?>		
		   
		   <?php if($data['settings']['razorpay_active'] === "2"): ?>
		   
			 <div class="payment-box">
			  <div class="payment-details">
			   <div class="payment-description">
				<h4>Razorpay</h4>
				<p><?=$this->lang('purchase_via')?> Razorpay.</p>
				<p><?=$this->lang('this_is_for_indian_currency')?>.</p>
			   </div>
			  </div><!--/ .job-box-details -->
			  <div class="payment-bid">
			   <div class="payment-bid-inner">
		 
				<form action="<?=$this->siteUrl()?>/<?=$this->client_url()?>/razorpay/success" method="POST">
				<!-- Note that the amount is in paise = 50 INR -->
				<script
					src="//checkout.razorpay.com/v1/checkout.js"
					data-key="<?=e($data["settings"]['razorpay_key_id'])?>"
					data-amount="<?=e($data['amount_cents'])?>"
					data-buttontext="Pay with Razorpay"
					data-name="<?=e($data["settings"]['sitename'])?>"
					data-description="Funds Checkout"
					data-image=""
					data-prefill.name="<?=e($data["user"]["name"])?>"
					data-prefill.email="<?=e($data["user"]["email"])?>"
					data-theme.color="#F37254"
				></script>
				<input type="hidden" value="Hidden Element" name="hidden">
                    <?=$this->token()?>
				</form>	
			
			   </div>
			  </div><!--/ .payment-bid -->	
			 </div><!--/ .payment-box -->	

           <?php endif; ?>	
		   
		   
		   <?php if($data['settings']['paystack_active'] === "2"): ?>
		   
			 <div class="payment-box">
			  <div class="payment-details">
			   <div class="payment-description">
				<h4>Paystack</h4>
				<p><?=$this->lang('purchase_via')?> Paystack.</p>
				<p><?=$this->lang('this_is_for_nigerian_currency')?>.</p>
			   </div>
			  </div><!--/ .job-box-details -->
			  <div class="payment-bid">
			   <div class="payment-bid-inner">
			   
				<form >
				  <script src="//js.paystack.co/v1/inline.js"></script>
				  <button type="button" class="kafe-btn kafe-btn-danger" onclick="payWithPaystack()"> Pay with Paystack</button> 
				</form>
				 
				<script>
				  function payWithPaystack(){
					var handler = PaystackPop.setup({
					  key: '<?=e($data['settings']['paystack_key'])?>',
					  email: '<?=e($data["user"]["email"])?>',
					  amount: "<?=e($data['payment_paystack'])?>",
					  currency: "NGN",
					  ref: "<?=$data["paystack_id"]?>", // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
					  firstname: '<?=e($data["user"]["name"])?>',
					  lastname: '',
					  // label: "Optional string that replaces customer email"
					  metadata: {
						 custom_fields: [
							{
								display_name: "Mobile Number",
								variable_name: "mobile_number",
								value: "+2348012345678"
							}
						 ]
					  },
					  callback: function(response){
						  window.location = "<?=$this->siteUrl()?>/<?=$this->client_url()?>/paystack/" + response.reference;
					  },
					  onClose: function(){
					  }
					});
					handler.openIframe();
				  }
				</script>
			
			   </div>
			  </div><!--/ .payment-bid -->	
			 </div><!--/ .payment-box -->

           <?php endif; ?>	
		   
		   
		   <?php if($data['settings']['bank_active'] === "2"): ?>
		   
			 <div class="payment-box">
			  <div class="payment-details">
			   <div class="payment-description">
				<h4>Bank Transfer</h4>
				<p><?=$this->lang('purchase_via')?> Bank.</p>
				<p><?=$data['settings']['bank_description']?>.</p>
			   </div>
			  </div><!--/ .job-box-details -->
			  <div class="payment-bid">
			   <div class="payment-bid-inner">
		 
				<form action="<?=$this->siteUrl()?>/<?=$this->client_url()?>/bank" method="post">
				 
                  <div class="form-group">	
                   <label><?=$this->lang('transaction_id')?> <?=$this->lang('of_the_bank')?></label>
				   <input type="text" class="form-control" placeholder="<?=$this->lang('transaction_id')?>" name="transaction_id">
                  </div>
				  
                  <?=$this->token()?>
				  <button type="submit" name="post_bank" class="kafe-btn kafe-btn-danger"> <?=$this->lang('submit')?></button>
				</form>	
				 
			
			   </div>
			  </div><!--/ .payment-bid -->	
			 </div><!--/ .payment-box -->	

           <?php endif; ?>		
		   
		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	