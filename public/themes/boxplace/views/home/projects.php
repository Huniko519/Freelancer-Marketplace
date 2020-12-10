<?php
defined('FIR') OR exit();
/**
 * The template for displaying Home page menu
 */
?>

     <!-- ==============================================
	 Header Section
	 =============================================== -->
	 <header class="how-header" style="background: linear-gradient( rgba(34,34,34,0.6), rgba(34,34,34,0.6) ), url('<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/<?=e($this->theme_details('bg_image_two'))?>') no-repeat center center fixed;">
      <div class="container">
       <div class="row">
	   
        <div class="col-lg-8 col-lg-offset-2">
         <div class="post-heading">
		  <h1 class="wow bounceIn" data-wow-delay="0ms" data-wow-duration="1500ms"><?=$this->lang('projects')?>.</h1>
         </div><!-- /.post-heading -->
        </div><!-- /.col-lg-8 -->
		
       </div><!-- /.row -->
	  </div><!-- /.container -->
     </header><!-- /header -->	 
	 
	 <!-- ==============================================
	 Latest Jobs Section
	 =============================================== -->
     <section class="latest-jobs">
      <div class="container">
	  
	   <div class="row">
		<div class="col-lg-4">
		   
			<div class="ps-categories">
				<h6><?=$this->lang('categories')?></h6>
				<div class="ps-checkbox">
		          <?php foreach ($data['p_categories'] as $category):?>
					<div class="form-check">
						<label class="customcheck">
						 <input type="checkbox" value="<?=e($category['id'])?>" class="check p_rang sorting">
						 <span class="checkmark"></span>
						 <span class="customselect"><?=e($category['name'])?></span> 
						<?php foreach($data['p_no'] as $key =>$name){
							if($category['id'] == $key){ ?>
								<span class="items"><?=e($name)?></span>
						<?php } } ?>					
						</label>					
					</div>
				  <?php endforeach; ?>
				</div>
			</div>	
		
		</div><!--/ .col-lg-12 -->
		<div class="col-lg-8">
		  <div class="mt-2">
		   <div class="p_results"></div>
		  </div> 
		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
	  </div><!--/ .container -->
	 </section><!--/ .row -->
	 