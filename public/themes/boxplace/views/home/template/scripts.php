<?php
defined('FIR') OR exit();
/**
 * The template for displaying the footer section
 */
?>


	  
       <!-- Get Projects -->

	<script>
	
	$(document).ready(function(){
		var id = null;
		
		filterSearch(id);	
		
	    $('.p_rang').on('change', function() {

		    $('.p_rang').not(this).prop('checked', false); 

			
			var id = $('input:checkbox:checked').val();
			console.log(id);
			filterSearch(id);


			if ($(this).is(":checked")) {

				//unchecked
				$(this).closest('a').addClass('active');

			} else {
				
				//checked
				$(this).closest('a').removeClass('active');
				
			}
			
			$('.p_rang').not(this).closest('a').removeClass('active');

		});		
					
		
		
	});	
	
	function filterSearch(id) {
		$('.p_results').html('<div id="loading">Loading .....</div>');
		
		if (id > 0) {
			var id;
		} else {
			var id = 'all';
 
			<?php if(!isset($this->url[1])){ ?>
				var pg = 1;
			<?php }elseif(is_numeric($this->url[1])){ ?>
				var pg = '<?=$this->url[1]?>';
			<?php } ?>
		}	
		
		
		$.ajax({
			url: '<?=$this->siteUrl()?>/requests/get_projects',
			type: 'GET',
			data: 'id='+id+'&pg='+pg,
			success: function(data) {
				
				$('.p_results #loading').remove();
				
				// Append the new comment to the div id
				$('.p_results').append(data);
			},
			error: function() {
				console.log('Error');
				alert('error');
			}
		});
			
	}
      
	</script>