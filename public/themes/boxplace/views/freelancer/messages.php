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
		  <h3><?=$this->lang('messages')?></h3>
		 </div>	
		 
		<?php if($data['has_messages'] === false): ?> 
		  
		  <div class="prop-info text-center">
		     <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.$this->themePath().'/'.$this->theme()?>/assets/img/graphic.png" class="img-responsive" alt="Image" />
			 <h3><?=$this->lang('no_messages')?>.</h3>
          </div><!-- /.prop-info -->	
		  
		<?php elseif($data['has_messages'] === true): ?> 
		
		
		   <?php foreach($data['messages_pagination'] as $row) { ?>  
			  
			  
			 <div class="proposal-box">
			  <div class="proposal-img">
			   <div class="proposal-img-inner">
				<?php foreach($data['users'] as $r1){
				 if($r1['userid'] == $row['clientid']){ ?>
				 <a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
				  <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($r1['imagelocation'])?>" alt="Profile Picture">
				 </a>
				<?php } }?> 
			   </div>
			  </div><!--/ .freelancer-box-img -->	
			  <div class="proposal-details">
			   <div class="proposal-description">
				<?php foreach($data['users'] as $r1){
				 if($r1['userid'] == $row['clientid']){ ?>
					<a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
					<h3 class="<?=($r1["verified"] == '1' ? ' verified' : '')?>"><?=e($r1["name"])?></h3></a>
				<?php } }?> 
				<?php foreach($data['messages_projects'] as $r2){
				 if($r2['projectid'] == $row['projectid']){ ?>
					<h4> "<?=e($r2["title"])?>"</h4>
				<?php } }?> 
				<?php foreach($data['unread_conversations'] as $key=>$name){
					if($row['cid'] == $key){ 
					if($name > 0){?>
				     <h6></h6>
				<?php } } } ?>
			   </div>
			  </div><!--/ .freelancer-box-details -->
			  <div class="proposal-bid">
			   <div class="proposal-bid-inner">
				<a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/chat/view/<?=e($row["clientid"])?>/<?=e($row["cid"])?>" class="kafe-btn kafe-btn-yellow"><?=$this->lang('click_to_open_chat')?> <i class="fa fa-arrow-right"></i></a>
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