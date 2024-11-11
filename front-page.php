<?php get_header(); ?>
<?php get_footer(); ?>

</div>
</div>
<script>
    window.onload = function() {
        document.body.classList.remove('is-preload');
    }
    window.ontouchmove = function() {
        return false;
    }
    window.onorientationchange = function() {
        document.body.scrollTop = 0;
    }
</script>
<?php wp_footer(); ?>
</body>

</html>