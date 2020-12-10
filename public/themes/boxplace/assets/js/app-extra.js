$(document).ready(function() {
	"use strict";
	
	/*============================================
	Alert Fade
	==============================================*/	  
	
    $(".alert-danger").fadeIn(1000).delay(5000).fadeOut(1000);
    $(".alert-success").fadeIn(1000).delay(5000).fadeOut(1000);
	
	
	/*============================================
	Select 2
	==============================================*/	
	$('.select2, .select3').select2();
	
	
	/*============================================
	DataTables
	==============================================*/
	$("#example1").dataTable({
	/* No ordering applied by DataTables during initialisation */
	"order": []
	});	
	
	
	/*============================================
	Summernote
	==============================================*/
	$('#summernote, #summernote-1').summernote({
		height: 300,
		toolbar: [
		  ['style', ['bold', 'italic', 'underline', 'clear']],
		  ['misc', ['print']]
		],
		onPaste: function (e) {
			var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
			e.preventDefault();
			document.execCommand('insertText', false, bufferText);
		}		
	});
		

});

