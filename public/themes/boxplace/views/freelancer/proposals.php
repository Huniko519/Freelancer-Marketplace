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
		  <h3><?=$this->lang('proposals')?></h3>
		  <a href="<?=$this->siteUrl()?>/projects"><?=$this->lang('add_proposal')?></a>
		 </div>	
		 
		<?php if($data['hasProposal'] === false): ?> 
		  
		  <div class="prop-info text-center">
		     <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.$this->themePath().'/'.$this->theme()?>/assets/img/graphic.png" class="img-responsive" alt="Image" />
			 <h3><?=$this->lang('no_proposal')?>.</h3>
			 <p><a class="kafe-btn kafe-btn-yellow-small" href="<?=$this->siteUrl()?>/projects"><?=$this->lang('add_proposal')?></a></p>
          </div><!-- /.prop-info -->	
		  
		<?php elseif($data['hasProposal'] === true): ?> 
		
	   
			  <?php foreach($data['proposals'] as $row) {?>

			 <div class="withdraw-box" id="tr<?=e($row["id"])?>">
			  <div class="withdraw-bid">
			   <div class="withdraw-bid-inner">
				 <h4><?=e($this->currency)?><?=e($row["budget"])?></h4>
			<?php if(e($row["action"]) === "1"): ?> 	 
				<a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/proposals/edit/<?=e($row["id"])?>" class="kafe-btn kafe-btn-red-small"><?=$this->lang('edit')?> </a>
				<a id="delete_proposal" data-id="<?=e($row["id"])?>" class="kafe-btn kafe-btn-yellow-small"><?=$this->lang('delete')?></a> 
			<?php endif; ?> 	 
			   </div>
			  </div><!--/ .withdraw-bid -->
			  <div class="withdraw-details">
			   <div class="withdraw-description">
				<?php foreach($data['projects'] as $r2){
				 if($r2['projectid'] == $row['projectid']){ ?>
					<h4><?=e($r2["title"])?></h4>
				<?php } }?> 
			   </div>
			  </div><!--/ .job-box-details -->
			  <div class="withdraw-bid">
			   <div class="withdraw-bid-inner">
			<?php if(e($row["action"]) === "1"): ?> 	 
				 <h5><?=$this->lang('waiting_for_client_response')?>.</h5>
			<?php elseif(e($row["action"]) === "2"): ?> 
				 <h5><?=$this->lang('you_were_awarded_the_project')?>.</h5>	 
			<?php elseif(e($row["action"]) === "3"): ?> 
				 <h5><?=$this->lang('project_awarded_to_another')?> <?=$this->freelancer_name()?>.</h5>	 
			<?php endif; ?> 
			   </div>
			  </div><!--/ .withdraw-bid -->	
			 </div><!--/ .withdraw-box -->	
				
			  <?php } ?>	
			  
		<?php endif; ?>  
		

		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	  