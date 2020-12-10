<?php
defined('FIR') OR exit();
/**
 * The main template file
 * This file puts together the three main section of the software, header, content and footer
 */
?>
<!DOCTYPE html>
<html lang="en">
  <head>

	    <!-- ==============================================
		Title and Meta Tags
		=============================================== -->
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?=e($this->siteSettings('sitename'))?> - <?=e($this->siteSettings('title'))?></title>
		<meta name="description" content="<?=e($this->siteSettings('description'))?>">
		<meta name="keywords" content="<?=e($this->siteSettings('keywords'))?>">
		
		<meta property="og:title" content="<?=e($this->siteSettings('title'))?> : <?=e($this->siteSettings('sitename'))?>"/>
		<meta property="og:type" content="website"/>
		<meta property="og:url" content="<?=$this->siteUrl()?>"/>
		<meta property="og:image" content="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/<?=e($this->siteSettings('favicon'))?>"/>
		<meta property="og:site_name" content="<?=e($this->siteSettings('sitename'))?>"/>
		<meta property="og:description" content="<?=e($this->siteSettings('description'))?>"/>		
		
		<!-- ==============================================
		Favicons
		=============================================== --> 
        <link href="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/<?=e($this->siteSettings('favicon'))?>" rel="icon">
		
		
		<!-- ==============================================
		Fonts
		=============================================== --> 
        <link href="//fonts.googleapis.com/css?family=Montserrat:400,700|Abhaya+Libre|Poppins|Rokkitt" rel="stylesheet">
		
	    <!-- ==============================================
		CSS
		=============================================== -->

		<?php foreach(['base', 'bootstrap.min', 'font-awesome.min', 'feathericon.min', 'login', 'style'] as $css): ?>
			<link href="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/css/<?=$css?>.css" rel="stylesheet" type="text/css">
		<?php endforeach ?>
		
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="//www.googletagmanager.com/gtag/js?id=<?=e($this->siteSettings('analytics'))?>"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', '<?=e($this->siteSettings('analytics'))?>');
		</script>	
  </head>

  <body>
		<?=$data['header_view']?>
		<?=$data['sidenav_view']?>
		<?=$data['content_view']?>
	    <?=$data['footer_view']?>

		<?php foreach(['jquery-3.3.1.min', 'bootstrap.min'] as $js): ?>
			<script type="text/javascript" src="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/js/<?=$js?>.js"></script>
		<?php endforeach ?>
		 <script src="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/plugins/sweetalert/sweetalert.min.js"></script>
	     <?=$this->message()?>
	  
		<link href="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/plugins/select2/select2.css" rel="stylesheet" type="text/css">
		<script src="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/plugins/select2/select2.min.js"></script>
	  
		<link href="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/plugins/summernote/summernote.css" rel="stylesheet" type="text/css">
		<script src="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/plugins/summernote/summernote.min.js"></script>
		
        <script src="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/js/wave.js"></script>
		
	    <?=$data['scripts_view']?>
</body>
</html>