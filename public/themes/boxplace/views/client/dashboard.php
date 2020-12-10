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
      <div class="container gal-container">
	   <div class="row">
		<div class="col-lg-12">
		
         <div class="headline">
		  <h3><?=$this->lang('your_projects')?></h3>
		  <a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/dashboard/add"><?=$this->lang('add_project')?></a>
		 </div>	
		

	    <!-- ==============================================
	    Listing Nav Section
	    =============================================== -->
		<div class="listing-nav member-nav">
		 <div class="container clearfix">
		  <ul>
			<li>
			 <a class="<?=($data['url'] == 'dashboard' ? ' active' : '')?>" href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/dashboard">
			  <span class="fa fa-files-o"></span> <?=$this->lang('not_started')?>(<?=e($data["projects_count_open"])?>)
			 </a>
			</li>
			<li>
			 <a class="<?=($data['url'] == 'in-progress' ? ' active' : '')?>" href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/dashboard/in-progress">
			  <span class="fa fa-bars"></span> <?=$this->lang('in_progress')?>(<?=e($data["projects_count_closed"])?>)
			 </a>
			</li>
			<li>
			 <a class="<?=($data['url'] == 'completed' ? ' active' : '')?>" href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/dashboard/completed">
			  <span class="fa fa-check-circle-o"></span> <?=$this->lang('completed')?>(<?=e($data["projects_count_completed"])?>)
			 </a>
			</li>
			<li>
			 <a class="<?=($data['url'] == 'disputed' ? ' active' : '')?>" href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/dashboard/disputed">
			  <span class="fa fa-close"></span> <?=$this->lang('under_dispute')?> (<?=e($data["count_disputed_projects"])?>)
			 </a>
			</li>
		  </ul>
		 </div><!--/container -->
		</div><!--/listing-nav -->	

		 
		<?php if($data['has'] === false): ?> 
		  
		  <div class="prop-info text-center">
		     <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.$this->themePath().'/'.$this->theme()?>/assets/img/graphic.png" class="img-responsive" alt="Image" />
			 <h3><?=$this->lang('no_project')?>.</h3>
			 <p><a class="kafe-btn kafe-btn-yellow-small" href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/dashboard/add"><?=$this->lang('add_project')?></a></p>
          </div><!-- /.prop-info -->	
		  
		<?php elseif($data['has'] === true): ?> 
		    

		 
		  <?php if($data['projects_has_open'] === false): ?> 
		  
			  <div class="listing-info text-center">
				 <h3><?=$this->lang('add_more_projects')?>.</h3>
				 <p><a class="kafe-btn kafe-btn-red" href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/dashboard/add"><?=$this->lang('add_project')?></a></p>
			  </div><!-- /.prop-info -->
			  
		 <?php elseif($data['projects_has_open'] === true): ?> 
		
	   
			<?php foreach($data['projects'] as $row) { ?>

			 <div class="project-box" id="tr<?=e($row["id"])?>">
			  <div class="project-details">
			   <div class="project-description">
				<a href="<?=$this->siteUrl()?>/project/<?=e($row["projectid"])?>/<?=e($row["slug"])?>" target="_blank" class="project-title">
				 <h3><?=e($row["title"])?></h3>
				</a>
				<ul class="project-icons">
				 <li><i class="fe fe-difference"></i><?=e($row["category"])?> </li>
					<?php foreach($data['projects_timeago'] as $key=>$name){
						if($row['projectid'] == $key){ ?>
						 <li><i class="fe fe-clock"></i> <?=e($name)?></li>
					<?php } } ?>
					<?php foreach($data['projects_proposals'] as $key=>$name){
						if($row['projectid'] == $key){ ?>
						 <li><i class="fe fe-user-plus"></i> <?=e($name)?> <?=$this->lang('proposals')?></li>
					<?php } }?> 
				 
				 <li><i class="fe fe-money"></i> <?=e($this->currency)?><?=e($row["budget"])?></li>
				</ul>
				<div class="project-btns">
				 <a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/dashboard/edit/<?=e($row["projectid"])?>" class="kafe-btn kafe-btn-mint-small"><i class="fa fa-edit"></i> <?=$this->lang('edit')?></a>
				 <a id="delete_project" data-id="<?=e($row["id"])?>" class="kafe-btn kafe-btn-red-small"><i class="fa fa-trash"></i> <?=$this->lang('delete')?></a>
				</div>
			   </div>
			  </div><!--/ .job-box-details -->
			  <div class="project-bid">
			   <div class="project-bid-inner">
				<?php foreach($data['projects_proposals'] as $key=>$name){
					if($row['projectid'] == $key){ ?>
				<a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/proposals/<?=e($row["projectid"])?>" class="kafe-btn kafe-btn-yellow"> <?=$this->lang('view_proposals')?> - <?=e($name)?></a>
				<?php } }?> 
			   </div>
			  </div><!--/ .project-bid -->	
			 </div><!--/ .project-box -->	
				
			<?php } ?>		
			  
		  <?php endif; ?>  
		  
		<?php endif; ?>  
		

		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	  