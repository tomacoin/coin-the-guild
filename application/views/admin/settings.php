<?php include( 'header.php' ); ?>
<div class="row admin-row">
    <div class="large-12 columns">
        <div class="row">
            <div class="large-12 small-12 columns">
                <h4>Settings</h4><hr>
                <p>Change guild settings and the about page.</p>
                <?php if( $this->session->flashdata('success') ): ?>
                    <div data-alert class="alert-box success radius">
                        <?php echo $this->session->flashdata('success') ?>
                        <a href="#" class="close">&times;</a>
                    </div>
                <?php endif; ?>
                <?php if( $this->session->flashdata('alert') ): ?>
                    <div data-alert class="alert-box alert radius">
                        <?php echo $this->session->flashdata('alert') ?>
                        <a href="#" class="close">&times;</a>
                    </div>
                <?php endif; ?>
                <?php echo form_open_multipart(""); ?>
                    <?php echo validation_errors('<p class="error">'); ?>
                    <label>Guild Name</label>
                    <input type="text" value="<?php echo $name; ?>" name="name" id="name" />
                    <label>Guild Description</label>
                    <input type="text" value="<?php echo $description; ?>" name="description" id="description" />
                    <label>Join Info</label>
                    <input type="text" value="<?php echo $join; ?>" name="join" id="join" />
                    <label>About the Guild</label>
                    <textarea placeholder="" name="about" id="about" rows="12"><?php echo $about; ?></textarea>
                    <label>Forum Rules</label>
                    <input type="text" placeholder="Rule 1" value="<?php echo isset( $rules[0] ) ? $rules[0] : ''; ?>" name="rule1" id="rule1" />
                    <input type="text" placeholder="Rule 2" value="<?php echo isset( $rules[1] ) ? $rules[1] : ''; ?>" name="rule2" id="rule2" />
                    <input type="text" placeholder="Rule 3" value="<?php echo isset( $rules[2] ) ? $rules[2] : ''; ?>" name="rule3" id="rule3" />
                    <input type="text" placeholder="Rule 4" value="<?php echo isset( $rules[3] ) ? $rules[3] : ''; ?>" name="rule4" id="rule4" />
                    <input class="button secondary" type="submit" value="Save">
                <?php echo form_close(); ?>
                <br />
            </div>
        </div>
    </div>
</div>
<?php include( 'footer.php' ); ?>