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
                                <p><?php echo $event->startdate . ' ' . $event->starttime ?> <small>(in 1:34 hours)</small><br />
                                <?php echo $event->occurence ?> @ Guild Headquarters</p>
                                <h6 class="subheader">
                                    <?php echo $event->description ?>
                                </h6>
                            </div>
                            <?php endforeach; ?>
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
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>4</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>4</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>4</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td></td>
                                    <td></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

<?php include( 'footer.php' ); ?>