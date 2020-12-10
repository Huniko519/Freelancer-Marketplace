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
		  <h3><?=$this->lang('edit_profile')?></h3>
		 </div>	

         <div class="add-box">
           <form method="post" action="<?=$this->siteUrl()?>/<?=$this->client_url()?>/editprofile">
		   
              <div class="form-group">	
			    <label><?=$this->lang('name')?></label>
                <input type="text" name="name" class="form-control" value="<?=e($data['user']['name'])?>"/>
              </div>   
		   
              <div class="form-group">	
			    <label><?=$this->lang('title')?></label>
                <input type="text" name="title" class="form-control" value="<?=e($data['user']['title'])?>"/>
              </div>
		   
              <div class="form-group">	
			    <label><?=$this->lang('email')?></label>
                <input type="text" name="email" class="form-control" value="<?=e($data['user']['email'])?>"/>
              </div> 
            
              <div class="form-group">	
			    <label><?=$this->lang('country')?></label>
                <input type="text" name="country" class="form-control" value="<?=e($data['user']['country'])?>"/>
              </div> 
            
              <div class="form-group">	
			    <label><?=$this->lang('website')?></label>
                <input type="text" name="website" class="form-control" value="<?=e($data['user']['website'])?>"/>
              </div> 
			  
              <?=$this->token()?>
              <button type="submit" name="edit_profile" class="kafe-btn kafe-btn-mint full-width"><?=$this->lang('submit')?></button>
			  
           </form>		 
		 </div><!--/ .add-box -->	
		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	