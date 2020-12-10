
	 	
	 	  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2><?=$this->lang('revenues')?></h2>
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
					   <th><?=$this->client_name()?> <?=$this->lang('paid')?></th>
					   <th><?=$this->lang('company_took')?></th>
					   <th><?=$this->freelancer_name()?> <?=$this->lang('got')?></th>
					   <th><?=$this->lang('date_added')?></th>
                      </tr>
                    </thead>
                    <tbody>
				    <?php
						foreach($data['revenues'] as $row) {
	
					    echo '<tr id="tr'.e($row["id"]).'">';
					
					    echo '<td>'. e($this->currency) .''. e($row["client_money"]) .'</td>';
					    echo '<td>'. e($this->currency) .''. e($row["company_money"]) .'</td>';
					    echo '<td>'. e($this->currency) .''. e($row["freelancer_money"]) .'</td>';
						
					    echo '<td>'. e(strftime("%b %d, %Y, %H : %M %p ", strtotime($row['date_added']))) .'</td>';
					    echo '</tr>';
					   }
			        ?>
                    </tbody>
                    <tfoot>
                      <tr>
					   <th><?=$this->client_name()?> <?=$this->lang('paid')?></th>
					   <th><?=$this->lang('company_took')?></th>
					   <th><?=$this->freelancer_name()?> <?=$this->lang('got')?></th>
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
