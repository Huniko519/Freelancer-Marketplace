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
		  <a href="<?=$this->siteUrl()?>/projects"><?=$this->lang('look_for_projects')?></a>
		 </div>	
		

	    <!-- ==============================================
	    Listing Nav Section
	    =============================================== -->
		<div class="listing-nav member-nav">
		 <div class="container clearfix">
		  <ul>
			<li>
			 <a class="<?=($data['url'] == 'dashboard' ? ' active' : '')?>" href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/dashboard">
			  <span class="fa fa-bars"></span> <?=$this->lang('in_progress')?>(<?=e($data["f_projects_count_closed"])?>)
			 </a>
			</li>
			<li>
			 <a class="<?=($data['url'] == 'completed' ? ' active' : '')?>" href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/dashboard/completed">
			  <span class="fa fa-check-circle-o"></span> <?=$this->lang('completed')?>(<?=e($data["f_projects_count_completed"])?>)
			 </a>
			</li>
			<li>
			 <a class="<?=($data['url'] == 'disputed' ? ' active' : '')?>" href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/dashboard/disputed">
			  <span class="fa fa-close"></span> <?=$this->lang('under_dispute')?> (<?=e($data["count_disputed_projects"])?>)
			 </a>
			</li>
		  </ul>
		 </div><!--/container -->
		</div><!--/listing-nav -->	

		 
		<?php if($data['f_has'] === false): ?> 
		  
		  <div class="prop-info text-center">
		     <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.$this->themePath().'/'.$this->theme()?>/assets/img/graphic.png" class="img-responsive" alt="Image" />
			 <h3><?=$this->lang('no_project')?>.</h3>
			 <p><a class="kafe-btn kafe-btn-yellow-small" href="<?=$this->siteUrl()?>/projects"><?=$this->lang('look_for_projects')?></a></p>
          </div><!-- /.prop-info -->	
		  
		<?php elseif($data['f_has'] === true): ?> 
		
		    

		 
		  <?php if($data['f_projects_has_closed'] === false): ?> 
		  
			  <div class="listing-info text-center">
				 <h3><?=$this->lang('look_for_more_projects')?>.</h3>
				 <p><a class="kafe-btn kafe-btn-red" href="<?=$this->siteUrl()?>/projects"><?=$this->lang('look_for_projects')?></a></p>
			  </div><!-- /.prop-info -->
			  
		 <?php elseif($data['f_projects_has_closed'] === true): ?> 
		
	   
			<?php foreach($data['f_projects_closed'] as $row) { ?>	
		
				 <div class="project-box">
				  <div class="project-img">
				   <div class="project-img-inner">
					<?php foreach($data['projects_user'] as $r2){
						if($r2['userid'] == $row['userid']){ ?>
					 <a href="<?=$this->siteUrl()?>/<?=$this->clients_url()?>/projects/<?=e($r2["userid"])?>/<?=e($r2["slug"])?>" target="_blank">
					  <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($r2['imagelocation'])?>" alt="Profile Picture">
					 </a>
					 <h4><?=e($r2["name"])?></h4>
					<?php } }?> 
				
					
				   </div>
				  </div><!--/ .freelancer-box-img -->
				  <div class="project-details">
				   <div class="project-description">
					<a href="<?=$this->siteUrl()?>/project/<?=e($row["projectid"])?>/<?=e($row["slug"])?>" target="_blank" class="project-title"><h3><?=e($row["title"])?></h3></a>
					<?php foreach($data['f_projects_escrow'] as $key=>$name){
						if($row['projectid'] == $key){ ?>
							<h4> <?=$this->lang('escrow')?> - <?=e($this->currency)?><?=e($name)?></h4>
					<?php } }?> 
					<?php foreach($data['projects_user'] as $r2){
					 if($r2['userid'] == $row['userid']){ ?>
					    <h4><?=$this->client_name()?> - <?=e($r2["name"])?></h4>
					<?php } }?> 
					<h4> <?=$this->lang('hired_date')?> - <?=strftime("%b %d, %Y", strtotime($row['hired_date'])); ?></h4>
					<ul class="project-icons">
					 <li><a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/addfiles"><i class="fa fa-upload"></i> <?=$this->lang('add_files')?></a></li>
					 <li><a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/startdispute/<?=e($row["userid"])?>/<?=e($row["projectid"])?>"><i class="fa fa-close"></i> <?=$this->lang('start_a_dispute')?></a></li>
					</ul>
				   </div>
				  </div><!--/ .job-box-details -->
				  <div class="project-bid">
				   <div class="project-bid-inner">
					<?php foreach($data['f_get_conversation'] as $key=>$name){
						if($row['projectid'] == $key && $row['userid'] == $name["clientid"]){ ?>
						<a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/chat/view/<?=e($row["userid"])?>/<?=e($name["cid"])?>" class="kafe-btn kafe-btn-yellow"><?=$this->lang('send_message')?></a>
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