<?php
defined('FIR') OR exit();
/**
 * The template for displaying Home page menu
 */
?>
  
     <!-- ==============================================
	 Header Section
	 =============================================== -->
	 <header class="how-header" style="background: linear-gradient( rgba(34,34,34,0.6), rgba(34,34,34,0.6) ), url('<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/<?=e($this->theme_details('bg_image_two'))?>') no-repeat center center fixed;">
      <div class="container">
       <div class="row">
	   
        <div class="col-lg-8 col-lg-offset-2">
         <div class="post-heading">
		  <h1><?=$this->lang('contact')?>.</h1>
         </div><!-- /.post-heading -->
        </div><!-- /.col-lg-8 -->
		
       </div><!-- /.row -->
	  </div><!-- /.container -->
     </header><!-- /header -->	

     <!-- ==============================================
	 Header Avatar
	 =============================================== -->	 
	 
     <div class="how-avatar">
	  <img alt="..." src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/<?=e($this->siteSettings('favicon'))?>" class="avatar avatar-200 photo" width="200" height="200">
	  <p><?=e($this->siteSettings('sitename'))?></p>
	 </div><!-- /.header-avatar -->	 
	 
	 
	<!-- ==============================================
	 Content Section
	 =============================================== -->	
     <section class="how-content">
      <div class="container">
	  
       <div class="row mt-7">
		 	
		 <div class="col-lg-12">	
		 
	       <?=$this->validation()?>
		   
          </div>
		  
	    <div class="col-lg-8">

         <div class="add-box">
           <form method="post" action="<?=$this->siteUrl()?>/contact">
		   
              <div class="form-group">	
			    <label><?=$this->lang('name')?></label>
                <input type="text" name="name" class="form-control" placeholder="<?=$this->lang('name')?>" value=""/>
              </div>   
		   
              <div class="form-group">	
			    <label><?=$this->lang('email')?></label>
                <input type="text" name="email" class="form-control" placeholder="<?=$this->lang('email')?>" value=""/>
              </div> 
		   
              <div class="form-group">	
			    <label><?=$this->lang('subject')?></label>
                <input type="text" name="subject" class="form-control" placeholder="<?=$this->lang('subject')?>" value=""/>
              </div> 
			  
			  <div class="form-group">	
			   <label><?=$this->lang('message')?></label>
			   <textarea name="message" class="form-control" rows="5" placeholder="<?=$this->lang('message')?>"></textarea>
			  </div> 
			  
              <?=$this->token()?>
              <button type="submit" name="post_contact"  class="kafe-btn kafe-btn-mint full-width"><?=$this->lang('submit')?></button>
           </form>		 
		 </div><!--/ .add-box -->	
		</div>
	    <div class="col-lg-4">


         <div class="about-box">		
		  <div class="about-box-details">
		   <div class="about-box-description">
			<h4><i class="fa fa-map-marker"></i>&nbsp;&nbsp; <?=e($this->siteSettings('contact_location'))?></h4>
		   </div>
          </div><!--/ .about-box-details -->
		 </div><!--/ .about-box -->		

         <div class="about-box">		
		  <div class="about-box-details">
		   <div class="about-box-description">
			<h4><i class="fa fa-briefcase"></i>&nbsp;&nbsp; <?=e($this->siteSettings('contact_email'))?></h4>
		   </div>
          </div><!--/ .about-box-details -->
		 </div><!--/ .about-box -->		

         <div class="about-box">		
		  <div class="about-box-details">
		   <div class="about-box-description">
			<h4><i class="fa fa-phone"></i>&nbsp;&nbsp; <?=e($this->siteSettings('contact_phone'))?></h4>
		   </div>
          </div><!--/ .about-box-details -->
		 </div><!--/ .about-box -->	
		
		</div>
	   
       </div><!--/. row -->
	  </div><!--/ .container -->
     </section>