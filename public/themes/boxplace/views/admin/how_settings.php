<?php
defined('FIR') OR exit();
/**
 * The template for displaying the footer section
 */
?>
	 	
	  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2><?=$this->lang('site_settings')?></h2>
        </section>

        <!-- Main content -->
        <section class="content">	 	
		 <div class="row">	
		 	
		 <div class="col-lg-12">
		 
	       <?=$this->message()?>
	       <?=$this->validation()?>
		   
          </div>	
           
          <div class="col-lg-4">
          	<?php $selected = ($data['m'] == 'clients') ? ' active' : ''; ?>
          	<?php $act = ($data['m'] == 'freelancers') ? ' active' : ''; ?>
          	<?php $logo = ($data['m'] == 'client_image') ? ' active' : ''; ?>
          	<?php $favicon = ($data['m'] == 'freelancer_image') ? ' active' : ''; ?>
	         <div class="list-group">
	         <a href="<?=$this->siteUrl()?>/admin/how_settings/clients" class="list-group-item<?php echo e($selected); ?>">
	          <em class="fa fa-fw fa-cogs text-white"></em>&nbsp;&nbsp;&nbsp;<?=$this->lang('how_it_works_for')?> <?=$this->client_name_plural()?>
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/how_settings/freelancers" class="list-group-item<?php echo e($act); ?>">
	          <em class="fa fa-fw fa-cogs text-white"></em>&nbsp;&nbsp;&nbsp;<?=$this->lang('how_it_works_for')?> <?=$this->freelancer_name_plural()?>
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/how_settings/client_image" class="list-group-item<?php echo e($logo); ?>">
	          <em class="fa fa-fw fa-image text-white"></em>&nbsp;&nbsp;&nbsp;<?=$this->lang('sidebar_image_for')?> <?=$this->client_name_plural()?>
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/how_settings/freelancer_image" class="list-group-item<?php echo e($favicon); ?>">
	          <em class="fa fa-fw fa-image text-white"></em>&nbsp;&nbsp;&nbsp; <?=$this->lang('sidebar_image_for')?> <?=$this->freelancer_name_plural()?>
			 </a>
			 
	         </div>
          </div>
          
		 <div class="col-lg-8">
		 <?php if ($data['m'] == 'clients') : ?>
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?=$this->lang('how_it_works_for')?> <?=$this->client_name_plural()?></h3>
                </div>
                <div class="box-body">
                 <form role="form" action="<?=$this->siteUrl()?>/admin/how_settings/clients" method="post"> 
				 
					<div class="form-group">
					  <textarea type="text" name="description" class="form-control" id="summernote" placeholder="Describe"><?=e($data['settings']['how_client'])?></textarea>
					</div>
                  
                                   
                  <div class="box-footer">			
                    <?=$this->token()?>
                    <button type="submit" name="how_client" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  
		 <?php elseif ($data['m'] == 'freelancers') : ?>
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?=$this->lang('how_it_works_for')?> <?=$this->freelancer_name_plural()?></h3>
                </div>
                <div class="box-body">
                 <form role="form" action="<?=$this->siteUrl()?>/admin/how_settings/freelancers" method="post"> 
				 
					<div class="form-group">
					  <textarea type="text" name="description" class="form-control" id="summernote" placeholder="Describe"><?=e($data['settings']['how_freelancer'])?></textarea>
					</div>
                  
                                   
                  <div class="box-footer">			
                    <?=$this->token()?>
                    <button type="submit" name="how_freelancer" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
 		 <?php elseif ($data['m'] == 'client_image') : ?>
		  
		  		 <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?=$this->lang('sidebar_image_for')?> <?=$this->client_name_plural()?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="<?=$this->siteUrl()?>/admin/how_settings/client_image" method="post" enctype="multipart/form-data">
				
                  <div class="box-body">
                    <div class="form-group">
					 <div class="image text-center">
					  <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/how/<?=e($data['settings']['how_client_image'])?>" class="img-thumbnail" width="515" height="415"/>
					 </div>
                    </div>


					<div class="form-group">
						<label><?=$this->lang('choose_image')?></label>
						<input type="file" name="photoimg" id="photoimg" class="form-control">
					</div>
				  
                  </div><!-- /.box-body -->
                  
                  <div class="box-footer">		
                    <?=$this->token()?>
                    <button type="submit" name="post_client_image" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button><br></br>
                  </div>

                </form>
              </div><!-- /.box -->  
              
 		 <?php elseif ($data['m'] == 'freelancer_image') : ?>
		  
		  		 <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?=$this->lang('sidebar_image_for')?> <?=$this->freelancer_name_plural()?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="<?=$this->siteUrl()?>/admin/how_settings/freelancer_image" method="post" enctype="multipart/form-data">
				
                  <div class="box-body">
                    <div class="form-group">
					 <div class="image text-center">
					  <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/how/<?=e($data['settings']['how_freelancer_image'])?>" class="img-thumbnail" width="515" height="415"/>
					 </div>
                    </div>


					<div class="form-group">
						<label><?=$this->lang('choose_image')?></label>
						<input type="file" name="photoimg" id="photoimg" class="form-control">
					</div>
				  
                  </div><!-- /.box-body -->
                  
                  <div class="box-footer">		
                    <?=$this->token()?>
                    <button type="submit" name="post_freelancer_image" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button><br></br>
                  </div>

                </form>
              </div><!-- /.box -->  
	    			 
		 <?php endif; ?>
		 
		</div><!-- /.col -->
		
        
			 
	    </div><!-- /.row -->		  		  
	   </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
