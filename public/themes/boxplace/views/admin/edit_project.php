
	 	
	  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2><?=$this->lang('edit_project')?></h2>
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
                 <form role="form" action="<?=$this->siteUrl()?>/admin/projects/edit/<?=e($data['project']['id'])?>" method="post"> 
				 
                    <input type="hidden" name="id" class="form-control" value="<?=e($data['project']['id'])?>" />
                  
                  <div class="form-group">
                    <label><?=$this->lang('title')?></label>	
                    <input type="text" name="title" class="form-control" value="<?=e($data['project']['title'])?>"/>
                  </div>
		   
				  <div class="form-group">	
					<label><?=$this->lang('budget')?></label>
					<input type="text" name="budget" class="form-control" value="<?=e($data['project']['budget'])?>"/>
				  </div>  
				  
				  <div class="form-group">	
					<label><?=$this->lang('category')?></label>
					<select class="form-control" name="category"> 
						<?php foreach($data['categories'] as $row){ ?>
						   <option value="<?=e($row['name'])?>" <?=($data['project']['category'] == $row['name'] ? ' selected' : '')?>><?=e($row['name'])?></option> 
						<?php } ?>   
					</select>
				  </div>  
				  
				  <div class="form-group">	
					<label><?=$this->lang('skills')?></label>
					<select class="select3 form-control" name="skills[]" multiple="multiple">
						<?php
						  $skills = $data['project']['skills'];
						  $arr=explode(',',$skills);
						  
						foreach($data['skills_array'] as $key=>$name){
							if(in_array($name,$arr)){ ?>
							
						   <option value = "<?=e($name)?>" data-tokens="<?=e($name)?>" selected="selected"><?=e($name)?></option>
						  
						 <?php	}else{ ?>
						   <option value = "<?=e($name)?>" data-tokens="<?=e($name)?>" ><?=e($name)?></option>
						 <?php 
						  }
						}
						?>   
					</select>
				  </div>  
				
				  <div class="form-group">	
					<label><?=$this->lang('description')?></label>
					 <textarea id="summernote" name="description" class="form-control" rows="5"><?=e($data['project']['description'])?></textarea>	
				  </div>
                                   
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="edit_project" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              

		 
		</div><!-- /.col -->
		
        
			 
	    </div><!-- /.row -->		  		  
	   </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
