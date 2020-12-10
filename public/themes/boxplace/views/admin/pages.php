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
          <h2><?=$this->lang('pages')?></h2>
        </section>

        <!-- Main content -->
        <section class="content">	 	
		 <div class="row">	
		 	
		 <div class="col-lg-12">	
		  
	       <?=$this->message()?>
	       <?=$this->validation()?>
		   
          </div>
           
          <div class="col-lg-4">
          	<?php $selected = ($data['m'] == 'refund') ? ' active' : ''; ?>
          	<?php $image = ($data['m'] == 'terms') ? ' active' : ''; ?>
          	<?php $image_two = ($data['m'] == 'privacy') ? ' active' : ''; ?>
	         <div class="list-group">
	         <a href="<?=$this->siteUrl()?>/admin/pages/refund" class="list-group-item<?php echo e($selected); ?>">
	          <em class="fa fa-fw fa-edit text-white"></em>&nbsp;&nbsp;&nbsp;<?=$this->lang('refund_policy')?>
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/pages/terms" class="list-group-item<?php echo e($image); ?>">
	          <em class="fa fa-fw fa-edit text-white"></em>&nbsp;&nbsp;&nbsp; <?=$this->lang('terms_and_conditions')?>
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/pages/privacy" class="list-group-item<?php echo e($image_two); ?>">
	          <em class="fa fa-fw fa-edit text-white"></em>&nbsp;&nbsp;&nbsp; <?=$this->lang('privacy_policy')?>
			 </a>
			 
	         </div>
          </div>
          
		 <div class="col-lg-8">
		 <?php if ($data['m'] == 'refund') : ?>
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
                </div>
                <div class="box-body">
                 <form role="form" method="post" action="<?=$this->siteUrl()?>/admin/pages/refund"> 
				 
					<div class="form-group">
					  <textarea type="text" name="description" class="form-control" id="summernote-1"><?=e($data['settings']['refund_policy'])?></textarea>
					</div>   
                                   
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="post_refund" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
		 <?php elseif ($data['m'] == 'terms') : ?>
		 
		 
              <div class="box box-info">
                <div class="box-header">
                </div>
                <div class="box-body">
                 <form role="form" method="post" action="<?=$this->siteUrl()?>/admin/pages/terms"> 
				 
					<div class="form-group">
					  <textarea type="text" name="description" class="form-control" id="summernote-1"><?=e($data['settings']['terms'])?></textarea>
					</div>   
                                   
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="post_terms" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->   
              
		 <?php elseif ($data['m'] == 'privacy') : ?>

		 
		 
              <div class="box box-info">
                <div class="box-header">
                </div>
                <div class="box-body">
                 <form role="form" method="post" action="<?=$this->siteUrl()?>/admin/pages/privacy"> 
				 
					<div class="form-group">
					  <textarea type="text" name="description" class="form-control" id="summernote-1"><?=e($data['settings']['privacy_policy'])?></textarea>
					</div>   
                                   
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="post_privacy" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->  	  
			 
		 <?php endif; ?>
		 
		</div><!-- /.col -->
		
        
			 
	    </div><!-- /.row -->		  		  
	   </section><!-- /.content -->
 	 
      </div><!-- /.content-wrapper -->