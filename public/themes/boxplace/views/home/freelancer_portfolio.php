<?php
defined('FIR') OR exit();
/**
 * The template for displaying Home page menu
 */
?>

	 
	 <!-- ==============================================
	 Header Section
	 =============================================== -->	
     <section class="profile-banner" style="background: linear-gradient( rgba(34,34,34,0.6), rgba(34,34,34,0.6) ), url('<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($data['user']['bg_imagelocation'])?>') no-repeat center center fixed;">
      <div class="container">
       <div class="banner-content text-center">
	    <a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>">
		  <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($data['user']['imagelocation'])?>" class="img-responsive img-circle"/>
		</a>
        <h1 class="<?=($data['user']["verified"] == '1' ? ' verified' : '')?>"><?=e($data['user']["name"])?></h1>
        <h2><?=e($data['user']["title"])?></h2>
        <h3><i class="fa fa-map-marker"></i> <?=e($data['user']["country"])?></h3>
		<div class="button-wrapper">
          <a class="kafe-btn kafe-btn-red" href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/invite/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>">
		  <i class="fa fa-envelope-o"></i> <?=$this->lang('invite_to_project')?> </a>
		</div>  
       </div><!--/. banner-content -->
      </div><!-- /.container -->
     </section>

	 <!-- ==============================================
	 Navbar-box Section
	 =============================================== -->
     <section class="navbar-box text-center">
      <ul id="">
       <li class="active"><a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>"> <?=$this->lang('portfolio')?>  
	     <em class="hidden-xs hidden-sm">(<?=e($data['total_portfolio'])?>)</em></a></li>
       <li><a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/about/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>"> <?=$this->lang('about')?> </a></li>
       <li><a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/projects/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>"><?=$this->lang('projects')?> 
	     <em class="hidden-xs hidden-sm">(<?=e($data['total_projects'])?>)</em></a></li>
       <li><a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/ratings/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>"><?=$this->lang('ratings')?> 
	     <em class="hidden-xs hidden-sm">(<?=e($data['total_ratings'])?>)</em></a></li>
      </ul>
     </section>		 
	 
	 
	 
	 <!-- ==============================================
	 Dashboard Section
	 =============================================== -->
     <section class="freelancer-content">
      <div class="container gal-container">
		 
		<?php if($data['has_portfolio'] === false): ?> 
		  
		  <div class="prop-info text-center">
		     <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.$this->themePath().'/'.$this->theme()?>/assets/img/graphic.png" class="img-responsive" alt="Image" />
			 <h3><?=$this->lang('no_portfolio_display')?>.</h3>
          </div><!-- /.prop-info -->	
		  
		<?php elseif($data['has_portfolio'] === true): ?> 
		
	   
			  <?php
          /*
            Start with variables to help with row creation;
          */
            $startRow = true;
            $postCounter = 0;
		    $messageList = '';
		    $x = 1;

			foreach($data['freelancer_portfolio'] as $row) {
          
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
		

		
		
	  </div><!--/ .container -->
     </section>	 	 