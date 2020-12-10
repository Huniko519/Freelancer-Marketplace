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
		  <h1><?=$this->lang('refund_policy')?>.</h1>
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
       <div class="row how-row">
	    <div class="col-lg-12">


         <div class="about-box">		
		  <div class="about-box-details">
		   <div class="about-box-description">
			<?=$this->siteSettings('refund_policy')?>
			
		   </div>
          </div><!--/ .about-box-details -->
		 </div><!--/ .about-box -->			
		
		</div>
	   
       </div><!--/. row -->
	  </div><!--/ .container -->
     </section>