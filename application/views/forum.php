<?php include( 'header.php' ); ?>
<?php 
var_dump( $threads );
?>
            <div class="row">
                <div class="large-12 columns">
                    <div class="row">
                        <div class="large-8 small-12 columns">

                            <h4>Forum</h4><hr>
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <th width="450">Thread</th>
                                        <th>Last Reply</th>
                                        <th width="60">#</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php foreach( $threads as $thread ): ?>
                                    <tr>
                                        <td>
                                            <h5><a href="#"><?php echo $thread->title; ?></a></h5>
                                            <h6 class="subheader">
                                                Posted by 
                                                <span data-tooltip aria-haspopup="true" class="has-tip" title="Tooltips are awesome, you should totally use them!"><?php echo $thread->username; ?></span> at <?php echo $thread->posted; ?>
                                            </h6>
                                        </td>
                                        <td class="text-right"> 
                                                <span data-tooltip aria-haspopup="true" class="has-tip" title="Tooltips are awesome, you should totally use them!">BanishYou56</span><br /> <a href="">27m ago &raquo;</a>
                                        </td>
                                        <td class="text-center">13</td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>

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
                        </div>
                        <div class="large-4 small-12 columns"> 
                            <h4>Top Posters</h4><hr>
                            <img src="http://placehold.it/50x50&text=P1" class="top-poster">
                            <span data-tooltip aria-haspopup="true" class="has-tip" title="Tooltips are awesome, you should totally use them!">BanishYou56</span><br />
                            <h6 class="subheader">156 posts</h6>

                            <img src="http://placehold.it/50x50&text=P1" class="top-poster">
                            <span data-tooltip aria-haspopup="true" class="has-tip" title="Tooltips are awesome, you should totally use them!">BanishYou56</span><br />
                            <h6 class="subheader">120 posts</h6>

                            <img src="http://placehold.it/50x50&text=P1" class="top-poster">
                            <span data-tooltip aria-haspopup="true" class="has-tip" title="Tooltips are awesome, you should totally use them!">BanishYou56</span><br />
                            <h6 class="subheader">80 posts</h6>

                            <img src="http://placehold.it/50x50&text=P1" class="top-poster">
                            <span data-tooltip aria-haspopup="true" class="has-tip" title="Tooltips are awesome, you should totally use them!">BanishYou56</span><br />
                            <h6 class="subheader">78 posts</h6>
                            <br />
                            <h4>Top Threads</h4><hr> 
                            <h5><a href="#">[GUIDE] Get all achievements on Sunspark Island </a><small>136 Posts</small></h5>
                            <h5><a href="#">[GUIDE] Get all achievements on Sunspark Island </a><small>106 Posts</small></h5>
                            <h5><a href="#">[GUIDE] Get all achievements on Sunspark Island </a><small>86 Posts</small></h5>
                            <h6 class="subheader"></h6
                        </div>
                    </div>
                </div>
            </div>

<?php include( 'footer.php' ); ?>