
	 	
	 	  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2><?=$this->lang('currency_settings')?></h2>
        </section>

        <!-- Main content -->
        <section class="content">	 	
		 <div class="row">	
		 

		 	
		 <div class="col-lg-12">
		  
	       <?=$this->message()?>
	       <?=$this->validation()?>
		   
          </div>	
           
          <div class="col-lg-4">
          	<?php $default = ($data['m'] == 'default') ? ' active' : ''; ?>
          	<?php $currency = ($data['m'] == 'currency') ? ' active' : ''; ?>
	         <div class="list-group">
	         <a href="<?=$this->siteUrl()?>/admin/currency_settings/default" class="list-group-item<?php echo e($default); ?>">
	          <em class="fa fa-fw fa-usd text-white"></em>&nbsp;&nbsp;&nbsp; <?=$this->lang('select_default_currency')?>
			 </a>
	         <a href="<?=$this->siteUrl()?>/admin/currency_settings/currency" class="list-group-item<?php echo e($currency); ?>">
	          <em class="fa fa-fw fa-sheqel text-white"></em>&nbsp;&nbsp;&nbsp; <?=$this->lang('add_currency')?>
			 </a>
			 
	         </div>
          </div>
          
		 <div class="col-lg-8">
		 <?php if ($data['m'] == 'default') : ?>
		 
		 <!-- Input addon -->
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?=$this->lang('select_default_currency')?></h3>
                </div>
                <div class="box-body">
                 <form role="form" action="<?=$this->siteUrl()?>/admin/currency_settings" method="post"> 
                  
                  <div class="form-group">	
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil-square"></i></span>
					<select name="currency_select" type="text" class="form-control">
						<?php foreach($data['currency'] as $row): ?>
							<option value="<?=e($row['id'])?>" <?=(e($row['id']) == e($data['settings']['currency']) ? ' selected' : '')?>><?=e($row['currency_symbol'])?> - <?=e($row['currency_name'])?></option>
						<?php endforeach ?>
					</select>
                   </div>
                  </div>
                                   
                  <div class="box-footer">
                    <?=$this->token()?>
                    <button type="submit" name="currency_submit" class="kafe-btn kafe-btn-mint-small full-width"><?=$this->lang('submit')?></button>
                  </div>
                 </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->	
			  
		 <?php elseif ($data['m'] == 'currency') : ?>
		 			 		
		 		
	  		 <div class="box box-info">
	        <div class="box-header">
	          <a href="#addcurrency" class="btn btn-success btn-lg" data-toggle="modal"><?=$this->lang('add_currency')?></a>
	        </div><!-- /.box-header -->
	      </div><!-- /.box -->	
	      
	      <!-- Modal HTML -->
	      <div id="addcurrency" class="modal fade">
	       <div class="modal-dialog">
	        <div class="modal-content">
	         <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	          <h4 class="modal-title"><?=$this->lang('add_currency')?></h4>
	         </div>
	         <div class="modal-body">
              <form role="form" action="<?=$this->siteUrl()?>/admin/currency_settings" method="post"> 
              	
              <div class="form-group">	
			    <label><?=$this->lang('currency_code')?></label>
                <input type="text" name="currency_code" class="form-control" placeholder="e.g USD"/>
              </div>     
               
              <div class="form-group">	
			    <label><?=$this->lang('currency_name')?></label>
                <input type="text" name="currency_name" class="form-control" placeholder="e.g Mexican Peso"/>
              </div>      
               
              <div class="form-group">	
			    <label><?=$this->lang('currency_symbol')?></label>
                <input type="text" name="currency_symbol" class="form-control" placeholder="e.g $"/>
              </div> 
	         
             <div class="modal-footer">
                    <?=$this->token()?>
              <button type="button" class="btn btn-default" data-dismiss="modal"><?=$this->lang('close')?></button>
              <button type="submit" name="postcurrency" class="btn btn-success"><?=$this->lang('submit')?></button>
             </div>
             
             </div>
             </form> 
             
	        </div>
	       </div>
	      </div>		 		


		 		<div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?=$this->lang('currency_list')?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					   <th><?=$this->lang('code')?></th>
					   <th><?=$this->lang('name')?></th>
					   <th><?=$this->lang('symbol')?></th>
					   <th><?=$this->lang('action')?></th>
                      </tr>
                    </thead>
                    <tbody>
				    <?php
						foreach($data['currency'] as $row) {
	
					    echo '<tr id="tr'.e($row["id"]).'">';
					    echo '<td>'. e($row["currency_code"]) .'</td>';
					    echo '<td>'. e($row["currency_name"]) .'</td>';
					    echo '<td>'. e($row["currency_symbol"]) .'</td>';
					    echo '<td>
					      <a href="'. $this->siteUrl() .'/admin/currency_settings/edit/' . e($row["id"]) . '" class="btn btn-success btn-xs" data-toggle="tooltip" title="'. $this->lang('edit') .'"><span class="fa fa-edit"></span></a>
					      <a id="delete_currency" data-id="' . e($row["id"]) . '" class="btn btn-danger btn-xs" data-toggle="tooltip" title="'. $this->lang('delete') .'"><span class="fa fa-trash"></span></a>					  
						  
                          </td>';
					    echo '</tr>';
					   }
			        ?>
                    </tbody>
                    <tfoot>
                      <tr>
					   <th><?=$this->lang('code')?></th>
					   <th><?=$this->lang('name')?></th>
					   <th><?=$this->lang('symbol')?></th>
					   <th><?=$this->lang('action')?></th>
                      </tr>
                    </tfoot>
                  </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
	    			 
		 <?php endif; ?>
		 
		</div><!-- /.col -->		  
		
        
			 
	    </div><!-- /.row -->		  		  
	   </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


 	 
	  <script>
	  $(document).on('click', '#delete_currency', function (e) {
        e.preventDefault();
				  var postID = $(this).data('id');
                  console.log(postID);
				  
		          var searchInput = $('#delete_currency');
				  var id = searchInput.data('id');
                  console.log(id);
		swal({
		  title: "<?=$this->lang('delete_this_record')?>?",
		  text: "<?=$this->lang('click_yes_delete')?>.",
		  icon: "warning",
		  buttons: ["Cancel!", "Yes!"],
		  dangerMode: true,
		}).then((willDelete) => {
			  if (willDelete) {    
				  
			     $.ajax({
			   		url: '<?=$this->siteUrl()?>/requests/deletecurrency',
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
	    
