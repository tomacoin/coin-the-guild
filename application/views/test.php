<!DOCTYPE html>
<html lang="en">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <title><?php echo (isset($title)) ? $title : "My CI Site" ?> </title>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/foundation.css" />
</head>
<body>
<div id="wrapper">

<?php if( $this->session->userdata('username') ): ?>
<div class="content">
<h2>Logged in as <?php echo $this->session->userdata('username'); ?></h2>
<h4><?php echo anchor('test/logout', 'Logout'); ?></h4>
</div>
<?php endif; ?>


<div id="content">
<div class="signup_wrap">
<div class="signin_form">
<?php echo form_open("test/login"); ?>
<label for="username">Username:</label>
<input type="text" id="username" name="username" value="" />
<label for="password">Password:</label>
<input type="password" id="password" name="password" value="" />
<input type="submit" class="" value="Sign in" />
<?php echo form_close(); ?>
</div>
</div>
<div class="reg_form">
<div class="form_title">Sign Up</div>
<div class="form_sub_title">It's free and anyone can join</div>
<?php echo validation_errors('<p class="error">'); ?>
<?php echo form_open("test/register"); ?>
<p>
<label for="username">User Name:</label>
<input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>" />
</p>
<p>
<label for="email">Your Email:</label>
<input type="text" id="email" name="email" value="<?php echo set_value('email'); ?>" />
</p>
<p>
<label for="password">Password:</label>
<input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" />
</p>
<p>
<label for="password2">Confirm Password:</label>
<input type="password" id="password2" name="password2" value="<?php echo set_value('password2'); ?>" />
</p>
<p>
<input type="submit" class="greenButton" value="Submit" />
</p>
<?php echo form_close(); ?>
</div>
</div>










 <div id="footer">
  &copy; 2011 <a href="http://tutsforweb.blogspot.com/">TutforWeb</a> All Rights Reserved.
 </div><!-- <div class="footer">-->
 </div><!--<div id="wrapper">-->
</body>
</html>