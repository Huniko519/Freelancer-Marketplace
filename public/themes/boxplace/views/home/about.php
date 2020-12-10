<?php
defined('FIR') OR exit();
/**
 * The template for displaying Home page menu
 */
?>
  
     <!-- ==============================================
	 Header Section
	 =============================================== -->
	 <header class="how-header" style="background: linear-gradient( rgba(34,34,34,0.6), rgba(34,34,34,0.6) ), url('<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/<?=e($this->theme_details('bg_image_one'))?>') no-repeat center center fixed;">
      <div class="container">
       <div class="row">
	   
        <div class="col-lg-8 col-lg-offset-2">
         <div class="post-heading">
		  <h1 class="wow bounceIn" data-wow-delay="0ms" data-wow-duration="1500ms"><?=$this->lang('about_us')?>.</h1>
         </div><!-- /.post-heading -->
        </div><!-- /.col-lg-8 -->
		
       </div><!-- /.row -->
	  </div><!-- /.container -->
     </header><!-- /header -->	
 
	 
	<!--We Are Section-->
	<section class="we-are-section">
		<div class="container">
			<div class="row clearfix">
				
				<!--Content Column-->
				<div class="content-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<h2><?=e($data['about']['about_title'])?></h2>
						<?=$data['about']['about_description']?>
						<h4><?=e($data['about']['about_company'])?></h4>
					</div>
				</div>
				
				<!--Image Column-->
				<div class="image-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
						<div class="image">
							<img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/about/<?=e($data['about']['about_image'])?>" alt="about" />
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!--End We Are Section-->
	
	
	<div class="wojo-grid">
	 <div class="container">
		<div class="row align-center vertical-gutters">
		  <div class="columns">
			<h2 class="wow fadeInDown" data-wow-delay="0ms" data-wow-duration="1500ms"><?=$this->lang('our_team')?>.</h2>
		  </div>
		</div>
		
		
		   <?php
          /*
            Start with variables to help with row creation;
          */
            $startRow = true;
            $postCounter = 0;
		    $messageList = '';
		    $x = 1;
			
				function split_name($name) {
					$name = trim($name);
					$last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
					$first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
					return array($first_name, $last_name);
				}

			foreach($data['team'] as $row) { 	

                $name = split_name($row['name']);					
          
				/*
				  Check whether we need to add the start of a new row.
				  If true, echo a div with the "row" class and set the startRow variable to false 
				  If false, do nothing. 
				*/
				if ($startRow) {
				  echo '<!-- START OF INTERNAL ROW --><div class="row align-center gutters">';
				  $startRow = false;
				}
				/* Add one to the counter because a new post is being added to your page.  */ 
				  $postCounter += 1; 
			?>  
			
			<?php if($postCounter == 1): ?>
				<div class="col-md-4 columns wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
			<?php elseif($postCounter == 2): ?>
				<div class="col-md-4 columns wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
			<?php elseif($postCounter == 3): ?>
				<div class="col-md-4 columns wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
			<?php endif; ?>

			<figure class="wojo image effect winston" data-weditable="true">
			  <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/team/<?=e($row['imagelocation'])?>" class="img-responsive" alt="Email us">
			  <figcaption>
				<h3 class="wojo white text"><?=e($name[0])?> <span><?=e($name[1])?></span></h3>
				<h4><?=e($row['title'])?></h4>
				<p>
				  <a href="<?=e($row['facebook'])?>" target="_blank"><i class="fa fa-facebook"></i></a>
				  <a href="<?=e($row['twitter'])?>" target="_blank"><i class="fa fa-twitter"></i></a>
				  <a href="<?=e($row['instagram'])?>" target="_blank"><i class="fa fa-instagram"></i></a>
				</p>
			  </figcaption>
			</figure>
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
	</div>	