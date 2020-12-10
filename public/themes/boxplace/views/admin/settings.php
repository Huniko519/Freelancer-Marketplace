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
          	<?php $selected = ($data['m'] == 'site') ? ' active' : ''; ?>
          	<?php $logo = ($data['m'] == 'logo') ? ' active' : ''; ?>
          	<?php $favicon = ($data['m'] == 'favicon') ? ' active' : ''; ?>
          	<?php $analytics = ($data['m'] == 'analytics') ? ' active' : ''; ?>
          	<?php $contact = ($data['m'] == 'contact') ? ' active' : ''; ?>
          	<?php $social = ($data['m'] == 'social') ? ' active' : ''; ?>
	         <div class="list-group">
	         <a href="<?=$this->siteUrl()?>/admin/settings/site" class="list-group-item<?php echo e($selected); ?>">
	          <em class="fa fa-fw fa-cogs text-white"></em>&nbsp;&nbsp;&nbsp;<?=$this->lang('site_settings')?>
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/settings/logo" class="list-group-item<?php echo e($logo); ?>">
	          <em class="fa fa-fw fa-image text-white"></em>&nbsp;&nbsp;&nbsp;<?=$this->lang('logo')?>
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/settings/favicon" class="list-group-item<?php echo e($favicon); ?>">
	          <em class="fa fa-fw fa-image text-white"></em>&nbsp;&nbsp;&nbsp; <?=$this->lang('favicon')?>
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/settings/analytics" class="list-group-item<?php echo e($analytics); ?>">
	          <em class="fa fa-fw fa-line-chart text-white"></em>&nbsp;&nbsp;&nbsp; <?=$this->lang('google_analytics')?> 
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/settings/contact" class="list-group-item<?php echo e($contact); ?>">
	          <em class="fa fa-fw fa-briefcase text-white"></em>&nbsp;&nbsp;&nbsp; <?=$this->lang('contact_settings')?> 
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/settings/social" class="list-group-item<?php echo e($social); ?>">
	          <em class="fa fa-fw fa-facebook text-white"></em>&nbsp;&nbsp;&nbsp; <?=$this->lang('social_settings')?> 
			 </a>
			 
	         </div>
          </div>
          
		 <div class="col-lg-8">
		 <?php if ($data['m'] == 'site') : ?>
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?=$this->lang('site_settings')?></h3>
                </div>
                <div class="box-body">
                 <form role="form" action="<?=$this->siteUrl()?>/admin/settings" method="post"> 
                  
			 
                  <div class="form-group">	
                    <label><?=$this->lang('site_name')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="sitename" class="form-control" value="<?=e($data['settings']['sitename'])?>"/>
                   </div>
                  </div>
                  <div class="form-group">	
                    <label><?=$this->lang('site_title')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="title" class="form-control" value="<?=e($data['settings']['title'])?>"/>
                   </div>
                  </div>
                  <div class="form-group">
                    <label><?=$this->lang('site_description')?></label>		
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-quote-left"></i></span>
                    <textarea type="text" name="description" class="form-control" rows="5"><?=e($data['settings']['description'])?></textarea>
                   </div>
                  </div>
                  <div class="form-group">	
                    <label><?=$this->lang('site_keywords')?></label>	
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-quote-left"></i></span>
                    <textarea type="text" name="keywords" class="form-control" rows="5"><?=e($data['settings']['keywords'])?></textarea>
                   </div>
                  </div>
                  <div class="form-group">	
                    <label><?=$this->lang('timezone')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
					<select name="timezone" class="form-control">
						<option value="<?=(e($data['settings']['timezone']) == "" ? ' selected' : '')?>"><?=$this->lang['default']?></option>
						<?php foreach(timezone_identifiers_list() as $value): ?>
							<option value="<?=e($value)?>"<?=(e($data['settings']['timezone']) == $value ? ' selected' : '')?>><?=e($value)?></option>
						<?php endforeach ?>
					</select>
                   </div>
                  </div>
                                   
                  <div class="box-footer">			
                    <?=$this->token()?>
                    <button type="submit" name="postsite" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
 		 <?php elseif ($data['m'] == 'logo') : ?>
		  
		  		 <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?=$this->lang('logo')?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="<?=$this->siteUrl()?>/admin/settings" method="post" enctype="multipart/form-data">
				
                  <div class="box-body">
                    <div class="form-group">
					 <div class="image text-center">
					  <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/<?=e($data['settings']['logo'])?>" class="img-thumbnail" width="515" height="415"/>
					 </div>
                    </div>


					<div class="form-group">
						<label><?=$this->lang('choose_image')?></label>
						<input type="file" name="photoimg" id="photoimg" class="form-control">
					</div>
				  
                  </div><!-- /.box-body -->
                  
                  <div class="box-footer">		
                    <?=$this->token()?>
                    <button type="submit" name="postlogo" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button><br></br>
                  </div>

                </form>
              </div><!-- /.box -->  
              
 		 <?php elseif ($data['m'] == 'favicon') : ?>
		  
		  		 <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?=$this->lang('favicon')?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="<?=$this->siteUrl()?>/admin/settings" method="post" enctype="multipart/form-data">
				
                  <div class="box-body">
                    <div class="form-group">
					 <div class="image text-center">
					  <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/<?=e($data['settings']['favicon'])?>" class="img-thumbnail" width="155" height="145"/>
					 </div>
                    </div>


					<div class="form-group">
						<label><?=$this->lang('choose_image')?></label>
						<input type="file" name="photoimg" id="photoimg" class="form-control">
					</div>
				  
                  </div><!-- /.box-body -->
                  
                  <div class="box-footer">	
                    <?=$this->token()?>
                    <button type="submit" name="postfavicon" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button><br></br>
                  </div>

                </form>
              </div><!-- /.box --> 
               		 	
	    
		 <?php elseif ($data['m'] == 'analytics') : ?>
		   <div class="col-lg-12">		 	
			 <div class="row">	
				
				<div class="col-md-12">
					
			 <!-- Input addon -->
				  <div class="box box-info">
					<div class="box-header">
					  <h3 class="box-title"><?=$this->lang('google_analytics')?> (UA ID)</h3>
					</div>
					<div class="box-body">
					 <form role="form" action="<?=$this->siteUrl()?>/admin/settings" method="post">    
									
					  <div class="form-group">	
                       <input type="text" name="analytics" class="form-control" value="<?=e($data['settings']['analytics'])?>"/>
					  </div>  
													 
									   
					  <div class="box-footer">
                       <?=$this->token()?>
						<button type="submit" name="postanalytics" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
					  </div>
					 </form> 
					</div><!-- /.box-body -->
				  </div><!-- /.box -->		 		
					
				 
			 </div><!-- /.col-lg-12 -->	 
			</div><!-- /.row -->	
			</div>	 		 
			
		 <?php elseif($data['m'] == 'contact') : ?>
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?=$this->lang('contact_settings')?></h3>
                </div>
                <div class="box-body">
                 <form role="form" action="<?=$this->siteUrl()?>/admin/settings" method="post"> 
                  
			 
                  <div class="form-group">	
                    <label><?=$this->lang('contact_email')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="contact_email" class="form-control" value="<?=e($data['settings']['contact_email'])?>"/>
                   </div>
                  </div>
                  <div class="form-group">	
                    <label><?=$this->lang('contact_phone')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="contact_phone" class="form-control" value="<?=e($data['settings']['contact_phone'])?>"/>
                   </div>
                  </div>
                  <div class="form-group">	
                    <label><?=$this->lang('contact_location')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="contact_location" class="form-control" value="<?=e($data['settings']['contact_location'])?>"/>
                   </div>
                  </div>
                                   
                  <div class="box-footer">			
                    <?=$this->token()?>
                    <button type="submit" name="post_contact" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			
		 <?php elseif($data['m'] == 'social') : ?>
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?=$this->lang('social_settings')?></h3>
                </div>
                <div class="box-body">
                 <form role="form" action="<?=$this->siteUrl()?>/admin/settings" method="post"> 
                  
			 
                  <div class="form-group">	
                    <label>Facebook</label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="facebook" class="form-control" value="<?=e($data['settings']['facebook'])?>"/>
                   </div>
                  </div>
                  <div class="form-group">	
                    <label>Instagram</label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="instagram" class="form-control" value="<?=e($data['settings']['instagram'])?>"/>
                   </div>
                  </div>
                  <div class="form-group">	
                    <label>Twitter</label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="twitter" class="form-control" value="<?=e($data['settings']['twitter'])?>"/>
                   </div>
                  </div>
                                   
                  <div class="box-footer">			
                    <?=$this->token()?>
                    <button type="submit" name="post_social" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
	    			 
		 <?php endif; ?>
		 
		</div><!-- /.col -->
		
        
			 
	    </div><!-- /.row -->		  		  
	   </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
