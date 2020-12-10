
	 	
	 	  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2><?=$this->lang('disputes_view')?></h2>
        </section>

        <!-- Main content -->
        <section class="content">	 	
		 <div class="row">	
		 
          <div class="col-lg-12">

			
			 <div class="nav-bg">
				<?php $disputes = ($data['m'] == 'view') ? ' active' : ''; ?>
				<?php $messages = ($data['m'] == 'messages') ? ' active' : ''; ?>
				<?php $files = ($data['m'] == 'files') ? ' active' : ''; ?>
			  <div class="sub-tab">
			   <ul class="nav pro-nav-tabs nav-tabs-dashed">
				<li class="<?php echo e($disputes); ?>"><a href="<?=$this->siteUrl()?>/admin/dispute/view/<?=e($data['conversation']['cid'])?>"><?=$this->lang('disputes_conversations')?></a></li>
				<li class="<?php echo e($messages); ?>"><a href="<?=$this->siteUrl()?>/admin/dispute/messages/<?=e($data['conversation']['cid'])?>"><?=$this->lang('messages_conversations')?></a></li>
				<li class="<?php echo e($files); ?>"><a href="<?=$this->siteUrl()?>/admin/dispute/files/<?=e($data['conversation']['cid'])?>"><?=$this->lang('files_uploaded')?></a></li>
			   </ul>
			  </div>		 	
			 </div>	
			 
		 
			<?php if($data['conversation']["action"] === "1"): ?>
				
					 <div class="chat-headline">
					  <h3><?=$this->lang('dispute_closed_and_money_awarded_to')?> <?=$this->freelancer_name()?><h3>
					  <h4>"<?=e($data['project']['title'])?>"<h4>
					 </div>		
			<?php elseif($data['conversation']["action"] === "2"): ?>
				
					 <div class="chat-headline">
					  <h3><?=$this->lang('dispute_closed_and_money_returned_to')?> <?=$this->client_name()?><h3>
					  <h4>"<?=e($data['project']['title'])?>"<h4>
					 </div>		
			<?php elseif($data['conversation']["action"] === "0"): ?>
				
					 <div class="chat-headline">
					  <h3><?=$this->lang('you')?> , <?=$this->freelancer_name()?> <?=$this->lang('and')?> <?=$this->client_name()?></h3>
					  <h4>"<?=e($data['project']['title'])?>"<h4>
					  <div class="chat-btns">
					   <a id="award_freelancer" data-id="<?=e($data['project']['id'])?>" class="kafe-btn kafe-btn-yellow" target="_blank"><?=$this->lang('award_the_money_to')?> <?=$this->freelancer_name()?></a> 
					   <a id="award_client" data-id="<?=e($data['project']['id'])?>" class="kafe-btn kafe-btn-red" target="_blank"><?=$this->lang('return_the_money_to')?> <?=$this->client_name()?></a>  
					  </div>
					 </div>		
			<?php endif; ?>				 
		 
          </div>
          
		 <div class="col-lg-12">
		 <?php if ($data['m'] == 'view') : ?>

		<div class="ratings-box">	
		
		<?php if($data['conversation']["action"] === "0"): ?>
				 
				 <div class="chat-box">
				   <textarea id="md" class="form-control no-border" rows="3" placeholder="Type something..."></textarea>
				  <div class="box-footer clearfix" id="message_btn_<?=e($data['admin']['id'])?>">
					<a onclick="post_dispute(<?=e($data['admin']['id'])?>, <?=e($data['admin']['adminid'])?>, <?=e($data['conversation']['id'])?>)" class="kafe-btn kafe-btn-mint"><?=$this->lang('send_message')?></a>
				  </div>
				 </div>	
		<?php endif; ?>	
	    
		 <div id="messages-list<?=e($data['admin']['id'])?>">
		    <div id="message-list<?=e($data['admin']['id'])?>"></div>
		
		   <?php foreach($data['conversation_reply_pagination'] as $row) { ?>  
			  

			 <div class="proposal-box" id="tr<?=e($row["id"])?>">
			  <div class="proposal-img">
			   <div class="proposal-img-inner">
			 <?php if(e($row["is_admin"]) === "1"): ?>  
				 <a>
				  <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/<?=e($data['admin']['imagelocation'])?>" alt="Profile Picture">
				 </a>
				<h4><?=$this->lang('admin')?></h4>
			 <?php else: ?>  
				<?php foreach($data['users'] as $r1){
				 if($r1['userid'] == $row['user_sending']){ 
				  if($r1['user_type'] == 1):?>
					 <a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
					  <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($r1['imagelocation'])?>" alt="Profile Picture">
					 </a>
				<h4><?=$this->freelancer_name()?></h4>
				 <?php elseif($r1['user_type'] == 2):?>
					 <a href="<?=$this->siteUrl()?>/<?=$this->clients_url()?>/projects/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
					  <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($r1['imagelocation'])?>" alt="Profile Picture">
					 </a>
				<h4><?=$this->client_name()?></h4>
				 <?php endif; ?>
				<?php } }?> 
			 <?php endif; ?>  
			   </div>
			  </div><!--/ .freelancer-box-img -->	
			  <div class="proposal-details">
			   <div class="proposal-description">
			 <?php if(e($row["is_admin"]) === "1"): ?> 
					<a><h3><?=e($data['admin']['name'])?></h3></a>
			 <?php else: ?> 
			   
				<?php foreach($data['users'] as $r1){
				 if($r1['userid'] == $row['user_sending']){ 
				  if($r1['user_type'] == 1):?>
					<a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
					<h3 class="<?=($r1["verified"] == '1' ? ' verified' : '')?>"><?=e($r1["name"])?></h3></a>
				 <?php elseif($r1['user_type'] == 2):?>
					<a href="<?=$this->siteUrl()?>/<?=$this->clients_url()?>/projects/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
					<h3 class="<?=($r1["verified"] == '1' ? ' verified' : '')?>"><?=e($r1["name"])?></h3></a>
				 <?php endif; ?>
				<?php } }?> 
				
			 <?php endif; ?>  
				
				<?php foreach($data['conversation_reply_timeago'] as $key=>$name){
					if($row['id'] == $key){ ?>
					<h5> <?=e($name)?></h5>
				<?php } } ?>
				
				<p><?=e($row["reply"])?> </p>
				
			   </div>
			  </div><!--/ .freelancer-box-details -->
			   <?php if($row["is_admin"] === "1" && $data['conversation']["action"] == 0): ?>
				  <div class="proposal-bid">
				   <div class="proposal-bid-inner">
					 <a id="delete_dispute" data-id="<?=e($row["id"])?>" class="kafe-btn kafe-btn-red-small"><i class="fa fa-trash"></i> <?=$this->lang('delete')?></a>
				   </div>
				  </div><!--/ .proposal-bid -->
			   <?php endif; ?>
			 </div><!--/ .proposal-box -->	
				
			  <?php } ?>	
			
			<?=$data['pagination']?>		
			
         </div>			
		
		</div>		 
		 <?php elseif ($data['m'] == 'messages') : ?>

		<div class="ratings-box">


	    
		 <div id="messages-list<?=e($data['user']['id'])?>">
		    <div id="message-list<?=e($data['user']['id'])?>"></div>
		
		   <?php foreach($data['conversation_reply_pagination'] as $row) { ?>  
			  

			 <div class="proposal-box" id="tr<?=e($row["id"])?>">
			  <div class="proposal-img">
			   <div class="proposal-img-inner">
				<?php foreach($data['users'] as $r1){
				 if($r1['userid'] == $row['user_sending']){ 
				  if($r1['user_type'] == 1):?>
					 <a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
					  <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($r1['imagelocation'])?>" alt="Profile Picture">
					 </a>
				<h4><?=$this->freelancer_name()?></h4>
				 <?php elseif($r1['user_type'] == 2):?>
					 <a href="<?=$this->siteUrl()?>/<?=$this->clients_url()?>/projects/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
					  <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($r1['imagelocation'])?>" alt="Profile Picture">
					 </a>
				<h4><?=$this->client_name()?></h4>
				 <?php endif; ?>
				<?php } }?> 
			   </div>
			  </div><!--/ .freelancer-box-img -->	
			  <div class="proposal-details">
			   <div class="proposal-description">
				<?php foreach($data['users'] as $r1){
				 if($r1['userid'] == $row['user_sending']){ 
				  if($r1['user_type'] == 1):?>
					<a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
					<h3 class="<?=($r1["verified"] == '1' ? ' verified' : '')?>"><?=e($r1["name"])?></h3></a>
				 <?php elseif($r1['user_type'] == 2):?>
					<a href="<?=$this->siteUrl()?>/<?=$this->clients_url()?>/projects/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
					<h3 class="<?=($r1["verified"] == '1' ? ' verified' : '')?>"><?=e($r1["name"])?></h3></a>
				 <?php endif; ?>
				<?php } }?> 
				<?php foreach($data['conversation_reply_timeago'] as $key=>$name){
					if($row['id'] == $key){ ?>
					<h5> <?=e($name)?></h5>
				<?php } } ?>
				<p><?=e($row["reply"])?> </p>
			   </div>
			  </div><!--/ .freelancer-box-details -->
			 </div><!--/ .proposal-box -->	
				
			  <?php } ?>	
			
			<?=$data['pagination']?>		
			
         </div>	
		
		
		</div>	
		 <?php elseif ($data['m'] == 'files') : ?>

		<div class="ratings-box">
		
		   <?php foreach($data['files_pagination'] as $row) { ?>  
			  

			 <div class="proposal-box" id="tr<?=e($row["id"])?>">
			  <div class="proposal-img">
			   <div class="proposal-img-inner">
				<?php foreach($data['users'] as $r1){
				 if($r1['userid'] == $row['user_sending']){ 
				  if($r1['user_type'] == 1):?>
					 <a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
					  <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($r1['imagelocation'])?>" alt="Profile Picture">
					 </a>
				<h4><?=$this->freelancer_name()?></h4>
				 <?php elseif($r1['user_type'] == 2):?>
					 <a href="<?=$this->siteUrl()?>/<?=$this->clients_url()?>/projects/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
					  <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.PUBLIC_PATH.'/'.UPLOADS_PATH?>/admin/users/<?=e($r1['imagelocation'])?>" alt="Profile Picture">
					 </a>
				<h4><?=$this->client_name()?></h4>
				 <?php endif; ?>
				<?php } }?> 
			   </div>
			  </div><!--/ .freelancer-box-img -->	
			  <div class="proposal-details">
			   <div class="proposal-description">
				<?php foreach($data['users'] as $r1){
				 if($r1['userid'] == $row['user_sending']){ 
				  if($r1['user_type'] == 1):?>
					<a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
					<h3 class="<?=($r1["verified"] == '1' ? ' verified' : '')?>"><?=e($r1["name"])?></h3></a>
				 <?php elseif($r1['user_type'] == 2):?>
					<a href="<?=$this->siteUrl()?>/<?=$this->clients_url()?>/projects/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
					<h3 class="<?=($r1["verified"] == '1' ? ' verified' : '')?>"><?=e($r1["name"])?></h3></a>
				 <?php endif; ?>
				<?php } }?> 
				<?php foreach($data['files_timeago'] as $key=>$name){
					if($row['id'] == $key){ ?>
					<h5> <?=e($name)?></h5>
				<?php } } ?>
				<?php foreach($data['files_projects'] as $r2){
				 if($r2['projectid'] == $row['projectid']){ ?>
					<h4><a href="<?=$this->siteUrl()?>/project/<?=e($r2["projectid"])?>/<?=e($r2["slug"])?>" target="_blank"> "<?=e($r2["title"])?>"</a></h4>
				<?php } }?> 
				<p><i class="fa fa-files-o"></i> <?=$this->lang('file_type')?> - <?=e($row["extension"])?> </p>
				<p><i class="fe fe-document"></i> <?=$this->lang('size')?> - <?php echo round(e($row["size"]), 2); ?> KB  </p><br>
			   <?php foreach($data['users'] as $r1){
				 if($r1['userid'] == $row['user_sending']){ 
				  if($r1["user_type"] == 2): ?>
					<a id="delete_file" data-id="<?=e($row["id"])?>" class="kafe-btn kafe-btn-red-small"><i class="fa fa-trash"></i> <?=$this->lang('delete')?></a>
			   <?php endif; ?>
			  <?php } }?> 
			   </div>
			  </div><!--/ .freelancer-box-details -->
				  <div class="proposal-bid">
				   <div class="proposal-bid-inner">
					 <a href="<?=$this->siteUrl()?>/admin/download/<?=e($row["id"])?>" class="kafe-btn kafe-btn-yellow"><i class="fa fa-download"></i> <?=$this->lang('download')?></a>
				   </div>
				  </div><!--/ .proposal-bid -->
			 </div><!--/ .proposal-box -->	
				
			  <?php } ?>
			
			<?=$data['pagination']?>		
		
		</div>	
	    			 
		 <?php endif; ?>
		 
		</div><!-- /.col -->		  
		
        
			 
	    </div><!-- /.row -->		  		  
	   </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

	  
	  
	  
       <!-- Post Dispute -->
	   
    <script>  
	function post_dispute(id, userid, cid) {
		var message = $('#md').val();
		
		$.ajax({
			url: '<?=$this->siteUrl()?>/requests/admin_post_dispute',
			type: 'GET',
			data: "userid="+userid+"&cid="+cid+"&message="+encodeURIComponent(message), 
			success: function(response) {
			
				// Append the new comment to the div id
				$('#message-list'+id).prepend(response);
				
				// Fade In class
				$('.message-reply-container').fadeIn(500);
				
				// Empty the text area
                $("#md").val('');			
			}
		});
	}
	</script> 

	
	
       <!-- Delete dispute -->

	  <script>
	  $(document).on('click', '#delete_dispute', function (e) {
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
			   		url: '<?=$this->siteUrl()?>/requests/delete_dispute',
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
	
	
       <!-- Award the money to Freelancer -->

	  <script>
	  $(document).on('click', '#award_freelancer', function (e) {
        e.preventDefault();
				  var id = $(this).data('id');
				  
		swal({
		  title: "<?=$this->lang('award_the_money_to')?> <?=$this->freelancer_name()?>?",
		  text: "<?=$this->lang('click_yes_award')?>.",
		  icon: "warning",
		  buttons: ["Cancel!", "Yes!"],
		  dangerMode: true,
		}).then((willDelete) => {
			  if (willDelete) {    
				  
			     $.ajax({
			   		url: '<?=$this->siteUrl()?>/requests/award_freelancer',
			    	type: 'GET',
			       	data: 'id='+$(this).data('id'),
			       	dataType: 'json'
			     })
			     .done(function(response){
				console.log(response);
			     	swal('<?=$this->lang('success')?>!', response.message, response.status);
					window.location.href="<?=$this->siteUrl()?>/admin/disputes"; 
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
	
	
       <!-- Award the money to Freelancer -->

	  <script>
	  $(document).on('click', '#award_client', function (e) {
        e.preventDefault();
				  var id = $(this).data('id');
				  
		swal({
		  title: "<?=$this->lang('return_the_money_to')?> <?=$this->client_name()?>?",
		  text: "<?=$this->lang('click_yes_return')?>.",
		  icon: "warning",
		  buttons: ["Cancel!", "Yes!"],
		  dangerMode: true,
		}).then((willDelete) => {
			  if (willDelete) {    
				  
			     $.ajax({
			   		url: '<?=$this->siteUrl()?>/requests/award_client',
			    	type: 'GET',
			       	data: 'id='+$(this).data('id'),
			       	dataType: 'json'
			     })
			     .done(function(response){
				console.log(response);
			     	swal('<?=$this->lang('success')?>!', response.message, response.status);
					window.location.href="<?=$this->siteUrl()?>/admin/disputes"; 
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