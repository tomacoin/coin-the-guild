<?php include( 'header.php' ); ?>
<div class="row admin-row">
    <div class="large-12 columns">
        <div class="row">
            <div class="large-12 small-12 columns">
                <h4>Users</h4><hr>
                <?php if( $this->session->flashdata('kicked') ): ?>
                    <div data-alert class="alert-box success radius">
                        <?php echo $this->session->flashdata('kicked') ?> has been kicked from the guild.
                        <a href="#" class="close">&times;</a>
                    </div>
                <?php endif; ?>
                <table class="large-12 small-12">
                    <thead>
                        <tr>
                            <td width="50"></td>
                            <td>Username</td>
                            <td width="70">Posts</td>
                            <td>Joined</td>
                            <td>Kick</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach( $members as $member ): ?>
                        <tr>
                            <td><img class="top-card-pic" src="<?php echo base_url( 'images/' . $member->avatar ) ?>"></td>
                            <td><?php echo $member->username ?></td>
                            <td><?php echo $member->posts ?></td>
                            <td><?php echo date("d/m/y h:ia", strtotime( $member->joined ) ) ?></td>                            
                            <td><a onclick="kick( '<?php echo $member->username ?>' )"><i class="fa fa-times"></i></a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <br />
            </div>
        </div>
    </div>
</div>
<div id="kick-member" class="reveal-modal" data-reveal>
    <h3>Kick Member</h3>
    <p class="lead">Are you sure you want to kick <b id="kickee"></b> from the guild?</p>
    <a class="close-reveal-modal">&#215;</a>    
    <a href="" id="kick" class="button large-12">Kick</a>
</div>  
<?php include( 'footer.php' ); ?>