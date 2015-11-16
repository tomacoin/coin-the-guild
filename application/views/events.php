<?php include( 'header.php' ); ?>
            <div class="row">
                <div class="large-12 columns">
                    <div class="row">
                        <div class="large-8 small-12 columns">

                            <h4>Events<?php echo anchor('events/create', 'New Event', array('class' => 'text-right small button secondary new-thread')); ?></h4>
                            <br />
                            <?php foreach( $events as $event ): ?>
                            <div class="panel">
                                <h5><a href="#"><?php echo $event->name ?></a></h5>
                                <p><?php echo date( 'm/d/y',strtotime($event->startdate) ) . ' ' . date( 'H:i',strtotime($event->starttime) ) ?><br />
                                <?php
                                    switch( $event->occurence ) {
                                        case 0:
                                            break;
                                        case 1:
                                            echo 'Daily';
                                            break;
                                        case 7:
                                            echo 'Weekly ';
                                            break;
                                        case 14:
                                            echo 'Fortnightly ';
                                            break;
                                        case 30:
                                            echo 'Monthly ';
                                            break;
                                    }
                                ?>@ <?php echo $event->location ?></p>
                                <h6 class="subheader">
                                    <?php echo $event->description ?>
                                </h6>
                            </div>
                            <?php endforeach; ?>
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