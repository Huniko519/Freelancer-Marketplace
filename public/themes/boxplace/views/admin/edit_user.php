<?php
defined('FIR') OR exit();
/**
 * The template for displaying Home page content
 */
?>
	  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2><?=$this->lang('edit_user')?></h2>
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
          	<?php $pass = ($data['m'] == 'password') ? ' active' : ''; ?>
	         <div class="list-group">
	         <a href="<?=$this->siteUrl()?>/admin/users/edit/details/<?=e($data['user']['userid'])?>" class="list-group-item<?php echo e($selected); ?>">
	          <em class="fa fa-fw fa-user-md text-white"></em>&nbsp;&nbsp;&nbsp;<?=$this->lang('details')?>
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/users/edit/image/<?=e($data['user']['userid'])?>" class="list-group-item<?php echo e($image); ?>">
	          <em class="fa fa-fw fa-image text-white"></em>&nbsp;&nbsp;&nbsp;<?=$this->lang('image')?>
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/users/edit/password/<?=e($data['user']['userid'])?>" class="list-group-item<?php echo e($pass); ?>">
	          <em class="fa fa-fw fa-lock text-white"></em>&nbsp;&nbsp;&nbsp;<?=$this->lang('change_password')?>
			 </a>
			 
	         </div>
          </div>
          
		 <div class="col-lg-8">
		 <?php if ($data['m'] == 'details') : ?>
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
                </div>
                <div class="box-body">
                 <form role="form" method="post" action="<?=$this->siteUrl()?>/admin/users/edit/details/<?=e($data['user']['userid'])?>"> 
				 
                    <input type="hidden" name="userid" class="form-control" value="<?=e($data['user']['userid'])?>" />
					
                  <div class="form-group">	
				   <label><?=$this->lang('name')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="name" class="form-control" value="<?=e($data['user']['name'])?>" />
                   </div>
                    
                  </div>     
					
                  <div class="form-group">	
				   <label><?=$this->lang('email')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="email" class="form-control" value="<?=e($data['user']['email'])?>" />
                   </div>
                    
                  </div>  
				  
                  <div class="form-group">	
                   <label><?=$this->lang('user_type')?></label>
					 <select name="user_type" class="form-control">
					  <option value="1" <?=(e($data['user']['user_type']) == '1' ? ' selected' : '')?>><?=$this->freelancer_name()?></option>
					  <option value="2" <?=(e($data['user']['user_type']) == '2' ? ' selected' : '')?>><?=$this->client_name()?></option>	
					 </select>	
                  </div>   
                                   
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="edit_details" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
		 <?php elseif ($data['m'] == 'image') : ?>
		  
		  		 <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?=$this->lang('image')?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                 <form role="form" method="post" action="<?=$this->siteUrl()?>/admin/users/edit/image/<?=e($data['user']['userid'])?>" enctype="multipart/form-data"> 
				 
                    <input type="hidden" name="userid" class="form-control" value="<?=e($data['user']['userid'])?>" />
                    <input type="hidden" name="imagelocation" class="form-control" value="<?=e($data['user']['imagelocation'])?>" />
				
                  <div class="box-body">
				  
				  
                    <div class="form-group">
					 <div class="image text-center">
					  <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($data['user']['imagelocation'])?>" class="img-thumbnail" width="115" height="115"/>
					 </div>
                    </div>


					<div class="form-group">
						<label><?=$this->lang('choose_image')?></label>
						<input type="file" name="photoimg" id="photoimg" class="form-control">
					</div>
				  
                  </div><!-- /.box-body -->
                  
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="edit_image" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
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
                 <form role="form" method="post" action="<?=$this->siteUrl()?>/admin/users/edit/password/<?=e($data['user']['userid'])?>"> 
				 
                    <input type="hidden" name="userid" class="form-control" value="<?=e($data['user']['userid'])?>" />
                    <input type="hidden" name="db_password" class="form-control" value="<?=e($data['user']['password'])?>" />
				 
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
                    <input type="password" name="password" class="form-control" placeholder="<?=$this->lang('new_password')?>"/>
                   </div>
                  </div>
                  <div class="form-group">	
				   <label><?=$this->lang('confirm_new_password')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="confirmPassword" class="form-control" placeholder="<?=$this->lang('confirm_new_password')?>"/>
                   </div>
                  </div>
                                   
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="edit_password" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->              
			 
		 <?php endif; ?>
		 
		</div><!-- /.col -->
		
        
			 
	    </div><!-- /.row -->		  		  
	   </section><!-- /.content -->
 	 
      </div><!-- /.content-wrapper -->