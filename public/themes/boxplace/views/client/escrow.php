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
		  <h3><?=$this->lang('escrow')?></h3>
		  <h5><?=$this->lang('money_held_by')?> <?=$this->siteSettings('sitename')?></h5>
		 </div>	
		 
		<?php if($data['has_escrow'] === false): ?> 
		  
		  <div class="prop-info text-center">
		     <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.$this->themePath().'/'.$this->theme()?>/assets/img/graphic.png" class="img-responsive" alt="Image" />
			 <h3><?=$this->lang('no_escrow')?>.</h3>
          </div><!-- /.prop-info -->	
		  
		<?php elseif($data['has_escrow'] === true): ?> 
		
		
		   <?php foreach($data['escrow_pagination'] as $row) { ?>  
			  

			 <div class="withdraw-box">
			  <div class="withdraw-bid">
			   <div class="withdraw-bid-inner">
				 <h4><?=e($this->currency)?><?=e($row["budget"])?></h4>
			   </div>
			  </div><!--/ .withdraw-bid -->
			  <div class="withdraw-details">
			   <div class="withdraw-description">
				<?php foreach($data['users'] as $r1){
				 if($r1['userid'] == $row['freelancerid']){ ?>
					<h4><?=$this->lang('you_hired')?> - <a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>" target="_blank"> "<?=e($r1["name"])?>"</a></h4>
				<?php } }?> 
				<?php foreach($data['escrow_projects'] as $r2){
				 if($r2['projectid'] == $row['projectid']){ ?>
					<h4><?=$this->lang('to_work_on')?> - <a href="<?=$this->siteUrl()?>/project/<?=e($r2["projectid"])?>/<?=e($r2["slug"])?>" target="_blank"> "<?=e($r2["title"])?>"</a></h4>
				<?php } }?> 
				<h4><?=$this->lang('hired_date')?> - <?=strftime("%b %d, %Y, %H : %M %p ", strtotime($row['date_added'])); ?></h4>
			   </div>
			  </div><!--/ .job-box-details -->
			  <div class="withdraw-bid">
			   <div class="withdraw-bid-inner">
				<?php if(e($row["action"]) === "1"): ?> 	 
					 <h5><?=$this->lang('money_in_escrow')?>.</h5>
				<?php elseif(e($row["action"]) === "2"): ?> 
					 <h5><?=$this->lang('money_released_to')?> <?=$this->freelancer_name()?>.</h5>
				<?php elseif(e($row["action"]) === "3"): ?> 
					 <h5><?=$this->lang('money_in_dispute')?>.</h5>
				<?php elseif(e($row["action"]) === "4"): ?> 
					 <h5><?=$this->lang('money_returned_to_you')?>.</h5>
				<?php endif; ?> 
			   
			   </div>
			  </div><!--/ .withdraw-bid -->	
			 </div><!--/ .withdraw-box -->	
				
			  <?php } ?>	
			
			<?=$data['pagination']?>		
			  
		<?php endif; ?>  
		

		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	  