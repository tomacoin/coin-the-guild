<?php include( 'header.php' ); 
//var_dump($events);?>
            <div class="row">
                <div class="large-12 columns">
                    <div class="row">
                        <div class="large-8 small-12 columns">

                            <h4>Welcome to <?php echo $guild ?></h4><hr>

                            <?php foreach( $blogs as $blog ): ?>
                                <article>
                                    <h3><a href="<?php echo base_url() . 'forum/thread/' . $blog->tid; ?>"><?php echo $blog->title ?></a></h3>
                                    <h6>Written by <a href="#"><?php echo $blog->username ?></a> on <?php echo date("jS F, Y", strtotime( $blog->posted )) ?></h6>
                                    <?php echo $blog->content ?>
                                    <p><a href="<?php echo base_url() . 'forum/thread/' . $blog->tid; ?>"><?php echo $blog->replies . ( $blog->replies == 1 ? ' Reply' : ' Replies' ) ?></a></p>

                                </article>
                            <?php endforeach; ?>

                        </div>
                        <div class="large-4 small-12 columns">
                            <h4>Events</h4><hr>
                            <?php if( !$events ): ?>
                                No events<br /><br />
                            <?php else: ?>
                                <div class="panel">
                                    <h5><a href="<?php echo base_url() . 'events/' . $events[0]->eid; ?>"><?php echo $events[0]->name ?></a></h5>
     
                                    <h6 class="subheader">
                                        <?php echo $events[0]->description ?>
                                    </h6>
     
                                    <h6><a href="<?php echo base_url() . 'events/' . $events[0]->eid; ?>">Read More »</a></h6>
                                </div>
                                <?php if( sizeof( $events )> 0 ): ?>
                                <div class="panel hide-for-small">
                                    <h5><a href="<?php echo base_url() . 'events/' . $events[1]->eid; ?>"><?php echo $events[1]->name ?> »</a></h5>
                                </div>
                                <?php if( sizeof( $events )> 1 ): ?>
                                <div class="panel hide-for-small">
                                    <h5><a href="<?php echo base_url() . 'events/' . $events[2]->eid; ?>"><?php echo $events[2]->name ?> »</a></h5>
                                </div>
                                <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            <a href="events" class="right">Go To Events »</a>
                            <br /><br />
                            <h4>Recent Activity</h4><hr>
                            <?php if( !$activities ): ?>
                                No events<br /><br />
                            <?php else: ?>
                                <div class="panel">
                                    <h5><a href="<?php echo base_url() . 'forum/thread/' . $activities[0]->tid; ?>"><?php echo $activities[0]->title ?></a></h5>
     
                                    <h6 class="subheader">
                                        <?php $content = strip_tags( $activities[0]->content ); ?>
                                        <?php echo strlen( $content ) > 100 ? substr( $content ,0,100)."..." : $content; ?>

                                    </h6>
     
                                    <h6><a href="<?php echo base_url() . 'forum/thread/' . $activities[0]->tid; ?>">Read More »</a></h6>
                                </div>
                                <?php if( sizeof( $activities ) > 1 ): ?>
                                <div class="panel hide-for-small">
                                    <h5><a href="<?php echo base_url() . 'forum/thread/' . $activities[1]->tid; ?>"><?php echo $activities[1]->title ?> »</a></h5>
                                </div>
                                <?php if( sizeof( $activities ) > 2 ): ?>
                                <div class="panel hide-for-small">
                                    <h5><a href="<?php echo base_url() . 'forum/thread/' . $activities[2]->tid; ?>"><?php echo $activities[2]->title ?> »</a></h5>
                                </div>
                                <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            <a href="forum" class="right">Go To Forums »</a>
 
                        </div>
                    </div>
                </div>
            </div>
<?php include( 'footer.php' ); ?>