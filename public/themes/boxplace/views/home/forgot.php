<?php
defined('FIR') OR exit();
/**
 * The template for displaying Home page menu
 */
?>
 	 
     <!-- ==============================================
	 Header
	 =============================================== -->	 
	 <header class="how-header bg-search" style="background: linear-gradient( rgba(34,34,34,0.6), rgba(34,34,34,0.6) ), url('<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/<?=e($this->theme_details('bg_image_two'))?>') no-repeat center center fixed;">
      <div class="container">
       <div class="row">
	   
        <div class="col-lg-8 col-lg-offset-2">
         <div class="post-heading">
		  <h1><?=$this->lang('forgot')?>.</h1>
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
     Banner Login Section
     =============================================== -->
	 <section class="banner-login">
	  <div class="container">
	  		  	
	   <div class="row banner-row">
	   
	    <main class="main main-signup col-lg-12">
	     <div class="col-lg-6 col-lg-offset-3 text-center">
	   
	    <?=$this->validation();?>
				
	     	
		  <div class="form-sign">
		   <form action="<?=$this->siteUrl()?>/forgot" method="post">
		    <div class="form-head">
			</div><!-- /.form-head -->
            <div class="form-body">            	
            	
			 <div class="form-row">
			  <div class="form-controls">
			   <input name="email" placeholder="<?=$this->lang('email')?>" class="field" type="text">
			  </div><!-- /.form-controls -->
			 </div><!-- /.form-row -->
			 
		    </div><!-- /.form-body -->

			<div class="form-foot">
			 <div class="form-actions">					
              <?=$this->token()?>
			  <input name="forgot" value="<?=$this->lang('submit')?>" class="kafe-btn kafe-btn-mint full-width" type="submit"><br></br>
			  <div class="m-15"></div>
			  <a href="<?=$this->siteUrl()?>/login" class="kafe-btn kafe-btn-danger full-width"><?=$this->lang('login')?></a>
			 </div><!-- /.form-actions -->
			</div><!-- /.form-foot -->
		   </form>
		   
		  </div><!-- /.form-sign -->
	     </div><!-- /.col-lg-6 -->
        </main>
		
	   </div><!-- /.row -->
	  </div><!-- /.container -->
     </section><!-- /section --> 	