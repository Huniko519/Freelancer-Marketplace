<?php
defined('FIR') OR exit();
/**
 * The template for displaying Home page menu
 */
?>
  
     <!-- ==============================================
	 Header Section
	 =============================================== -->
	 <header class="how-header" style="background: linear-gradient( rgba(34,34,34,0.6), rgba(34,34,34,0.6) ), url('<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/<?=e($this->theme_details('bg_image_two'))?>') no-repeat center center fixed;">
      <div class="container">
       <div class="row">
	   
        <div class="col-lg-8 col-lg-offset-2">
         <div class="post-heading">
		  <h1><?=$this->lang('search')?>.</h1>
         </div><!-- /.post-heading -->
        </div><!-- /.col-lg-8 -->
		
       </div><!-- /.row -->
	  </div><!-- /.container -->
     </header><!-- /header -->	
	 
	 <!-- ==============================================
	 Themes Section
	 =============================================== -->
	 <section class="themes">
	  <div class="container">
	   
	   <div class="row">
	   
	   <?php foreach($data['search_products'] as $row) { ?>
        
		<div class="wowitembox col-lg-4 col-sm-12">
		 <div class="wowitemboxinner">
		  <div class="card-top">
		   <div class="img-main">
		    <div class="imagearea">
			 <a href="<?=$this->siteUrl()?>/product/<?=e($row['productid'])?>/<?=e($row['slug'])?>" title="<?=e($row['name'])?>">
		      <img src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/products/<?=e($row['imagelocation'])?>" class="" alt="Preview" height="333" width="505">
             </a>			 
			</div>
		   </div><!--/img-main -->
		  </div><!--/card-top -->
		  <div class="card-bottom-main">
		   <div class="notesarea">
		    <div class="row">
		     <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
			  <div class="title">
			   
			    <h2><a href="<?=$this->siteUrl()?>/product/<?=e($row['productid'])?>/<?=e($row['slug'])?>" title="<?=e($row['name'])?>"><?=e($row['name'])?></a></h2>
			   
				<div class="product-tech">
					<?php
                      $technologies = $row['technologies'];
                      $arr=explode(',',$technologies);
					  
					foreach($data['technology_array'] as $key=>$name){
						if(in_array($name['0'],$arr)){ ?>
						
						<img class="img-responsive" src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/technologies/<?=e($name['1'])?>" alt="<?=e($name['0'])?>">
						
					<?php	
						}
					}
					?>  
				</div>			   
			  </div><!--/title -->
			 </div><!--/col-lg-6 -->	
		    </div><!--/row -->	
		   </div><!--/notesarea -->
		   <div class="hr"></div>
		   <div class="pricing">
		    <div class="row">
			 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">	
			  <div class="notesbottom variable">
			   <div class="price"><?=e($this->currency)?><?=e($row['price'])?> <strike><?=e($this->currency)?><?=e($row['old_price'])?></strike></div>
					<?php
					  
					foreach($data['product_transactions'] as $key=>$name){
						if($row['productid'] == $key){ ?>
						 
			              <div class="downloads"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <?=e($name)?> <?=$this->lang('sales')?></div>
						
					<?php	
						}
					}
					?> 
			  </div><!--/notesbottom -->
			 </div><!--/col-lg-6 -->
			 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">		
			  <div class="more pull-right">
			  <?php if($row['price'] === "0"): ?>
					    <a href="<?=$this->siteUrl()?>/freebies/download/<?=e($row['productid'])?>" class="kafe-btn kafe-btn-default-mint"><i class="fa fa-download"></i> <?=$this->lang('download_for_free')?></a>
			  <?php else: ?>
			    <?php if($data['user_isloggedin'] === true): ?>
					<?php if(in_array($row['productid'], $data["transactions"])): ?>
					    <a href="<?=$this->siteUrl()?>/home/download/<?=e($row['productid'])?>" class="kafe-btn kafe-btn-default-mint"><i class="fa fa-download"></i> <?=$this->lang('download')?></a>
					<?php elseif(in_array($row['productid'], $data["cart_ids"])): ?>
					    <a href="<?=$this->siteUrl()?>/home/removecart/<?=e($row['productid'])?>" class="kafe-btn kafe-btn-danger-small"><i class="fa fa-shopping-cart"></i> <?=$this->lang('remove_from_cart')?></a>
				   <?php else: ?>
						<a href="<?=$this->siteUrl()?>/home/cart/<?=e($row['productid'])?>" class="kafe-btn kafe-btn-default-mint"><i class="fa fa-shopping-cart"></i> <?=$this->lang('add_to_cart')?></a>
				   <?php endif;  ?>
			    <?php else: ?>
					<?php if(in_array($row['productid'], $data["cart_ids"])): ?>
					    <a href="<?=$this->siteUrl()?>/home/removecart/<?=e($row['productid'])?>" class="kafe-btn kafe-btn-danger-small"><i class="fa fa-shopping-cart"></i> <?=$this->lang('remove_from_cart')?></a>
				   <?php else: ?>
						<a href="<?=$this->siteUrl()?>/home/cart/<?=e($row['productid'])?>" class="kafe-btn kafe-btn-default-mint"><i class="fa fa-shopping-cart"></i> <?=$this->lang('add_to_cart')?></a>
				   <?php endif;  ?>
			    <?php endif; ?>
			  <?php endif; ?>
			  </div>
			 </div><!--/col-lg-6 -->
            </div><!--/row -->	
		   </div><!--/pricing -->
		   
		  </div><!--/card-bottom-main -->
		 </div><!--/wowitemboxinner -->
		</div><!--/wowitembox -->	  
		
	   <?php } ?>
	  
	   </div><!--/row -->
			
		
	  </div><!--/container -->
	 </section>	 

	 <!-- ==============================================
	 Stats Section
	 =============================================== -->	
     <section class="stats">
      <div class="container">
       <div class="row">
	   
	    <div class="col-lg-3">
         <div class="single-stat">
          <h2><?=e($data['total_products'])?>+</h2>
		  <h4><?=$this->lang('products')?></h4>                
		 </div>		
	    </div><!--/. col-lg-3 -->
	   
	    <div class="col-lg-3">
         <div class="single-stat">
          <h2><?=e($data['total_freebies'])?>+</h2>
		  <h4><?=$this->lang('freebies')?></h4>                
		 </div>		
	    </div><!--/. col-lg-3 -->
	   
	    <div class="col-lg-3">
         <div class="single-stat">
          <h2><?=e($data['total_users'])?>+</h2>
		  <h4><?=$this->lang('users')?></h4>                
		 </div>		
	    </div><!--/. col-lg-3 -->
	   
	    <div class="col-lg-3">
         <div class="single-stat">
          <h2><?=e($data['total_downloads'])?>+</h2>
		  <h4><?=$this->lang('downloads')?></h4>                
		 </div>		
	    </div><!--/. col-lg-3 -->
		
       </div><!--/. row -->
      </div><!-- /.container -->
     </section>	 