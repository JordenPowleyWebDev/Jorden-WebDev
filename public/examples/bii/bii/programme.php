<html>

<!--Programme page in the BII summer event LiveRES application-->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#7F56C6">
    <meta charset="UTF-8">

    <title>Programme</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="manifest" href="manifest.json">
</head>
<body id="programme">
    
<!--Include header-->
<?php include('partials/_header.php') ?>

<!--Primary page container-->
<section class="main_container">
    <div class="programme_inner">
        <div class="programme_title">
            Programme
        </div>
        <div class="programme_text">
            <div class="programme_item">
                <p class="timing">11.00</p>
                <p>Doors and Bars Open</p> 
            </div>
            <div class="programme_item">
                <p class="timing">12.00</p>
                <p>Lunch Called</p>
            </div>
            <div class="programme_item">
                <p class="timing">12.30</p>
                <p>Lunch Served</p>
                <p>Bars Close</p>
            </div>
            <div class="programme_item">
                <p class="timing">14.30</p>
                <p>Awards BII Licensee of the Year 2017</p>
            </div>

            <div class="programme_item">
                <p class="timing">15.00</p>
                <p>Bars Re-Open</p>
                <p>Networking</p>
            </div>
            <div class="programme_item">
                <p class="timing">17.00</p>
                <p>Venue Closes</p>
                <p>Guests Depart</p>
            </div>
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
    // var upperBoundary = 105;

    // Function to calculate logo change on scroll
    // ACCEPTS no values
    // RETURNS no values
    function scrollDetect(){
        // Get scroll value
        var scroll = $(window).scrollTop();

        if((scroll > 25) && (scroll <= 75)){
            // In the resizing bracket
            var change = scroll - 25;
            change = 95 - change;
            var logo = $('.static_logo');
            change = change + '';
            change = change + 'px';
            $('.static_logo').css({
                'height' : change
            });

        } else if(scroll < 25){
            // Full size logo bracket
            $('.static_logo').css({
                'height' : '95px'
            });
        } else if(scroll > 75){
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