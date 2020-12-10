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
		  <h3><?=$this->lang('add_files')?></h3>
		  <a href="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/files"><?=$this->lang('go_back')?></a>
		 </div>	

         <div class="add-box">
           <form method="post" action="<?=$this->siteUrl()?>/<?=$this->freelancer_url()?>/addfiles" enctype="multipart/form-data">
		   
			  
              <div class="form-group">	
			    <label><?=$this->lang('projects')?></label>
				<select class="form-control" name="projectid">
					<?php foreach($data['files_projects'] as $row){ ?>
					   <option value="<?=e($row['projectid'])?>"><?=e($row['title'])?></option> 
					<?php } ?>   
				</select>
              </div>


					<div class="form-group">
						<label><?=$this->lang('choose_file')?></label>
						<input type="file" name="photoimg" id="photoimg" class="form-control">
					</div>
		   
			  
              <?=$this->token()?>
              <button type="submit" name="add_file" class="kafe-btn kafe-btn-mint full-width"><?=$this->lang('submit')?></button>
			  
           </form>		 
		 </div><!--/ .add-box -->	
		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	