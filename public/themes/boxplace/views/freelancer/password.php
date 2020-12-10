<?php
defined('FIR') OR exit();
/**
 * The template for displaying Example Delete page
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
		  <h3><?=$this->lang('change_password')?></h3>
		 </div>	
		
	       <?=$this->validation()?>

         <div class="add-box">
           <form method="post" action="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/password">
			
			<div class="form-group">
			  <label><?=$this->lang('current_password')?></label>
			  <input type="password" name="password_current" class="form-control" placeholder="<?=$this->lang('current_password')?>">
			</div>
			
			<div class="form-group">
			  <label><?=$this->lang('new_password')?></label>
			  <input type="password" name="password" class="form-control" placeholder="<?=$this->lang('new_password')?>">
			</div>
			
			<div class="form-group">
			  <label><?=$this->lang('confirm_new_password')?></label>
			  <input type="password" name="confirmPassword" class="form-control" placeholder="<?=$this->lang('confirm_new_password')?>">
			</div>
			  
              <?=$this->token()?>
              <button type="submit" name="edit_password" class="kafe-btn kafe-btn-mint full-width"><?=$this->lang('submit')?></button>
			  
           </form>		 
		 </div><!--/ .add-box -->	
		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>		 		