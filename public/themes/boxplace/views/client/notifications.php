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
		  <h3><?=$this->lang('notifications')?></h3>
		 </div>	
		 
		<?php if($data['has_notifications'] === false): ?> 
		  
		  <div class="prop-info text-center">
		     <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.$this->themePath().'/'.$this->theme()?>/assets/img/graphic.png" class="img-responsive" alt="Image" />
			 <h3><?=$this->lang('no_notifications')?>.</h3>
          </div><!-- /.prop-info -->	
		  
		<?php elseif($data['has_notifications'] === true): ?> 
		
		
		   <?php foreach($data['notifications_pagination'] as $row) { ?>  
			  
			 <div class="proposal-box">
			  <div class="proposal-img">
			   <div class="proposal-img-inner">
				<?php foreach($data['users'] as $r1){
				 if($r1['userid'] == $row['user_sending']){ ?>
				 <a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
				  <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($r1['imagelocation'])?>" alt="Profile Picture">
				 </a>
				<?php } }?> 
			   </div>
			  </div><!--/ .freelancer-box-img -->	
			  <div class="proposal-details">
			   <div class="proposal-description">
				<?php foreach($data['users'] as $r1){
				 if($r1['userid'] == $row['user_sending']){ ?>
					<a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
					<h3 class="<?=($r1["verified"] == '1' ? ' verified' : '')?>"><?=e($r1["name"])?></h3></a>
				<?php } }?> 
			    <?php if(e($row["type"]) == 1): ?>
				  <h5> <?=$this->lang('applied_to')?> :</h5>
			    <?php elseif(e($row["type"]) == 2): ?>
				  <h5> <?=$this->lang('posted_a_message_to')?> :</h5>
			    <?php elseif(e($row["type"]) == 3): ?>
				  <h5> <?=$this->lang('invited_you_to_apply_to')?> :</h5>
			    <?php elseif(e($row["type"]) == 4): ?>
				  <h5> <?=$this->lang('hired_you_to_work_on')?> :</h5>
			    <?php elseif(e($row["type"]) == 5): ?>
				  <h5> <?=$this->lang('uploaded_a_file')?>:</h5>
			    <?php elseif(e($row["type"]) == 6): ?>
				  <h5> <?=$this->lang('started_a_dispute')?>:</h5>
			    <?php elseif(e($row["type"]) == 7): ?>
				  <h5> <?=$this->lang('made_project_complete')?>:</h5>
			    <?php elseif(e($row["type"]) == 8): ?>
				  <h5> <?=$this->lang('posted_a_rating_of_you_on_this_project')?>: </h5>
			    <?php endif; ?>
				<?php foreach($data['notifications_projects'] as $r2){
				 if($r2['projectid'] == $row['projectid']){ ?>
					<h4><a href="<?=$this->siteUrl()?>/project/<?=e($r2["projectid"])?>/<?=e($r2["slug"])?>" target="_blank"> "<?=e($r2["title"])?>"</a></h4>
				<?php } }?> 
			   </div>
			  </div><!--/ .freelancer-box-details -->
			  <div class="proposal-bid">
			   <div class="proposal-bid-inner">
				<?php foreach($data['notifications_timeago'] as $key=>$name){
					if($row['id'] == $key){ ?>
					<h4> <?=e($name)?></h4>
				<?php } } ?>
			   </div>
			  </div><!--/ .proposal-bid -->
			 </div><!--/ .proposal-box -->	
				
			  <?php } ?>	
			
			<?=$data['pagination']?>		
			  
		<?php endif; ?>  
		

		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	  