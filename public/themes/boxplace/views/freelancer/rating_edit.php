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
		  <h3><?=$this->lang('edit_rating_for')?></h3>
		  <h4><?=e($data['project']["title"])?> </h4>
		  <a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/ratings"><?=$this->lang('go_back')?></a>
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
           <form method="post" action="<?=$this->siteUrl()?>/<?=$this->client_url()?>/editrating/<?=e($data['rating']["id"])?>">
				 
			  <input type="hidden" name="id" class="form-control" value="<?=e($data['rating']['id'])?>" />
		   
		   
              <div class="form-group">	
			    <label><?=$this->lang('rate')?></label>
                 <select name="rate" class="form-control">
				  <option value="1"<?=($data['rating']['rate'] == 1 ? ' selected' : '')?>>1 Star</option>
				  <option value="2"<?=($data['rating']['rate'] == 2 ? ' selected' : '')?>>2 Star</option>
				  <option value="3"<?=($data['rating']['rate'] == 3 ? ' selected' : '')?>>3 Star</option>
				  <option value="4"<?=($data['rating']['rate'] == 4 ? ' selected' : '')?>>4 Star</option>
				  <option value="5"<?=($data['rating']['rate'] == 5 ? ' selected' : '')?>>5 Star</option>	
				 </select>	
              </div> 
		   
			  <div class="form-group">	
			   <label><?=$this->lang('describe_work_with')?> <?=$this->client_name()?></label>
			   <textarea name="description" class="form-control" rows="5"><?=e($data['rating']["description"])?></textarea>
			  </div> 
		   
			  
              <?=$this->token()?>
              <button type="submit" name="edit_rating" class="kafe-btn kafe-btn-mint full-width"><?=$this->lang('submit')?></button>
			  
           </form>		 
		 </div><!--/ .add-box -->	
		

		
		</div><!--/ .col-lg-8 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	  