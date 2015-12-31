<?php include( 'header.php' ); ?>
<div class="row admin-row">
    <div class="large-12 columns">
        <div class="row">
            <div class="large-8 small-12 columns">
                <h4>Users</h4><hr>
                <table class="large-12 small-12">
                    <thead>
                        <tr>
                            <td>Member</td>
                            <td>Time</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach( $member_log as $member ): ?>
                        <tr>
                            <td><b><?php echo $member->username ?></b> has joined!</td>
                            <td><?php echo date("d/m/y h:ia", strtotime( $member->joined ) ) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <br />
            </div>
        </div>
    </div>
</div>
<?php include( 'footer.php' ); ?>