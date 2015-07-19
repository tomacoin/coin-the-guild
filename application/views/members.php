<?php include( 'header.php' ); ?>

            <div class="row">
                <div class="large-12 columns">
                    <div class="row">
                        <div class="large-12 small-12 columns">

                            <h4>Members</h4><hr>
                            <?php foreach( $members as $member ): ?>
                            <?php
                                $role = "member";
                                switch( $member->role ) {
                                    case 0:
                                        $role = "admin";
                                        break;
                                    case 1:
                                        $role = "moderator";
                                        break;
                                }
                            ?>
                            <div class="panel member-card large-2">
                                <?php if( !$member->avatar_url ): ?>
                                    <img class="member-card-pic" src="http://placehold.it/150x150&text=Pic">
                                <?php else: ?>
                                    <img class="member-card-pic" src="<?php echo $member->avatar_url ?>">
                                <?php endif; ?>
                                
                                <h5><a href="#" class="<?php echo $role ?>"><?php echo $member->username ?></a></h5>
                                <h6 class="subheader">
                                    Joined <span style="float:right;"><?php echo date( 'm/d/y',strtotime($member->joined) ) ?></span><br />
                                    Last On <span style="float:right;"><?php echo date( 'm/d/y',strtotime($member->last_on) ) ?></span></h6>
                            </div>
                            <?php endforeach; ?>
                            </div>
                            <br /><br />
                            <!--
                            <ul class="pagination">
                              <li class="arrow unavailable"><a href="">&laquo;</a></li>
                              <li class="current"><a href="">1</a></li>
                              <li><a href="">2</a></li>
                              <li><a href="">3</a></li>
                              <li><a href="">4</a></li>
                              <li class="unavailable"><a href="">&hellip;</a></li>
                              <li><a href="">12</a></li>
                              <li><a href="">13</a></li>
                              <li class="arrow"><a href="">&raquo;</a></li>
                            </ul>
                            -->
                    </div>
                </div>
            </div>

<?php include( 'footer.php' ); ?>