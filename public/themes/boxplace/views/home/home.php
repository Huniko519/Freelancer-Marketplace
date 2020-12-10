<?php
defined('FIR') OR exit();
/**
 * The template for displaying Home page menu
 */
?>


	 
	<!-- ==============================================
	 Header Section
	 =============================================== -->	
     <section class="tr-banner" style="background: linear-gradient( rgba(34,34,34,0.7), rgba(34,34,34,0.7) ), url('<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/<?=e($this->theme_details('bg_image_one'))?>') no-repeat center center fixed;">
      <div class="container">
	   <div class="row">
		<div class="col-lg-12">
		 <div class="banner-headline">
		  <h3 class="wow fadeInDown" data-wow-delay="300ms" data-wow-duration="1500ms"><?=e($this->theme_details('title'))?></h3>
		  <h4 class="wow fadeInDown" data-wow-delay="300ms" data-wow-duration="1500ms"><?=e($this->theme_details('sub_title'))?></h4>
		 </div>
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
	   <div class="row">
	    <div class="col-lg-12">
		
		
         <form method="post" action="<?=$this->siteUrl()?>/search_freelancers">
		  <div class="search-form">
		   <div class="search-contents">
			<label class="label"><?=e($this->theme_details('freelancer_search'))?></label>
			 <div class="select">
			  <select name="category">
	   
			  <?php foreach($data['categories'] as $r2) { ?>			  
				<option value="<?=e($r2["name"])?>"><?=e($r2["name"])?></option>
		      <?php } ?>
			  </select>
			  <div class="select__arrow"></div>
			</div><!--/ .select -->	
		   </div><!--/ .search-contents -->
		   <div class="search-button">
              <?=$this->token()?>
		    <button type="submit" name="submit" class="kafe-btn kafe-btn-mint"><?=$this->lang('search')?></button>
		   </div><!--/ .search-button -->
          </div><!--/ .search-form -->
		 </form>
		 
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
	   <div class="row">
		<div class="col-lg-12">
		 <ul class="banner-stats hidden-xs">
		  <li class="count-box"><strong class="counter count-text" data-speed="800" data-stop="<?=e($data['c_freelancers'])?>"><?=e($data['c_freelancers'])?>+</strong>
		      <span><?=$this->freelancer_name_plural()?></span>
		  </li>
		  <li class="count-box"><strong class="counter count-text" data-speed="800" data-stop="<?=e($data['c_clients'])?>"><?=e($data['c_clients'])?>+</strong>
		      <span><?=$this->client_name_plural()?></span>
		  </li>
		  <li class="count-box"><strong class="counter count-text" data-speed="800" data-stop="<?=e($data['c_posted_projects'])?>"><?=e($data['c_posted_projects'])?>+</strong>
		      <span><?=$this->lang('available_projects')?></span>
		  </li>
		  <li class="count-box"><strong class="counter count-text" data-speed="800" data-stop="<?=e($data['c_completed_projects'])?>"><?=e($data['c_completed_projects'])?>+</strong>
		      <span><?=$this->lang('projects_completed')?></span>
		  </li>
		 </ul>
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->

	  </div><!--/ .container -->
     </section>	
	 
	 
	<!--Category Section-->
	<section class="category-section">
		<div class="container">
			<!--Sec Title-->
			<div class="sec-title centered">
				<h2><?=e($this->theme_details('categories_title'))?></h2>
			</div>
			
		
		   <?php
          /*
            Start with variables to help with row creation;
          */
            $startRow = true;
            $postCounter = 0;
		    $messageList = '';
		    $x = 1;

			foreach($data['home_categories'] as $row) { 
          
				/*
				  Check whether we need to add the start of a new row.
				  If true, echo a div with the "row" class and set the startRow variable to false 
				  If false, do nothing. 
				*/
				if ($startRow) {
				  echo '<!-- START OF INTERNAL ROW --><div class="row clearfix">';
				  $startRow = false;
				}
				/* Add one to the counter because a new post is being added to your page.  */ 
				  $postCounter += 1; 
			?> 			
			
			<?php if($postCounter == 1): ?>
				<div class="col-lg-3 category-block wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
			<?php elseif($postCounter == 2): ?>
				<div class="col-lg-3 category-block wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
			<?php elseif($postCounter == 3): ?>
				<div class="col-lg-3 category-block wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
			<?php elseif($postCounter == 4): ?>
				<div class="col-lg-3 category-block wow fadeInLeft" data-wow-delay="900ms" data-wow-duration="1500ms">
			<?php endif; ?>
					<div class="inner-box">
						<div class="image">
							<img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/categories/<?=e($row['imagelocation'])?>" alt="Image" />
							<div class="overlay-box">
                                <div class="overlay-inner">
                                    <div class="content">
										<form method="post" action="<?=$this->siteUrl()?>/search_projects">
                                            <input name="category" value="<?=e($row['name'])?>" class="field" type="hidden">
											<?=$this->token()?>
											<button type="submit" name="submit"><?=e($row['name'])?></button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!--Category Block-->
				
			
		   <?php
				/*
				Check whether the counter has hit 3 posts.  
				If true, close the "row" div.  Also reset the $startRow variable so that before the next post, a new "row" div is being created. Finally, reset the counter to track the next set of three posts.
				If false, do nothing. 
				*/ 
				if ($postCounter == 4) {
					echo '</div><br/><!-- END OF INTERNAL ROW -->';
					$startRow = true;
					$postCounter = 0;
				}

			} 
            
            if ($data['is_divisible_by_4'] === false) {
                echo '			
				
				</div><!-- END ROW -->';
            }

			
			?>
			
			<div class="row">
			 <div class="text-center mt-4">
				<a class="ps-btn ps-btn--lg" href="<?=$this->siteUrl()?>/projects"><?=$this->lang('more_categories')?></a>
             </div>			
            </div>			
			
			
		</div>
	</section>
	<!--End Category Section-->	 	 
	 
	<!-- ==============================================
	Slick Section
	=============================================== -->		
	<section class="slick">
	 <div class="container-max">
		<h2 class="heading heading--h1 heading--h1-capped heading--with-divider"><?=e($this->theme_details('portfolio_title'))?></h2>
	   
		<div class="slick-slider slick-dotted"> 
		
		   <?php

			foreach($data['portfolio_pagination'] as $row) { 
			?>  

		 
			 <div class="design-box">
			  <div class="design-card">
				<?php foreach($data['users'] as $r2){
					if($r2['userid'] == $row['userid']){ ?>
				  <a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($r2["userid"])?>/<?=e($r2["slug"])?>">
				   <img class="img-responsive design-img" src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/portfolio/<?=e($row['imagelocation'])?>" alt="Portfolio">
				  </a>
				<?php } }?>
			  </div><!--/design-card -->
			  <div class="design-footer">
			   <div class="design-footer-inner">
				<?php foreach($data['users'] as $r2){
					if($r2['userid'] == $row['userid']){ ?>
						 <div class="design-footer-image">
						  <a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($r2["userid"])?>/<?=e($r2["slug"])?>">
						   <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($r2['imagelocation'])?>" class="img-responsive img-circle" alt="User Image">
						  </a>						
						 </div>
						 <div class="design-footer-details">
						  <div class="design-footer-name">
						   <a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($r2["userid"])?>/<?=e($r2["slug"])?>"><?=e($r2["name"])?></a>
						  </div>
						  <div class="design-footer-job"><?=e($r2["title"])?></div>
						 </div>
				<?php } }?>
			   </div> 
			  </div><!--/design-footer -->	
			 </div><!--/design-box -->				
				
		   <?php } ?>		

		
		</div><!--/slick-slider -->
		
	 </div><!--/container -->	
	</section>
	
	
	 
	<!-- ==============================================
	How it Works Section
	=============================================== -->	
	<section class="how-it-works">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="main-heading">
						<h2 class="wow fadeInDown" data-wow-delay="0ms" data-wow-duration="1500ms"><?=e($this->theme_details('how_it_works_title'))?></h2></div>
				</div>
			</div>
			
		   <?php
          /*
            Start with variables to help with row creation;
          */
            $startRow = true;
            $postCounter = 0;
            $c = 0;
		    $messageList = '';
		    $x = 1;

			foreach($data['how_sections'] as $row) { 
          
				/*
				  Check whether we need to add the start of a new row.
				  If true, echo a div with the "row" class and set the startRow variable to false 
				  If false, do nothing. 
				*/
				if ($startRow) {
				  echo '<!-- START OF INTERNAL ROW --><div class="row clearfix">';
				  $startRow = false;
				}
				/* Add one to the counter because a new post is being added to your page.  */ 
				  $postCounter += 1; 
				  $c += 1; 
			?> 		
			
			<?php if($postCounter == 1): ?>
				<div class="col-md-4 col-sm-4 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
			<?php elseif($postCounter == 2): ?>
				<div class="col-md-4 col-sm-4 wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
			<?php elseif($postCounter == 3): ?>
				<div class="col-md-4 col-sm-4 wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
			<?php endif; ?>			
					<div class="working-process"><span class="process-img">
					<img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/how/<?=e($row['imagelocation'])?>" class="img-responsive" alt="Section">
					<span class="process-num">0<?=e($c)?></span></span>
						<h4><?=e($row['title'])?></h4>
						<p><?=e($row['description'])?></p>
					</div>
				</div>	

				
			
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
			
		</div>
	</section>	

	<div class="testimonial5">
	  <div class="container"> 
		<!-- Row -->
		<div class="row">
			<h3 class="wow fadeInDown" data-wow-delay="0ms" data-wow-duration="1500ms"><?=e($this->theme_details('customers_title'))?></h3>
		</div>
		<!-- Row -->
		<div class="owl-carousel owl-theme testi5 mt-4 text-center">

		   <?php foreach($data['customers'] as $row) { ?> 		

			  <div class="item">
				<div class="content">“<?=e($row['quote'])?>”</div>
				<div class="customer-thumb">
			      <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/customer/<?=e($row['imagelocation'])?>" alt="customer" class="img-circle" />
				  <h6><?=e($row['name'])?></h6>
				  <p><?=e($row['title'])?></p>
				</div>
			  </div>
				
			
		   <?php } ?>			  
		  
		  
		</div>
	  </div>
	</div>

	 <div class="join-us">
        <div class="container">
		  <div class="join-box">
           <p><?=e($this->theme_details('join_us_title'))?></p>
		  </div>
		  <a class="ps-btn ps-btn--lg" href="<?=$this->siteUrl()?>/register"><?=$this->lang('join_us_today')?></a>
        </div>
      </div>	
	  
 	 