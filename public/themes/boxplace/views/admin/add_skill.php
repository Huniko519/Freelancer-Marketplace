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
          <h2><?=$this->lang('add_skill')?></h2>
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
                 <form role="form" method="post" action="<?=$this->siteUrl()?>/admin/add_skill"> 
                  
                  <div class="form-group">
                    <label><?=$this->lang('name')?></label>	
                    <input type="text" name="name" class="form-control" placeholder="<?=$this->lang('name')?>"/>
                  </div>
                  
                           
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="post_skill" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
		 
		</div><!-- /.col -->
		
        
			 
	    </div><!-- /.row -->		  		  
	   </section><!-- /.content -->
 	 
      </div><!-- /.content-wrapper -->