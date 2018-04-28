<html>

<!--Welcome page in the BII summer event LiveRES application-->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#7F56C6">
    <meta charset="UTF-8">

    <title>Welcome</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="manifest" href="manifest.json">
</head>
<body id="welcome">
    
<!--Include header-->
<?php include('partials/_header.php') ?>

<!--Primary page container-->
<section class="main_container">
    <div class="welcome_image">
        <img src="http://img2.email2inbox.co.uk/2017/bii/welcome.png" alt="The Chaps">
    </div>
    <div class="welcome_inner">
        <div class="welcome_title">
            Welcome to the BII Summer Event!
        </div>
        <div class="welcome_text">
            <p>In this, our 3rd year at the Artillery Gardens, 
            we hope you will all have a wonderful time celebrating all that is great about our industry. 
            Today we will be awarding the coveted 'BII Licensee of the Year' which recognises an individual who helps to make our industry so special.</p>

            <p>We would also like to express our thanks to all our sponsors and supporters; without them this event would not take place.</p>

            <p class="signoff"><span>Mike Clist</span> CEO BII &amp; <br><span>Anthony Pender</span> Chairman BII</p>
        </div>
    </div>
</section>

<!--Include lower navigation-->
<?php include('partials/_footer.php') ?>

<!--Script Imports-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
<!--Primary Script-->
<script src="js/main.js"></script>
<!--Navigation Script-->
<script src="js/navigation.js"></script>
<!--Page Specific Scripting-->
<script>
    // Global variables used in functions
    var upperBoundary = 105;

    // Function to calculate logo change on scroll
    // ACCEPTS no values
    // RETURNS no values
    function scrollDetect(){
        // Get scroll value
        var scroll = $(window).scrollTop();

        if((scroll > 75) && (scroll <= 125)){
            // In the resizing bracket
            var change = scroll - 75;
            change = 95 - change;
            var logo = $('.static_logo');
            change = change + '';
            change = change + 'px';
            $('.static_logo').css({
                'height' : change
            });

        } else if(scroll < 75){
            // Full size logo bracket
            $('.static_logo').css({
                'height' : '95px'
            });
        } else if(scroll > 125){
            // Minimum size logo bracket
            $('.static_logo').css({
                'height' : '45px'
            });
        }
    }

    // Detect scroll events
    $(window).on('scroll', function(){scrollDetect();});
    $(window).on('scrollstop', function(){scrollDetect();});

</script>

</body>

</html>