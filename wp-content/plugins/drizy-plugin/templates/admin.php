<div class="wrap">

	<h1>Drizy Plugin</h1>

	<?php settings_errors(); ?>
	
	<ul class="nav nav-tabs">
		<li class="active"><a href="#settings">Settings</a></li>
		<li><a href="#updates">Updates</a></li>
		<li><a href="#about">Abouut</a></li>
	</ul>

	<section class="tab-content">
		<div id="settings" class="tab-pane active">
			<form method="post" action="options.php">

				<?php 
					settings_fields( 'drizy_options_group' );
					do_settings_sections( 'drizy_plugin' );
					submit_button();
				?>
			</form>
		</div>
		<div id="updates" class="tab-pane">
			<h3>Updates</h3>
		</div>
		<div id="about" class="tab-pane">
			<h3>About</h3>
		</div>
	</section>

	
</div>
