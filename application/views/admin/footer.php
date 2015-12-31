
        </div>
    </div>
<div id="myModal" class="reveal-modal" data-reveal>
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
        <?php if( $this->session->flashdata('new') ): ?>
        $(document).ready(function(){
            $('#myModal').foundation('reveal', 'open')
        });
        <?php endif; ?>

    function kick( name )
    {
        $( '#kick' ).attr("href", "<?php echo base_url(); ?>admin/kick/" + name );
        $( '#kickee' ).html( name );
        console.log( name );
         $('#kick-member').foundation('reveal', 'open')
    }
    </script>   
    <div class="reveal-modal-bg" style="display: none;"></div>
</body>
</html>
