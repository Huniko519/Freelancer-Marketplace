
	 	
	 	  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2><?=$this->lang('transactions')?></h2>
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
					   <th><?=$this->lang('user')?></th>
					   <th><?=$this->lang('price')?></th>
					   <th><?=$this->lang('product')?></th>
					   <th><?=$this->lang('date_paid')?></th>
                      </tr>
                    </thead>
                    <tbody>
				    <?php
						foreach($data['transactions'] as $row) {	
						
						$date_added = strftime("%b %d, %Y, %H : %M %p ", strtotime($row["date_added"]));
						
					    echo '<tr>';
						
					foreach($data["user"] as $r1){	
					  if($row["userid"] == $r1["userid"]):
					    echo '<td><img src="'. $this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH .'/admin/users/'. e($r1["imagelocation"]) .'" width="50" height="30" />'. e($r1["name"]) .'</td>';
					  endif;	
					} 
					    echo '<td>'. e($data["currency_symbol"]) .''. e($row["price_paid"]) .'</td>';
						
					foreach($data["product"] as $r1){	
					  if($row["productid"] == $r1["productid"]):	
					    echo '<td><img src="'. $this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH .'/admin/products/'. e($r1["imagelocation"]) .'" width="50" height="30" />'. e($r1["name"]) .'</td>';
					  endif;	
					} 
					    echo '<td>'. e($date_added) .'</td>';
					
					
					    echo '</tr>';
					   }
			        ?>
                    </tbody>
                    <tfoot>
                      <tr>
					   <th><?=$this->lang('user')?></th>
					   <th><?=$this->lang('price')?></th>
					   <th><?=$this->lang('product')?></th>
					   <th><?=$this->lang('date_paid')?></th>
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

