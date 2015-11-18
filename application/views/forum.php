<?php include( 'header.php' ); ?>
<?php
    $pages = ceil( ( $count + 1 ) / 10 );
    $class = "class=\"current\"";  
    $forum_url = base_url( 'forum' );
?>
            <div class="row">
                <div class="large-12 columns">
                    <div class="row">
                        <div class="large-8 small-12 columns">

                            <h4>Forum<?php echo anchor('forum/thread/new', 'New Thread', array('class' => 'text-right small button secondary new-thread')); ?></h4>
                            
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
                                            <h5><a href="<?php echo $forum_url . '/thread/' . $thread->tid; ?>"><?php echo $thread->thread_title; ?></a></h5>
                                            <h6 class="subheader">
                                                Posted by 
                                                <span data-tooltip aria-haspopup="true" class="has-tip" title="Tooltips are awesome, you should totally use them!"><?php echo $thread->thread_poster; ?></span> at <?php echo $thread->thread_time; ?>
                                            </h6>
                                        </td>
                                        <?php if( $thread->reply_count ): ?>
                                        <td class="text-right"> 
                                                <span data-tooltip aria-haspopup="true" class="has-tip" title="Tooltips are awesome, you should totally use them!"><?php echo $thread->reply_poster; ?></span><br /> <a href=""><?php echo $thread->reply_time; ?> &raquo;</a>
                                        </td>
                                        <?php else: ?>
                                        <td class="text-center"> 
                                                -
                                        </td>
                                        <?php endif; ?>
                                        <td class="text-center"><?php echo ( $thread->reply_count ? $thread->reply_count : 0 ); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>

                            <!-- THREAD PAGINATION -->
                            <ul class="forum pagination">                                
                                <?php if( $page > 1 ): ?>
                                    <li class="arrow"><a href="<?php echo $forum_url ?>/page/<?php echo $page - 1; ?>">&laquo;</a></li>
                                <?php else: ?>
                                    <li class="arrow unavailable"><a href="">&laquo;</a></li>
                                <?php endif; ?>

                                <?php if( $pages < 8 ): ?>
                                    <?php for( $p = 1; $p <= $pages; $p++ ): ?>
                                        <li <?php echo ( $page == $p ) ? $class : "" ?>><a href="<?php echo $forum_url ?>/page/<?php echo $p?>"><?php echo $p ?></a></li>
                                    <?php endfor; ?>
                                <?php else: ?>
                                    <?php if( $page < 5 ): ?>
                                        <li <?php echo ( $page == 1 ) ? $class : "" ?>><a href="<?php echo $forum_url ?>/page/1">1</a></li>
                                        <li <?php echo ( $page == 2 ) ? $class : "" ?>><a href="<?php echo $forum_url ?>/page/2">2</a></li>
                                        <li <?php echo ( $page == 3 ) ? $class : "" ?>><a href="<?php echo $forum_url ?>/page/3">3</a></li>
                                        <li <?php echo ( $page == 4 ) ? $class : "" ?>><a href="<?php echo $forum_url ?>/page/4">4</a></li>
                                        <li class="unavailable"><a href="">&hellip;</a></li>
                                        <li><a href="<?php echo $forum_url ?>/page/<?php echo $pages - 1?>"><?php echo $pages - 1?></a></li>
                                        <li><a href="<?php echo $forum_url ?>/page/<?php echo $pages ?>"><?php echo $pages?></a></li>
                                    <?php elseif( $page > ( $pages - 4 ) ): ?>
                                        <li <?php echo ( $page == 1 ) ? $class : "" ?>><a href="<?php echo $forum_url ?>/page/1">1</a></li>
                                        <li <?php echo ( $page == 2 ) ? $class : "" ?>><a href="<?php echo $forum_url ?>/page/2">2</a></li>
                                        <li class="unavailable"><a href="">&hellip;</a></li>
                                        <li><a href="<?php echo $forum_url ?>/page/<?php echo $pages - 3?>"><?php echo $pages - 3?></a></li>
                                        <li><a href="<?php echo $forum_url ?>/page/<?php echo $pages - 2?>"><?php echo $pages - 2?></a></li>
                                        <li><a href="<?php echo $forum_url ?>/page/<?php echo $pages - 1?>"><?php echo $pages - 1?></a></li>
                                        <li><a href="<?php echo $forum_url ?>/page/<?php echo $pages ?>"><?php echo $pages?></a></li>
                                    <?php else: ?>
                                        <li <?php echo ( $page == 1 ) ? $class : "" ?>><a href="<?php echo $forum_url ?>/page/1">1</a></li>
                                        <li <?php echo ( $page == 2 ) ? $class : "" ?>><a href="<?php echo $forum_url ?>/page/2">2</a></li>
                                        <li class="unavailable"><a href="">&hellip;</a></li>
                                        <li><a href="<?php echo $forum_url ?>/page/<?php echo $page - 1?>"><?php echo $page - 1?></a></li>
                                        <li class="current"><a href="<?php echo $forum_url ?>/page/<?php echo $page?>"><?php echo $page?></a></li>
                                        <li><a href="<?php echo $forum_url ?>/page/<?php echo $page + 1?>"><?php echo $page + 1?></a></li>
                                        <li class="unavailable"><a href="">&hellip;</a></li>
                                        <li><a href="<?php echo $forum_url ?>/page/<?php echo $pages - 1?>"><?php echo $pages - 1?></a></li>
                                        <li><a href="<?php echo $forum_url ?>/page/<?php echo $pages ?>"><?php echo $pages?></a></li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if( $page < $pages ): ?>
                                    <li class="arrow"><a href="<?php echo $forum_url ?>/page/<?php echo $page + 1; ?>">&raquo;</a></li>
                                <?php else: ?>
                                    <li class="arrow unavailable"><a href="">&raquo;</a></li>
                                <?php endif; ?>
                            </ul>
                            <!-- END THREAD PAGINATION -->
                        </div>
                        <div class="large-4 small-12 columns"> 
                            <h4>Top Posters</h4><hr>
                            <?php foreach( $top_posters as $top_poster ): ?>
                            <img src="<?php echo base_url( 'images/' . $top_poster->avatar ) ?>" class="top-poster">
                            <span data-tooltip aria-haspopup="true" class="has-tip" title="Tooltips are awesome, you should totally use them!"><?php echo $top_poster->username; ?></span><br />
                            <h6 class="subheader"><?php echo $top_poster->posts . ( $top_poster->posts == 1 ? ' Post' : ' Posts' ) ?></h6>
                            <?php endforeach; ?>
                            <br />
                            <h4>Top Threads</h4><hr> 
                            <?php foreach( $top_threads as $top_thread ): ?>
                            <h5><a href="#"><?php echo $top_thread->title; ?> </a><small><?php echo $top_thread->count . ( $top_thread->count == 1 ? ' Post' : ' Posts' ) ?></small></h5>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

<?php include( 'footer.php' ); ?>