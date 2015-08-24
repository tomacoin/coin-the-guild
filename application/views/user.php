<?php include( 'header.php' ); ?>
            <div class="row">
                <div class="large-12 columns">
                    <div class="row">
                        <div class="large-12 small-12 columns">
                            <h4>Account Settings</h4><hr>
                            <?php if( $this->session->userdata('username') ): ?>
                              <?php echo form_open(""); ?>
                                    <?php echo validation_errors('<p class="error">'); ?>
                                    <?php echo $this->upload->display_errors('<p class="error">', '</p>'); ?>
                                    <label>Username</label>
                                    <?php echo $username; ?>
                                    <label>Profile Image</label>
                                    <input type="file" name="avatar" size="20" />
                                    <label>Motto</label>
                                    <input type="text" value="<?php echo $motto; ?>" placeholder="Thread Title" name="motto" id="motto" />
                                    <label>Location</label>
                                    <input type="text" value="<?php echo $location; ?>" placeholder="Thread Title" name="location" id="location" />
                                    <label>Email</label>
                                    <input type="text" value="<?php echo $email; ?>" placeholder="Thread Title" name="email" id="email" />
                                    <textarea name="content" id="content" rows="12"></textarea>
                                    <input class="button secondary" type="submit" value="Save">
                              <?php echo form_close(); ?>
                            <?php else: ?>
                                <p>You must be logged in to edit your account.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

<?php include( 'footer.php' ); ?>