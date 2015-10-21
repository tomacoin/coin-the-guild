<?php include( 'header.php' ); ?>
            <div class="row">
                <div class="large-12 columns">
                    <div class="row">
                        <div class="large-12 small-12 columns">

                            <h4><?php echo $thread->title; ?></h4><hr>
                            <ul class="thread pagination">
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
                            <!--
                            <ul class="breadcrumbs">
                              <li><a href="#">Home</a></li>
                              <li><a href="#">Features</a></li>
                              <li class="unavailable"><a href="#">Gene Splicing</a></li>
                              <li class="current"><a href="#">Cloning</a></li>
                            </ul>
                            -->
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

                            <ul class="thread pagination">
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