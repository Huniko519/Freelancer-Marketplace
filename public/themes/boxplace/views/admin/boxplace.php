<?php
defined('FIR') OR exit();
/**
 * The template for displaying Home page content
 */
?>
	  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2>Boxplace <?=$this->lang('theme')?></h2>
        </section>

        <!-- Main content -->
        <section class="content">	 	
		 <div class="row">	
		 	
		 <div class="col-lg-12">	
		  
	       <?=$this->message()?>
	       <?=$this->validation()?>
		   
          </div>
           
          <div class="col-lg-4">
          	<?php $selected = ($data['m'] == 'details') ? ' active' : ''; ?>
          	<?php $image = ($data['m'] == 'bgimage') ? ' active' : ''; ?>
          	<?php $image_two = ($data['m'] == 'bgimage_two') ? ' active' : ''; ?>
          	<?php $how = ($data['m'] == 'how_it_works') ? ' active' : ''; ?>
          	<?php $custom = ($data['m'] == 'customers') ? ' active' : ''; ?>
          	<?php $ab = ($data['m'] == 'about') ? ' active' : ''; ?>
          	<?php $tea = ($data['m'] == 'team') ? ' active' : ''; ?>
	         <div class="list-group">
	         <a href="<?=$this->siteUrl()?>/admin/boxplace/details" class="list-group-item<?php echo e($selected); ?>">
	          <em class="fa fa-fw fa-user-md text-white"></em>&nbsp;&nbsp;&nbsp; <?=$this->lang('details')?>
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/boxplace/bgimage" class="list-group-item<?php echo e($image); ?>">
	          <em class="fa fa-fw fa-image text-white"></em>&nbsp;&nbsp;&nbsp; <?=$this->lang('background_image_one')?>
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/boxplace/bgimage_two" class="list-group-item<?php echo e($image_two); ?>">
	          <em class="fa fa-fw fa-image text-white"></em>&nbsp;&nbsp;&nbsp; <?=$this->lang('background_image_two')?>
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/boxplace/how_it_works" class="list-group-item<?php echo e($how); ?>">
	          <em class="fa fa-fw fa-cog text-white"></em>&nbsp;&nbsp;&nbsp; <?=$this->lang('how_it_works')?>
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/boxplace/customers" class="list-group-item<?php echo e($custom); ?>">
	          <em class="fa fa-fw fa-users text-white"></em>&nbsp;&nbsp;&nbsp; <?=$this->lang('customers')?>
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/boxplace/about" class="list-group-item<?php echo e($ab); ?>">
	          <em class="fa fa-fw fa-edit text-white"></em>&nbsp;&nbsp;&nbsp; <?=$this->lang('about')?>
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/boxplace/team" class="list-group-item<?php echo e($tea); ?>">
	          <em class="fa fa-fw fa-users text-white"></em>&nbsp;&nbsp;&nbsp; <?=$this->lang('team')?>
			 </a>
			 
	         </div>
          </div>
          
		 <div class="col-lg-8">
		 <?php if ($data['m'] == 'details') : ?>
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
                </div>
                <div class="box-body">
                 <form role="form" method="post" action="<?=$this->siteUrl()?>/admin/boxplace/details"> 
				 
                    <input type="hidden" name="id" class="form-control" value="<?=e($data['theme']['id'])?>" />
					
                  <div class="form-group">	
				   <label><?=$this->lang('title')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="title" class="form-control" value="<?=e($data['theme']['title'])?>" />
                   </div>
                    
                  </div> 
					
                  <div class="form-group">	
				   <label><?=$this->lang('sub_title')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="sub_title" class="form-control" value="<?=e($data['theme']['sub_title'])?>" />
                   </div>
                    
                  </div>     
					
                  <div class="form-group">	
				   <label><?=$this->lang('project_search')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="project_search" class="form-control" value="<?=e($data['theme']['project_search'])?>" />
                   </div>
                    
                  </div>    
					
                  <div class="form-group">	
				   <label><?=$this->lang('freelancer_search')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="freelancer_search" class="form-control" value="<?=e($data['theme']['freelancer_search'])?>" />
                   </div>
                  </div> 
					
                  <div class="form-group">	
				   <label><?=$this->lang('categories_title')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="categories_title" class="form-control" value="<?=e($data['theme']['categories_title'])?>" />
                   </div>
                  </div> 
					
                  <div class="form-group">	
				   <label><?=$this->lang('portfolio_title')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="portfolio_title" class="form-control" value="<?=e($data['theme']['portfolio_title'])?>" />
                   </div>
                  </div> 
					
                  <div class="form-group">	
				   <label><?=$this->lang('how_it_works_title')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="how_it_works_title" class="form-control" value="<?=e($data['theme']['how_it_works_title'])?>" />
                   </div>
                  </div>   
					
                  <div class="form-group">	
				   <label><?=$this->lang('customers_title')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="customers_title" class="form-control" value="<?=e($data['theme']['customers_title'])?>" />
                   </div>
                  </div>  
					
                  <div class="form-group">	
				   <label><?=$this->lang('join_us_title')?></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" name="join_us_title" class="form-control" value="<?=e($data['theme']['join_us_title'])?>" />
                   </div>
                  </div>     
                                   
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="edit_details" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
		 <?php elseif ($data['m'] == 'bgimage') : ?>
		  
		  		 <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?=$this->lang('background_image_one')?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                 <form role="form" method="post" action="<?=$this->siteUrl()?>/admin/boxplace/bgimage" enctype="multipart/form-data"> 
				 
                    <input type="hidden" name="id" class="form-control" value="<?=e($data['theme']['id'])?>" />
                    <input type="hidden" name="bg_image_one" class="form-control" value="<?=e($data['theme']['bg_image_one'])?>" />
				
                  <div class="box-body">
				  
				  
                    <div class="form-group">
					 <div class="image text-center">
					  <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/<?=e($data['theme']['bg_image_one'])?>" class="img-thumbnail" width="515" height="415"/>
					 </div>
                    </div>


					<div class="form-group">
						<label><?=$this->lang('choose_image')?></label>
						<input type="file" name="photoimg" id="photoimg" class="form-control">
					</div>
				  
                  </div><!-- /.box-body -->
                  
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="edit_bgimage" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>

                </form>
              </div><!-- /.box -->	   
              
		 <?php elseif ($data['m'] == 'bgimage_two') : ?>
		  
		  		 <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?=$this->lang('background_image_two')?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                 <form role="form" method="post" action="<?=$this->siteUrl()?>/admin/boxplace/bgimage_two" enctype="multipart/form-data"> 
				 
                    <input type="hidden" name="id" class="form-control" value="<?=e($data['theme']['id'])?>" />
                    <input type="hidden" name="bg_image_two" class="form-control" value="<?=e($data['theme']['bg_image_two'])?>" />
				
                  <div class="box-body">
				  
				  
                    <div class="form-group">
					 <div class="image text-center">
					  <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/<?=e($data['theme']['bg_image_two'])?>" class="img-thumbnail" width="515" height="415"/>
					 </div>
                    </div>


					<div class="form-group">
						<label><?=$this->lang('choose_image')?></label>
						<input type="file" name="photoimg" id="photoimg" class="form-control">
					</div>
				  
                  </div><!-- /.box-body -->
                  
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="edit_bgimage_two" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>

                </form>
              </div><!-- /.box -->	 
			 
		 <?php elseif ($data['m'] == 'how_it_works') : ?>		 		

            <?php if ($data['n'] == 'edit') : ?>
			
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
	              <h4 class="box-title"><?=$this->lang('edit_section')?></h4>
                </div>
                <div class="box-body">
                 <form role="form" action="<?=$this->siteUrl()?>/admin/boxplace/how_it_works/edit_how/<?=e($data['how_section']['id'])?>" method="post" enctype="multipart/form-data"> 
				 
                    <input type="hidden" name="id" class="form-control" value="<?=e($data['how_section']['id'])?>" />
					<input type="hidden" name="image" id="image" class="form-control" value="<?=e($data['how_section']['imagelocation'])?>">
                  
                  <div class="form-group">
                    <label><?=$this->lang('title')?></label>	
                    <input type="text" name="title" class="form-control" value="<?=e($data['how_section']['title'])?>"/>
                  </div>
               
				  <div class="form-group">	
					<label><?=$this->lang('description')?></label>
					<textarea type="text" name="description" class="form-control" rows="3"><?=e($data['how_section']['description'])?></textarea>
				  </div> 
				  
					<div class="form-group">
					<label><?=$this->lang('current_image')?></label>
					 <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/how/<?=e($data['how_section']['imagelocation'])?>" width="100" height="90"/>
					</div>	

					<div class="form-group">
					 <label><?=$this->lang('update_the_image')?></label>
						<input type="file" name="photoimg" id="photoimg" class="form-control">
					 <h6><?=$this->lang('leave_it_blank')?>.</h6>
					</div>			  
                                   
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="edit_how_section" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  
            <?php else : ?>
		 			 		
		 		
					 <div class="box box-info">
					<div class="box-header">
					  <a href="#addcurrency" class="btn btn-success btn-lg" data-toggle="modal"><?=$this->lang('add_section')?></a>
					</div><!-- /.box-header -->
				  </div><!-- /.box -->	
				  
				  <!-- Modal HTML -->
				  <div id="addcurrency" class="modal fade">
				   <div class="modal-dialog">
					<div class="modal-content">
					 <div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title"><?=$this->lang('add_section')?></h4>
					 </div>
					 <div class="modal-body">
					  <form role="form" action="<?=$this->siteUrl()?>/admin/boxplace/how_it_works" method="post" enctype="multipart/form-data"> 
						
					  <div class="form-group">	
						<label><?=$this->lang('title')?></label>
						<input type="text" name="title" class="form-control" placeholder="<?=$this->lang('title')?>"/>
					  </div>     
					   
					  <div class="form-group">	
						<label><?=$this->lang('description')?></label>
						<textarea type="text" name="description" class="form-control" rows="3" placeholder="<?=$this->lang('description')?>"></textarea>
					  </div>     
					  
						<div class="form-group">
							<label><?=$this->lang('choose_image')?></label>
							<input type="file" name="photoimg" id="photoimg" class="form-control">
						</div>
					 
					 <div class="modal-footer">
							<?=$this->token()?>
					  <button type="button" class="btn btn-default" data-dismiss="modal"><?=$this->lang('close')?></button>
					  <button type="submit" name="post_section" class="btn btn-success"><?=$this->lang('submit')?></button>
					 </div>
					 
					 </div>
					 </form> 
					 
					</div>
				   </div>
				  </div>
			
		 		<div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?=$this->lang('how_it_works')?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					   <th><?=$this->lang('image')?></th>
					   <th><?=$this->lang('title')?></th>
					   <th><?=$this->lang('description')?></th>
					   <th><?=$this->lang('action')?></th>
                      </tr>
                    </thead>
                    <tbody>
				    <?php
						foreach($data['how_it_works'] as $row) {
	
					    echo '<tr id="tr'.e($row["id"]).'">';
					    echo '<td><img src="'. $this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH .'/admin/how/'. e($row["imagelocation"]) .'" width="50" height="30" /></td>';
					    echo '<td>'. e($row["title"]) .'</td>';
					    echo '<td>'. e($row["description"]) .'</td>';
					    echo '<td>
					      <a href="'. $this->siteUrl() .'/admin/boxplace/how_it_works/edit_how/' . e($row["id"]) . '" class="btn btn-success btn-xs" data-toggle="tooltip" title="'. $this->lang('edit') .'"><span class="fa fa-edit"></span></a>
					      <a id="delete_how_section" data-id="' . e($row["id"]) . '" class="btn btn-danger btn-xs" data-toggle="tooltip" title="'. $this->lang('delete') .'"><span class="fa fa-trash"></span></a>					  
						  
                          </td>';
					    echo '</tr>';
					   }
			        ?>
                    </tbody>
                    <tfoot>
                      <tr>
					   <th><?=$this->lang('image')?></th>
					   <th><?=$this->lang('title')?></th>
					   <th><?=$this->lang('description')?></th>
					   <th><?=$this->lang('action')?></th>
                      </tr>
                    </tfoot>
                  </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  
            <?php endif; ?>
			 
		 <?php elseif ($data['m'] == 'customers') : ?>		 		

            <?php if ($data['n'] == 'edit') : ?>
			
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
	              <h4 class="box-title"><?=$this->lang('edit_customer')?></h4>
                </div>
                <div class="box-body">
                 <form role="form" action="<?=$this->siteUrl()?>/admin/boxplace/customers/edit_customer/<?=e($data['customer']['id'])?>" method="post" enctype="multipart/form-data"> 
				 
                    <input type="hidden" name="id" class="form-control" value="<?=e($data['customer']['id'])?>" />
					<input type="hidden" name="image" id="image" class="form-control" value="<?=e($data['customer']['imagelocation'])?>">
                  
                  <div class="form-group">
                    <label><?=$this->lang('name')?></label>	
                    <input type="text" name="name" class="form-control" value="<?=e($data['customer']['name'])?>"/>
                  </div>  
				  
                  <div class="form-group">
                    <label><?=$this->lang('title')?></label>	
                    <input type="text" name="title" class="form-control" value="<?=e($data['customer']['title'])?>"/>
                  </div>
               
				  <div class="form-group">	
					<label><?=$this->lang('quote')?></label>
					<textarea type="text" name="quote" class="form-control" rows="3"><?=e($data['customer']['quote'])?></textarea>
				  </div> 
				  
					<div class="form-group">
					<label><?=$this->lang('current_image')?></label>
					 <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/customer/<?=e($data['customer']['imagelocation'])?>" width="100" height="90"/>
					</div>	

					<div class="form-group">
					 <label><?=$this->lang('update_the_image')?></label>
						<input type="file" name="photoimg" id="photoimg" class="form-control">
					 <h6><?=$this->lang('leave_it_blank')?>.</h6>
					</div>			  
                                   
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="edit_customer" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  
            <?php else : ?>
		 			 		
		 		
					 <div class="box box-info">
					<div class="box-header">
					  <a href="#addcurrency" class="btn btn-success btn-lg" data-toggle="modal"><?=$this->lang('add_customer')?></a>
					</div><!-- /.box-header -->
				  </div><!-- /.box -->	
				  
				  <!-- Modal HTML -->
				  <div id="addcurrency" class="modal fade">
				   <div class="modal-dialog">
					<div class="modal-content">
					 <div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title"><?=$this->lang('add_customer')?></h4>
					 </div>
					 <div class="modal-body">
					  <form role="form" action="<?=$this->siteUrl()?>/admin/boxplace/customers" method="post" enctype="multipart/form-data"> 
						
					  <div class="form-group">	
						<label><?=$this->lang('name')?></label>
						<input type="text" name="name" class="form-control" placeholder="<?=$this->lang('name')?>"/>
					  </div>  
					  
					  <div class="form-group">	
						<label><?=$this->lang('title')?></label>
						<input type="text" name="title" class="form-control" placeholder="<?=$this->lang('title')?>"/>
					  </div>     
					   
					  <div class="form-group">	
						<label><?=$this->lang('quote')?></label>
						<textarea type="text" name="quote" class="form-control" rows="3" placeholder="<?=$this->lang('quote')?>"></textarea>
					  </div>     
					  
						<div class="form-group">
							<label><?=$this->lang('choose_image')?></label>
							<input type="file" name="photoimg" id="photoimg" class="form-control">
						</div>
					 
					 <div class="modal-footer">
							<?=$this->token()?>
					  <button type="button" class="btn btn-default" data-dismiss="modal"><?=$this->lang('close')?></button>
					  <button type="submit" name="post_customer" class="btn btn-success"><?=$this->lang('submit')?></button>
					 </div>
					 
					 </div>
					 </form> 
					 
					</div>
				   </div>
				  </div>
			
		 		<div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?=$this->lang('customers')?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					   <th><?=$this->lang('image')?></th>
					   <th><?=$this->lang('name')?></th>
					   <th><?=$this->lang('title')?></th>
					   <th><?=$this->lang('quote')?></th>
					   <th><?=$this->lang('action')?></th>
                      </tr>
                    </thead>
                    <tbody>
				    <?php
						foreach($data['customers'] as $row) {
	
					    echo '<tr id="tr-customer'.e($row["id"]).'">';
					    echo '<td><img src="'. $this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH .'/admin/customer/'. e($row["imagelocation"]) .'" width="50" height="30" /></td>';
					    echo '<td>'. e($row["name"]) .'</td>';
					    echo '<td>'. e($row["title"]) .'</td>';
					    echo '<td>'. e($row["quote"]) .'</td>';
					    echo '<td>
					      <a href="'. $this->siteUrl() .'/admin/boxplace/customers/edit_customer/' . e($row["id"]) . '" class="btn btn-success btn-xs" data-toggle="tooltip" title="'. $this->lang('edit') .'"><span class="fa fa-edit"></span></a>
					      <a id="delete_customer" data-id="' . e($row["id"]) . '" class="btn btn-danger btn-xs" data-toggle="tooltip" title="'. $this->lang('delete') .'"><span class="fa fa-trash"></span></a>					  
						  
                          </td>';
					    echo '</tr>';
					   }
			        ?>
                    </tbody>
                    <tfoot>
                      <tr>
					   <th><?=$this->lang('image')?></th>
					   <th><?=$this->lang('name')?></th>
					   <th><?=$this->lang('title')?></th>
					   <th><?=$this->lang('quote')?></th>
					   <th><?=$this->lang('action')?></th>
                      </tr>
                    </tfoot>
                  </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  
            <?php endif; ?>
			
		 <?php elseif ($data['m'] == 'about') : ?>
			
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
	              <h4 class="box-title"><?=$this->lang('about')?></h4>
                </div>
                <div class="box-body">
                 <form role="form" action="<?=$this->siteUrl()?>/admin/boxplace/about" method="post" enctype="multipart/form-data">
				 
					<input type="hidden" name="image" id="image" class="form-control" value="<?=e($data['settings']['about_image'])?>">
                  
                  <div class="form-group">
                    <label><?=$this->lang('title')?></label>	
                    <input type="text" name="title" class="form-control" value="<?=e($data['settings']['about_title'])?>"/>
                  </div>
               
				  <div class="form-group">	
					<label><?=$this->lang('description')?></label>
					<textarea type="text" name="description" id="summernote" class="form-control" rows="3"><?=e($data['settings']['about_description'])?></textarea>
				  </div> 
                  
                  <div class="form-group">
                    <label><?=$this->lang('company')?></label>	
                    <input type="text" name="company" class="form-control" value="<?=e($data['settings']['about_company'])?>"/>
                  </div>
				  
					<div class="form-group">
					<label><?=$this->lang('current_image')?></label>
					 <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/about/<?=e($data['settings']['about_image'])?>" width="100" height="90"/>
					</div>	

					<div class="form-group">
					 <label><?=$this->lang('update_the_image')?></label>
						<input type="file" name="photoimg" id="photoimg" class="form-control">
					 <h6><?=$this->lang('leave_it_blank')?>.</h6>
					</div>			  
                                   
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="edit_about" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-bod			


        <?php elseif ($data['m'] == 'team') : ?>		 		

            <?php if ($data['n'] == 'edit') : ?>
			
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
	              <h4 class="box-title"><?=$this->lang('edit_team')?></h4>
                </div>
                <div class="box-body">
                 <form role="form" action="<?=$this->siteUrl()?>/admin/boxplace/team/edit_team/<?=e($data['team']['id'])?>" method="post" enctype="multipart/form-data"> 
				 
                    <input type="hidden" name="id" class="form-control" value="<?=e($data['team']['id'])?>" />
					<input type="hidden" name="image" id="image" class="form-control" value="<?=e($data['team']['imagelocation'])?>">
                  
                  <div class="form-group">
                    <label><?=$this->lang('name')?></label>	
                    <input type="text" name="name" class="form-control" value="<?=e($data['team']['name'])?>"/>
                  </div>  
				  
                  <div class="form-group">
                    <label><?=$this->lang('title')?></label>	
                    <input type="text" name="title" class="form-control" value="<?=e($data['team']['title'])?>"/>
                  </div>
				  
                  <div class="form-group">
                    <label>Facebook</label>	
                    <input type="text" name="facebook" class="form-control" value="<?=e($data['team']['facebook'])?>"/>
                  </div> 
				  
                  <div class="form-group">
                    <label>Twitter</label>	
                    <input type="text" name="twitter" class="form-control" value="<?=e($data['team']['twitter'])?>"/>
                  </div> 
				  
                  <div class="form-group">
                    <label>Instagram</label>	
                    <input type="text" name="instagram" class="form-control" value="<?=e($data['team']['instagram'])?>"/>
                  </div> 
				  
					<div class="form-group">
					<label><?=$this->lang('current_image')?></label>
					 <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/team/<?=e($data['team']['imagelocation'])?>" width="100" height="90"/>
					</div>	

					<div class="form-group">
					 <label><?=$this->lang('update_the_image')?></label>
						<input type="file" name="photoimg" id="photoimg" class="form-control">
					 <h6><?=$this->lang('leave_it_blank')?>.</h6>
					</div>			  
                                   
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="edit_team" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  
            <?php else : ?>
		 			 		
		 		
					 <div class="box box-info">
					<div class="box-header">
					  <a href="#addcurrency" class="btn btn-success btn-lg" data-toggle="modal"><?=$this->lang('add_team')?></a>
					</div><!-- /.box-header -->
				  </div><!-- /.box -->	
				  
				  <!-- Modal HTML -->
				  <div id="addcurrency" class="modal fade">
				   <div class="modal-dialog">
					<div class="modal-content">
					 <div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					  <h4 class="modal-title"><?=$this->lang('add_team')?></h4>
					 </div>
					 <div class="modal-body">
					  <form role="form" action="<?=$this->siteUrl()?>/admin/boxplace/team" method="post" enctype="multipart/form-data"> 
						
					  <div class="form-group">	
						<label><?=$this->lang('name')?></label>
						<input type="text" name="name" class="form-control" placeholder="<?=$this->lang('name')?>"/>
					  </div>  
					  
					  <div class="form-group">	
						<label><?=$this->lang('title')?></label>
						<input type="text" name="title" class="form-control" placeholder="<?=$this->lang('title')?>"/>
					  </div>     
					   
					  <div class="form-group">	
						<label>Facebook</label>
						<input type="text" name="facebook" class="form-control" rows="3" placeholder="Facebook"/>
					  </div>    
					   
					  <div class="form-group">	
						<label>Twitter</label>
						<input type="text" name="twitter" class="form-control" rows="3" placeholder="Twitter"/>
					  </div>    
					   
					  <div class="form-group">	
						<label>Instagram</label>
						<input type="text" name="instagram" class="form-control" rows="3" placeholder="Instagram"/>
					  </div>     
					  
						<div class="form-group">
							<label><?=$this->lang('choose_image')?></label>
							<input type="file" name="photoimg" id="photoimg" class="form-control">
						</div>
					 
					 <div class="modal-footer">
							<?=$this->token()?>
					  <button type="button" class="btn btn-default" data-dismiss="modal"><?=$this->lang('close')?></button>
					  <button type="submit" name="post_team" class="btn btn-success"><?=$this->lang('submit')?></button>
					 </div>
					 
					 </div>
					 </form> 
					 
					</div>
				   </div>
				  </div>
			
		 		<div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?=$this->lang('team')?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					   <th><?=$this->lang('image')?></th>
					   <th><?=$this->lang('name')?></th>
					   <th><?=$this->lang('title')?></th>
					   <th>Facebook</th>
					   <th>Twitter</th>
					   <th>Instagram</th>
					   <th><?=$this->lang('action')?></th>
                      </tr>
                    </thead>
                    <tbody>
				    <?php
						foreach($data['team'] as $row) {
	
					    echo '<tr id="tr-team'.e($row["id"]).'">';
					    echo '<td><img src="'. $this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH .'/admin/team/'. e($row["imagelocation"]) .'" width="50" height="30" /></td>';
					    echo '<td>'. e($row["name"]) .'</td>';
					    echo '<td>'. e($row["title"]) .'</td>';
					    echo '<td>'. e($row["facebook"]) .'</td>';
					    echo '<td>'. e($row["twitter"]) .'</td>';
					    echo '<td>'. e($row["instagram"]) .'</td>';
					    echo '<td>
					      <a href="'. $this->siteUrl() .'/admin/boxplace/team/edit_team/' . e($row["id"]) . '" class="btn btn-success btn-xs" data-toggle="tooltip" title="'. $this->lang('edit') .'"><span class="fa fa-edit"></span></a>
					      <a id="delete_team" data-id="' . e($row["id"]) . '" class="btn btn-danger btn-xs" data-toggle="tooltip" title="'. $this->lang('delete') .'"><span class="fa fa-trash"></span></a>					  
						  
                          </td>';
					    echo '</tr>';
					   }
			        ?>
                    </tbody>
                    <tfoot>
                      <tr>
					   <th><?=$this->lang('image')?></th>
					   <th><?=$this->lang('name')?></th>
					   <th><?=$this->lang('title')?></th>
					   <th>Facebook</th>
					   <th>Twitter</th>
					   <th>Instagram</th>
					   <th><?=$this->lang('action')?></th>
                      </tr>
                    </tfoot>
                  </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  
            <?php endif; ?>
				
	    			 
		 <?php endif; ?>
		 
		</div><!-- /.col -->
		
        
			 
	    </div><!-- /.row -->		  		  
	   </section><!-- /.content -->
 	 
      </div><!-- /.content-wrapper -->
	  
	  <script>
	  $(document).on('click', '#delete_how_section', function (e) {
        e.preventDefault();
				  var id = $(this).data('id');
				  
		swal({
		  title: "<?=$this->lang('delete_this_record')?>?",
		  text: "<?=$this->lang('click_yes_delete')?>.",
		  icon: "warning",
		  buttons: ["Cancel!", "Yes!"],
		  dangerMode: true,
		}).then((willDelete) => {
			  if (willDelete) {    
				  
			     $.ajax({
			   		url: '<?=$this->siteUrl()?>/requests/delete_how_section',
			    	type: 'GET',
			       	data: 'id='+$(this).data('id'),
			       	dataType: 'json'
			     })
			     .done(function(response){
				console.log(response);
			     	swal('<?=$this->lang('deleted')?>!', response.message, response.status);
				    $('#tr'+id).fadeOut(500, function() { $('#comment'+id).remove(); });
			     })
			     .fail(function(){
					 console.log(response);
			     	swal('<?=$this->lang('oops')?>...', '<?=$this->lang('something_went_wrong')?>!', 'error');
			     });				  
				 
			  } else {
				swal("<?=$this->lang('cancelled')?>!");
			  }
       });
	  });
	  </script>	 
	  
	  <script>
	  $(document).on('click', '#delete_customer', function (e) {
        e.preventDefault();
				  var id = $(this).data('id');
				  
		swal({
		  title: "<?=$this->lang('delete_this_record')?>?",
		  text: "<?=$this->lang('click_yes_delete')?>.",
		  icon: "warning",
		  buttons: ["Cancel!", "Yes!"],
		  dangerMode: true,
		}).then((willDelete) => {
			  if (willDelete) {    
				  
			     $.ajax({
			   		url: '<?=$this->siteUrl()?>/requests/delete_customer',
			    	type: 'GET',
			       	data: 'id='+$(this).data('id'),
			       	dataType: 'json'
			     })
			     .done(function(response){
				console.log(response);
			     	swal('<?=$this->lang('deleted')?>!', response.message, response.status);
				    $('#tr-customer'+id).fadeOut(500, function() { $('#comment'+id).remove(); });
			     })
			     .fail(function(){
					 console.log(response);
			     	swal('<?=$this->lang('oops')?>...', '<?=$this->lang('something_went_wrong')?>!', 'error');
			     });				  
				 
			  } else {
				swal("<?=$this->lang('cancelled')?>!");
			  }
       });
	  });
	  </script>	 
	  
	  <script>
	  $(document).on('click', '#delete_team', function (e) {
        e.preventDefault();
				  var id = $(this).data('id');
				  
		swal({
		  title: "<?=$this->lang('delete_this_record')?>?",
		  text: "<?=$this->lang('click_yes_delete')?>.",
		  icon: "warning",
		  buttons: ["Cancel!", "Yes!"],
		  dangerMode: true,
		}).then((willDelete) => {
			  if (willDelete) {    
				  
			     $.ajax({
			   		url: '<?=$this->siteUrl()?>/requests/delete_team',
			    	type: 'GET',
			       	data: 'id='+$(this).data('id'),
			       	dataType: 'json'
			     })
			     .done(function(response){
				console.log(response);
			     	swal('<?=$this->lang('deleted')?>!', response.message, response.status);
				    $('#tr-team'+id).fadeOut(500, function() { $('#comment'+id).remove(); });
			     })
			     .fail(function(){
					 console.log(response);
			     	swal('<?=$this->lang('oops')?>...', '<?=$this->lang('something_went_wrong')?>!', 'error');
			     });				  
				 
			  } else {
				swal("<?=$this->lang('cancelled')?>!");
			  }
       });
	  });
	  </script>	  