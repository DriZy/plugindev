<div class="wrap">

	<h1>Drizy Plugin</h1>

	<?php settings_errors(); ?>

	<form method="post" action="options.php">

		<?php 
			settings_fields( 'drizy_options_group' );
			do_settings_sections( 'drizy_plugin' );
			submit_button();
		?>
	</form>
</div>
