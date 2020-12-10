<?php
defined('FIR') OR exit();
/**
 * The template for displaying Home page menu
 */
?>

	 
	 <!-- ==============================================
	 Header Section
	 =============================================== -->	
     <section class="profile-banner" style="background: linear-gradient( rgba(34,34,34,0.6), rgba(34,34,34,0.6) ), url('<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($data['user']['bg_imagelocation'])?>') no-repeat center center fixed;">
      <div class="container">
       <div class="banner-content text-center">
	    <a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>">
		  <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($data['user']['imagelocation'])?>" class="img-responsive img-circle"/>
		</a>
        <h1 class="<?=($data['user']["verified"] == '1' ? ' verified' : '')?>"><?=e($data['user']["name"])?></h1>
        <h2><?=e($data['user']["title"])?></h2>
        <h3><i class="fa fa-map-marker"></i> <?=e($data['user']["country"])?></h3>
		<div class="button-wrapper">
          <a class="kafe-btn kafe-btn-red" href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/invite/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>">
		  <i class="fa fa-envelope-o"></i> <?=$this->lang('invite_to_project')?> </a>
		</div>  
       </div><!--/. banner-content -->
      </div><!-- /.container -->
     </section>

	 <!-- ==============================================
	 Navbar-box Section
	 =============================================== -->
     <section class="navbar-box text-center">
      <ul id="">
       <li><a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>"> <?=$this->lang('portfolio')?>  
	     <em class="hidden-xs hidden-sm">(<?=e($data['total_portfolio'])?>)</em></a></li>
       <li class="active"><a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/about/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>"> <?=$this->lang('about')?> </a></li>
       <li><a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/projects/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>"><?=$this->lang('projects')?> 
	     <em class="hidden-xs hidden-sm">(<?=e($data['total_projects'])?>)</em></a></li>
       <li><a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/ratings/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>"><?=$this->lang('ratings')?> 
	     <em class="hidden-xs hidden-sm">(<?=e($data['total_ratings'])?>)</em></a></li>
      </ul>
     </section>	 
	 
	 
	 
	 <!-- ==============================================
	 Dashboard Section
	 =============================================== -->
     <section class="freelancer-content">
      <div class="container">
	  
	   <div class="row">
		<div class="col-lg-12">
		
         <div class="headline">
		  <h3><?=$this->lang('about')?></h3>
		 </div>	
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
	   
       <div class="row">
	    <div class="col-lg-12">


         <div class="about-box">	
		  <div class="about-box-details">
		   <div class="about-box-description">
			<p><?=e($data['user']["about"])?></p>
			
            <div class="about-box-tags">
		     <h3><?=$this->lang('categories')?></h3>
			<?php
			 $arr=explode(',',$data['user']["categories"]);
            foreach ($arr as $key => $value) {
              echo '<span>'. e($value) .' </span> &nbsp;'; 
            }
		    ?>	
			</div><!--/ .about-box-tags -->
			
            <div class="about-box-tags">
		     <h3><?=$this->lang('skills')?></h3>
			<?php
			 $arr=explode(',',$data['user']["skills"]);
            foreach ($arr as $key => $value) {
              echo '<span>'. e($value) .' </span> &nbsp;'; 
            }
		    ?>	
			</div><!--/ .about-box-tags -->
			
		   </div>
          </div><!--/ .about-box-details -->
		 </div><!--/ .about-box -->			
		
		</div>
	   
       </div><!--/. row -->
	   
	   <div class="row">
		<div class="col-lg-12">
		
         <div class="headline">
		  <h3><?=$this->lang('work_experience')?></h3>
		 </div>	
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		 
		<?php if($data['hasWorkExperience'] === false): ?> 
	   
		   <div class="row">
			<div class="col-lg-12">
			  
			  <div class="prop-info text-center">
				 <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.$this->themePath().'/'.$this->theme()?>/assets/img/graphic.png" class="img-responsive" alt="Image" />
				 <h3><?=$this->lang('no_work_experience')?>.</h3>
			  </div><!-- /.prop-info -->	
			  
			</div><!--/ .col-lg-12 -->
		   </div><!--/ .row -->
		  
		<?php elseif($data['hasWorkExperience'] === true): ?> 
		
	   
			  <?php foreach($data['WorkExperience'] as $row) {?>
	   
			   <div class="row">
				<div class="col-lg-12">
				 
				 
					 <div class="about-box">
					  <div class="about-box-img">
					   <div class="about-box-img-inner">
						<h3><?php echo e($row["year"]); ?></h3>
						<h4><?php echo e($row["company"]); ?></h4>
					   </div>
					  </div><!--/ .about-box-img -->	
					  <div class="about-box-details">
					   <div class="about-box-description">
						<h3><?php echo e($row["title"]); ?></h3>
						<p><?php echo e($row["description"]); ?></p>
						
					   </div>
					  </div><!--/ .about-box-details -->
					 </div><!--/ .about-box -->		
				
				</div>
			   
			   </div><!--/. row -->
				
			  <?php } ?>	
		
			  
		<?php endif; ?>  
	   
	   <div class="row">
		<div class="col-lg-12">
		
         <div class="headline">
		  <h3><?=$this->lang('education')?></h3>
		 </div>	
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		 
		<?php if($data['hasEducation'] === false): ?> 
	   
		   <div class="row">
			<div class="col-lg-12">
			  
			  <div class="prop-info text-center">
				 <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.$this->themePath().'/'.$this->theme()?>/assets/img/graphic.png" class="img-responsive" alt="Image" />
				 <h3><?=$this->lang('no_education_display')?>.</h3>
			  </div><!-- /.prop-info -->	
			  
			</div><!--/ .col-lg-12 -->
		   </div><!--/ .row -->
		  
		<?php elseif($data['hasEducation'] === true): ?> 
		
	   
			  <?php foreach($data['education'] as $row) {?>
	   
			   <div class="row">
				<div class="col-lg-12">
				 
				 
					 <div class="about-box">
					  <div class="about-box-img">
					   <div class="about-box-img-inner">
						<h3><?php echo e($row["year"]); ?></h3>
						<h4><?php echo e($row["company"]); ?></h4>
					   </div>
					  </div><!--/ .about-box-img -->	
					  <div class="about-box-details">
					   <div class="about-box-description">
						<h3><?php echo e($row["title"]); ?></h3>
						<p><?php echo e($row["description"]); ?></p>
						
					   </div>
					  </div><!--/ .about-box-details -->
					 </div><!--/ .about-box -->		
				
				</div>
			   
			   </div><!--/. row -->
				
			  <?php } ?>	
		
			  
		<?php endif; ?>  
		

		
		
	  </div><!--/ .container -->
     </section>	 	 