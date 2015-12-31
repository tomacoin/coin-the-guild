<?php
$uid = $this->session->userdata('uid');
$username = $this->session->userdata('username');
$guild = $this->gm->get_name( 1 );
$is_member = $this->gm->is_member( 1, $uid );
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Foundation | Welcome</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation-icons/foundation-icons.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <script src="<?php echo base_url(); ?>js/vendor/modernizr.js"></script>
    </head>
    <body> 

    <?php include( 'topbar.php' ); ?>
    <div class="admin-nav icon-bar vertical four-up">
      <a href="<?php echo base_url(); ?>admin" class="item">
        <i class="fa fa-home"></i>
        <label>Home</label>
      </a>
      <a href="<?php echo base_url(); ?>admin/users" class="item">
        <i class="fa fa-user"></i>
        <label>Users</label>
      </a>
      <a href="<?php echo base_url(); ?>admin/layout" class="item">
        <i class="fa fa-picture-o"></i>
        <label>Layout</label>
      </a>
      <a href="<?php echo base_url(); ?>admin/settings" class="item">
        <i class="fa fa-cog"></i>
        <label>Settings</label>
      </a>
    </div>
