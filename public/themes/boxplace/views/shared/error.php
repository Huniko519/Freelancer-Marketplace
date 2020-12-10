<?php
defined('FIR') OR exit();
/**
 * The template for displaying the success, info and error messages
 */
?>


<div class="alert alert-danger fade in">
<a href="#" class="close" data-dismiss="alert">&times;</a>
<strong>Error!</strong> <?=e($data['error']['content'])?>
</div>