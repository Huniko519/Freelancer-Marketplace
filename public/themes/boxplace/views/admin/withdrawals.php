
	 	
	 	  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2><?=$this->lang('withdrawals')?></h2>
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
					   <th><?=$this->freelancer_name()?></th>
					   <th>PayPal</th>
					   <th><?=$this->lang('amount_to_be_paid')?></th>
					   <th><?=$this->lang('date_to_be_paid')?></th>
					   <th><?=$this->lang('paid')?></th>
					   <th><?=$this->lang('action')?></th>
                      </tr>
                    </thead>
                    <tbody>
				    <?php
						foreach($data['withdrawals'] as $row) {
	
					    echo '<tr id="tr'.e($row["id"]).'">';
						
					foreach($data["users"] as $r1){	
					  if($row["freelancerid"] == $r1["userid"]):	
					    echo '<td><img src="'. $this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH .'/admin/users/'. e($r1["imagelocation"]) .'" width="50" height="30" />'. e($r1["name"]) .'</td>';
					  endif;	
					} 
					
					    echo '<td>'. e($row["paypal_email"]) .'</td>';
					    echo '<td>'. e($this->currency) .''. e($row["freelancer_receive"]) .'</td>';
					    echo '<td>'. e(strftime("%b %d, %Y, %H : %M %p ", strtotime($row['date_to_be_paid']))) .'</td>';
							
					    if (e($row["action"]) == 1) :
					    echo '<td><span class="label label-success">'. $this->lang('waiting_for_payment') .'</span> </td>';
						elseif(e($row["action"]) == 2):
					    echo '<td><span class="label label-success">'. $this->lang('paid') .'</span> </td>';
						endif;
							
							
					    if (e($row["action"]) == 1) :
					    echo '<td>
					      <a id="pay_freelancer" data-id="' . e($row["id"]) . '" class="kafe-btn kafe-btn-red"><span class="fa fa-check"></span> '. $this->lang('have_you_paid') .' '. $this->freelancer_name() .'?</a>
					      </td>';
						elseif(e($row["action"]) == 2):
					    echo '<td><span class="label label-success">'. $this->lang('paid') .' '. $this->lang('on') .' '. e(strftime("%b %d, %Y, %H : %M %p ", strtotime($row['date_paid']))) .'</span> </td>';
						endif;
						
					    echo '</tr>';
					   }
			        ?>
                    </tbody>
                    <tfoot>
                      <tr>
					   <th><?=$this->freelancer_name()?></th>
					   <th>PayPal</th>
					   <th><?=$this->lang('amount_to_be_paid')?></th>
					   <th><?=$this->lang('date_to_be_paid')?></th>
					   <th><?=$this->lang('paid')?></th>
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


	  
       <!-- pay_freelancer -->

	  <script>
	  $(document).on('click', '#pay_freelancer', function (e) {
        e.preventDefault();
				  var id = $(this).data('id');
				  
		swal({
		  title: "<?=$this->lang('have_you_paid')?> <?=$this->freelancer_name()?>?",
		  text: "<?=$this->lang('click_yes_paid')?>.",
		  icon: "warning",
		  buttons: ["Cancel!", "Yes!"],
		  dangerMode: true,
		}).then((willDelete) => {
			  if (willDelete) {    
				  
			     $.ajax({
			   		url: '<?=$this->siteUrl()?>/requests/pay_freelancer',
			    	type: 'GET',
			       	data: 'id='+$(this).data('id'),
			       	dataType: 'json'
			     })
			     .done(function(response){
				console.log(response);
			     	swal('<?=$this->lang('paid')?>!', response.message, response.status);
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
	  