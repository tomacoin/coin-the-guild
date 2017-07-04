<?php include( 'header.php' ) ?>

<div class="large-6 large-centered columns register">
	<h3 id="modalTitle">Register</h3>
	<p>Become a member of <?php echo $guild ?>! All fields are required.</p>
	<?php echo form_open("user/register"); ?>
	<input type="text" name="username" id="username" class="modal-input" placeholder="Username" value="<?php echo set_value('username') ?>" />
	<div class="form-error"><?php echo form_error('username') ?></div>
	<input type="text" name="email" id="email" class="modal-input" placeholder="E-mail" value="<?php echo set_value('email') ?>" />
	<div class="form-error"><?php echo form_error('email') ?></div>
	<input type="password" name="password" id="password" class="modal-input" placeholder="Password" />
	<div class="form-error"><?php echo form_error('password') ?></div>
	<input type="password" name="password2" id="password2" class="modal-input" placeholder="Confirm Password" />
	<div class="form-error"><?php echo form_error('password2') ?></div>
	<input type="submit" value="Register" class="button large-12" \>
	<?php echo form_close(); ?>
</div>

<?php include( 'footer.php' ) ?>