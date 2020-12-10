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
		  <h3><?=$this->lang('edit_portfolio')?></h3>
		  <a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/portfolio"><?=$this->lang('go_back')?></a>
		 </div>	

         <div class="add-box">
           <form method="post" action="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/portfolio/edit/<?=e($data['portfolio']['id'])?>" enctype="multipart/form-data">
				 
			  <input type="hidden" name="id" class="form-control" value="<?=e($data['portfolio']['id'])?>" />
			  <input type="hidden" name="imagelocation" class="form-control" value="<?=e($data['portfolio']['imagelocation'])?>" />
			  
				<div class="form-group">
				 <div class="image">
				  <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/portfolio/<?=e($data['portfolio']['imagelocation'])?>" class="img-thumbnail" width="315" height="315"/>
				 </div>
				</div>
            
              <div class="form-group">	
			    <label><?=$this->lang('choose_image')?></label>
				<input type="file" name="photoimg" id="photoimg" class="form-control">
              </div>
		   
              <div class="form-group">	
			    <label><?=$this->lang('description')?></label>
                 <textarea name="description" class="form-control" rows="2"><?=e($data['portfolio']['description'])?></textarea>	
              </div> 
		   
			  
              <?=$this->token()?>
              <button type="submit" name="edit_portfolio" class="kafe-btn kafe-btn-mint full-width"><?=$this->lang('submit')?></button>
			  
           </form>		 
		 </div><!--/ .add-box -->	
		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	