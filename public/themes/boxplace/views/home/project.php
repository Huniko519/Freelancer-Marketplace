<?php
defined('FIR') OR exit();
/**
 * The template for displaying Home page menu
 */
?>

	 
     <!-- ==============================================
	 Header Section
	 =============================================== -->
	 <header class="jobpost-header" style="background: linear-gradient( rgba(34,34,34,0.6), rgba(34,34,34,0.6) ), url('<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($data['client']['bg_imagelocation'])?>') no-repeat center center fixed;">
      <div class="container">
       <div class="row">
	   
        <div class="col-lg-8 col-lg-offset-2">
         <div class="post-heading">
		  <p class="entry-meta">
		   <span>
		    <time><?=strftime("%b %d, %Y", strtotime($data['project']['date_added'])); ?></time>
		   </span> &nbsp; / &nbsp; 
		   <span>
		    <a><?=e($data['project']['category'])?></a>
		   </span>
		  </p>
		  <h1><?=e($data['project']['title'])?></h1>
         </div><!-- /.post-heading -->
        </div><!-- /.col-lg-8 -->
		
       </div><!-- /.row -->
	  </div><!-- /.container -->
     </header><!-- /header -->	 
 
	 
     <!-- ==============================================
	 Header Avatar
	 =============================================== -->	 
	 
     <div class="header-avatar">
	  <a href="<?=$this->siteUrl()?>/<?=$this->clients_url()?>/projects/<?=e($data['client']['userid'])?>/<?=e($data['client']['slug'])?>">
	   <img alt="Image" src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($data['client']['imagelocation'])?>" class="avatar avatar-200 photo" width="200" height="200">
	  </a>
	  <p><?=e($data['client']['name'])?></p>
	 </div><!-- /.header-avatar -->	 	

	 	<!-- ==============================================
	 Content Section
	 =============================================== -->	
     <section class="job-content">
      <div class="container">
	   <div class="row">
		<div class="col-lg-9">
		
		 <div class="content-base">
         <div class="single-page-section top">
		  <h3><?=$this->lang('project_description')?></h3>
		  <?=$data['project']['description']?>				
		 </div>
         <div class="single-page-section">
		  <h3><?=$this->lang('skills')?></h3>
          <div class="skills">
			<?php
			 $arr=explode(',',$data['project']["skills"]);
            foreach ($arr as $key => $value) {
              echo '<span>'. e($value) .' </span> &nbsp;'; 
            }
		    ?>	
		  </div>				
		 </div>		
		 </div><!--/ .content-base -->
		 
		</div><!--/ .col-lg-9 -->
		<div class="col-lg-3">

         <div class="info-box top full-width">
		  <div class="info-type"><?=$this->lang('budget')?></div>
		  <div class="info-amount"><?=e($this->currency)?><?=e($data['project']['budget'])?></div>
		 </div>
         <div class="info-box full-width">
		  <div class="info-type"><?=$this->lang('proposals')?></div>
		  <div class="info-amount"><?=e($data['project_proposal'])?></div>
		 </div>

		<?php if(e($data['project']["closed"]) === "0"): ?>
		 <a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/proposals/add/<?=e($data['project']['projectid'])?>" class="kafe-btn kafe-btn-red full-width"><?=$this->lang('apply')?> <i class="fa fa-arrow-right"></i></a>
		<?php endif; ?>	

		<?php if(e($data['project']["closed"]) === "1" && e($data['project']["complete"]) === "0"): ?>
         <div class="info-box-red full-width">
		  <div class="info-amount"><?=$this->lang('project_awarded_to')?> <?=$this->freelancer_name()?></div>
		 </div>
		<?php endif; ?>		

		<?php if(e($data['project']["complete"]) === "1"): ?>
         <div class="info-box-red full-width">
		  <div class="info-amount"><?=$this->lang('project_complete')?></div>
		 </div>
		<?php endif; ?>		 
		
		</div><!--/ .col-lg-3 -->
	   </div><!--/ .row -->
	  </div><!--/ .container -->
     </section>	 
	 
 
	 