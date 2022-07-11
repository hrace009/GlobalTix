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
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_<?php printf($item->id) ?>">
                    <?php printf( __('Details', 'globaltix') ) ?>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modal_<?php printf($item->id) ?>" tabindex="-1" role="dialog" aria-labelledby="modal_<?php printf($item->id) ?>Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal_<?php printf($item->id) ?>Label"><?php printf($item->name) ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>
		                                    <?php printf( __('Name', 'globaltix') ) ?>
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
		                                    <?php printf($item->name) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
		                                    <?php printf( __('Country', 'globaltix') ) ?>
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
		                                    <?php printf($item->country) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
		                                    <?php printf( __('Price', 'globaltix') ) ?>
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
	                                        <?php printf($item->currency) ?> <?php printf( number_format( $item->originalPrice, 2, '.', ',' ) ) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
		                                    <?php printf( __('City', 'globaltix') ) ?>
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
		                                    <?php printf($item->city) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
		                                    <?php printf( __('Category', 'globaltix') ) ?>
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
		                                    <?php printf($item->category) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
		                                    <?php printf( __('Merchant', 'globaltix') ) ?>
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
		                                    <?php printf($item->merchant->name) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
		                                    <?php printf( __('Instant Confirm', 'globaltix') ) ?>
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
		                                    <?php
                                            if ( $item->isInstantConfirmation === true) {
	                                            printf( __('True', 'globaltix') );
		                                    }
                                            else {
	                                            printf( __('False', 'globaltix') );
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php printf( __('Close', 'globaltix') ) ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
?>
</div>