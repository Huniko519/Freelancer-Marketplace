<?php
defined('FIR') OR exit();
/**
 * The template for displaying Example Create page
 */
?>
		

	 
	 <!-- ==============================================
	 Dashboard Section
	 =============================================== -->
     <section class="dashboard">
      <div class="container">
	   <div class="row">
		<div class="col-lg-12">
		 
	       <?=$this->validation()?>
		
         <div class="headline">
		  <h3><?=$this->lang('edit_work_experience')?></h3>
		  <a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/workexperience"><?=$this->lang('go_back')?></a>
		 </div>	

         <div class="add-box">
           <form method="post" action="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/workexperience/edit/<?=e($data['WorkExperience']['id'])?>">
				 
			  <input type="hidden" name="id" class="form-control" value="<?=e($data['WorkExperience']['id'])?>" />
		   
              <div class="form-group">	
			    <label><?=$this->lang('year')?></label>
                <input type="text" name="year" class="form-control" value="<?=e($data['WorkExperience']['year'])?>"/>
              </div>   
		   
              <div class="form-group">	
			    <label><?=$this->lang('company')?></label>
                <input type="text" name="company" class="form-control" value="<?=e($data['WorkExperience']['company'])?>"/>
              </div>
		   
              <div class="form-group">	
			    <label><?=$this->lang('title')?></label>
                <input type="text" name="title" class="form-control" value="<?=e($data['WorkExperience']['title'])?>"/>
              </div>
            
              <div class="form-group">	
			    <label><?=$this->lang('description_of_the_work')?></label>
                 <textarea name="description" class="form-control" rows="5"><?=e($data['WorkExperience']['description'])?></textarea>	
              </div>
		   
			  
              <?=$this->token()?>
              <button type="submit" name="edit_work_experience" class="kafe-btn kafe-btn-mint full-width"><?=$this->lang('submit')?></button>
			  
           </form>		 
		 </div><!--/ .add-box -->	
		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	