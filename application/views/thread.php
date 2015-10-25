<?php include( 'header.php' ); ?>
<?php
  $pages = ceil( ( $count + 1 ) / 10 );
  $class = "class=\"current\"";
  $thread_url = base_url( 'forum/thread/' . $thread->tid);
?>
            <div class="row">
                <div class="large-12 columns">
                    <div class="row">
                        <div class="large-12 small-12 columns">

                            <h4><?php echo $thread->title; ?></h4><hr>
                            <!-- THREAD PAGINATION -->
                            <ul class="thread pagination">                                
                                <?php if( $page > 1 ): ?>
                                    <li class="arrow"><a href="<?php echo $thread_url ?>/page-<?php echo $page - 1; ?>">&laquo;</a></li>
                                <?php else: ?>
                                    <li class="arrow unavailable"><a href="">&laquo;</a></li>
                                <?php endif; ?>

                                <?php if( $pages < 8 ): ?>
                                    <?php for( $p = 1; $p <= $pages; $p++ ): ?>
                                        <li <?php echo ( $page == $p ) ? $class : "" ?>><a href="<?php echo $thread_url ?>/page-<?php echo $p?>"><?php echo $p ?></a></li>
                                    <?php endfor; ?>
                                <?php else: ?>
                                    <?php if( $page < 5 ): ?>
                                        <li <?php echo ( $page == 1 ) ? $class : "" ?>><a href="<?php echo $thread_url ?>/page-1">1</a></li>
                                        <li <?php echo ( $page == 2 ) ? $class : "" ?>><a href="<?php echo $thread_url ?>/page-2">2</a></li>
                                        <li <?php echo ( $page == 3 ) ? $class : "" ?>><a href="<?php echo $thread_url ?>/page-3">3</a></li>
                                        <li <?php echo ( $page == 4 ) ? $class : "" ?>><a href="<?php echo $thread_url ?>/page-4">4</a></li>
                                        <li class="unavailable"><a href="">&hellip;</a></li>
                                        <li><a href="<?php echo $thread_url ?>/page-<?php echo $pages - 1?>"><?php echo $pages - 1?></a></li>
                                        <li><a href="<?php echo $thread_url ?>/page-<?php echo $pages ?>"><?php echo $pages?></a></li>
                                    <?php elseif( $page > ( $pages - 4 ) ): ?>
                                        <li <?php echo ( $page == 1 ) ? $class : "" ?>><a href="<?php echo $thread_url ?>/page-1">1</a></li>
                                        <li <?php echo ( $page == 2 ) ? $class : "" ?>><a href="<?php echo $thread_url ?>/page-2">2</a></li>
                                        <li class="unavailable"><a href="">&hellip;</a></li>
                                        <li><a href="<?php echo $thread_url ?>/page-<?php echo $pages - 3?>"><?php echo $pages - 3?></a></li>
                                        <li><a href="<?php echo $thread_url ?>/page-<?php echo $pages - 2?>"><?php echo $pages - 2?></a></li>
                                        <li><a href="<?php echo $thread_url ?>/page-<?php echo $pages - 1?>"><?php echo $pages - 1?></a></li>
                                        <li><a href="<?php echo $thread_url ?>/page-<?php echo $pages ?>"><?php echo $pages?></a></li>
                                    <?php else: ?>
                                        <li <?php echo ( $page == 1 ) ? $class : "" ?>><a href="<?php echo $thread_url ?>/page-1">1</a></li>
                                        <li <?php echo ( $page == 2 ) ? $class : "" ?>><a href="<?php echo $thread_url ?>/page-2">2</a></li>
                                        <li class="unavailable"><a href="">&hellip;</a></li>
                                        <li><a href="<?php echo $thread_url ?>/page-<?php echo $page - 1?>"><?php echo $page - 1?></a></li>
                                        <li class="current"><a href="<?php echo $thread_url ?>/page-<?php echo $page?>"><?php echo $page?></a></li>
                                        <li><a href="<?php echo $thread_url ?>/page-<?php echo $page + 1?>"><?php echo $page + 1?></a></li>
                                        <li class="unavailable"><a href="">&hellip;</a></li>
                                        <li><a href="<?php echo $thread_url ?>/page-<?php echo $pages - 1?>"><?php echo $pages - 1?></a></li>
                                        <li><a href="<?php echo $thread_url ?>/page-<?php echo $pages ?>"><?php echo $pages?></a></li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if( $page < $pages ): ?>
                                    <li class="arrow"><a href="<?php echo $thread_url ?>/page-<?php echo $page + 1; ?>">&raquo;</a></li>
                                <?php else: ?>
                                    <li class="arrow unavailable"><a href="">&raquo;</a></li>
                                <?php endif; ?>
                            </ul>
                            <!-- END THREAD PAGINATION -->
                            
                            <ul class="breadcrumbs">
                              <li><a href="<?php echo base_url( 'forum' ) ?>">Forum</a></li>
                              <li class="current"><a href="<?php echo $thread_url ?>"><?php echo $thread->title ?></a></li>
                            </ul>
                            
                            <table class="thread" width="100%">
                                <thead>
                                    <tr>
                                        <th width="150"></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if( $page == 1 ): ?>
                                    <tr>
                                        <td>
                                            <img class="member-card-pic" src="<?php echo base_url( 'images/' . $thread->avatar ) ?>">
                                            <span data-tooltip aria-haspopup="true" class="has-tip" title="Tooltips are awesome, you should totally use them!"><?php echo $thread->username; ?></span>
                                            <br />
                                            <h7 class="subheader"><?php echo $thread->motto; ?></h7>
                                        </td>
                                        <td> 
                                            <h5><?php echo $thread->title; ?></h5>
                                            <br />
                                            <p><?php echo $thread->content; ?>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php foreach( $replies as $reply ): ?>
                                    <tr>
                                        <td>
                                            <img class="member-card-pic" src="<?php echo base_url( 'images/' . $thread->avatar ) ?>">
                                            <span data-tooltip aria-haspopup="true" class="has-tip" title="Tooltips are awesome, you should totally use them!"><?php echo $reply->username; ?></span>
                                            <br />
                                            <h7 class="subheader">I am cool</h7>
                                        </td>
                                        <td> 
                                            <h5>RE: <?php echo $thread->title; ?></h5>
                                            <br />
                                            <p><?php echo $reply->content; ?></p>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <!-- THREAD PAGINATION -->
                            <ul class="thread pagination">                                
                                <?php if( $page > 1 ): ?>
                                    <li class="arrow"><a href="<?php echo $thread_url ?>/page-<?php echo $page - 1; ?>">&laquo;</a></li>
                                <?php else: ?>
                                    <li class="arrow unavailable"><a href="">&laquo;</a></li>
                                <?php endif; ?>

                                <?php if( $pages < 8 ): ?>
                                    <?php for( $p = 1; $p <= $pages; $p++ ): ?>
                                        <li <?php echo ( $page == $p ) ? $class : "" ?>><a href="<?php echo $thread_url ?>/page-<?php echo $p?>"><?php echo $p ?></a></li>
                                    <?php endfor; ?>
                                <?php else: ?>
                                    <?php if( $page < 5 ): ?>
                                        <li <?php echo ( $page == 1 ) ? $class : "" ?>><a href="<?php echo $thread_url ?>/page-1">1</a></li>
                                        <li <?php echo ( $page == 2 ) ? $class : "" ?>><a href="<?php echo $thread_url ?>/page-2">2</a></li>
                                        <li <?php echo ( $page == 3 ) ? $class : "" ?>><a href="<?php echo $thread_url ?>/page-3">3</a></li>
                                        <li <?php echo ( $page == 4 ) ? $class : "" ?>><a href="<?php echo $thread_url ?>/page-4">4</a></li>
                                        <li class="unavailable"><a href="">&hellip;</a></li>
                                        <li><a href="<?php echo $thread_url ?>/page-<?php echo $pages - 1?>"><?php echo $pages - 1?></a></li>
                                        <li><a href="<?php echo $thread_url ?>/page-<?php echo $pages ?>"><?php echo $pages?></a></li>
                                    <?php elseif( $page > ( $pages - 4 ) ): ?>
                                        <li <?php echo ( $page == 1 ) ? $class : "" ?>><a href="<?php echo $thread_url ?>/page-1">1</a></li>
                                        <li <?php echo ( $page == 2 ) ? $class : "" ?>><a href="<?php echo $thread_url ?>/page-2">2</a></li>
                                        <li class="unavailable"><a href="">&hellip;</a></li>
                                        <li><a href="<?php echo $thread_url ?>/page-<?php echo $pages - 3?>"><?php echo $pages - 3?></a></li>
                                        <li><a href="<?php echo $thread_url ?>/page-<?php echo $pages - 2?>"><?php echo $pages - 2?></a></li>
                                        <li><a href="<?php echo $thread_url ?>/page-<?php echo $pages - 1?>"><?php echo $pages - 1?></a></li>
                                        <li><a href="<?php echo $thread_url ?>/page-<?php echo $pages ?>"><?php echo $pages?></a></li>
                                    <?php else: ?>
                                        <li <?php echo ( $page == 1 ) ? $class : "" ?>><a href="<?php echo $thread_url ?>/page-1">1</a></li>
                                        <li <?php echo ( $page == 2 ) ? $class : "" ?>><a href="<?php echo $thread_url ?>/page-2">2</a></li>
                                        <li class="unavailable"><a href="">&hellip;</a></li>
                                        <li><a href="<?php echo $thread_url ?>/page-<?php echo $page - 1?>"><?php echo $page - 1?></a></li>
                                        <li class="current"><a href="<?php echo $thread_url ?>/page-<?php echo $page?>"><?php echo $page?></a></li>
                                        <li><a href="<?php echo $thread_url ?>/page-<?php echo $page + 1?>"><?php echo $page + 1?></a></li>
                                        <li class="unavailable"><a href="">&hellip;</a></li>
                                        <li><a href="<?php echo $thread_url ?>/page-<?php echo $pages - 1?>"><?php echo $pages - 1?></a></li>
                                        <li><a href="<?php echo $thread_url ?>/page-<?php echo $pages ?>"><?php echo $pages?></a></li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if( $page < $pages ): ?>
                                    <li class="arrow"><a href="<?php echo $thread_url ?>/page-<?php echo $page + 1; ?>">&raquo;</a></li>
                                <?php else: ?>
                                    <li class="arrow unavailable"><a href="">&raquo;</a></li>
                                <?php endif; ?>
                            </ul>
                            <!-- END THREAD PAGINATION -->
                            <fieldset class="reply">
                            <legend>Post Reply</legend>
                            <?php if( $this->session->userdata('username') ): ?>
                              <?php echo form_open(""); ?>                                    
                                    <?php echo validation_errors('<p class="error">'); ?>
                                    <input type="hidden" name="thread" id="thread" value="<?php echo $thread->tid; ?>">
                                    <textarea placeholder="Enter Reply" name="reply" id="reply" rows="12"></textarea>
                                    <input class="button secondary" type="submit" value="Post">                                
                              <?php echo form_close(); ?>
                            <?php else: ?>
                                <p>You must be a member in order to reply.</p>
                            <?php endif; ?>
                                

                    </div>
                </div>
            </div>

<?php include( 'footer.php' ); ?>