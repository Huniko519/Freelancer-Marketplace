<?php
defined('FIR') OR exit();
/**
 * The template for displaying the header section
 */
?>
<!-- ==============================================
     Main Header Section
     =============================================== -->
     <header class="main-header">
      <a href="<?=$this->siteUrl()?>" class="logo">
       <!-- mini logo for sidebar mini 50x50 pixels -->
       <span class="logo-mini"><b><i class="fa fa-user-md"></i></b></span>
       <!-- logo for regular state and mobile devices -->
       <span class="logo-lg"><b>
       	<?=$this->siteSettings('sitename')?></b></span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
       <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
       </a>
      <!-- Navbar Right Menu -->
       <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
			  <li><a href="<?=$this->siteUrl()?>"><i class="fa fa-home"></i> <?=$this->lang('home_page')?></a></li>
              <!-- User Account Menu -->             
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">
                  	<?=mb_strtoupper(mb_substr($data['language'], 0, 2))?>
                  </span>
                </a>
                <ul class="dropdown-menu">
						<?php foreach($data['languages_list'] as $language): ?>
							<li class="m_2"><a href="<?=$this->siteUrl()?>/admin/lang/<?=$language?>"><?=$language?></a></li>	
						<?php endforeach ?>
        		</ul>
              </li>
              <!-- User Account Menu -->             
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  
                  <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/<?=e($data['admin']['imagelocation'])?>" class="user-image" alt="User Image"/>
                
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">
                  	<?=e($data['admin']['name'])?>
                  </span>
                </a>
                <ul class="dropdown-menu">
						<li class="dropdown-menu-header text-center">
							<strong><?=$this->lang('settings')?></strong>						
						</li>
						<li class="m_2"><a href="<?=$this->siteUrl()?>/admin/settings/site"><i class="fa fa-cogs"></i> <?=$this->lang('settings')?></a></li>
						<li class="m_2"><a href="<?=$this->siteUrl()?>/admin/profile/details"><i class="fa fa-user"></i> <?=$this->lang('profile')?></a></li>
						<li class="m_2"><a href="<?=$this->siteUrl()?>/admin/logout"><i class="fa fa-lock"></i> <?=$this->lang('logout')?></a></li>	
        		</ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>