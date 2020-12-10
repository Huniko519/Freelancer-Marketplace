
	 	
	 	  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2><?=$this->lang('funds')?></h2>
        </section>

        <!-- Main content -->
        <section class="content">	 	
		 <div class="row">	
          
		 <div class="col-lg-12">	 		


		 		<div class="box box-info">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
                 <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					   <th><?=$this->lang('amount')?></th>
					   <th><?=$this->client_name()?></th>
					   <th><?=$this->lang('type')?></th>
					   <th><?=$this->lang('transaction_fee')?></th>
					   <th><?=$this->lang('complete')?></th>
					   <th><?=$this->lang('date_added')?></th>
                      </tr>
                    </thead>
                    <tbody>
				    <?php
						foreach($data['funds'] as $row) {
	
					    echo '<tr id="tr'.e($row["id"]).'">';
					
					    echo '<td><span class="budget">'. e($this->currency) .''. e($row["amount"]) .'</span></td>';
						
					foreach($data["users"] as $r1){	
					  if($row["clientid"] == $r1["userid"]):	
					    echo '<td><img src="'. $this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH .'/admin/users/'. e($r1["imagelocation"]) .'" width="50" height="30" />'. e($r1["name"]) .'</td>';
					  endif;	
					} 
					if (e($row["type"]) == "Bank Transfer") :
					    echo '<td>'. e($row["type"]) .', Payment Transaction ID - '. e($row["paymentid"]) .'</td>';
					else:
					    echo '<td>'. e($row["type"]) .'</td>';
                    endif;					
					    echo '<td><span class="budget">'. e($this->currency) .''. e($row["transaction_fee"]) .'</span></td>';
						
					    if (e($row["type"]) == "Bank Transfer") :
						
							if (e($row["complete"]) == 1) :
							echo '<td><span class="label label-success">'. $this->lang('complete') .'</span> </td>';
							elseif(e($row["complete"]) == 2):
							echo '<td><span class="label label-success">'. $this->lang('declined') .' </span> </td>';
							elseif(e($row["complete"]) == 0):
							
					    echo '<td>
					      <a id="complete" data-id="' . e($row["id"]) . '" class="btn btn-success btn-xs" data-toggle="tooltip" title="'. $this->lang('complete') .'"><span class="fa fa-check"></span></a>
					      <a id="in_complete" data-id="' . e($row["id"]) . '" class="btn btn-danger btn-xs" data-toggle="tooltip" title="'. $this->lang('in_complete') .'"><span class="fa fa-times"></span></
					      </td>';
						  
							endif;
						
						
						else:
						
							if (e($row["complete"]) == 1) :
							echo '<td><span class="label label-success">'. $this->lang('complete') .'</span> </td>';
							elseif(e($row["complete"]) == 0):
							echo '<td><span class="label label-success">'. $this->lang('in_complete') .' </span> </td>';
							endif;
						
						endif;
						
					    echo '<td>'. e(strftime("%b %d, %Y, %H : %M %p ", strtotime($row['date_added']))) .'</td>';
					    echo '</tr>';
					   }
			        ?>
                    </tbody>
                    <tfoot>
                      <tr>
					   <th><?=$this->lang('amount')?></th>
					   <th><?=$this->client_name()?></th>
					   <th><?=$this->lang('type')?></th>
					   <th><?=$this->lang('transaction_fee')?></th>
					   <th><?=$this->lang('complete')?></th>
					   <th><?=$this->lang('date_added')?></th>
                      </tr>
                    </tfoot>
                  </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  
          </div>
        
			 
	    </div><!-- /.row -->		  		  
	   </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	  


	  <script>
	  $(document).on('click', '#complete', function (e) {
        e.preventDefault();
				  var id = $(this).data('id');
				  
		swal({
		  title: "<?=$this->lang('complete_this_bank_transfer')?>?",
		  text: "<?=$this->lang('click_yes_complete')?>.",
		  icon: "warning",
		  buttons: ["Cancel!", "Yes!"],
		  dangerMode: true,
		}).then((willDelete) => {
			  if (willDelete) {    
				  
			     $.ajax({
			   		url: '<?=$this->siteUrl()?>/requests/complete_bank',
			    	type: 'GET',
			       	data: 'id='+$(this).data('id'),
			       	dataType: 'json'
			     })
			     .done(function(response){
				console.log(response);
			     	swal('<?=$this->lang('completed')?>!', response.message, response.status);
				        setTimeout(function(){
							location.reload();
						}, 500)
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
	  $(document).on('click', '#in_complete', function (e) {
        e.preventDefault();
				  var id = $(this).data('id');
				  
		swal({
		  title: "<?=$this->lang('in_complete_this_bank_transfer')?>?",
		  text: "<?=$this->lang('click_yes_in_complete')?>.",
		  icon: "warning",
		  buttons: ["Cancel!", "Yes!"],
		  dangerMode: true,
		}).then((willDelete) => {
			  if (willDelete) {    
				  
			     $.ajax({
			   		url: '<?=$this->siteUrl()?>/requests/in_complete_bank',
			    	type: 'GET',
			       	data: 'id='+$(this).data('id'),
			       	dataType: 'json'
			     })
			     .done(function(response){
				console.log(response);
			     	swal('<?=$this->lang('declined')?>!', response.message, response.status);
				        setTimeout(function(){
							location.reload();
						}, 500)
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

