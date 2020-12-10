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
		  <h3><?=$this->lang('ratings')?></h3>
		 </div>	
		 
		<?php if($data['has_ratings'] === false): ?> 
		  
		  <div class="prop-info text-center">
		     <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.$this->themePath().'/'.$this->theme()?>/assets/img/graphic.png" class="img-responsive" alt="Image" />
			 <h3><?=$this->lang('no_ratings')?>.</h3>
          </div><!-- /.prop-info -->	
		  
		<?php elseif($data['has_ratings'] === true): ?> 
		
		   <?php foreach($data['ratings_pagination'] as $row) { ?>  
			  

			 <div class="proposal-box" id="tr<?=e($row["id"])?>">
			  <div class="proposal-img">
			   <div class="proposal-img-inner">
				<?php foreach($data['users'] as $r1){
				 if($r1['userid'] == $row['user_sending']){ 
				  if($r1['user_type'] == 1):?>
					 <a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
					  <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($r1['imagelocation'])?>" alt="Profile Picture">
					 </a>
				 <?php elseif($r1['user_type'] == 2):?>
					 <a href="<?=$this->siteUrl()?>/<?=$this->clients_url()?>/projects/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
					  <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($r1['imagelocation'])?>" alt="Profile Picture">
					 </a>
				 <?php endif; ?>
				<?php } }?> 
			   </div>
			  </div><!--/ .freelancer-box-img -->	
			  <div class="proposal-details">
			   <div class="proposal-description">
				<?php foreach($data['users'] as $r1){
				 if($r1['userid'] == $row['user_sending']){ 
				  if($r1['user_type'] == 1):?>
					<a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
					<h3 class="<?=($r1["verified"] == '1' ? ' verified' : '')?>"><?=e($r1["name"])?></h3></a>
				 <?php elseif($r1['user_type'] == 2):?>
					<a href="<?=$this->siteUrl()?>/<?=$this->clients_url()?>/projects/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
					<h3 class="<?=($r1["verified"] == '1' ? ' verified' : '')?>"><?=e($r1["name"])?></h3></a>
				 <?php endif; ?>
				<?php } }?> 
				<?php foreach($data['ratings_projects'] as $r2){
				 if($r2['projectid'] == $row['projectid']){ ?>
					<h4><a href="<?=$this->siteUrl()?>/project/<?=e($r2["projectid"])?>/<?=e($r2["slug"])?>" target="_blank"> "<?=e($r2["title"])?>"</a></h4>
				<?php } }?> 
				<?php foreach($data['ratings_timeago'] as $key=>$name){
					if($row['id'] == $key){ ?>
					<h5> <?=e($name)?></h5>
				<?php } } ?>
				
				<?php foreach($data['ratings_value'] as $key=>$name){
					if($row['id'] == $key){ ?>
                    <div class="star-rating" data-rating="<?=$name[1]?>">
					 <?=$name[0]?>
					</div>
				<?php } } ?>
				
					<p><?=e($row["description"])?></p>
				
			   </div>
			  </div><!--/ .freelancer-box-details -->
			   <?php foreach($data['users'] as $r1){
				 if($r1['userid'] == $row['user_sending']){ 
				  if($r1["user_type"] == 1): ?>
				  <div class="proposal-bid">
				   <div class="proposal-bid-inner">
					<a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/editrating/<?=e($row["id"])?>" class="kafe-btn kafe-btn-mint-small"><i class="fa fa-edit"></i> <?=$this->lang('edit')?></a>
					<a id="delete_rating" data-id="<?=e($row["id"])?>" class="kafe-btn kafe-btn-red-small"><i class="fa fa-trash"></i> <?=$this->lang('delete')?></a>
				   </div>
				  </div><!--/ .proposal-bid -->
			   <?php endif; ?>
			  <?php } }?> 
			 </div><!--/ .proposal-box -->	
				
			  <?php } ?>
			
			<?=$data['pagination']?>		
			  
		<?php endif; ?>  
		

		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	  