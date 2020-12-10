<?php
defined('FIR') OR exit();
/**
 * The template for displaying Example Create page
 */
?>
	 
	 
	 <!-- ==============================================
	 Dashbord Section
	 =============================================== -->
     <section class="dashboard">
      <div class="container">
	   <div class="row">
		<div class="col-lg-12">
		
         <div class="headline">
		  <h3><?=$this->lang('email_settings')?></h3>
		 </div>	
		 
	       <?=$this->validation()?>

         <div class="add-box">
           <form method="post" action="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/email">
		   
              <div class="form-group">	
                <input type="checkbox" name="email_settings" value="1" 
				<?php if (e($data['user']['email_settings']) === "1") : ?>
                      checked="checked"					
				<?php endif; ?> >
			    <label class="help-text-label"> <?=$this->lang('email_notifications')?> :- <small><?=$this->lang('get_emails_for_site_notifications')?></small></label>
              </div>    
		   
              <?=$this->token()?>
              <button type="submit" name="post_email" class="kafe-btn kafe-btn-mint full-width"><?=$this->lang('submit')?></button>
			  
           </form>		 
		 </div><!--/ .add-box -->	
		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>		 