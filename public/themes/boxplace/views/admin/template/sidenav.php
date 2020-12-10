<?php
defined('FIR') OR exit();
/**
 * The template for displaying the footer section
 */
?>
<!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/<?=e($data['admin']['imagelocation'])?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?=e($data['admin']['name'])?></p>
              <!-- Status -->
            </div>
          </div>


          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header"><?=$this->lang('home')?></li>
            <!-- Optionally, you can add icons to the links -->
            <li class="<?=($data['url'] == 'dashboard' ? ' active' : '')?>">
            	<a href="<?=$this->siteUrl()?>/admin/dashboard"><i class='fa fa-dashboard'></i> <span><?=$this->lang('dashboard')?><span></a>
            </li>
            <li class="<?=($data['url'] == 'projects' ? ' active' : '')?>">
            	<a href="<?=$this->siteUrl()?>/admin/projects"><i class='fa fa-files-o'></i> <span><?=$this->lang('projects')?><span></a>
            </li>
            <li class="treeview<?=($data['url'] == 'add_category' ? ' active' : '')?>
			<?=($data['url'] == 'categories' ? ' active' : '')?>
			">
              <a href="#"><i class='fa fa-align-left'></i> <span><?=$this->lang('categories')?></span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?=$this->siteUrl()?>/admin/categories"><?=$this->lang('category_list')?></a></li>
                <li><a href="<?=$this->siteUrl()?>/admin/add_category"><?=$this->lang('add_category')?></a></li>
              </ul>
            </li>
            <li class="treeview<?=($data['url'] == 'skills' ? ' active' : '')?>
			<?=($data['url'] == 'add_skill' ? ' active' : '')?>
			">
              <a href="#"><i class='fa fa-asterisk'></i> <span><?=$this->lang('skills')?></span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?=$this->siteUrl()?>/admin/skills"><?=$this->lang('skills')?></a></li>
                <li><a href="<?=$this->siteUrl()?>/admin/add_skill"><?=$this->lang('add_skill')?></a></li>
              </ul>
            </li>
            <li class="treeview<?=($data['url'] == 'users' ? ' active' : '')?>
			<?=($data['url'] == 'adduser' ? ' active' : '')?>
			">
              <a href="#"><i class='fa fa-users'></i> <span><?=$this->lang('users')?></span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?=$this->siteUrl()?>/admin/users"><?=$this->lang('user_list')?></a></li>
                <li><a href="<?=$this->siteUrl()?>/admin/adduser"><?=$this->lang('add_user')?></a></li>
              </ul>
            </li>
            <li class="<?=($data['url'] == 'requests' ? ' active' : '')?>">
            	<a href="<?=$this->siteUrl()?>/admin/requests"><i class='fa fa-align-left'></i> <span><?=$this->lang('verification_requests')?></span>
				<span class="label label-info pull-right"><?=e($data['unread_requests'])?></span></a>
            </li>
            <li class="treeview<?=($data['url'] == 'settings' ? ' active' : '')?>
			 <?=($data['url'] == 'payment_settings' ? ' active' : '')?>
			 <?=($data['url'] == 'currency_settings' ? ' active' : '')?>
			 <?=($data['url'] == 'email_settings' ? ' active' : '')?>
			 <?=($data['url'] == 'how_settings' ? ' active' : '')?>
			 <?=($data['url'] == 'add_faq' ? ' active' : '')?>
			 <?=($data['url'] == 'faq_settings' ? ' active' : '')?>">
              <a href="#"><i class='fa fa-cogs'></i> <span><?=$this->lang('settings')?></span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?=$this->siteUrl()?>/admin/settings/site"><?=$this->lang('site_settings')?></a></li>
                <li><a href="<?=$this->siteUrl()?>/admin/payment_settings/paypal"><?=$this->lang('payment_settings')?></a></li>
                <li><a href="<?=$this->siteUrl()?>/admin/currency_settings/default"><?=$this->lang('currency_settings')?></a></li>
                <li><a href="<?=$this->siteUrl()?>/admin/email_settings"><?=$this->lang('email_settings')?></a></li>
                <li><a href="<?=$this->siteUrl()?>/admin/how_settings/clients"><?=$this->lang('how_settings')?></a></li>
                <li><a href="<?=$this->siteUrl()?>/admin/faq_settings"><?=$this->lang('faq_settings')?></a></li>
              </ul>
            </li>    
            <li class="<?=($data['url'] == 'pages' ? ' active' : '')?>">
            	<a href="<?=$this->siteUrl()?>/admin/pages/refund"><i class='fa fa-files-o'></i> <span><?=$this->lang('pages')?></span></a>
            </li>
            <li class="header"><?=$this->lang('revenue')?></li>
            <li class="<?=($data['url'] == 'revenue' ? ' active' : '')?>">
            	<a href="<?=$this->siteUrl()?>/admin/revenue"><i class='fa fa-money'></i> <span><?=$this->lang('revenue_settings')?></span></a>
            </li>
            <li class="<?=($data['url'] == 'revenues' ? ' active' : '')?>">
            	<a href="<?=$this->siteUrl()?>/admin/revenues"><i class='fa fa-files-o'></i> <span><?=$this->lang('revenues')?></span></a>
            </li>
            <li class="<?=($data['url'] == 'escrow' ? ' active' : '')?>">
            	<a href="<?=$this->siteUrl()?>/admin/escrow"><i class='fa fa-align-left'></i> <span><?=$this->lang('escrow_payments')?></span></a>
            </li>
            <li class="<?=($data['url'] == 'funds' ? ' active' : '')?>">
            	<a href="<?=$this->siteUrl()?>/admin/funds"><i class='fa fa-exchange'></i> <span><?=$this->lang('funds')?></span></a>
            </li>
            <li class="header"><?=$this->lang('withdrawals_and_disputes')?></li>
            <li class="<?=($data['url'] == 'withdrawals' ? ' active' : '')?>">
            	<a href="<?=$this->siteUrl()?>/admin/withdrawals"><i class='fa fa-exchange'></i> <span><?=$this->lang('withdrawals')?></span>
				<span class="label label-info pull-right"><?=e($data['unread_withdrawals'])?></span></a>
            </li>
            <li class="<?=($data['url'] == 'disputes' ? ' active' : '')?>
						<?=($data['url'] == 'dispute' ? ' active' : '')?>">
            	<a href="<?=$this->siteUrl()?>/admin/disputes"><i class='fa fa-expeditedssl'></i> <span><?=$this->lang('disputes')?></span>
				<span class="label label-info pull-right"><?=e($data['admin_unread_disputes'])?></span></a>
            </li>
            <li class="header"><?=$this->lang('themes_settings')?></li>
		<?php if($data['settings']['theme'] === 'boxplace'): ?>	
            <li class="<?=($data['url'] == 'boxplace' ? ' active' : '')?>">
            	<a href="<?=$this->siteUrl()?>/admin/boxplace/details"><i class='fa fa-paper-plane'></i> <span>Boxplace <?=$this->lang('theme')?></span></a>
            </li>
		<?php endif; ?>	
          
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>