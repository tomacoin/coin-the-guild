<?php include( 'header.php' ); ?>

<div class="row">
    <div class="large-12 columns">
        <div class="row">
            <div class="large-8 small-12 columns">
                <h4>New Event</h4><hr>
                <?php if( $this->session->userdata('username') ): ?>
                  <?php echo form_open(""); ?>
                        <label>Event Name</label>
                        <input type="text" placeholder="Event Name" name="name" id="name" value="<?php echo set_value('name') ?>" />
                        <div class="form-error"><?php echo form_error('name') ?></div>
                        <label>Description</label>
                        <textarea placeholder="Event Description" name="desc" id="desc" rows="4" /><?php echo set_value('desc') ?></textarea>
                        <div class="form-error"><?php echo form_error('desc') ?></div>
                        <label>Location</label>
                        <input type="text" placeholder="Location" name="location" id="location" value="<?php echo set_value('location') ?>" />
                        <label>Start Date</label>
                        <input type="text" placeholder="YYYY-MM-DD" name="startdate" id="startdate" value="<?php echo set_value('startdate') ?>" />
                        <div class="form-error"><?php echo form_error('startdate') ?></div>
                        <label>Start Time</label>
                        <input type="text" placeholder="HH:MM" name="starttime" id="starttime" value="<?php echo set_value('starttime') ?>" />
                        <label>End Date</label>
                        <input type="text" placeholder="YYYY-MM-DD" name="enddate" id="enddate" value="<?php echo set_value('enddate') ?>" />
                        <div class="form-error"><?php echo form_error('enddate') ?></div>
                        <label>End Time</label>
                        <input type="text" placeholder="HH:MM" name="endtime" id="endtime" value="<?php echo set_value('endtime') ?>" />
                        <br />
                        <label>Occurence</label>
                        <input type="radio" name="occurence" value="0">One-Time<br>
                        <input type="radio" name="occurence" value="1">Daily<br>
                        <input type="radio" name="occurence" value="7">Weekly<br />
                        <input type="radio" name="occurence" value="30">Monthly<br />
                        <div class="form-error"><?php echo form_error('occurence') ?></div>
                        <br />
                        <input class="button secondary" type="submit" value="Post">                                
                  <?php echo form_close(); ?>
                <?php else: ?>
                    <p>You must be logged in to create an event.</p>
                <?php endif; ?>                
            </div>

            <div class="large-4 small-12 columns"> 
                <h4>Forum Rules</h4><hr>
                <ol>
                  <li>Don't post red pandas</li>
                  <li>This is rule number two</li>
                  <li>The third rule is a good one to follow</li>
                  <li>Perhaps this rule is too strict</li>
                  <li>This is nice</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php include( 'footer.php' ); ?>

</option>
<option