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
		  <h3><?=$this->lang('edit_profile')?></h3>
		 </div>	

         <div class="add-box">
           <form method="post" action="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/editprofile">
		   
              <div class="form-group">	
			    <label><?=$this->lang('name')?></label>
                <input type="text" name="name" class="form-control" value="<?=e($data['user']['name'])?>"/>
              </div>   
		   
              <div class="form-group">	
			    <label><?=$this->lang('title')?></label>
                <input type="text" name="title" class="form-control" value="<?=e($data['user']['title'])?>"/>
              </div>
		   
              <div class="form-group">	
			    <label><?=$this->lang('email')?></label>
                <input type="text" name="email" class="form-control" value="<?=e($data['user']['email'])?>"/>
              </div> 
            
              <div class="form-group">	
			    <label><?=$this->lang('country')?></label>
                <input type="text" name="country" class="form-control" value="<?=e($data['user']['country'])?>"/>
              </div> 
			  
              <div class="form-group">	
			    <label><?=$this->lang('categories_you_can_work_in')?></label>
				<select class="select3 form-control" name="categories[]" multiple="multiple">
					<?php
                      $categories = $data['user']['categories'];
                      $arr=explode(',',$categories);
					  
					foreach($data['categories_array'] as $key=>$name){
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
			    <label><?=$this->lang('skills')?></label>
				<select class="select2 form-control" name="skills[]" multiple="multiple">
					<?php
                      $skills = $data['user']['skills'];
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
			    <label><?=$this->lang('about')?></label>
                 <textarea name="about" class="form-control" row="5"><?=e($data['user']['about'])?></textarea>	
              </div>
			  
              <?=$this->token()?>
              <button type="submit" name="edit_profile" class="kafe-btn kafe-btn-mint full-width"><?=$this->lang('submit')?></button>
			  
           </form>		 
		 </div><!--/ .add-box -->	
		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	