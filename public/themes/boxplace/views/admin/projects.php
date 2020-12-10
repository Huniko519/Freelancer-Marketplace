
	 	
	 	  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2><?=$this->lang('projects')?></h2>
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
					   <th><?=$this->lang('title')?></th>
					   <th><?=$this->client_name()?></th>
					   <th><?=$this->lang('budget')?></th>
					   <th><?=$this->lang('complete')?></th>
					   <th><?=$this->lang('date_posted')?></th>
					   <th><?=$this->lang('action')?></th>
                      </tr>
                    </thead>
                    <tbody>
				    <?php
						foreach($data['projects'] as $row) {
	
					    echo '<tr id="tr'.e($row["id"]).'">';
					    echo '<td><a href="'. $this->siteUrl().'/project/'. e($row["projectid"]) .'/'. e($row["slug"]) .'" target="_blank">'. e($row["title"]) .'</span></td>';
						
					foreach($data["users"] as $r1){	
					  if($row["userid"] == $r1["userid"]):	
					    echo '<td><img src="'. $this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH .'/admin/users/'. e($r1["imagelocation"]) .'" width="50" height="30" />'. e($r1["name"]) .'</td>';
					  endif;	
					} 
					
					    echo '<td>'. e($this->currency) .''. e($row["budget"]) .'</td>';
						
					    if (e($row["complete"]) == 0) :
					    echo '<td><span class="label label-success"> '. $this->lang('in_complete') .'</span> </td>';
						elseif(e($row["complete"]) == 1):
					    echo '<td><span class="label label-success"> '. $this->lang('complete') .'</span> </td>';
						endif;
						
					    echo '<td>'. e(strftime("%b %d, %Y, %H : %M %p ", strtotime($row['date_added']))) .'</td>';
					    echo '<td>
					      <a href="'. $this->siteUrl() .'/admin/projects/edit/' . e($row["id"]) . '" class="btn btn-success btn-xs" data-toggle="tooltip" title="'. $this->lang('edit') .'"><span class="fa fa-edit"></span></a>
					      <a id="delete_project" data-id="' . e($row["id"]) . '" class="btn btn-danger btn-xs" data-toggle="tooltip" title="'. $this->lang('delete') .'"><span class="fa fa-trash"></span></a>
						  
                          </td>';
					    echo '</tr>';
					   }
			        ?>
                    </tbody>
                    <tfoot>
                      <tr>
					   <th><?=$this->lang('title')?></th>
					   <th><?=$this->client_name()?></th>
					   <th><?=$this->lang('budget')?></th>
					   <th><?=$this->lang('complete')?></th>
					   <th><?=$this->lang('date_posted')?></th>
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


	  
       <!-- Delete Project -->

	  <script>
	  $(document).on('click', '#delete_project', function (e) {
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
			   		url: '<?=$this->siteUrl()?>/requests/delete_project',
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
