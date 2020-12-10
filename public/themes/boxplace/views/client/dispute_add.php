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
		  <h3><?=$this->lang('start_dispute')?></h3>
		  <h4><?=e($data['project']["title"])?> </h4>
		  <a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/dashboard/in-progress"><?=$this->lang('go_back')?></a>
		 </div>	
		 
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
	   
	   <div class="row">
		 
	       <?=$this->validation()?>
		<div class="col-lg-4">
		 
			 <div class="proposal-box">
			  <div class="proposal-img">
			   <div class="proposal-img-inner">
				 <a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($data['freelancer']["userid"])?>/<?=e($data['freelancer']["slug"])?>">
				  <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($data['freelancer']['imagelocation'])?>" alt="Profile Picture">
				 </a>
			   </div>
			  </div><!--/ .freelancer-box-img -->	
			  <div class="proposal-details">
			   <div class="proposal-description">
					<a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($data['freelancer']["userid"])?>/<?=e($data['freelancer']["slug"])?>">
					<h3 class="<?=($data['freelancer']["verified"] == '1' ? ' verified' : '')?>"><?=e($data['freelancer']["name"])?></h3></a>
				  <h5> <?=$this->freelancer_name()?></h5>
			   </div>
			  </div><!--/ .freelancer-box-details -->
			 </div><!--/ .proposal-box -->	
		 
		</div><!--/ .col-lg-4 -->
		<div class="col-lg-8">

         <div class="add-box">
           <form method="post" action="<?=$this->siteUrl()?>/<?=$this->client_url()?>/startdispute/<?=e($data['freelancer']["userid"])?>/<?=e($data['project']["projectid"])?>">
				 
			  <input type="hidden" name="projectid" class="form-control" value="<?=e($data['project']['projectid'])?>" />
			  <input type="hidden" name="freelancerid" class="form-control" value="<?=e($data['freelancer']["userid"])?>" />
		   
			  <div class="form-group">	
			   <label><?=$this->lang('why_do_you_want_to_start_this_dispute')?>?</label>
			   <textarea name="message" class="form-control" rows="5"></textarea>
			  </div> 
		   
			  
              <?=$this->token()?>
              <button type="submit" name="start_dispute" class="kafe-btn kafe-btn-mint full-width"><?=$this->lang('submit')?></button>
			  
           </form>		 
		 </div><!--/ .add-box -->	
		

		
		</div><!--/ .col-lg-8 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	  