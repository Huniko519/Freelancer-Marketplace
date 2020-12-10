<?php
defined('FIR') OR exit();
/**
 * The template for displaying the footer section
 */
?>
	 
     <!-- ==============================================
	 Header Section
	 =============================================== -->
	 <header class="dashboard-header">
      <div class="container">
	   <div class="row">
	   
	    <div class="col-lg-7">
		 <div class="media">

		  <div class="avatar-box">		 
           <div id="bigFace" data-step="4" data-intro="Upload a profile picture.">
            <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($data['user']['imagelocation'])?>" id="profileBigFace" class="img-responsive img-circle"/>
           </div>	
		  </div>	 
		 
		  <div class="media-body">
                <h2><?=$this->lang('howdy')?>, <?=e($data['user']['name'])?>!</h2>
                <span class="d-block text-white"> <?=e($this->currency)?><?=e($data['user']['credit_account'])?> <small><?=$this->lang('funds_account')?></small></span>
		  </div>
		 </div>
		</div>
		
	    <div class="col-lg-5">
		  <div class="breadcrumb-box">
              <ol class="breadcrumb breadcrumb-white breadcrumb-no-gutter ">
			  <?php if($data['url'] === "dashboard"): ?>
                <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?=$this->siteUrl()?>"><?=$this->lang('home')?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=e($data['url'])?></li>
			  <?php elseif($data['url'] === "editprofile" 
			               || $data['url'] === "image" 
						   || $data['url'] === "password" 
						   || $data['url'] === "request" 
						   || $data['url'] === "email"
						   || $data['url'] === "proposals"
						   || $data['url'] === "invites"
						   || $data['url'] === "invite"
						   || $data['url'] === "files"
						   || $data['url'] === "addfiles"
						   || $data['url'] === "escrow"
						   || $data['url'] === "payments"
						   || $data['url'] === "ratings"
						   || $data['url'] === "addrating"
						   || $data['url'] === "editrating"
						   || $data['url'] === "funds"
						   || $data['url'] === "addfunds"
						   || $data['url'] === "disputes"
						   || $data['url'] === "dispute"): ?> 	
                <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/dashboard"><?=$this->lang('dashboard')?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=e($data['url'])?></li>
			  <?php endif; ?> 	
              </ol>
		 </div>	  
		</div>
		
	   </div>
		
	  </div><!-- /.container -->
     </header><!-- /header -->	

     <!-- ==============================================
     Navigation Section
     =============================================== -->  
     <header class="tr-header">
      <nav class="navbar navbar-default small">
       <div class="container">
	    <div class="navbar-header">
		 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-two">
		  <span class="sr-only">Toggle navigation</span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		 </button>
		 <a class="navbar-brand hidden-md hidden-lg" href="">Dashboard</a>
		</div><!-- /.navbar-header -->
		<div class="navbar-left pull-center">
		 <div class="collapse navbar-collapse" id="navbar-collapse-two">
		  <ul class="nav navbar-nav">
			 
		   <li class="<?=($data['url'] == 'dashboard' ? ' active' : '')?>
					  <?=($data['url'] == 'proposals' ? ' active' : '')?>">
		    <a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/dashboard"><?=$this->lang('manage_projects')?></a>
		   </li>
			 
		   <li class="<?=($data['url'] == 'invites' ? ' active' : '')?>
		              <?=($data['url'] == 'invite' ? ' active' : '')?>">
		    <a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/invites"><?=$this->lang('invites')?></a>
		   </li>
		   <li class="<?=($data['url'] == 'files' ? ' active' : '')?>
					  <?=($data['url'] == 'addfiles' ? ' active' : '')?>
		              <?=($data['client_unread_files'] == '0' ? '' : ' unread')?>">
		    <a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/files"><?=$this->lang('files')?></a>
		   </li>
			 <li class="dropdown mega-avatar 
			 <?=($data['url'] == 'editprofile' ? ' active' : '')?>
			 <?=($data['url'] == 'image' ? ' active' : '')?>
			 <?=($data['url'] == 'password' ? ' active' : '')?>
			 <?=($data['url'] == 'request' ? ' active' : '')?>
			 <?=($data['url'] == 'email' ? ' active' : '')?>">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
			   <span>
				<?=$this->lang('settings')?>
			   </span>
			  </a>
			  <div class="dropdown-menu w dropdown-menu-scale pull-right">
			   <a class="dropdown-item" href="<?=$this->siteUrl()?>/<?=$this->clients_url()?>/projects/<?=e($data['user']['userid'])?>/<?=e($data['user']['slug'])?>"><span><?=$this->lang('view_profile')?></span></a>  
			   <a class="dropdown-item" href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/editprofile"><span><?=$this->lang('edit_profile')?></span></a>   
			   <a class="dropdown-item" href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/image"><span><?=$this->lang('image')?></span></a>  
			   <a class="dropdown-item" href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/password"><span><?=$this->lang('change_password')?></span></a> 
			   <a class="dropdown-item" href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/request"><span><?=$this->lang('request_verification')?></span></a> 
			  </div>
			 </li><!-- /navbar-item -->	
		   <li class="<?=($data['url'] == 'funds' ? ' active' : '')?>
		              <?=($data['url'] == 'addfunds' ? ' active' : '')?>">
		    <a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/funds"><?=$this->lang('funds')?></a>
		   </li>
		   <li class="<?=($data['url'] == 'escrow' ? ' active' : '')?>">
		    <a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/escrow"><?=$this->lang('escrow')?></a>
		   </li>
		   <li class="<?=($data['url'] == 'payments' ? ' active' : '')?>">
		    <a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/payments"><?=$this->lang('payments')?></a>
		   </li>
		   <li class="<?=($data['url'] == 'ratings' ? ' active' : '')?>
						<?=($data['url'] == 'addrating' ? ' active' : '')?>
						<?=($data['url'] == 'editrating' ? ' active' : '')?>">
		    <a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/ratings"><?=$this->lang('ratings')?></a>
		   </li>
			 
		 </div>
		</div><!-- /.navbar-left -->
		<div class="navbar-right">        
		 <a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/disputes" class="kafe-btn kafe-btn-red-small"><i class="fa fa-asterisk"></i> <?=$this->lang('disputes')?> (<?=e($data['client_unread_disputes'])?>)</a> 
		</div><!-- /.nav-right -->
       </div><!-- /.container -->
      </nav><!-- /.navbar -->
     </header><!-- Page Header -->	 
	 