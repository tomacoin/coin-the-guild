<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Guild Setup</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation-icons/foundation-icons.css" />
<script src="<?php echo base_url(); ?>js/vendor/modernizr.js"></script>
</head>
<body>
<br /><br />
<div class="row">
<div class="large-12 columns">
<h1 id="modalTitle">Guild Setup</h1>
<p>Welcome to the guild set up page. Fill in the fields below to get your guild page started.</p>
<?php echo validation_errors('<p class="error">'); ?>
<?php echo form_open("guild/setup"); ?>
<h3>Guild</h3>
<label for="guild_name">Guild Name</label>
<input type="text" name="guild_name" id="guild_name" placeholder="" />
<label for="guild_desc">Guild Description</label>
<input type="text" name="guild_desc" id="guild_desc" placeholder="" />

<h3>Admin</h3>
<label for="username">Admin Username</label>
<input type="text" name="username" id="username" placeholder="" />
<label for="password">Admin Password</label>
<input type="password" name="password" id="password" placeholder="" />
<label for="password2">Admin Password Confirm</label>
<input type="password" name="password2" id="password2" placeholder="" />
<label for="email">Admin Email</label>
<input type="text" name="email" id="email" placeholder="" />
<br /><br />
<input type="submit" value="Create Guild" class="button large-12" \>
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
