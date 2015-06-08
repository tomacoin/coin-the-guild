<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Foundation | Welcome</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation-icons/foundation-icons.css" />
<script src="<?php echo base_url(); ?>js/vendor/modernizr.js"></script>
</head>
<body> 
<div class="row">
<div class="large-12 columns">
<h3 id="modalTitle">Register</h3>
<p>Register to Syrin and become a member of Guild Name! All fields required.</p>
<?php echo validation_errors('<p class="error">'); ?>
<?php echo form_open("user/register"); ?>
<input type="text" name="username" id="username" class="modal-input" placeholder="Username" />
<input type="text" name="email" id="email" class="modal-input" placeholder="E-mail" />
<input type="text" name="password" id="password" class="modal-input" placeholder="Password" />
<input type="text" name="password2" id="password2" class="modal-input" placeholder="Confirm Password" />
<input type="submit" value="Register" class="button large-12" \>
<?php echo form_close(); ?>
</div>
</div>

<a class="close-reveal-modal" aria-label="Close">&#215;</a>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
document.write('<script src=<?php echo base_url(); ?>js/vendor/' +
('__proto__' in {} ? 'zepto' : 'jquery') +
'.js><\/script>')
</script>
<script src="<?php echo base_url(); ?>js/foundation.min.js"></script>
<script>
$(document).foundation();
</script>   
<div class="reveal-modal-bg" style="display: none;"></div>
</body>
</html>
