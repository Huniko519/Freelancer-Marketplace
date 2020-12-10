
	 	
	 	  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2><?=$this->lang('searches')?></h2>
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
					   <th><?=$this->lang('search_term')?></th>
					   <th><?=$this->lang('date')?></th>
                      </tr>
                    </thead>
                    <tbody>
				    <?php
						foreach($data['searches'] as $row) {	
						
						$date_added = strftime("%b %d, %Y, %H : %M %p ", strtotime($row["date_added"]));
						
					    echo '<tr>';
					    echo '<td>'. e($row["search_term"]) .'</td>';
					    echo '<td>'. e($date_added) .'</td>';
					    echo '</tr>';
					   }
			        ?>
                    </tbody>
                    <tfoot>
                      <tr>
					   <th><?=$this->lang('search_term')?></th>
					   <th><?=$this->lang('date')?></th>
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

  
