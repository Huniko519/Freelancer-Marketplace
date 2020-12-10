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
          <h2><?=$this->lang('add_user')?></h2>
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
                 <form role="form" method="post" action="<?=$this->siteUrl()?>/admin/adduser"> 
                  
                  <div class="form-group">	
				   <label><?=$this->lang('full_name')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="name" class="form-control" placeholder="<?=$this->lang('full_name')?>"/>
                   </div>
                  </div> 
                  
                  <div class="form-group">	
				   <label><?=$this->lang('email')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="email" class="form-control" placeholder="<?=$this->lang('email')?>"/>
                   </div>
                  </div> 
                  
                  <div class="form-group">	
				   <label><?=$this->lang('password_is_password')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="password" class="form-control" value="password" readonly/>
                   </div>
                  </div> 
				  
                  <div class="form-group">	
                   <label><?=$this->lang('user_type')?></label>
					 <select name="user_type" class="form-control">
					  <option value="1"><?=$this->freelancer_name()?></option>
					  <option value="2"><?=$this->client_name()?></option>	
					 </select>	
                  </div>
                           
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="add_user" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
		 
		</div><!-- /.col -->
		
        
			 
	    </div><!-- /.row -->		  		  
	   </section><!-- /.content -->
 	 
      </div><!-- /.content-wrapper -->