
	 	
	 	  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2><?=$this->lang('escrow_payments')?></h2>
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
					   <th><?=$this->lang('amount_in_escrow')?></th>
					   <th><?=$this->client_name()?></th>
					   <th><?=$this->freelancer_name()?></th>
					   <th><?=$this->lang('action')?></th>
					   <th><?=$this->lang('date_added')?></th>
                      </tr>
                    </thead>
                    <tbody>
				    <?php
						foreach($data['escrow'] as $row) {
	
					    echo '<tr id="tr'.e($row["id"]).'">';
					
					    echo '<td><span class="budget">'. e($this->currency) .''. e($row["budget"]) .'</span></td>';
						
					foreach($data["users"] as $r1){	
					  if($row["clientid"] == $r1["userid"]):	
					    echo '<td><img src="'. $this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH .'/admin/users/'. e($r1["imagelocation"]) .'" width="50" height="30" />'. e($r1["name"]) .'</td>';
					  endif;	
					} 
					
					foreach($data["users"] as $r1){	
					  if($row["freelancerid"] == $r1["userid"]):	
					    echo '<td><img src="'. $this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH .'/admin/users/'. e($r1["imagelocation"]) .'" width="50" height="30" />'. e($r1["name"]) .'</td>';
					  endif;	
					} 
					    if (e($row["action"]) == 1) :
					    echo '<td><span class="label label-success">'. $this->lang('money_in_escrow') .'</span> </td>';
						elseif(e($row["action"]) == 2):
					    echo '<td><span class="label label-success">'. $this->lang('money_released_to') .'  '. $this->freelancer_name() .'</span> </td>';
						elseif(e($row["action"]) == 3):
					    echo '<td><span class="label label-success">'. $this->lang('money_in_dispute') .'</span> </td>';
						elseif(e($row["action"]) == 4):
					    echo '<td><span class="label label-success">'. $this->lang('money_returned_to') .' '. $this->client_name() .'</span> </td>';
						endif;
						
					    echo '<td>'. e(strftime("%b %d, %Y, %H : %M %p ", strtotime($row['date_added']))) .'</td>';
					    echo '</tr>';
					   }
			        ?>
                    </tbody>
                    <tfoot>
                      <tr>
					   <th><?=$this->lang('amount_in_escrow')?></th>
					   <th><?=$this->client_name()?></th>
					   <th><?=$this->freelancer_name()?></th>
					   <th><?=$this->lang('action')?></th>
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

