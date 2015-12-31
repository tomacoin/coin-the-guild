<footer class="row">
                <div class="large-12 columns"><hr>
                    <div class="row">
                        <div class="large-6 columns">
                                <p>© Copyright no one at all. Go to town.</p>
                        </div>
                        <div class="large-6 small-12 columns">
                                <ul class="inline-list right">
                                    <li><a href="#">Link 1</a></li>
                                    <li><a href="#">Link 2</a></li>
                                    <li><a href="#">Link 3</a></li>
                                    <li><a href="#">Link 4</a></li>
                                </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
<div id="new-user" class="reveal-modal" data-reveal>
    <h3>Thank you for signing up!</h3>
    <p class="lead">You have successfully registered.</p> <p>Log in to join this guild!</p>
    <a class="close-reveal-modal">&#215;</a>
</div>
<div id="new-member" class="reveal-modal" data-reveal>
    <h3>Welcome to <?php echo $guild; ?></h3>
    <p class="lead">You have successfully joined the guild.</p> <p>We hope you enjoy your stay!</p>
    <a class="close-reveal-modal">&#215;</a>
</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
    document.write('<script src=<?php echo base_url(); ?>js/vendor/' +
    ('__proto__' in {} ? 'zepto' : 'jquery') +
    '.js><\/script>')
    </script>
    <script src="<?php echo base_url(); ?>js/foundation.min.js"></script>
    <script>
        $(document).foundation();
        <?php if( $this->session->flashdata('new_user') ): ?>
        $(document).ready(function(){
            $('#new-user').foundation('reveal', 'open')
        });
        <?php endif; ?>
        <?php if( $this->session->flashdata('new_member') ): ?>
        $(document).ready(function(){
            $('#new-member').foundation('reveal', 'open')
        });
        <?php endif; ?>
    </script>   
    <div class="reveal-modal-bg" style="display: none;"></div>
</body>
</html>
