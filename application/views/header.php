<?php
$uid = $this->session->userdata('uid');
$username = $this->session->userdata('username');
$guild = $this->gm->get_name( 1 );
$banner = $this->gm->get_banner( 1 );
$is_member = $this->gm->is_member( 1, $uid );
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $guild ?></title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation-icons/foundation-icons.css" />
        <script src="<?php echo base_url(); ?>js/vendor/modernizr.js"></script>
    </head>
    <body> 

    <?php include( 'topbar.php' ); ?>

    <div class="row">
        <div class="large-12 columns">
            <div class="row">
                <div class="large-12">
                    <img src="<?php echo base_url() . $banner ?>">
                </div>
            </div>
            <div class="row">
                <div class="large-12">
                    <div class="icon-bar five-up">
                        <a href="<?php echo base_url(); ?>" class="item">
                            Home
                          </a>
                          <a href="<?php echo base_url(); ?>events" class="item">
                            Events
                          </a>
                          <a href="<?php echo base_url(); ?>forum" class="item">
                            Forum
                          </a>
                          <a href="<?php echo base_url(); ?>members" class="item">
                            Members
                          </a>
                          <a href="<?php echo base_url(); ?>about" class="item">
                            About
                          </a>
                        </div>

                    </div>
                </div>
            </div>
            <br />