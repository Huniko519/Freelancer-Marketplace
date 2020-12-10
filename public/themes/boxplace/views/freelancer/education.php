<?php
defined('FIR') OR exit();
/**
 * The template for displaying Example Create page
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
		  <h3><?=$this->lang('education')?></h3>
		  <a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/education/add"><?=$this->lang('add_education')?></a>
		 </div>	
		 
		<?php if($data['hasEducation'] === false): ?> 
		  
		  <div class="prop-info text-center">
		     <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.$this->themePath().'/'.$this->theme()?>/assets/img/graphic.png" class="img-responsive" alt="Image" />
			 <h3><?=$this->lang('no_education')?>.</h3>
			 <p><?=$this->lang('add_here')?>:- <a class="kafe-btn kafe-btn-yellow-small" href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/education/add"><?=$this->lang('add_education')?></a></p>
          </div><!-- /.prop-info -->	
		  
		<?php elseif($data['hasEducation'] === true): ?> 
		
	   
			  <?php foreach($data['education'] as $row) {?>
		 
		 
			 <div class="about-box" id="tr<?php echo e($row["id"]); ?>">
			  <div class="about-box-img">
			   <div class="about-box-img-inner">
				<h3><?php echo e($row["year"]); ?></h3>
				<h4><?php echo e($row["company"]); ?></h4>
				<a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/education/edit/<?php echo e($row["id"]); ?>" class="kafe-btn kafe-btn-red-small"><?=$this->lang('edit')?> </a>
				<a id="delete_education" data-id="<?php echo e($row["id"]); ?>" class="kafe-btn kafe-btn-yellow-small"><?=$this->lang('delete')?></a>
			   </div>
			  </div><!--/ .about-box-img -->	
			  <div class="about-box-details">
			   <div class="about-box-description">
				<h3><?php echo e($row["title"]); ?></h3>
				<p><?php echo e($row["description"]); ?></p>
				
			   </div>
			  </div><!--/ .about-box-details -->
			 </div><!--/ .about-box -->		
				
			  <?php } ?>	
			  
		<?php endif; ?>  
		

		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	  