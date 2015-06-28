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
                                    <tr>
                                        <td>
                                            <img class="member-card-pic" src="http://placehold.it/100x100&text=Pic">
                                            <span data-tooltip aria-haspopup="true" class="has-tip" title="Tooltips are awesome, you should totally use them!"><?php echo $thread->username; ?></span>
                                            <br />
                                            <h7 class="subheader">I am cool</h7>
                                        </td>
                                        <td> 
                                            <h5><?php echo $thread->title; ?></h5>
                                            <br />
                                            <p><?php echo $thread->content; ?>
                                        </td>
                                    </tr>
                                    <?php foreach( $replies as $reply ): ?>
                                    <tr>
                                        <td>
                                            <img class="member-card-pic" src="http://placehold.it/100x100&text=Pic">
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
                            <form>
                              <fieldset class="reply">
                                <legend>Reply</legend>

                                <label>Input Label
                                  <textarea placeholder="small-12.columns" rows="12"></textarea>
                                  <input class="button secondary" type="submit">
                                </label>
                              </fieldset>
                            </form>
                    </div>
                </div>
            </div>

<?php include( 'footer.php' ); ?>