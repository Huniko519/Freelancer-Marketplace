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
		  <h3><?=$this->lang('funds')?></h3>
		  <a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/addfunds"><?=$this->lang('add_funds')?></a>
		 </div>	
		 
		<?php if($data['has_funds'] === false): ?> 
		  
		  <div class="prop-info text-center">
		     <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.$this->themePath().'/'.$this->theme()?>/assets/img/graphic.png" class="img-responsive" alt="Image" />
			 <h3><?=$this->lang('no_funds')?>.</h3>
				 <p><a class="kafe-btn kafe-btn-red" href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/addfunds"><?=$this->lang('add_funds')?></a></p>
          </div><!-- /.prop-info -->	
		  
		<?php elseif($data['has_funds'] === true): ?> 
		
		
		   <?php foreach($data['funds_pagination'] as $row) { ?>  

			 <div class="withdraw-box">
			  <div class="withdraw-bid">
			   <div class="withdraw-bid-inner">
				 <h4><?=e($this->currency)?><?=e($row["amount"])?></h4>
			   </div>
			  </div><!--/ .withdraw-bid -->
			  <div class="withdraw-details">
			   <div class="withdraw-description">
				<h4><?=$this->lang('added_through')?> <?=e($row["type"])?> <?=$this->lang('on')?> <?=strftime("%b %d, %Y, %H : %M %p ", strtotime($row['date_added'])); ?></h4>
			   </div>
			  </div><!--/ .job-box-details -->
			  <div class="withdraw-bid">
			   <div class="withdraw-bid-inner">
				<?php if(e($row["type"]) === "Bank Transfer"): ?>
				
					<?php if(e($row["complete"]) === "1"): ?> 	 
						 <h5><?=$this->lang('approved_by_admin')?>.</h5>
					<?php elseif(e($row["complete"]) === "2"): ?> 
						 <h5><?=$this->lang('declined_admin')?></h5>
					<?php elseif(e($row["complete"]) === "0"): ?> 
						 <h5><?=$this->lang('waiting_to_be_approved')?></h5>
					<?php endif; ?> 
					
				<?php else: ?>
				
					<?php if(e($row["complete"]) === "1"): ?> 	 
						 <h5><?=$this->lang('complete')?>.</h5>
					<?php elseif(e($row["complete"]) === "0"): ?> 
						 <h5><?=$this->lang('in_complete')?></h5>
					<?php endif; ?> 
					
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