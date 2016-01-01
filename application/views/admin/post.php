<?php include( 'header.php' ); ?>
<div class="row admin-row">
    <div class="large-12 columns">
        <div class="row">
            <div class="large-12 small-12 columns">
                <h4>New Blog Post</h4><hr>
                <p>This post will appear on the home page.</p>
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
				<?php echo form_open(""); ?>                                    
	                <?php echo validation_errors('<p class="error">'); ?>
	                <input type="text" placeholder="Blog Title" name="title" id="title" />
	                <textarea placeholder="Enter Post" name="content" id="content" rows="12"></textarea>
	                <input class="button secondary" type="submit" value="Post">                                
             	 <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<?php include( 'footer.php' ); ?>

