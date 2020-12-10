
	 	
	  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2><?=$this->lang('edit_faq')?></h2>
        </section>

        <!-- Main content -->
        <section class="content">	 	

		 <div class="row">	
		 	
		 <div class="col-lg-12">
		 
	       <?=$this->message()?>
	       <?=$this->validation()?>
		  
          </div>	
           
          
		 <div class="col-lg-12">
		 
	  		 <div class="box box-info">
	        <div class="box-header">
	          <a href="<?=$this->siteUrl()?>/admin/faq_settings" class="kafe-btn kafe-btn-mint-small btn-lg"><?=$this->lang('back')?></a>
	        </div><!-- /.box-header -->
	      </div><!-- /.box -->	
		  
		  
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
                </div>
                <div class="box-body">
                 <form role="form" action="<?=$this->siteUrl()?>/admin/faq_settings/edit/<?=e($data['faq']['id'])?>" method="post"> 
				 
                    <input type="hidden" name="id" class="form-control" value="<?=e($data['faq']['id'])?>" />
                  
                  <div class="form-group">
                    <label><?=$this->lang('question')?></label>	
                    <input type="text" name="question" class="form-control" value="<?=e($data['faq']['question'])?>"/>
                  </div>
                  <div class="form-group">	
                    <label><?=$this->lang('answer')?></label>	
                    <textarea type="text" id="summernote" name="answer" class="form-control" rows="5"><?=e($data['faq']['answer'])?></textarea>
                  </div>
                                   
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="edit_faq" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              

		 
		</div><!-- /.col -->
		
        
			 
	    </div><!-- /.row -->		  		  
	   </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
