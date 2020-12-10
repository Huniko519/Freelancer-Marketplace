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
		
         <div class="headline">
		  <h3><?=$this->lang('request_verification')?></h3>
		 </div>		
		 
	       <?=$this->validation()?>

         <div class="proposal-box">
          <div class="proposal-img">
		   <div class="proposal-img-inner">
			 <a href="<?=$this->siteUrl()?>/freelancers/portfolio/<?=e($data['user']['userid'])?>/<?=e($data['user']['slug'])?>">
			  <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($data['user']['imagelocation'])?>" alt="Profile Picture">
			 </a>
		   </div>
		  </div><!--/ .freelancer-box-img -->	
		  <div class="proposal-details">
		   <div class="proposal-description">
			<a href="<?=$this->siteUrl()?>/freelancers/portfolio/<?=e($data['user']['userid'])?>/<?=e($data['user']['slug'])?>">
			 <h3 class="<?=($data['user']['verified'] === '1' ? ' verified' : '')?>"><?=e($data['user']['name'])?></h3>
			</a>
		   </div>
          </div><!--/ .freelancer-box-details -->
          <div class="proposal-bid">
		   <div class="proposal-bid-inner">
		   <?php if(e($data['user']['verified']) === "0"): ?>
			 <a href="#addm" class="kafe-btn kafe-btn-yellow" data-toggle="modal"><i class="fa fa-edit"></i> <?=$this->lang('request')?></a>
		   <?php elseif(e($data['user']['verified']) === "1"): ?>
		     <h4><?=$this->lang('verified')?></h4>
		   <?php elseif(e($data['user']['verified']) === "2"): ?>
		     <h4><?=$this->lang('verification_declined')?></h4>
		     <a href="<?=$this->siteUrl()?>/contact" class="kafe-btn kafe-btn-yellow-small"><?=$this->lang('contact_us_for_inquiry')?></a>
		   <?php elseif(e($data['user']['verified']) === "3"): ?>
		     <h4><?=$this->lang('awaiting_verification_from_admin')?></h4>
		   <?php endif; ?>
		   </div>
		  </div><!--/ .proposal-bid -->
		 </div><!--/ .proposal-box -->			

	      <!-- Modal HTML -->
	      <div id="addm" class="modal fade">
	       <div class="modal-dialog">
	        <div class="modal-content">
	         <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	          <h4 class="modal-title"><?=$this->lang('verification')?></h4>
	         </div>
	         <div class="modal-body">
              <form method="post" action="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/request"> 
	         	
              <div class="form-group">	
			    <label><?=$this->lang('phone_number')?></label>
                <input type="text" name="number" class="form-control" placeholder="<?=$this->lang('phone_number')?>"/>
              </div>  

	         
             <div class="modal-footer">
              <?=$this->token()?>
              <button type="button" class="kafe-btn kafe-btn-yellow-small" data-dismiss="modal"><?=$this->lang('close')?></button>
              <button name="post_request" type="submit" class="kafe-btn kafe-btn-mint-small"><?=$this->lang('submit')?></button>
             </div>
			 
             </form> 
             </div>
             
	        </div>
	       </div>
	      </div>		  		
		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>		 