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
		  <h3><?=$this->lang('edit_proposal')?></h3>
		  <a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/proposals"><?=$this->lang('go_back')?></a>
		 </div>	

         <div class="add-box">
           <form method="post" action="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/proposals/edit/<?=e($data['proposal']['id'])?>">
				 
			  <input type="hidden" name="id" class="form-control" value="<?=e($data['proposal']['id'])?>" />
		   
              <div class="form-group">	
			    <label><?=$this->lang('budget')?></label>
                <input type="text" name="budget" class="form-control" value="<?=e($data['proposal']['budget'])?>"/>
              </div>   
			  
              <?=$this->token()?>
              <button type="submit" name="edit_proposal" class="kafe-btn kafe-btn-mint full-width"><?=$this->lang('submit')?></button>
			  
           </form>		 
		 </div><!--/ .add-box -->	
		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	