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
<?php
foreach ($listItems as $item)
{
	?>
	<div class="container mt-5 mb-5">
		<div class="d-flex justify-content-center row">
			<div class="col-md-10">
				<div class="row p-2 bg-white border rounded">
					<div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="https://i.imgur.com/QpjAiHq.jpg"></div>
					<div class="col-md-6 mt-1">
						<h5><?php printf($item->name)  ?></h5>
						<div class="mt-1 mb-1 spec-1">
                            <span><?php printf($item->merchant->name) ?></span>
                            <span>Category: <?php printf($item->category) ?></span>
                            <span>Best finish<br></span></div>
						<div class="mt-1 mb-1 spec-1"><span>Unique design</span><span class="dot"></span><span>For men</span><span class="dot"></span><span>Casual<br></span></div>
						<p class="text-justify text-truncate para mb-0">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.<br><br></p>
					</div>
					<div class="align-items-center align-content-center col-md-3 border-left mt-1">
						<div class="d-flex flex-row align-items-center">
							<h4 class="mr-1">$13.99</h4><span class="strike-text">$20.99</span>
						</div>
						<h6 class="text-success">Free shipping</h6>
						<div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm" type="button">Details</button><button class="btn btn-outline-primary btn-sm mt-2" type="button">Add to wishlist</button></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}
?>