<?php
defined('FIR') OR exit();
/**
 * The template for displaying Home page content
 */
?>
	  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2><?=$this->lang('disputes')?></h2>
        </section>
        <!-- Main content -->
        <section class="content">
		  

			<div class="row">
               <div class="col-lg-12">
				<div class="ratings-box">	
				

		 
		<?php if($data['has_disputes'] === false): ?> 
		  
		  <div class="prop-info text-center">
		     <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.$this->themePath().'/'.$this->theme()?>/assets/img/graphic.png" class="img-responsive" alt="Image" />
			 <h3><?=$this->lang('no_disputes')?>.</h3>
          </div><!-- /.prop-info -->	
		  
		<?php elseif($data['has_disputes'] === true): ?> 
		
		
		   <?php foreach($data['disputes_pagination'] as $row) { ?>  
			  
			  
			 <div class="proposal-box">
			  <div class="proposal-details">
			   <div class="proposal-description">
				<?php foreach($data['disputes_projects'] as $r2){
				 if($r2['projectid'] == $row['projectid']){ ?>
					<a href="<?=$this->siteUrl()?>/project/<?=e($r2["projectid"])?>/<?=e($r2["slug"])?>">
					<h3><?=e($r2["title"])?></h3></a>
				<?php } }?> 
				<?php foreach($data['unread_disputes_conversations'] as $key=>$name){
					if($row['cid'] == $key){ 
					if($name > 0){?>
				     <h6></h6>
				<?php } } } ?>
				  <h5> <?=$this->lang('conversation_is_between')?> : <?=$this->lang('you')?>, <?=$this->client_name()?> and <?=$this->freelancer_name()?>.</h5>
				  <?php if(e($row["action"]) === "1"): ?> 
					<h4><i class="fa fa-asterisk"></i> <?=$this->lang('closed')?> - <?=$this->lang('money_released_to')?> <?=$this->client_name()?></h4>
				  <?php elseif(e($row["action"]) === "2"): ?> 
					<h4><i class="fa fa-asterisk"></i> <?=$this->lang('closed')?> - <?=$this->lang('money_released_to')?> <?=$this->freelancer_name()?></h4>
				  <?php endif; ?>
			   </div>
			  </div><!--/ .freelancer-box-details -->
			  <div class="proposal-bid">
			   <div class="proposal-bid-inner">
				<a href="<?=$this->siteUrl()?>/admin/dispute/view/<?=e($row["cid"])?>" class="kafe-btn kafe-btn-yellow"><?=$this->lang('click_to_open_conversation')?> <i class="fa fa-arrow-right"></i></a>
			   </div>
			  </div><!--/ .proposal-bid -->
			 </div><!--/ .proposal-box -->	
				
			  <?php } ?>	
			
			<?=$data['pagination']?>		
			  
		<?php endif; ?>				
		
				</div>		
              </div> <!-- end col -->
            </div>		
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->