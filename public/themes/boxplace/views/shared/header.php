<?php
defined('FIR') OR exit();
/**
 * The template for displaying the header section
 */
?>
     <!-- ==============================================
     Navigation Section
     =============================================== -->  
     <header class="tr-header">
      <nav class="navbar navbar-default">
       <div class="container">
	    <div class="navbar-header">
		 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
		  <span class="sr-only">Toggle navigation</span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		 </button>
		 <a href="<?=$this->siteUrl()?>" class="navbar-brand"><img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/<?=e($this->siteSettings('logo'))?>" alt="Logo"  class="img-fluid" width="80" height="90"></a>
		</div><!-- /.navbar-header -->
		<div class="navbar-left pull-center">
		 <div class="collapse navbar-collapse" id="navbar-collapse">
		  <ul class="nav navbar-nav">
		   <li class="<?=($data['url'] == 'home' ? ' active' : '')?><?=($data['url'] == NULL ? ' active' : '')?>">
		    <a href="<?=$this->siteUrl()?>"><?=$this->lang('home')?></a>
		   </li>
		   <li class="<?=($data['url'] == 'about' ? ' active' : '')?>">
		    <a href="<?=$this->siteUrl()?>/about"><?=$this->lang('about_us')?></a>
		   </li>
		   <li class="<?=($data['url'] == 'projects' ? ' active' : '')?>
		              <?=($data['url'] == 'project' ? ' active' : '')?>
					  <?=($data['url'] == $this->clients_url() ? ' active' : '')?>
		              <?=($data['url'] == 'search_projects' ? ' active' : '')?>">
		    <a href="<?=$this->siteUrl()?>/projects"><?=$this->lang('find_work')?></a>
		  </li>
		   <li class="<?=($data['url'] == $this->freelancers_url() ? ' active' : '')?>
		              <?=($data['url'] == 'search_freelancers' ? ' active' : '')?>">
		    <a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>"><?=$this->lang('find')?> <?=$this->freelancer_name_plural()?></a>
		  </li>
		   
			 <li class="dropdown mega-avatar <?=($data['url'] == 'contact' ? ' active' : '')?>
			                                 <?=($data['url'] == 'how' ? ' active' : '')?>
			                                 <?=($data['url'] == 'faq' ? ' active' : '')?>">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
			   <span>
				<?=$this->lang('pages')?>
			   </span>
			  </a>
			  <div class="dropdown-menu w dropdown-menu-scale pull-right">
				<a class="dropdown-item" href="<?=$this->siteUrl()?>/how"><?=$this->lang('how')?></a>
				<a class="dropdown-item" href="<?=$this->siteUrl()?>/faq"><?=$this->lang('faq')?></a>
				<a class="dropdown-item" href="<?=$this->siteUrl()?>/contact"><?=$this->lang('contact')?></a>
			  </div>
			 </li><!-- /navbar-item -->	
		   
			 <li class="dropdown mega-avatar">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
			   <span>
				<?=$this->lang('languages')?> - <?=mb_strtoupper(mb_substr($data['language'], 0, 2))?>
			   </span>
			  </a>
			  <div class="dropdown-menu w dropdown-menu-scale pull-right">
				<?php foreach($data['languages_list'] as $language): ?>
					<a class="dropdown-item" href="<?=$this->siteUrl()?>/lang/<?=$language?>"><?=$language?></a>
				<?php endforeach ?>
			  </div>
			 </li><!-- /navbar-item -->	
		 
		  </ul>
		 </div>
		</div><!-- /.navbar-left -->
		<div class="navbar-right">                          
		 <ul class="nav navbar-nav">
		 
		<?php if($data['user_isloggedin'] == true): ?> 
		 
		 <?php if($data['user']['user_type'] === "1"): ?> 
				<li><a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/notifications"><i class="fa fa-bell-o"></i> <sup><?=e($data['freelancer_unread_notifications'])?></sup></a></li>
				<li><a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/messages"><i class="fa fa-envelope"></i> <sup><?=e($data['freelancer_unread_messages'])?></sup></a></li>
		  
			 <li class="dropdown mega-avatar">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
			   <span class="avatar w-32"><img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($data['user']['imagelocation'])?>" class="img-resonsive img-circle" width="25" height="25" alt="..."></span>
			   <!-- hidden-xs hides the username on small devices so only the image appears. -->
			   <span>
				<?=e($data['user']['name'])?>
			   </span>
			  </a>
			  <div class="dropdown-menu w dropdown-menu-scale pull-right">
			   <a class="dropdown-item" href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/dashboard"><span><?=$this->lang('dashboard')?></span></a>  
			   <a class="dropdown-item" href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/editprofile"><span><?=$this->lang('profile')?></span></a> 
			   <a class="dropdown-item" href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/logout"><?=$this->lang('sign_out')?></a>
			  </div>
			 </li><!-- /navbar-item -->	
			<a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/withdrawals" class="kafe-btn earnings"><?=e($this->currency)?><?=e($data['user']['credit_account'])?></a>
			
		 <?php elseif($data['user']['user_type'] === "2"): ?> 
				<li><a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/notifications"><i class="fa fa-bell-o"></i> <sup><?=e($data['client_unread_notifications'])?></sup></a></li>
				<li><a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/messages"><i class="fa fa-envelope"></i> <sup><?=e($data['client_unread_messages'])?></sup></a></li>
		  
			 <li class="dropdown mega-avatar">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
			   <span class="avatar w-32"><img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($data['user']['imagelocation'])?>" class="img-resonsive img-circle" width="25" height="25" alt="..."></span>
			   <!-- hidden-xs hides the username on small devices so only the image appears. -->
			   <span>
				<?=e($data['user']['name'])?>
			   </span>
			  </a>
			  <div class="dropdown-menu w dropdown-menu-scale pull-right">
			   <a class="dropdown-item" href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/dashboard"><span><?=$this->lang('dashboard')?></span></a>  
			   <a class="dropdown-item" href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/dashboard/add"><span><?=$this->lang('post_project')?></span></a>  
			   <a class="dropdown-item" href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/editprofile"><span><?=$this->lang('profile')?></span></a> 
			   <a class="dropdown-item" href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/logout"><?=$this->lang('sign_out')?></a>
			  </div>
			 </li><!-- /navbar-item -->	
		 <?php endif; ?> 
		 
		 
		<?php else: ?> 
		   <li><a href="<?=$this->siteUrl()?>/login"><?=$this->lang('sign_in')?></a></li>
		 </ul><!-- /.sign-in -->   
		 <a href="<?=$this->siteUrl()?>/register" class="kafe-btn kafe-btn-mint-small"><?=$this->lang('join_for_free')?></a>
		<?php endif; ?> 
		</div><!-- /.nav-right -->
       </div><!-- /.container -->
      </nav><!-- /.navbar -->
     </header><!-- Page Header --> 