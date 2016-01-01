<?php include( 'header.php' ); ?>

            <div class="row">
                <div class="large-12 columns">
                    <div class="row">
                        <div class="large-8 small-12 columns">

                            <h4>About <?php echo $name; ?></h4><hr>
                            <?php echo $about; ?>
                            <!-- 
                             <ul class="clearing-thumbs" data-clearing>
                              <li><a href="http://placehold.it/1200x700&text=Screenshot"><img src="http://placehold.it/200x200&text=SS"></a></li>
                              <li><a href="http://placehold.it/1200x700&text=Screenshot"><img src="http://placehold.it/200x200&text=SS"></a></li>
                              <li><a href="http://placehold.it/1200x700&text=Screenshot"><img src="http://placehold.it/200x200&text=SS"></a></li>
                            </ul>
                             -->

                        </div>
                        <div class="large-4 small-12 columns">
 
                            <h4>Rules</h4><hr>
                            <div class="panel">
                                <?php echo $join; ?>
                            </div>
                            
                            <ul>
                                <?php foreach( $rules as $rule ): ?>
                                <?php echo $rule; ?>
                                <?php endforeach; ?>
                            </ul> 
 
                        </div>
                    </div>
                </div>
            </div>

<?php include( 'footer.php' ); ?>