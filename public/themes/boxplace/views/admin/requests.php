
	 	
	 	  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2><?=$this->lang('verification_requests')?></h2>
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
					   <th><?=$this->lang('full_name')?></th>
					   <th><?=$this->lang('phone_number')?></th>
					   <th><?=$this->lang('verified')?></th>
					   <th><?=$this->lang('date_requested')?></th>
					   <th><?=$this->lang('action')?></th>
                      </tr>
                    </thead>
                    <tbody>
				    <?php
						foreach($data['requests'] as $row) {
	
					    echo '<tr id="tr'.e($row["id"]).'">';
						
					foreach($data["users"] as $r1){	
					  if($row["userid"] == $r1["userid"]):	
					    echo '<td><img src="'. $this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH .'/admin/users/'. e($r1["imagelocation"]) .'" width="50" height="30" />'. e($r1["name"]) .'</td>';
					  endif;	
					} 
					
					    echo '<td>'. e($row["number"]) .'</td>';
						
					foreach($data["users"] as $r1){	
					  if($row["userid"] == $r1["userid"]):	
					    if (e($r1["verified"]) == 1) :
					    echo '<td><span class="label label-success">'. $this->lang('verified') .'</span> </td>';
						elseif(e($r1["verified"]) == 2):
					    echo '<td><span class="label label-success">'. $this->lang('verification_declined') .'</span> </td>';
						elseif(e($r1["verified"]) == 3):
					    echo '<td><span class="label label-success">'. $this->lang('awaiting_verification_from_admin') .'</span> </td>';
						endif;
					  endif;	
					}
						
					    echo '<td>'. e(strftime("%b %d, %Y, %H : %M %p ", strtotime($row['date_added']))) .'</td>';
						
					foreach($data["users"] as $r1){	
					  if($row["userid"] == $r1["userid"]):	
						
					    if (e($r1["verified"]) == 1) :
					    echo '<td>
					      <a id="unverify_user" data-id="' . e($r1["id"]) . '" class="btn btn-danger btn-xs" data-toggle="tooltip" title="'. $this->lang('unverify_user') .'"><span class="fa fa-check"></span></a>
					      </td>';
						elseif(e($r1["verified"]) == 2):
					    echo '<td><span class="label label-success">'. $this->lang('verification_declined') .'</span> </td>';
						elseif(e($r1["verified"]) == 3):
					    echo '<td>
					      <a id="verify_user" data-id="' . e($r1["id"]) . '" class="btn btn-success btn-xs" data-toggle="tooltip" title="'. $this->lang('verify_user') .'"><span class="fa fa-check"></span></a>
					      <a id="decline_user" data-id="' . e($r1["id"]) . '" class="btn btn-danger btn-xs" data-toggle="tooltip" title="'. $this->lang('decline_verification') .'"><span class="fa fa-times"></span></
					      </td>';
						endif;
						
					  endif;	
					} 
					    echo '</tr>';
					   }
			        ?>
                    </tbody>
                    <tfoot>
                      <tr>
					   <th><?=$this->lang('full_name')?></th>
					   <th><?=$this->lang('phone_number')?></th>
					   <th><?=$this->lang('verified')?></th>
					   <th><?=$this->lang('date_requested')?></th>
					   <th><?=$this->lang('action')?></th>
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


	  
       <!-- Verify User -->

	  <script>
	  $(document).on('click', '#verify_user', function (e) {
        e.preventDefault();
				  var id = $(this).data('id');
				  
		swal({
		  title: "<?=$this->lang('verify_the_user')?>?",
		  text: "<?=$this->lang('click_yes_verify')?>.",
		  icon: "warning",
		  buttons: ["Cancel!", "Yes!"],
		  dangerMode: true,
		}).then((willDelete) => {
			  if (willDelete) {    
				  
			     $.ajax({
			   		url: '<?=$this->siteUrl()?>/requests/verify_user',
			    	type: 'GET',
			       	data: 'id='+$(this).data('id'),
			       	dataType: 'json'
			     })
			     .done(function(response){
				console.log(response);
			     	swal('<?=$this->lang('verified')?>!', response.message, response.status);
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
	  
       <!-- Decline User -->

	  <script>
	  $(document).on('click', '#decline_user', function (e) {
        e.preventDefault();
				  var id = $(this).data('id');
				  
		swal({
		  title: "<?=$this->lang('decline_verification_the_user')?>?",
		  text: "<?=$this->lang('click_yes_decline')?>.",
		  icon: "warning",
		  buttons: ["Cancel!", "Yes!"],
		  dangerMode: true,
		}).then((willDelete) => {
			  if (willDelete) {    
				  
			     $.ajax({
			   		url: '<?=$this->siteUrl()?>/requests/decline_user',
			    	type: 'GET',
			       	data: 'id='+$(this).data('id'),
			       	dataType: 'json'
			     })
			     .done(function(response){
				console.log(response);
			     	swal('<?=$this->lang('verified')?>!', response.message, response.status);
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
	  
	  
       <!-- Verify User -->

	  <script>
	  $(document).on('click', '#unverify_user', function (e) {
        e.preventDefault();
				  var id = $(this).data('id');
				  
		swal({
		  title: "<?=$this->lang('unverify_the_user')?>?",
		  text: "<?=$this->lang('click_yes_unverify')?>.",
		  icon: "warning",
		  buttons: ["Cancel!", "Yes!"],
		  dangerMode: true,
		}).then((willDelete) => {
			  if (willDelete) {    
				  
			     $.ajax({
			   		url: '<?=$this->siteUrl()?>/requests/unverify_user',
			    	type: 'GET',
			       	data: 'id='+$(this).data('id'),
			       	dataType: 'json'
			     })
			     .done(function(response){
				console.log(response);
			     	swal('<?=$this->lang('verified')?>!', response.message, response.status);
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
