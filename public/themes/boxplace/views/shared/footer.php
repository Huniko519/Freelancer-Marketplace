<?php
defined('FIR') OR exit();
/**
 * The template for displaying the footer section
 */
?>

	    <footer class="main-footer clearfix">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<div class="footer-wrapper">
						    <div class="footer-logo">
									<a href="<?=$this->siteUrl()?>"><img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/<?=e($this->siteSettings('logo'))?>" alt="logo"></a>
								</div>
							<div class="toolbox">
							 <p><span style="color: #5e6d77;"><?=$this->lang('call_us')?></span></p>
							 <h5><?=e($this->siteSettings('contact_phone'))?></h5>
							</div>
							<div class="toolbox">
							 <p><span style=""><?=$this->lang('email_us')?></span></p>
							 <h5><?=e($this->siteSettings('contact_email'))?></h5>
							</div>
							<div class="toolbox">
							 <p><span><?=$this->lang('follow_us')?><br></span></p>
							 <p>
								<a href="<?=e($this->siteSettings('facebook'))?>" target="_blank"><i class="fa fa-facebook"></i></a>
								<a href="<?=e($this->siteSettings('twitter'))?>" target="_blank"><i class="fa fa-twitter"></i></a>
								<a href="<?=e($this->siteSettings('instagram'))?>" target="_blank"><i class="fa fa-instagram"></i></a>
								</p>
							</div>
						</div>
					</div>
					
					<div class="col-lg-3">
						<div class="footer-wrapper">
						    <h4><?=$this->lang('company')?></h4>
						    <span class="separator"></span>
							<ul id="menu-footer-new" class="menu">
								<li><a href="<?=$this->siteUrl()?>/about"><?=$this->lang('about_us')?></a></li>
								<li><a href="<?=$this->siteUrl()?>/contact"><?=$this->lang('contact')?></a></li>
								<li><a href="<?=$this->siteUrl()?>/how"><?=$this->lang('how')?></a></li>
								<li><a href="<?=$this->siteUrl()?>/faq"><?=$this->lang('faq')?></a></li>
								<li><a href="<?=$this->siteUrl()?>/terms_and_conditions"><?=$this->lang('terms_and_conditions')?></a></li>
							</ul>
						</div>
					</div>	
					
					<div class="col-lg-3">
						<div class="footer-wrapper">
						    <h4><?=$this->lang('for')?> <?=$this->client_name_plural()?></h4>
						    <span class="separator"></span>
							<ul id="menu-footer-new" class="menu">
								<li><a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>"><?=$this->lang('find')?> <?=$this->freelancer_name_plural()?></a></li>
								<li><a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/dashboard/add"><?=$this->lang('post_project')?></a></li>
								<li><a href="<?=$this->siteUrl()?>/refund_policy"><?=$this->lang('refund_policy')?></a></li>
								<li><a href="<?=$this->siteUrl()?>/privacy_policy"><?=$this->lang('privacy_policy')?></a></li>
							</ul>
						</div>
					</div>	
					
					<div class="col-lg-3">
						<div class="footer-wrapper">
						    <h4><?=$this->lang('for')?> <?=$this->freelancer_name_plural()?></h4>
						    <span class="separator"></span>
							<ul id="menu-footer-new" class="menu">
								<li><a href="<?=$this->siteUrl()?>/projects"><?=$this->lang('find_work')?></a></li>
								<li><a href="<?=$this->siteUrl()?>/register"><?=$this->lang('create_account')?></a></li>
							</ul>
						</div>
					</div>					
					
				</div>
				<!--End .row-->
			</div>
			<!--End .container-->
	    <footer>
	  
	 <!-- ==============================================
	 Footer Section
	 =============================================== -->	
	 <footer id="colophon" class="site-footer" role="contentinfo">
	  <div id="footer-menu">
	   <p class="footer-copyright"><?=sprintf($this->lang('copyright'), date('Y'), e($this->siteSettings('sitename')))?>, <?=$this->lang('all_rights_reserved')?>.</p>
	  </div>
	 </footer>	  
	 
     <a id="scrollup">Scroll</a>