<?php
defined('FIR') OR exit();
/**
 * The template for displaying Example Delete page
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
		  <h3><?=$this->lang('image')?></h3>
		 </div>	
		 
	       <?=$this->validation()?>

		 
	    <div class="col-md-8">

		  <div class="add-box">
		  
           <form method="post" action="<?=$this->siteUrl()?>/<?=$this->client_url()?>/image"  enctype="multipart/form-data">
			  
			<div class="form-group">
			 <label><?=$this->lang('background_image')?></label>
			 <div class="image">
			  <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($data['user']['bg_imagelocation'])?>" class="img-thumbnail" width="415" height="315"/>
			 </div>
			</div>


					<div class="form-group">
						<label><?=$this->lang('choose_image')?></label>
						<input type="file" name="photoimg" id="photoimg" class="form-control">
					</div>
					  
			
              <?=$this->token()?>
              <button type="submit" name="post_bg_image" class="kafe-btn kafe-btn-mint full-width"><?=$this->lang('submit')?></button>
           </form>
			
          </div><!-- /.prop-info -->	
  
		  
	    </div><!-- /.col-md-9 -->
		
	    <div class="col-md-4">

		  <div class="add-box">
		  
           <form method="post" action="<?=$this->siteUrl()?>/<?=$this->client_url()?>/image"  enctype="multipart/form-data">
		   
		    <div class="change-photo">
			 <div class="user-image">
		      <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($data['user']['imagelocation'])?>" alt="Image" class="img-responsive">
			 </div>
					  
		    </div><!-- /.change-photo -->


					<div class="form-group">
						<label><?=$this->lang('choose_image')?></label>
						<input type="file" name="photoimg" id="photoimg" class="form-control">
					</div>
			
              <?=$this->token()?>
              <button type="submit" name="post_image" class="kafe-btn kafe-btn-mint full-width"><?=$this->lang('submit')?></button>
           </form>
			
          </div><!-- /.prop-info -->	
  
		  
	    </div><!-- /.col-md-9 -->	
		

		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	  		