<?php include( 'header.php' ); ?>
            <div class="row">
                <div class="large-12 columns">
                    <div class="row">
                        <div class="large-8 small-12 columns">
                            <h4>Account Settings</h4><hr>
                            <?php if( $this->session->userdata('username') ): ?>
                              <?php echo form_open_multipart(""); ?>
                                    <?php echo validation_errors('<p class="error">'); ?>
                                    <?php echo $this->upload->display_errors('<p class="error">', '</p>'); ?>
                                    <label>Username</label>
                                    <?php echo $username; ?>
                                    <label>Profile Image</label>
                                    <?php 
                                        if( $avatar ) echo "<img class=\"member-card-pic\" src=\"http://placehold.it/200x200&amp;text=Pic\">"; 
                                        else echo "<img class=\"member-card-pic\" src=\"http://placehold.it/200x200&amp;text=Pic\">";
                                    ?>
                                    <input type="file" name="avatar" size="20" />
                                    <label>Motto</label>
                                    <input type="text" value="<?php echo $motto; ?>" name="motto" id="motto" />
                                    <label>Location</label>
                                    <input type="text" value="<?php echo $location; ?>" name="location" id="location" />
                                    <label>Email</label>
                                    <input type="text" value="<?php echo $email; ?>" name="email" id="email" />
                                    <label>Password</label>
                                    <input type="password" value="" placeholder="New Password" name="password" id="password" />
                                    <label>Password (Confirm)</label>
                                    <input type="password" value="" placeholder="Retype New Password" name="password2" id="password2" />
                                    <input class="button secondary" type="submit" value="Save">
                              <?php echo form_close(); ?>
                            <?php else: ?>
                                <p>You must be logged in to edit your account.</p>
                            <?php endif; ?>
                        </div>
                        <div class="large-4 small-12 columns"> 

                        </div>
                    </div>
                </div>
            </div>

<?php include( 'footer.php' ); ?>