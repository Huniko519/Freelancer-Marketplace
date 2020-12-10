<?php
defined('FIR') OR exit();
/**
 * The template for displaying Example Create page
 */
?>
		

	 
	 <!-- ==============================================
	 Latest Jobs Section
	 =============================================== -->
     <section class="dashboard">
      <div class="container">
	   <div class="row">
		<div class="col-lg-12">
		 
	       <?=$this->validation()?>
		
         <div class="headline">
		  <h3><?=$this->lang('edit_project')?></h3>
		  <a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/dashboard"><?=$this->lang('go_back')?></a>
		 </div>	

         <div class="add-box">
           <form method="post" action="<?=$this->siteUrl()?>/<?=$this->client_url()?>/dashboard/edit/<?=e($data['project']['projectid'])?>">
				 
			  <input type="hidden" name="id" class="form-control" value="<?=e($data['project']['projectid'])?>" />
		   
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
		   
			  
              <?=$this->token()?>
              <button type="submit" name="edit_project" class="kafe-btn kafe-btn-mint full-width"><?=$this->lang('submit')?></button>
			  
           </form>		 
		 </div><!--/ .add-box -->	
		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	