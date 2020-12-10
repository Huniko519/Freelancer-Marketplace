<?php
defined('FIR') OR exit();
/**
 * The template for displaying the Search Requests
 */
?>
<?php if($data['currency']): ?>
    <?php foreach($data['currency'] as $result): ?>
        <div class="search-list-item">
            <p><?=$result['currency_code']?></p>
        </div>
    <?php endforeach ?>
<?php else: ?>
    <div class="search-list-item">
        <p>No Results</p>
    </div>
<?php endif ?>