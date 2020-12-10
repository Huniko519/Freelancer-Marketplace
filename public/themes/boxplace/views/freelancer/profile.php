<?php
defined('FIR') OR exit();
/**
 * The template for displaying Example Delete page
 */
?>
		
	    <div class="col-sm-8 col-md-9">
		 
	       <?=$this->validation()?>

		  <div class="job-box">
		   <div class="job-header">
		    <h4><?=$this->lang('edit_profile')?></h4>
		   </div>
           <form method="post" action="<?=$this->siteUrl()?>/user/profile">
		   
              <div class="form-group">	
			    <label><?=$this->lang('name')?></label>
                <input type="text" name="name" class="form-control" value="<?=e($data['user']['name'])?>"/>
              </div>   
		   
              <div class="form-group">	
			    <label><?=$this->lang('email')?></label>
                <input type="text" name="email" class="form-control" value="<?=e($data['user']['email'])?>"/>
              </div>  
			  
              <?=$this->token()?>
              <button type="submit" name="profile" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
           </form>
          </div><!-- /.job-box -->	  
		  
	    </div><!-- /.col-md-9 -->		