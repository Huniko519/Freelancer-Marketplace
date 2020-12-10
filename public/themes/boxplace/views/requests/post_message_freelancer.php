<?php
defined('FIR') OR exit();
/**
 * The template for displaying the Search Requests
 */
?>

						 <div class="proposal-box" id="tr<?=e($data['message']["id"])?>">
						  <div class="proposal-img">
						   <div class="proposal-img-inner">
							 <a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>">
							  <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($data['user']['imagelocation'])?>" alt="Profile Picture">
							 </a>
						   </div>
						  </div><!--/ .freelancer-box-img -->	
						  <div class="proposal-details">
						   <div class="proposal-description">
							<a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>">
							<h3 class="<?=($data['user']["verified"] == '1' ? ' verified' : '')?>"><?=e($data['user']["name"])?></h3></a>
							<?php foreach($data['conversation_reply_timeago'] as $key=>$name){
								if($data['message']['id'] == $key){ ?>
								<h5> <?=e($name)?></h5>
							<?php } } ?>
							<p><?=e($data['message']["reply"])?> </p>
						   </div>
						  </div><!--/ .freelancer-box-details -->
						  <div class="proposal-bid">
						   <div class="proposal-bid-inner">
							 <a id="delete_chat" data-id="<?=e($data['message']["id"])?>" class="kafe-btn kafe-btn-red-small"><i class="fa fa-trash"></i> <?=$this->lang('delete')?></a>
						   </div>
						  </div><!--/ .proposal-bid -->
						 </div><!--/ .proposal-box -->	