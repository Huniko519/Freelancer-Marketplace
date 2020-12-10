<?php
defined('FIR') OR exit();
/**
 * The template for displaying the success, info and error messages
 */
?>


        <?php if($data['message']['type'] == "success"): ?>
          <script>
           $(document).ready(function(){
              swal("Success!", "<?=e($data['message']['content'])?>", "success");
           });
          </script> 
        <?php endif ?>   


        <?php if($data['message']['type'] == "warning"): ?>
          <script>
           $(document).ready(function(){
              swal("Warning!", "<?=e($data['message']['content'])?>", "warning");
           });
          </script> 
        <?php endif ?> 


        <?php if($data['message']['type'] == "error"): ?>
          <script>
           $(document).ready(function(){
              swal("Error!", "<?=e($data['message']['content'])?>", "error");
           });
          </script> 
        <?php endif ?>   		  