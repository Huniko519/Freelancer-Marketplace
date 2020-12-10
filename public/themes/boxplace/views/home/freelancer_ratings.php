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
       <li><a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>"> <?=$this->lang('portfolio')?>  
	     <em class="hidden-xs hidden-sm">(<?=e($data['total_portfolio'])?>)</em></a></li>
       <li><a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/about/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>"> <?=$this->lang('about')?> </a></li>
       <li><a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/projects/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>"><?=$this->lang('projects')?> 
	     <em class="hidden-xs hidden-sm">(<?=e($data['total_projects'])?>)</em></a></li>
       <li class="active"><a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/ratings/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>"><?=$this->lang('ratings')?> 
	     <em class="hidden-xs hidden-sm">(<?=e($data['total_ratings'])?>)</em></a></li>
      </ul>
     </section>		 
	 
	 
	 
	 <!-- ==============================================
	 Dashboard Section
	 =============================================== -->
     <section class="freelancer-content">
      <div class="container">
	  
	   <div class="row">
		<div class="col-lg-12">
		
         <div class="headline">
		  <h3><?=$this->lang('ratings')?> :- (<?=e($data['total_ratings'])?>)</h3>
		 </div>	
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
	   
       <div class="row">
	    <div class="col-lg-12">
		 
		<?php if($data['has_ratings'] === false): ?> 
		  
		  <div class="prop-info text-center">
		     <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.$this->themePath().'/'.$this->theme()?>/assets/img/graphic.png" class="img-responsive" alt="Image" />
			 <h3><?=$this->lang('no_ratings_to_display')?>.</h3>
          </div><!-- /.prop-info -->	
		  
		<?php elseif($data['has_ratings'] === true): ?> 
		
		   <?php foreach($data['freelancer_projects'] as $row) { ?>  

				 <div class="ratings-box">	 
				  <h4 class="ratings-title"><?=e($row['title'])?></h4>
				  
				<?php foreach($data['freelancer_ratings'] as $key=>$name){
					if($row['projectid'] == $key){ ?>
					
					<?php foreach($name as $k=>$value){ ?>
				  
							 <div class="proposal-box">
							  <div class="proposal-img">
							   <div class="proposal-img-inner">
						<?php foreach($data['users'] as $n){
							if($value[1] == $n['userid']){ ?>
								<?php if($n['user_type'] == "1"): ?>
									 <a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($n["userid"])?>/<?=e($n["slug"])?>">
									  <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($n['imagelocation'])?>" alt="Profile Picture">
									 </a>
								<?php elseif($n['user_type'] == "2"): ?>
									 <a href="<?=$this->siteUrl()?>/<?=$this->clients_url()?>/projects/<?=e($n["userid"])?>/<?=e($n["slug"])?>">
									  <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($n['imagelocation'])?>" alt="Profile Picture">
									 </a>
								<?php endif; ?>
						<?php } }?>
							   </div>
							  </div><!--/ .freelancer-box-img -->	
							  <div class="proposal-details">
							   <div class="proposal-description">
						<?php foreach($data['users'] as $n){
							if($value[1] == $n['userid']){ ?>
								<?php if($n['user_type'] == "1"): ?>
									<a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($n["userid"])?>/<?=e($n["slug"])?>">
									<h3 class="<?=($n["verified"] == '1' ? ' verified' : '')?>"><?=e($n["name"])?></h3></a>
								<?php elseif($n['user_type'] == "2"): ?>
									<a href="<?=$this->siteUrl()?>/<?=$this->clients_url()?>/projects/<?=e($n["userid"])?>/<?=e($n["slug"])?>">
									<h3 class="<?=($n["verified"] == '1' ? ' verified' : '')?>"><?=e($n["name"])?></h3></a>
								<?php endif; ?>
								<?php if($n['user_type'] == "1"): ?>
									<h5><?=$this->freelancer_name()?></h5>
								<?php elseif($n['user_type'] == "2"): ?>
									<h5><?=$this->client_name()?></h5>
								<?php endif; ?>
						<?php } }?>

								<div class="star-rating" data-rating="<?=$value[2]?>">
								 <?=$value[0]?>
								</div>
								
								<p><?=e($value[3])?></p>
								
							   </div>
							  </div><!--/ .freelancer-box-details -->
							  <div class="proposal-bid">
							   <div class="proposal-bid-inner">
								<h4><?=e($value[4])?></h4>
							   </div>
							  </div><!--/ .proposal-bid -->
							 </div><!--/ .proposal-box -->		
						
		   <?php } ?>
						
					 
				<?php } } ?>
				 
				 </div><!--/ .add-box -->			
			
		   <?php } ?>
		
			  
		<?php endif; ?>  
		

		
		</div>
	   
       </div><!--/. row -->
		
	  </div><!--/ .container -->
     </section>	 	 