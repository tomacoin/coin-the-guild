<div id="registermodal" class="reveal-modal large-6" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
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
</div>

<div id="loginmodal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <div class="row">
    <div class="large-12 columns">
      <h3 id="modalTitle">Log In</h3>
        <?php echo form_open("user/login"); ?>
        <input type="text" name="username" id="username" class="modal-input" placeholder="Username" />
        <input type="text" name="password" id="password" class="modal-input" placeholder="Password" />
        <a href="#">Forgot Password?</a>
        <br /><br />
        <input type="submit" value="Log In" class="button large-12" \>
        <?php echo form_close(); ?>
    </div>
  </div>  

  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>


    <nav class="top-bar" data-topbar>
        <ul class="title-area">
             
            <li class="name">
                <h1>
                    <a href="/">
                        <?php echo $guild; ?>
                    </a>
                </h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
        </ul>
 
        <section class="top-bar-section">
          <?php if( $this->session->userdata('username') ): ?>
            <ul class="right">
                <?php if( !$is_member ): ?>
                <li><?php echo anchor('guild/join', 'Join', array('class' => 'button')); ?></li>
                <?php else:?>
                <li><img class="top-card-pic" src="<?php echo base_url( 'images/' . $this->session->userdata('avatar') ) ?>"></li>
                <?php endif; ?>
                <li><?php echo anchor('user/settings', $this->session->userdata('username') ); ?></li>
                <?php if( $this->session->userdata('role') == 1 ): ?>
                <li class="divider"></li>
                <li><?php echo anchor('admin', 'Admin'); ?></li>
                <?php endif; ?>
                <li class="divider"></li>
                <li><?php echo anchor('user/logout', 'Logout'); ?></li>
            </ul>
          <?php else: ?>            
            <ul class="right">
                <li class="divider"></li>
                <li><a href="#" data-reveal-id="registermodal">Register</a></li>
                <li class="divider"></li>
                <li><a href="#" data-reveal-id="loginmodal">Log In</a></li>
            </ul>
          <?php endif; ?>
        </section>
    </nav>
