<?php
defined('FIR') OR exit();
/**
 * The template for displaying Home page content
 */
?>
	  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
	  

        <!-- Main content -->
        <section class="content">
		  

			<div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3"><?=$this->lang('overview')?></h4>
							
                            <div class="row">
							
                                <div class="col-lg-4">
                                    <div class="card widget-flat">
                                        <div class="card-body">
                                            <div class="float-right"><i class="fe fe-activity widget-icon"></i></div>
                                            <h5> <?=$this->lang('projects')?></h5>
                                            <h3>
												<?=e($data['count_projects'])?>
											</h3>
                                            <p class="mb-0 text-muted"><span class="text-nowrap"><?=$this->lang('total_number_of_projects')?> <?=$this->client_name_plural()?>.</span></p>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->
							
                                <div class="col-lg-4">
                                    <div class="card widget-flat">
                                        <div class="card-body">
                                            <div class="float-right"><i class="fe fe-users widget-icon"></i></div>
                                            <h5><?=$this->freelancer_name_plural()?></h5>
                                            <h3>
												<?=e($data['count_freelancers'])?>
											</h3>
                                            <p class="mb-0 text-muted"><span class="text-nowrap"><?=$this->lang('total_number_of')?> <?=$this->freelancer_name_plural()?></span></p>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->
							
                                <div class="col-lg-4">
                                    <div class="card widget-flat">
                                        <div class="card-body">
                                            <div class="float-right"><i class="fe fe-users widget-icon"></i></div>
                                            <h5> <?=$this->client_name_plural()?></h5>
                                            <h3>
												<?=e($data['count_clients'])?>
											</h3>
                                            <p class="mb-0 text-muted"><span class="text-nowrap"><?=$this->lang('total_number_of')?> <?=$this->client_name_plural()?></span></p>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->
							
								
                            </div> <!-- end row -->
							
                            <div class="row">
							
                                <div class="col-lg-4">
                                    <div class="card widget-flat">
                                        <div class="card-body">
                                            <div class="float-right"><i class="fe fe-money widget-icon"></i></div>
                                            <h5> <?=$this->lang('revenue')?></h5>
                                            <h3>
												<?=e($this->currency)?><?=e($data['sum_revenue'])?>
											</h3>
                                            <p class="mb-0 text-muted"><span class="text-nowrap"><?=$this->lang('total_revenue')?> <?=e($this->siteSettings('sitename'))?> <?=$this->lang('has_made')?>.</span></p>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->
							
                                <div class="col-lg-4">
                                    <div class="card widget-flat">
                                        <div class="card-body">
                                            <div class="float-right"><i class="fe fe-paper-plane widget-icon"></i></div>
                                            <h5> <?=$this->lang('payments_paid_to')?> <?=$this->freelancer_name_plural()?></h5>
                                            <h3>
												<?=e($this->currency)?><?=e($data['freelancer_payments'])?>
											</h3>
                                            <p class="mb-0 text-muted"><span class="text-nowrap"><?=$this->lang('total_payments_paid_to')?> <?=$this->freelancer_name_plural()?> <?=$this->lang('by')?> <?=$this->client_name_plural()?></span></p>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->
							
                                <div class="col-lg-4">
                                    <div class="card widget-flat">
                                        <div class="card-body">
                                            <div class="float-right"><i class="fe fe-sync widget-icon"></i></div>
                                            <h5> <?=$this->lang('funds_added_by')?> <?=$this->client_name_plural()?></h5>
                                            <h3>
											    <?=e($this->currency)?><?=e($data['clients_funds'])?>
											</h3>
                                            <p class="mb-0 text-muted"><span class="text-nowrap"><?=$this->lang('total_funds_added_by')?> <?=$this->client_name_plural()?></span></p>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->
							
								
                            </div> <!-- end row -->

							
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>		
		  

			<div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3"><?=$this->lang('themes')?></h4>
							
                            <div class="row">
		 	
		 <div class="col-lg-12">	
		  
	       <?=$this->message()?>
	       <?=$this->validation()?>
		   
          </div>
		  
        <?php foreach($data['themes'] as $theme): ?>
							
                                <div class="col-lg-4">
                                    <div class="card widget-flat">
									    <div class="card-header">
										  <img class="img-responsive" src="<?=$this->siteUrl()?>/<?=$this->publicPath()?>/<?=$this->themePath()?>/<?=e($theme['path'])?>/icon.png" />
										</div>
                                        <div class="card-body">
										<?php if($data['settings']['theme'] == $theme['path']): ?>
                                            <div class="float-right"><i class="fe fe-check widget-icon"></i></div>
										<?php endif; ?>	
                                            <h5> <?=$this->lang('version')?> - <?=e($theme['version'])?></h5>
                                            <h5> <?=$this->lang('bootstrap')?> - <?=e($theme['bootstrap'])?></h5>
                                            <h3><?=e($theme['name'])?></h3>
										<?php if($data['settings']['theme'] != $theme['path']): ?>
                                            <form role="form" method="post" action="<?=$this->siteUrl()?>/admin/dashboard" enctype="multipart/form-data">
												<input type="hidden" name="name" class="form-control" value="<?=e($theme['path'])?>"/>
												<?=$this->token()?>
												<button type="submit" name="post_theme" class="kafe-btn kafe-btn-mint-small"><?=$this->lang('select_theme')?></button>
										    </form> 
										<?php endif; ?>	
											
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->
        <?php endforeach ?>
								
                            </div> <!-- end row -->
							
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>		
			
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->