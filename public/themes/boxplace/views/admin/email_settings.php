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
          <h2><?=$this->lang('email_settings')?></h2>
        </section>

        <!-- Main content -->
        <section class="content">	 	
		 <div class="row">	
		 	
		 <div class="col-lg-12">	
		  
	       <?=$this->message()?>
	       <?=$this->validation()?>
		   
          </div>
           
		 <div class="col-lg-12">
		  
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
                </div>
                <div class="box-body">
                 <form role="form" action="<?=$this->siteUrl()?>/admin/email_settings" method="post"> 
                  
                  <div class="form-group">	
                    <label><?=$this->lang('smtp_host')?></label>	
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="smtp_host" class="form-control" value="<?=e($data['settings']['smtp_host'])?>"/>
                   </div>
                  </div>
                  <div class="form-group">	
                    <label><?=$this->lang('smtp_username')?></label>	
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="smtp_username" class="form-control" value="<?=e($data['settings']['smtp_username'])?>"/>
                   </div>
                  </div>
                  <div class="form-group">	
                    <label><?=$this->lang('smtp_password')?></label>	
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="smtp_password" class="form-control" value="<?=e($data['settings']['smtp_password'])?>"/>
                   </div>
                  </div>
                  <div class="form-group">	
                    <label><?=$this->lang('smtp_encryption')?></label>	
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="smtp_encryption" class="form-control" value="<?=e($data['settings']['smtp_encryption'])?>"/>
                   </div>
                  </div>
                  <div class="form-group">	
                    <label><?=$this->lang('smtp_port')?></label>	
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="smtp_port" class="form-control" value="<?=e($data['settings']['smtp_port'])?>"/>
                   </div>
                  </div>
                                   
                  <div class="box-footer">
                       <?=$this->token()?>
                    <button type="submit" name="post_email" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->			 
                  
		 
		</div><!-- /.col -->
		
        
			 
	    </div><!-- /.row -->		  		  
	   </section><!-- /.content -->
 	 
      </div><!-- /.content-wrapper -->