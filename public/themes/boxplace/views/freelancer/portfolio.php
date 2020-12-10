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
		  <h3><?=$this->lang('portfolio')?></h3>
		  <a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/portfolio/add"><?=$this->lang('add_portfolio')?></a>
		 </div>	
		 
		<?php if($data['has'] === false): ?> 
		  
		  <div class="prop-info text-center">
		     <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.$this->themePath().'/'.$this->theme()?>/assets/img/graphic.png" class="img-responsive" alt="Image" />
			 <h3><?=$this->lang('no_portfolio')?>.</h3>
			 <p><?=$this->lang('add_here')?>:- <a class="kafe-btn kafe-btn-yellow-small" href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/portfolio/add"><?=$this->lang('add_portfolio')?></a></p>
          </div><!-- /.prop-info -->	
		  
		<?php elseif($data['has'] === true): ?> 
		
	   
			  <?php
          /*
            Start with variables to help with row creation;
          */
            $startRow = true;
            $postCounter = 0;
		    $messageList = '';
		    $x = 1;

			foreach($data['portfolio'] as $row) {
          
				/*
				  Check whether we need to add the start of a new row.
				  If true, echo a div with the "row" class and set the startRow variable to false 
				  If false, do nothing. 
				*/
				if ($startRow) {
				  echo '<!-- START OF INTERNAL ROW --><div class="row">';
				  $startRow = false;
				}
				/* Add one to the counter because a new post is being added to your page.  */ 
				  $postCounter += 1; 
				
			?>

			<div class="col-lg-4" id="tr<?=e($row["id"])?>">
			 <div class="gal-item">
			  <a href="#" data-toggle="modal" data-target="#<?=e($row["id"])?>">
			   <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/portfolio/<?=e($row['imagelocation'])?>" class="img-responsive box-img" alt="Image">
			  </a>
			  <div class="gal-footer">
					<a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/portfolio/edit/<?=e($row["id"])?>" class="kafe-btn kafe-btn-red-small"><?=$this->lang('edit')?> </a>
				<a id="delete_portfolio" data-id="<?=e($row["id"])?>" class="kafe-btn kafe-btn-yellow-small"><?=$this->lang('delete')?></a>
			  </div>
			  <div class="modal fade" id="<?=e($row["id"])?>" tabindex="-1" role="dialog">
			   <div class="modal-dialog" role="document">
				<div class="modal-content">
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				 <div class="modal-body">
				  <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/portfolio/<?=e($row['imagelocation'])?>" class="img-responsive modal-img" alt="Image">
				 </div>
				 <div class="col-md-12 description">
				  <p><?=e($row["description"])?></p>
				 </div>
				</div><!--/. model-content -->
			   </div><!--/. modal-dialog -->
			  </div><!--/. modal -->
			 </div><!--/. box -->
			</div><!--/. col-lg-4 -->	
				
			  <?php
				/*
				Check whether the counter has hit 3 posts.  
				If true, close the "row" div.  Also reset the $startRow variable so that before the next post, a new "row" div is being created. Finally, reset the counter to track the next set of three posts.
				If false, do nothing. 
				*/ 
				if ($postCounter == 3) {
					echo '</div><br/><!-- END OF INTERNAL ROW -->';
					$startRow = true;
					$postCounter = 0;
				}
			
			} 
            
            if ($data['is_divisible_by_3'] === false) {
                echo '</div><!-- END ROW -->';
            }
			
			?>	
			  
		<?php endif; ?>  
		

		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	  