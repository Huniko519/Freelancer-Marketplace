<?php
defined('FIR') OR exit();
/**
 * The main template file
 * This file puts together the three main section of the software, header, content and footer
 */
?>

<!DOCTYPE html>
<html>
	<head>
	    <!-- ==============================================
		Title and Meta Tags
		=============================================== -->
		<meta charset="utf-8">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin - <?=e($this->siteSettings('title'))?></title>
		<meta name="description" content="<?=e($this->siteSettings('description'))?>">
		<meta name="keywords" content="<?=e($this->siteSettings('keywords'))?>">
		
		<!-- ==============================================
		Favicons
		=============================================== --> 
        <link href="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/<?=e($this->siteSettings('favicon'))?>" rel="icon">
		
		<!-- ==============================================
		Fonts
		=============================================== --> 
        <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic|Abhaya+Libre|Poppins|Montserrat:400,700|Varela+Round|Rokkitt" rel="stylesheet">
		
		
		<!-- ==============================================
		CSS
		=============================================== --> 
		<?php if($data['url'] == 'login'): ?>

		<?php foreach(['base', 'bootstrap.min', 'font-awesome.min', 'feathericon.min', 'login', 'style'] as $css): ?>
			<link href="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/css/<?=$css?>.css" rel="stylesheet" type="text/css">
		<?php endforeach ?>

		<?php else: ?>

			<?php foreach(['base', 'bootstrap.min', 'font-awesome.min', 'feathericon.min'] as $css): ?>
				<link href="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/css/<?=$css?>.css" rel="stylesheet" type="text/css">
			<?php endforeach ?>
			
			<link href="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/css/skins/skin-green.css" rel="stylesheet" type="text/css">

			<?php foreach(['style'] as $css): ?>
				<link href="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/css/AdminLTE/<?=$css?>.css" rel="stylesheet" type="text/css">
			<?php endforeach ?>
			<link type="text/css" href="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet"/>

		<?php endif; ?>
	 
		<!-- ==============================================
		Scripts
		=============================================== --> 
		<?php if($data['url'] == 'login'): ?>

			<?php foreach(['jquery-3.3.1.min', 'bootstrap.min', 'wave'] as $js): ?>
				<script type="text/javascript" src="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/js/<?=$js?>.js"></script>
			<?php endforeach ?>
			 <script src="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/plugins/sweetalert/sweetalert.min.js"></script>
			 
		<?php else: ?>
		
			<?php foreach(['jquery-3.3.1.min', 'bootstrap.min', 'app.min'] as $js): ?>
				<script type="text/javascript" src="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/js/<?=$js?>.js"></script>
			<?php endforeach ?>
	  
	  <link href="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/plugins/select2/select2.css" rel="stylesheet" type="text/css">
	  <script src="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/plugins/select2/select2.min.js"></script>
	  
	  <link href="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/plugins/summernote/summernote.css" rel="stylesheet" type="text/css">
	  <script src="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/plugins/summernote/summernote.min.js"></script>
	  
			<script src="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/plugins/sweetalert/sweetalert.min.js"></script>
			<script src="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
			<script src="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
			<script src="<?=$this->siteUrl()?>/<?=$this->themePath()?>/<?=$this->theme()?>/assets/js/app-extra.js"></script>
		<?php endif; ?>
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="//www.googletagmanager.com/gtag/js?id=<?=e($this->siteSettings('analytics'))?>"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', '<?=e($this->siteSettings('analytics'))?>');
		</script>	
  </head>
  
<body class="skin-green sidebar-mini">
     
     <!-- ==============================================
     Wrapper Section
     =============================================== -->
	 <div class="wrapper">
		      <?=$data['navigation_view']?>
			<?php if($data['url'] != 'login'): ?>
		      <?=$data['sidenav_view']?>
			<?php endif; ?>
	 	
			<?=$data['content_view']?>
	  
			<?=$data['footer_view']?>
	 	
     </div><!-- /.wrapper -->  
</body>
</html>