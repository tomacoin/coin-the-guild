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
<h3 id="modalTitle">Log In</h3>
<?php echo form_open("user/login"); ?>
<input type="text" name="username" id="username" class="modal-input" placeholder="Username" />
<input type="password" name="password" id="password" class="modal-input" placeholder="Password" />
<a href="#">Forgot Password?</a>
<br /><br />
<input type="submit" value="Log In" class="button large-12" \>
<?php echo form_close(); ?>
</div>
</div>  

<a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>
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
