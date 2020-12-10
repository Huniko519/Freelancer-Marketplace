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
		  <h3><?=$this->lang('add_work_experience')?></h3>
		  <a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/workexperience"><?=$this->lang('go_back')?></a>
		 </div>	

         <div class="add-box">
           <form method="post" action="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/workexperience/add">
		   
              <div class="form-group">	
			    <label><?=$this->lang('year')?></label>
                <input type="text" name="year" class="form-control" placeholder="<?=$this->lang('year')?> e.g 2012 - 2014" value=""/>
              </div>   
		   
              <div class="form-group">	
			    <label><?=$this->lang('company')?></label>
                <input type="text" name="company" class="form-control" placeholder="<?=$this->lang('company')?>" value=""/>
              </div>
		   
              <div class="form-group">	
			    <label><?=$this->lang('title')?></label>
                <input type="text" name="title" class="form-control" placeholder="<?=$this->lang('title')?> e.g Web Developer" value=""/>
              </div>
            
              <div class="form-group">	
			    <label><?=$this->lang('description_of_the_work')?></label>
                 <textarea name="description" class="form-control" rows="5" placeholder="<?=$this->lang('description_of_the_work')?>"></textarea>	
              </div>
		   
			  
              <?=$this->token()?>
              <button type="submit" name="add_work_experience" class="kafe-btn kafe-btn-mint full-width"><?=$this->lang('submit')?></button>
			  
           </form>		 
		 </div><!--/ .add-box -->	
		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	