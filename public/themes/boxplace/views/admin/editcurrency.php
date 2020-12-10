
	 	
	  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2><?=$this->lang('currency_settings')?></h2>
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
	          <a href="<?=$this->siteUrl()?>/admin/currency_settings/currency" class="kafe-btn kafe-btn-mint-small btn-lg"><?=$this->lang('back')?></a>
	        </div><!-- /.box-header -->
	      </div><!-- /.box -->	
		  
		  
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?=$this->lang('edit_currency')?></h3>
                </div>
                <div class="box-body">
                 <form role="form" action="<?=$this->siteUrl()?>/admin/currency_settings/edit/<?=e($data['currency']['id'])?>" method="post"> 
				 
                    <input type="hidden" name="currency_id" class="form-control" value="<?=e($data['currency']['id'])?>" />
                 	
                  <div class="form-group">	
                    <label><?=$this->lang('currency_code')?></label>
                    <input type="text" name="currency_code" class="form-control" value="<?=e($data['currency']['currency_code'])?>" />
                  </div>
                 	
                  <div class="form-group">	
                    <label><?=$this->lang('currency_name')?></label>
                    <input type="text" name="currency_name" class="form-control" value="<?=e($data['currency']['currency_name'])?>" />
                  </div>
                 	
                  <div class="form-group">	
                    <label><?=$this->lang('currency_symbol')?></label>
                    <input type="text" name="currency_symbol" class="form-control" value="<?=e($data['currency']['currency_symbol'])?>" />
                  </div>
                                   
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="editcurrency" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              

		 
		</div><!-- /.col -->
		
        
			 
	    </div><!-- /.row -->		  		  
	   </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
