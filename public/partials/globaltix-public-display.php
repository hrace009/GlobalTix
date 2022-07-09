<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://youtube.com/hrace009
 * @since      1.0.0
 *
 * @package    Globaltix
 * @subpackage Globaltix/public/partials
 */

?>
<h1>List Product</h1>
    <div class="tools">
        <div class="search-area">
            <input type="text" id="search" onkeyup="search_globaltix()" placeholder="Search for names..">
        </div>
    </div>
<div class="products products-table">
    <?php
    foreach ($listItems as $item)
    {
        ?>
        <div class="product">
            <div class="product-img">
                <img src="https://loremflickr.com/320/240?random=<?php printf($item->id) ?>">
            </div>
            <div id="product-content" class="product-content">
                <h3>
                    <?php printf($item->name) ?>
                    <small><?php printf($item->merchant->name) ?></small>
                </h3>
                <p class="product-text price">Price: <?php printf($item->currency) ?> <?php printf( number_format( $item->originalPrice, 2, '.', ',' ) ) ?></p>
                <p class="product-text genre">Country: <?php printf($item->country) ?></p>
            </div>
        </div>
    <?php
    }
?>
</div>