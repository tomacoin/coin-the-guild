<?php include( 'header.php' ); ?>
<div class="row admin-row">
    <div class="large-12 columns">
        <div class="row">
            <div class="large-12 small-12 columns">
                <h4>Layout</h4><hr>
                <p>Manage the appearance of the guild page.</p>
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
                        <?php echo $this->upload->display_errors('<p class="error">', '</p>'); ?>
                        <label>Banner Image</label>
                        <img src="<?php echo base_url() . $banner . '?' . time() ?>" class="member-card-pic">
                        <input type="file" name="banner" size="20" />
                        <input class="button secondary" type="submit" value="Save">
                    <?php echo form_close(); ?>
                <br />
            </div>
        </div>
    </div>
</div>
<?php include( 'footer.php' ); ?>