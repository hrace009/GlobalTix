<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://youtube.com/hrace009
 * @since      1.0.0
 *
 * @package    Globaltix
 * @subpackage Globaltix/admin/partials
 */

settings_errors();
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h1><?php echo __('Globaltix', 'globaltix') ?></h1>
	<?php echo __('This setting for API Authentication', 'globaltix'); ?>
    <div id="poststuff">
        <form action='options.php' method='post'>
			<?php
			settings_fields('globaltix_settings_pluginPage');
			do_settings_sections('globaltix_settings_pluginPage');
			submit_button(__('Save', 'globaltix'));
			?>
        </form>
    </div>
</div>