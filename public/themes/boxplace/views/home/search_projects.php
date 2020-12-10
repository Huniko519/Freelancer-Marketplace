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
		  <h3><?=$this->lang('projects')?> <?=$this->lang('in_this_category')?> :- <?=e($data["search_projects"])?>.</h3>
         </div><!-- /.post-heading -->
        </div><!-- /.col-lg-8 -->
		
       </div><!-- /.row -->
	  </div><!-- /.container -->
     </header><!-- /header --> 
	 
	 
	 <!-- ==============================================
	 Latest Jobs Section
	 =============================================== -->
     <section class="latest-jobs">
      <div class="container">
	  
	   <div class="row">
		<div class="col-lg-12">
		
         <div class="jobs-headline">
		  <h3><?=$this->lang('latest_projects')?></h3>
		 </div>	
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
	   
		<?php if($data['has_projects'] === false): ?> 
		  
		  <div class="prop-info text-center">
		     <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.$this->themePath().'/'.$this->theme()?>/assets/img/graphic.png" class="img-responsive" alt="Image" />
			 <h3><?=$this->lang('no_projects_display')?>.</h3>
          </div><!-- /.prop-info -->	
		  
		<?php elseif($data['has_projects'] === true): ?> 
		
		   <?php
			foreach($data['projects_pagination'] as $row) {
				if($data['search_projects'] == $row["category"]) {   
			?>  
			  
			  
			 <a href="<?=$this->siteUrl()?>/project/<?=e($row["projectid"])?>/<?=e($row["slug"])?>" class="job-box">
			  <div class="job-box-details">
			   <div class="job-box-description">
				<h3 class="job-box-title"><?=e($row["title"])?></h3>
				<ul class="job-box-icons">
				 <li><i class="fe fe-difference"></i><?=e($row["category"])?> </li>
				<?php foreach($data['projects_timeago'] as $key=>$name){
					if($row['projectid'] == $key){ ?>
					 <li><i class="fe fe-clock"></i> <?=e($name)?></li>
				<?php } } ?>
				<?php foreach($data['projects_proposals'] as $key=>$name){
					if($row['projectid'] == $key){ ?>
					 <li><i class="fe fe-user-plus"></i> <?=e($name)?> <?=$this->lang('proposals')?></li>
				<?php } } ?>
				</ul>
				<div class="job-box-tags">
					<?php
					 $arr=explode(',',$row["skills"]);
					 $arrr = array_slice($arr,0,2);
					foreach ($arrr as $key => $value) {
					  echo '<span>'. e($value) .' </span> &nbsp;'; 
					}
					?>	
					 +<?php echo count($arr); ?> <?=$this->lang('more')?>
				</div>
			   </div>
			  </div><!--/ .job-box-details -->
			  <div class="job-box-bid">
			   <div class="job-box-bid-inner">
				<div class="job-box-offers">
				 <h4><?=e($this->currency)?><?=e($row["budget"])?></h4>
				 <span><?=$this->lang('budget')?></span>
				</div>
				<?php if(e($row["closed"]) === "0"): ?>
				 <span class="kafe-btn kafe-btn-red"><?=$this->lang('apply')?> <i class="fa fa-arrow-right"></i></span>
				<?php endif; ?>		
			   </div>
			  </div><!--/ .job-box-bid -->	
			 </a><!--/ .job-box -->	
			
				<?php } } ?>	
		
		<?php endif; ?>  	   
	   
	  </div><!--/ .container -->
     </section>		 
 
	 