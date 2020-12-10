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
		  <h3><?=$this->lang('invites')?></h3>
		 </div>	
		 
		<?php if($data['has_invites'] === false): ?> 
		  
		  <div class="prop-info text-center">
		     <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.$this->themePath().'/'.$this->theme()?>/assets/img/graphic.png" class="img-responsive" alt="Image" />
			 <h3><?=$this->lang('no_invites')?>.</h3>
          </div><!-- /.prop-info -->	
		  
		<?php elseif($data['has_invites'] === true): ?> 
		
		
		   <?php foreach($data['invites_pagination'] as $row) { ?>  
			  
			 <div class="proposal-box">
			  <div class="proposal-img">
			   <div class="proposal-img-inner">
				<?php foreach($data['users'] as $r1){
				 if($r1['userid'] == $row['freelancerid']){ ?>
				 <a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
				  <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($r1['imagelocation'])?>" alt="Profile Picture">
				 </a>
				<?php } }?> 
			   </div>
			  </div><!--/ .freelancer-box-img -->	
			  <div class="proposal-details">
			   <div class="proposal-description">
				<?php foreach($data['users'] as $r1){
				 if($r1['userid'] == $row['freelancerid']){ ?>
					<a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
					<h3 class="<?=($r1["verified"] == '1' ? ' verified' : '')?>"><?=e($r1["name"])?></h3></a>
				<?php } }?> 
				<?php foreach($data['invites_projects'] as $r2){
				 if($r2['projectid'] == $row['projectid']){ ?>
					<h4><a href="<?=$this->siteUrl()?>/project/<?=e($r2["projectid"])?>/<?=e($r2["slug"])?>" target="_blank"> "<?=e($r2["title"])?>"</a></h4>
				<?php } }?> 
				<h4> <?=$this->lang('invited_on')?> - <?=strftime("%b %d, %Y", strtotime($row['date_added'])); ?></h4>
			    <?php if(e($row["action"]) === "1"): ?>
				<h4> <?=$this->lang('accepted_on')?> - <?=strftime("%b %d, %Y", strtotime($row['date_declined'])); ?></h4>
			    <?php elseif(e($row["action"]) === "2"): ?>
				<h4> <?=$this->lang('declined_on')?> - <?=strftime("%b %d, %Y", strtotime($row['date_declined'])); ?></h4>
			    <?php endif; ?>
			   </div>
			  </div><!--/ .freelancer-box-details -->
			  <div class="proposal-bid">
			   <div class="proposal-bid-inner">
			    <?php if(e($row["action"]) === "0"): ?>
				  <h4> <?=$this->lang('waiting_for_response_from')?> <?=$this->freelancer_name()?></h4>
			    <?php elseif(e($row["action"]) === "1"): ?>
				  <h4> <?=$this->freelancer_name()?> <?=$this->lang('accepted_and_posted_a_proposal')?></h4>
			    <?php elseif(e($row["action"]) === "2"): ?>
				  <h4> <?=$this->freelancer_name()?> <?=$this->lang('declined_the_invite')?> </h4>
			    <?php elseif(e($row["action"]) === "3"): ?>
				  <h4> <?=$this->lang('you_already_hired_a')?> <?=$this->freelancer_name()?> </h4>
			    <?php endif; ?>
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