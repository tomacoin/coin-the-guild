
        </div>
    </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/foundation.min.js"></script>
    <script>
        $(document).foundation();
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
