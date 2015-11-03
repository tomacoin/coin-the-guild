<?php include( 'header.php' ); ?>
            <div class="row">
                <div class="large-12 columns">
                    <div class="row">
                        <div class="large-8 small-12 columns">

                            <h4>Welcome to Guild Name</h4><hr>

                            <?php foreach( $blogs as $blog ): ?>
                            <article>
                                <h3><a href="#"><?php echo $blog->title ?></a></h3>
                                <h6>Written by <a href="#"><?php echo $blog->username ?></a> on <?php echo $blog->posted ?></h6>
                                <?php echo $blog->content ?>
                                <p><a href="">3 Replies</a></p>

                            </article>



                            <?php endforeach; ?>
                            <article>
                             
                                <h3><a href="#">Blog Post Title</a></h3>
                                <h6>Written by <a href="#">John Smith</a> on August 12, 2012.</h6>
                         
                                    <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa.</p>
                                    <p>Boudin aliqua adipisicing rump corned beef. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short 
                         
                                <p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami.</p>
                         
                                <p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami.</p>

                                <p><a href="">3 Replies</a></p>
                         
                              </article>
                              <article>
                             
                                <h3><a href="#">Blog Post Title</a></h3>
                                <h6>Written by <a href="#">John Smith</a> on August 12, 2012.</h6>
                         
                                    <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa.</p>
                                    <p>Boudin aliqua adipisicing rump corned beef. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short 
                         
                                <p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami.</p>
                         
                                <p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami.</p>
                         
                                <p><a href="">2 Replies</a></p>

                              </article>
                        </div>
                        <div class="large-4 small-12 columns">
 
                            <h4>Events</h4><hr>
                            <div class="panel">
                                <h5><a href="#">Event Title 1</a></h5>
 
                                <h6 class="subheader">
                                    Risus ligula, aliquam nec fermentum vitae, sollicitudin eget urna. Suspendisse ultrices ornare tempor...
                                </h6>
 
                                <h6><a href="#">Read More »</a></h6>
                            </div>
 
                            <div class="panel hide-for-small">
                                <h5><a href="#">Event Title 2 »</a></h5>
                            </div>
 
                            <div class="panel hide-for-small">
                                <h5><a href="#">Event Title 3 »</a></h5>
                            </div>
 
                            <a href="#" class="right">Go To Events »</a>

                            <h4>Recent Activity</h4><hr>
                            <div class="panel">
                                <h5><a href="#">Activity Title 1</a></h5>
 
                                <h6 class="subheader">
                                    Risus ligula, aliquam nec fermentum vitae, sollicitudin eget urna. Suspendisse ultrices ornare tempor...
                                </h6>
 
                                <h6><a href="#">Read More »</a></h6>
                            </div>
 
                            <div class="panel hide-for-small">
                                <h5><a href="#">Activity Title 2 »</a></h5>
                            </div>
 
                            <div class="panel hide-for-small">
                                <h5><a href="#">Activity Title 3 »</a></h5>
                            </div>
 
                            <a href="#" class="right">Go To Events »</a>
 
                        </div>
                    </div>
                </div>
            </div>
<?php include( 'footer.php' ); ?>