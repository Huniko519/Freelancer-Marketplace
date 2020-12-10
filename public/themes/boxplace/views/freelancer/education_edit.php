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
		  <h3><?=$this->lang('edit_education')?></h3>
		  <a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/education"><?=$this->lang('go_back')?></a>
		 </div>	

         <div class="add-box">
           <form method="post" action="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/education/edit/<?=e($data['education']['id'])?>">
				 
			  <input type="hidden" name="id" class="form-control" value="<?=e($data['education']['id'])?>" />
		   
              <div class="form-group">	
			    <label><?=$this->lang('year')?></label>
                <input type="text" name="year" class="form-control" value="<?=e($data['education']['year'])?>"/>
              </div>   
		   
              <div class="form-group">	
			    <label><?=$this->lang('degree')?></label>
                <input type="text" name="degree" class="form-control" value="<?=e($data['education']['company'])?>"/>
              </div>
		   
              <div class="form-group">	
			    <label><?=$this->lang('course')?></label>
                <input type="text" name="course" class="form-control" value="<?=e($data['education']['title'])?>"/>
              </div>
            
              <div class="form-group">	
			    <label><?=$this->lang('description_of_the_work')?></label>
                 <textarea name="description" class="form-control" rows="5"><?=e($data['education']['description'])?></textarea>	
              </div>
		   
			  
              <?=$this->token()?>
              <button type="submit" name="edit_education" class="kafe-btn kafe-btn-mint full-width"><?=$this->lang('submit')?></button>
			  
           </form>		 
		 </div><!--/ .add-box -->	
		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	