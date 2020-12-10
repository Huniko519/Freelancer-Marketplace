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
		  <h3><?=$this->lang('files')?></h3>
		  <a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/addfiles"><?=$this->lang('add_files')?></a>
		 </div>	
		 
		<?php if($data['has_files'] === false): ?> 
		  
		  <div class="prop-info text-center">
		     <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.$this->themePath().'/'.$this->theme()?>/assets/img/graphic.png" class="img-responsive" alt="Image" />
			 <h3><?=$this->lang('no_files')?>.</h3>
          </div><!-- /.prop-info -->	
		  
		<?php elseif($data['has_files'] === true): ?> 
		
		   <?php foreach($data['files_pagination'] as $row) { ?>  
			  

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
				<?php foreach($data['files_timeago'] as $key=>$name){
					if($row['id'] == $key){ ?>
					<h5> <?=e($name)?></h5>
				<?php } } ?>
				<?php foreach($data['files_projects'] as $r2){
				 if($r2['projectid'] == $row['projectid']){ ?>
					<h4><a href="<?=$this->siteUrl()?>/project/<?=e($r2["projectid"])?>/<?=e($r2["slug"])?>" target="_blank"> "<?=e($r2["title"])?>"</a></h4>
				<?php } }?> 
				<p><i class="fa fa-files-o"></i> <?=$this->lang('file_type')?> - <?=e($row["extension"])?> </p>
				<p><i class="fe fe-document"></i> <?=$this->lang('size')?> - <?php echo round(e($row["size"]), 2); ?> KB  </p><br>
			   <?php foreach($data['users'] as $r1){
				 if($r1['userid'] == $row['user_sending']){ 
				  if($r1["user_type"] == 1): ?>
					<a id="delete_file" data-id="<?=e($row["id"])?>" class="kafe-btn kafe-btn-red-small"><i class="fa fa-trash"></i> <?=$this->lang('delete')?></a>
			   <?php endif; ?>
			  <?php } }?> 
			   </div>
			  </div><!--/ .freelancer-box-details -->
				  <div class="proposal-bid">
				   <div class="proposal-bid-inner">
					 <a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/download/<?=e($row["id"])?>" class="kafe-btn kafe-btn-yellow"><i class="fa fa-download"></i> <?=$this->lang('download')?></a>
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