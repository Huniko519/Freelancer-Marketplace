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
		  <h3><?=$this->lang('add_proposal_for')?></h3>
		  <h4><?=e($data['project']["title"])?> - <?=e($this->currency)?><?=e($data['project']["budget"])?></h4>
		  <a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/proposals"><?=$this->lang('go_back')?></a>
		 </div>	
		 
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
	   
	   <div class="row">
		 
	       <?=$this->validation()?>
		<div class="col-lg-4">
		 
			 <div class="proposal-box">
			  <div class="proposal-img">
			   <div class="proposal-img-inner">
				 <a href="<?=$this->siteUrl()?>/<?=$this->clients_url()?>/projects/<?=e($data['client']["userid"])?>/<?=e($data['client']["slug"])?>">
				  <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($data['client']['imagelocation'])?>" alt="Profile Picture">
				 </a>
			   </div>
			  </div><!--/ .freelancer-box-img -->	
			  <div class="proposal-details">
			   <div class="proposal-description">
					<a href="<?=$this->siteUrl()?>/<?=$this->clients_url()?>/projects/<?=e($data['client']["userid"])?>/<?=e($data['client']["slug"])?>">
					<h3 class="<?=($data['client']["verified"] == '1' ? ' verified' : '')?>"><?=e($data['client']["name"])?></h3></a>
				  <h5> <?=$this->client_name()?></h5>
			   </div>
			  </div><!--/ .freelancer-box-details -->
			 </div><!--/ .proposal-box -->	
		 
		</div><!--/ .col-lg-4 -->
		<div class="col-lg-8">

         <div class="add-box">
           <form method="post" action="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/proposals/add/<?=e($data['project']["projectid"])?>">
				 
			  <input type="hidden" name="projectid" class="form-control" value="<?=e($data['project']['projectid'])?>" />
			  <input type="hidden" name="clientid" class="form-control" value="<?=e($data['client']["userid"])?>" />
		   
              <div class="form-group">	
			    <label><?=$this->lang('your_budget_offer')?></label>
                <input type="text" name="budget" class="form-control" placeholder="<?=$this->lang('your_budget_offer')?> e.g 100" value=""/>
              </div>   
			  
              <div class="form-group">	
			    <label><?=$this->lang('message')?></label>
                 <textarea name="message" class="form-control" rows="5" placeholder="<?=$this->lang('message')?>"></textarea>	
              </div>
		   
			  
              <?=$this->token()?>
              <button type="submit" name="add_proposal" class="kafe-btn kafe-btn-mint full-width"><?=$this->lang('submit')?></button>
			  
           </form>		 
		 </div><!--/ .add-box -->	
		

		
		</div><!--/ .col-lg-8 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	  