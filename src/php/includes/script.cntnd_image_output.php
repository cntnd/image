<script  type='text/javascript'>
    $(document).ready(function(){
        $(".cntnd_image--hover").hover(
            function() {
                $(this).attr("src",$(this).data("hover-in"));
            },
            function() {
                $(this).attr("src",$(this).data("hover-out"));
            });
    });
</script>
