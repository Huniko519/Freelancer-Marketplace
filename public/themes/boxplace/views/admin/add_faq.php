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
          <h2><?=$this->lang('add_faq')?></h2>
		  <a href="<?=$this->siteUrl()?>/admin/faq_settings" class="kafe-btn kafe-btn-red"><i class="fa fa-arrow-left"></i> <?=$this->lang('back')?></a>
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
                 <form role="form" method="post" action="<?=$this->siteUrl()?>/admin/add_faq"> 
                  
                  <div class="form-group">
                    <label><?=$this->lang('question')?></label>	
                    <input type="text" name="question" class="form-control" placeholder="<?=$this->lang('question')?>"/>
                  </div>
                  <div class="form-group">	
                    <label><?=$this->lang('answer')?></label>	
                    <textarea type="text" id="summernote" name="answer" class="form-control" rows="5"></textarea>
                  </div>
                  
                           
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="post_faq" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
		 
		</div><!-- /.col -->
		
        
			 
	    </div><!-- /.row -->		  		  
	   </section><!-- /.content -->
 	 
      </div><!-- /.content-wrapper -->