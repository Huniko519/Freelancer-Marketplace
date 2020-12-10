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
		  <h3><?=$this->lang('add_portfolio')?></h3>
		  <a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/portfolio"><?=$this->lang('go_back')?></a>
		 </div>	

         <div class="add-box">
           <form method="post" action="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/portfolio/add" enctype="multipart/form-data">
		   
              <div class="form-group">	
			    <label><?=$this->lang('description')?></label>
                 <textarea name="description" class="form-control" rows="2"></textarea>	
              </div> 
            
              <div class="form-group">	
			    <label><?=$this->lang('choose_image')?></label>
				<input type="file" name="photoimg" id="photoimg" class="form-control">
              </div>
		   
			  
              <?=$this->token()?>
              <button type="submit" name="add_portfolio" class="kafe-btn kafe-btn-mint full-width"><?=$this->lang('submit')?></button>
			  
           </form>		 
		 </div><!--/ .add-box -->	
		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	