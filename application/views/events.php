<?php include( 'header.php' ); ?>
            <div class="row">
                <div class="large-12 columns">
                    <div class="row">
                        <div class="large-8 small-12 columns">

                            <h4>Events<?php echo anchor('events/create', 'New Event', array('class' => 'text-right small button secondary new-thread')); ?></h4>
                            <?php foreach( $events as $event ): ?>
                            <br />
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

                            <?php

                            $m = date("m");
                            $dw = date( "N", strtotime( "2015-" . $m . "-01" ) );
                            echo $m;
                            echo $dw;

                            ?>
                            <!--
                            <div class="panel">
                                <h5><a href="#">Event Title 1</a></h5>
                                <p>13/08/2015 4:00PM <small>(in 1:34 hours)</small><br />
                                Fortnightly @ Guild Headquarters</p>
                                <h6 class="subheader">
                                    Join us for a drop party at the guild headquarters every 2 weeks - we will be drawing rune armor, dragon drops, crystals and other rare items.<br /><br />
                                    PM Whiskerz for more information.
                                </h6>
                            </div>
                            <div class="panel">
                                <h5><a href="#">Event Title 1</a></h5>
                                <p>13/08/2015 4:00PM <small>(in 1:34 hours)</small><br />
                                Fortnightly @ Guild Headquarters</p>
                                <h6 class="subheader">
                                    Join us for a drop party at the guild headquarters every 2 weeks - we will be drawing rune armor, dragon drops, crystals and other rare items.<br /><br />
                                    PM Whiskerz for more information.
                                </h6>
                            </div>
                            <div class="panel">
                                <h5><a href="#">Event Title 1</a></h5>
                                <p>13/08/2015 4:00PM <small>(in 1:34 hours)</small><br />
                                Fortnightly @ Guild Headquarters</p>
                                <h6 class="subheader">
                                    Join us for a drop party at the guild headquarters every 2 weeks - we will be drawing rune armor, dragon drops, crystals and other rare items.<br /><br />
                                    PM Whiskerz for more information.
                                </h6>
                            </div>
                            <div class="panel">
                                <h5><a href="#">Event Title 1</a></h5>
                                <p>13/08/2015 4:00PM <small>(in 1:34 hours)</small><br />
                                Fortnightly @ Guild Headquarters</p>
                                <h6 class="subheader">
                                    Join us for a drop party at the guild headquarters every 2 weeks - we will be drawing rune armor, dragon drops, crystals and other rare items.<br /><br />
                                    PM Whiskerz for more information.
                                </h6>
                            </div>
                            -->
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
                                    $day = 1;
                                    for ($i = 0; $i < 4 ; $i++) { 
                                        echo '<tr>';
                                        for ($j = 0; $j < 7 ; $j++) { 
                                            echo '<td>' . $day . '</td>';
                                            $day++;
                                        }
                                        echo '</tr>';
                                    }
                                ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

<?php include( 'footer.php' ); ?>