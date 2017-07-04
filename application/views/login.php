<?php include( 'header.php' ) ?>

<div class="large-6 large-centered columns login">
	<h3 id="modalTitle">Log In</h3>
	<?php if( !empty( $error ) ): ?>
		<div class="form-error"><?php echo $error ?></div>
	<?php endif ?>
	<?php echo form_open("user/login"); ?>
	<input type="text" name="username" id="username" class="modal-input" placeholder="Username"  value="<?php echo set_value('username') ?>" />
	<input type="password" name="password" id="password" class="modal-input" placeholder="Password" />
	<a href="#">Forgot Password?</a>
	<br /><br />
	<input type="submit" value="Log In" class="button large-12" \>
	<?php echo form_close(); ?>
</div>

<?php include( 'footer.php' ) ?>