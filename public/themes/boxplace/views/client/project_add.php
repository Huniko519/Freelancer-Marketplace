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
		  <h3><?=$this->lang('add_project')?></h3>
		  <a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/dashboard"><?=$this->lang('go_back')?></a>
		 </div>	

         <div class="add-box">
           <form method="post" action="<?=$this->siteUrl()?>/<?=$this->client_url()?>/dashboard/add">
		   
              <div class="form-group">	
			    <label><?=$this->lang('title')?></label>
                <input type="text" name="title" class="form-control" placeholder="<?=$this->lang('title')?>"/>
              </div>  
		   
              <div class="form-group">	
			    <label><?=$this->lang('budget')?></label>
                <input type="text" name="budget" class="form-control" placeholder="<?=$this->lang('budget')?> e.g 100"/>
              </div>  
			  
              <div class="form-group">	
			    <label><?=$this->lang('category')?></label>
				<select class="form-control" name="category">
					<?php foreach($data['categories'] as $row){ ?>
					   <option value="<?=e($row['name'])?>"><?=e($row['name'])?></option> 
					<?php } ?>   
				</select>
              </div>  
			  
              <div class="form-group">	
			    <label><?=$this->lang('skills')?></label>
				<select class="select3 form-control" name="skills[]" multiple="multiple">
					<?php foreach($data['skills'] as $row){ ?>
					   <option value="<?=e($row['name'])?>" data-tokens="<?=e($row['name'])?>" ><?=e($row['name'])?></option> 
					<?php } ?>   
				</select>
              </div>  
            
              <div class="form-group">	
			    <label><?=$this->lang('description')?></label>
                 <textarea id="summernote" name="description" class="form-control" rows="5" placeholder="<?=$this->lang('description')?>"></textarea>	
              </div>
		   
			  
              <?=$this->token()?>
              <button type="submit" name="add_project" class="kafe-btn kafe-btn-mint full-width"><?=$this->lang('submit')?></button>
			  
           </form>		 
		 </div><!--/ .add-box -->	
		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	