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
		  <h3><?=$this->lang('proposals_for')?></h3>
		  <h4><?=e($data['project']['title'])?> - <?=e($this->currency)?><?=e($data['project']['budget'])?></h4>
		  <a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/dashboard"><?=$this->lang('go_back')?></a>
		 </div>	
		 
		<?php if($data['has_proposals'] === false): ?> 
		  
		  <div class="prop-info text-center">
		     <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.$this->themePath().'/'.$this->theme()?>/assets/img/graphic.png" class="img-responsive" alt="Image" />
			 <h3><?=$this->lang('no_proposals')?>.</h3>
          </div><!-- /.prop-info -->	
		  
		<?php elseif($data['has_proposals'] === true): ?> 
		
		
		   <?php foreach($data['proposals_pagination'] as $row) { ?>  
			  
			  
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
					<h4> <?=e($r1["title"])?></h4>
				<?php } }?> 
				<h4> <?=$this->lang('budget_proposal')?> - <?=e($this->currency)?><?=e($row["budget"])?></h4>
				  
				<?php foreach($data['freelancers_ratings'] as $key=>$name){
					if($row['freelancerid'] == $key){ ?>
                    <div class="star-rating" data-rating="<?=$name[1]?>">
					 <?=$name[0]?>
					</div>
				<?php } } ?>
				
				<div class="proposal-btns">
				
				<?php if($data['has_conversation'] === true): ?>
					<ul class="project-icons">
					 <li><a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/chat/view/<?=e($row["freelancerid"])?>/<?=e($data['get_conversation']["cid"])?>"><i class="fa fa-comments"></i> <?=$this->lang('send_message')?></a></li>
					</ul>
				<?php elseif($data['has_conversation'] === false): ?>
					<ul class="project-icons">
					 <li><a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/chat/start/<?=e($row["freelancerid"])?>/<?=e($row["projectid"])?>"><i class="fa fa-comments"></i> <?=$this->lang('send_message')?></a></li>
					</ul>
				<?php endif; ?>
				
				</div><!--/ .freelancer-box-tags -->
			   </div>
			  </div><!--/ .freelancer-box-details -->
			  <div class="proposal-bid">
			   <div class="proposal-bid-inner">
				
				<?php if($data['user']['credit_account'] >= $row["budget"]): ?>
				
					<a id="hire_freelancer" data-id="<?=e($row["id"])?>" class="kafe-btn kafe-btn-yellow"><i class="fa fa-handshake-o"></i> <?=$this->lang('hire')?> - <?=e($this->currency)?><?=e($row["budget"])?></a>
					
				<?php elseif($data['user']['credit_account'] <= $row["budget"]): ?>
				
					<a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/addfunds" class="kafe-btn kafe-btn-red"><?=$this->lang('add_more_funds_to_hire')?></a>
					
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