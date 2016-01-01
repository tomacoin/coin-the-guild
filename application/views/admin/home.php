<?php include( 'header.php' ); ?>
<div class="row admin-row">
    <div class="large-12 columns">
        <div class="row">
            <div class="large-8 small-12 columns">
                <h4>Dashboard</h4><hr>
                <a href="admin/post" class="button secondary">New Blog Post</a>
                <h5>Member Log</h5><br />
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
                <h5>Post Log</h5><br />
                <table class="large-12 small-12">
                    <thead>
                        <tr>
                            <td>Thread</td>
                            <td>Content</td>
                            <td>User</td>
                            <td>Time</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach( $post_log as $post ): ?>
                        <tr>
                            <td><?php echo $post->title ?></td>
                            <td><?php echo strlen( strip_tags( $post->content ) ) > 20 ? substr( strip_tags( $post->content ) ,0,20)."..." : strip_tags( $post->content ); ?></td>
                            <td><?php echo $post->username ?></td>
                            <td><?php echo date("d/m/y h:ia", strtotime( $post->posted ) ) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="large-4 small-12 columns">

                <h4>Calendar</h4><hr>
                <p class="clock">3:24PM</p>
                <table class="event-calendar">
                    <tr>
                        <th>S</th>
                        <th>M</th>
                        <th>T</th>
                        <th>W</th>
                        <th>T</th>
                        <th>F</th>
                        <th>S</th>
                    </tr>
                    <?php
                        echo date( "F" ) . "<br />";
                        $mstart = date( "N", strtotime( date("Y") . "-" . date("m") . "-01" ) );
                        $day = 1;
                        $days = date("t");
                        for ($i = 0; $i < 6 ; $i++) { 
                            echo '<tr>';
                            for ($j = 0; $j < 7 ; $j++) {

                                if ( $day == 1 && $j == $mstart )
                                {
                                    echo '<td>' . $day . '</td>';
                                    $day++;
                                }
                                else if ( $day == 1 && $j < $mstart )
                                {
                                    echo '<td></td>';
                                }
                                else
                                {
                                    echo '<td>' . $day . '</td>';
                                    $day++;
                                }
                                
                                if ( $day > $days ) {
                                    break;
                                }
                                

                            }
                            echo '</tr>';
                            if ( $day >= $days ) {
                                    break;
                            }
                        }
                    ?>

                </table>
            </div>
        </div>
    </div>
</div>
<?php include( 'footer.php' ); ?>