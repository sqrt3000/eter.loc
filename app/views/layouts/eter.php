<!DOCTYPE html>
<html>

<head>
    <base href="/">
    <?php if(!empty($canonical)):?>
        <link rel="canonical" href="<?=$canonical;?>" />
    <?php endif; ?>
    <link rel="shortcut icon" href="/images/icon.gif" type="image/gif" />
    <?=$this->getMeta();?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
    <!-- chocolate css for gallery light box -->
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- font-awesome icons -->
    <!--//Custom Theme files-->
    <!-- web-fonts -->
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:100,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- //web-fonts -->
</head>
<body>
<?=$content;?>
<?php if(isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>
<?php if(isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
    </div>
<?php endif; ?>
<div class="footer-main">
    <div class="footer-social">
        <h4>Подписаться</h4>
        <ul>
            <li>
                <a href="https://www.facebook.com/EterCityDnipro/?modal=admin_todo_tour">
                    <span class="fa fa-facebook icon_facebook"></span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="fa fa-twitter icon_twitter"></span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="fa fa-dribbble icon_dribbble"></span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="fa fa-google-plus icon_g_plus"></span>
                </a>
            </li>
        </ul>
    </div>
    <div class="cpy-right">
        <p>© 2017-<?php echo date("Y");?> Explore. All rights reserved | Design by
            <a href="https://eter.dp.ua"> Eter-IT</a> &
            <a href="http://w3layouts.com" rel="nofollow"> W3layouts.</a>
        </p>
    </div>
</div>

<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script>
<!-- //js -->

<script>
    $(window).scroll(function () {
        if ($(window).scrollTop() >= 730) {
            $('nav').addClass('fixed-header');
        } else {
            $('nav').removeClass('fixed-header');
        }
    });

    /* scrollTop() >= 240
     Should be equal the the height of the header
     */
</script>

<!-- PopUp-Box-JavaScript -->
<script src="js/jquery.chocolat.js"></script>
<script>
    $(function () {
        $('.filtr-item a').Chocolat();
    });
</script>
<!-- //PopUp-Box-JavaScript -->
<!-- fliter-JavaScript -->
<script src="js/jquery.filterizr.js"></script>
<script src="js/controls.js"></script>
<script>
    $(function () {
        $('.filtr-container').filterizr();
    });
</script>
<!-- //fliter-JavaScript -->

<!-- start-smooth-scrolling -->
<script  src="js/move-top.js"></script>
<script src="js/easing.js"></script>
<script>
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();

            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>
<!-- end-smooth-scrolling -->
<!-- smooth-scrolling-of-move-up-->
<script>
    $(document).ready(function () {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
         */

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<script src="js/SmoothScroll.min.js"></script>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/bootstrap.js"></script>

<?php
/* Этот блок включать при отладке
$logs = \R::getDatabaseAdapter()
    ->getDatabase()
    ->getLogger();

debug( $logs->grep( 'SELECT' ) );
*/
?>
</body>
</html>