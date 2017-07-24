<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 24/07/2017
 * Time: 14:13
 */
if (!defined('MODULE_PATH'))
	die("Bad request");

?>

<footer class="container-fluid text-center" id="about">
	<a href="#home">Nguyễn Tấn Phát</a>
</footer>

<!-- other -->
<a href="#home" class="go-top" title="Bay lên top" data-placement="auto" data-toggle="tooltip">
	<span class="glyphicon glyphicon-chevron-up"></span>
</a>
<script lang="javascript" src="<?php echo getBaseUrl(); ?>/public/bootstrap/js/jquery-3.2.1.min.js"></script>
<script lang="javascript" src="<?php echo getBaseUrl(); ?>/public/bootstrap/js/bootstrap.min.js"></script>
<script lang="javascript" src="<?php echo getBaseUrl(); ?>/public/js/user_state.js"></script>

<?php echo "<script>var baseUrl = '" . getBaseUrl() . "';</script>;" ?>
<script type="text/javascript">
    $(function() {
        var home = $('#home').height();
        var jum = $('[class*=jumbotron]').height();
        var detail = $('#detail').height();
        var budget = $('#budget').height();

        $('#btn-search').click(function () {
            $('#search-div').slideToggle(100);
        });

         $('#btn-add').click(function () {
             $('#add-div').slideToggle(100);
         });

        $('.navbar a, a[href="#home"]').on('click', function(e) {
            var hash = this.hash;

            if (hash !== '') {
                e.preventDefault();

                $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    },
                    500,
                    function() {
                        window.location.hash = hash;
                        window.history.pushState({path:baseUrl}, 0, baseUrl);
                    });
            }
        });

        $(window).scroll(function(){
            if ($(window).scrollTop() > (home + jum)){
                addActiveClass($('a[href="#detail"]'));
            }
            if ($(window).scrollTop() < (home + jum)){
                addActiveClass($('a[href="#home"]'));
            }
            if ($(window).scrollTop() > (home + jum + detail)){
                addActiveClass($('a[href="#budget"]'));
            }
        });

        function addActiveClass(aTag) {
            $('.navbar a').parent().removeClass('active');
            $(aTag).parent().addClass('active');
            // $('.navbar a').parent().removeClass('active');
            // $(this).parent().addClass('active');
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>

</html>
