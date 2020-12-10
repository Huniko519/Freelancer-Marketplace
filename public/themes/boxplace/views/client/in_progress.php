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
		
		    

		 
		  <?php if($data['projects_has_closed'] === false): ?> 
		  
			  <div class="listing-info text-center">
				 <h3><?=$this->lang('you_have_not_hired')?> <?=$this->freelancer_name()?>.</h3>
				 <p><a class="kafe-btn kafe-btn-red" href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/dashboard/add"><?=$this->lang('look_for')?> <?=$this->freelancer_name()?></a></p>
			  </div><!-- /.prop-info -->
			  
		 <?php elseif($data['projects_has_closed'] === true): ?> 
		
	   
			<?php foreach($data['projects_closed'] as $row) { ?>	
		
				 <div class="project-box">
				  <div class="project-img">
				   <div class="project-img-inner">
					<?php foreach($data['projects_user'] as $r2){
						if($r2['userid'] == $row['freelancerid']){ ?>
					 <a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($r2["userid"])?>/<?=e($r2["slug"])?>" target="_blank">
					  <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($r2['imagelocation'])?>" alt="Profile Picture">
					 </a>
					 <h4><?=e($r2["name"])?></h4>
					<?php } }?> 
				
					
				   </div>
				  </div><!--/ .freelancer-box-img -->
				  <div class="project-details">
				   <div class="project-description">
					<a href="<?=$this->siteUrl()?>/project/<?=e($row["projectid"])?>/<?=e($row["slug"])?>" target="_blank" class="project-title"><h3><?=e($row["title"])?></h3></a>
					<?php foreach($data['projects_escrow'] as $key=>$name){
						if($row['projectid'] == $key){ ?>
							<h4> <?=$this->lang('escrow')?> - <?=e($this->currency)?><?=e($name)?></h4>
					<?php } }?> 
					<?php foreach($data['projects_user'] as $r2){
					 if($r2['userid'] == $row['freelancerid']){ ?>
					    <h4><?=$this->freelancer_name()?> - <?=e($r2["name"])?></h4>
					<?php } }?> 
					<h4> <?=$this->lang('hired_date')?> - <?=strftime("%b %d, %Y", strtotime($row['hired_date'])); ?></h4>
					<ul class="project-icons">
					 <li><a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/addfiles"><i class="fa fa-upload"></i> <?=$this->lang('add_files')?></a></li>
					 <li><a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/startdispute/<?=e($row["freelancerid"])?>/<?=e($row["projectid"])?>"><i class="fa fa-close"></i> <?=$this->lang('start_a_dispute')?></a></li>
					 <li><a id="complete_project" data-id="<?=e($row["id"])?>"><i class="fa fa-check"></i> <?=$this->lang('complete_the_project')?> </a></li>
					</ul>
				   </div>
				  </div><!--/ .job-box-details -->
				  <div class="project-bid">
				   <div class="project-bid-inner">
					<?php foreach($data['get_conversation'] as $key=>$name){
						if($row['projectid'] == $key && $row['freelancerid'] == $name["freelancerid"]){ ?>
						<a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/chat/view/<?=e($row["freelancerid"])?>/<?=e($name["cid"])?>" class="kafe-btn kafe-btn-yellow"><?=$this->lang('send_message')?></a>
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