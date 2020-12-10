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
          <h2><?=$this->lang('profile_section')?></h2>
        </section>

        <!-- Main content -->
        <section class="content">	 	

		 <div class="row">	
		 	
		 <div class="col-lg-12">
		 
	       <?=$this->message()?>
	       <?=$this->validation()?>
		  
          </div>	
           
          <div class="col-lg-4">
          	<?php $selected = ($data['m'] == 'details') ? ' active' : ''; ?>
          	<?php $image = ($data['m'] == 'image') ? ' active' : ''; ?>
          	<?php $active = ($data['m'] == 'password') ? ' active' : ''; ?>
	         <div class="list-group">
	         <a href="<?=$this->siteUrl()?>/admin/profile/details" class="list-group-item<?php echo e($selected); ?>">
	          <em class="fa fa-fw fa-user-md text-white"></em>&nbsp;&nbsp;&nbsp;<?=$this->lang('profile')?>
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/profile/image" class="list-group-item<?php echo e($image); ?>">
	          <em class="fa fa-fw fa-image text-white"></em>&nbsp;&nbsp;&nbsp;<?=$this->lang('image')?>
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/profile/password" class="list-group-item<?php echo e($active); ?>">
	          <em class="fa fa-fw fa-lock text-white"></em>&nbsp;&nbsp;&nbsp;<?=$this->lang('change_password')?>
			 </a>
			 
	         </div>
          </div>
          
		 <div class="col-lg-8">
		 <?php if ($data['m'] == 'details') : ?>
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?=$this->lang('edit_profile')?></h3>
                </div>
                <div class="box-body">
                 <form role="form" action="<?=$this->siteUrl()?>/admin/profile" method="post"> 
                  <div class="form-group">
				   <label><?=$this->lang('name')?></label>	
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="name" class="form-control" value="<?=e($data['admin']['name'])?>"/>
                   </div>
                  </div>
                  <div class="form-group">	
				   <label><?=$this->lang('username')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="username" class="form-control" value="<?=e($data['admin']['username'])?>"/>
                   </div>
                  </div>
                  <div class="form-group">	
				   <label><?=$this->lang('email')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-inbox"></i></span>
                    <input type="text" name="email" class="form-control" value="<?=e($data['admin']['email'])?>">
                   </div>
                  </div>
                                   
                  <div class="box-footer">				
                    <?=$this->token()?>
                    <button type="submit" name="profile" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
		 <?php elseif ($data['m'] == 'image') : ?>
		  
		  		 <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?=$this->lang('profile_picture')?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="<?=$this->siteUrl()?>/admin/profile" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
					 <div class="image text-center">
					  <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/<?=e($data['admin']['imagelocation'])?>" class="img-thumbnail" width="215" height="215"/>
					 </div>
                    </div>



					<div class="form-group">
						<label><?=$this->lang('choose_image')?></label>
						<input type="file" name="photoimg" id="photoimg" class="form-control">
					</div>
				  
                  </div><!-- /.box-body -->
                  
                  <div class="box-footer">			
                    <?=$this->token()?>
                    <button type="submit" name="picture" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button><br></br>
                  </div>

                </form>
              </div><!-- /.box -->	
              
	                    	
		 <?php elseif ($data['m'] == 'password') : ?>	 
			 
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?=$this->lang('change_password')?></h3>
                </div>
                <div class="box-body">
                 <form action="<?=$this->siteUrl()?>/admin/profile" method="post"> 
				 
                  <div class="form-group">
				   <label><?=$this->lang('current_password')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password_current" class="form-control" placeholder="<?=$this->lang('current_password')?>"/>
                   </div>
                  </div>
                  <div class="form-group">	
				   <label><?=$this->lang('new_password')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password_new" class="form-control" placeholder="<?=$this->lang('new_password')?>"/>
                   </div>
                  </div>
                  <div class="form-group">	
				   <label><?=$this->lang('confirm_new_password')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password_new_again" class="form-control" placeholder="<?=$this->lang('confirm_new_password')?>"/>
                   </div>
                  </div>
                                   
                  <div class="box-footer">		
                    <?=$this->token()?>
                    <button type="submit" name="password" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			 
		 <?php endif; ?>
		 
		</div><!-- /.col -->
		
        
			 
	    </div><!-- /.row -->		  		  
	   </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
