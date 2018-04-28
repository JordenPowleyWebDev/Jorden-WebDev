<html>

<!--First page in the BII summer event LiveRES application-->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#7F56C6">
    <meta charset="UTF-8">

    <title>BII</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="manifest" href="manifest.json">
</head>

<body id="home">

<!--Include hamburger navigation-->
<?php include('partials/_navigation.php') ?>

<!--All index container-->
<section class="index_container grad_background">
    <div class="logo_container">
        <a href="/bii">
            <img class="logo" src="http://img2.email2inbox.co.uk/2017/bii/home_logo.png" alt="BII Summer Event" title="BII Summer Event">
        </a>
        <div class="cloud_container">
            <img class="cloud cloud_1" src="http://img2.email2inbox.co.uk/2017/bii/cloud_1.png" alt="cloud" data-vector="-2">
            <img class="cloud cloud_2" src="http://img2.email2inbox.co.uk/2017/bii/cloud_1.png" alt="cloud" data-vector="3">
            <img class="cloud cloud_3" src="http://img2.email2inbox.co.uk/2017/bii/cloud_1.png" alt="cloud" data-vector="-1">
            <img class="cloud cloud_4" src="http://img2.email2inbox.co.uk/2017/bii/cloud_1.png" alt="cloud" data-vector="0.5">
        </div>
    </div>
    <div class="hero_statement">
        <h1>
            <a href="https://www.google.co.uk/maps/place/The+Artillery+Garden+at+the+HAC/@51.5208809,-0.0908029,17z/data=!3m1!4b1!4m5!3m4!1s0x48761ca95c71703b:0xc4b83162b87a6f3c!8m2!3d51.5208809!4d-0.0886142" target="_blank" title="Go To">The Artillery Garden</a> At The HAC, Moorgate, London
        </h1>
    </div>
    <div class="hash_container">
        <img class="loya17" src="http://img2.email2inbox.co.uk/2017/bii/loyal.png" alt="#LOYA17">
    </div>
    <div class="sponsor_container">
        <div class="plane_container">
            <img class="sponsor_plane" src="http://img2.email2inbox.co.uk/2017/bii/sponsors_plane.png" alt="Sponsors Plane">
        </div>
        <img class="main_sponsors" src="http://img2.email2inbox.co.uk/2017/bii/sponsors.png" alt="Sponsors">
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
<!--Script for homepage only animations-->
<script>

    // Function for cloud movement
    // ACCEPTS no values
    // RETURNS no values
    function cloudWiggle(){
        // For each cloud
        $('.cloud').each(function(cloudIndex, cloud){
            // Get vector element from cloud
            var vector  = $(cloud).data('vector');
            var offset = $(cloud).offset();

            // Setup TimeLine
            var timel = new TimelineMax({
                repeat: -1
            });

            // Rotate away from center
            timel.to(cloud, 0.5,{
                // scale: 0.95,
                ease: 'linear',
                rotation: -vector,
                top: offset.top - vector,
                left: offset.left - vector,
                transformOrigin: "50% 50%",
            });

            // Rotate to center
            timel.to(cloud, 0.5,{
                // scale: 1,
                ease: 'linear',
                rotation: 0,
                top: offset.top,
                left: offset.left,
                transformOrigin: "50% 50%",
            });

            // Rotate away from center
            timel.to(cloud, 0.5,{
                // scale: 1.05,
                ease: 'linear',
                rotation: vector,
                top: offset.top + vector,
                left: offset.left + vector,
                transformOrigin: "50% 50%",
            });

            // Rotate to center
            timel.to(cloud, 0.5,{
                // scale: 1,
                ease: 'linear',
                rotation: 0,
                top: offset.top,
                left: offset.left,
                transformOrigin: "50% 50%",
            });
        });
    }

    // Function for plane movement
    // ACCEPTS no values
    // RETURNS no values
    function planeMove(){
        // Get Plane Object
        var plane = $('.sponsor_plane');

        // Get dimensions
        var screenWidth = $('body').width();
        var planeWidth = plane.width();

        // Setup TimeLine
        var timel = new TimelineMax({
            repeat: -1
        });

        timel.to(plane, 20,{
            ease: 'linear',
            left: screenWidth + planeWidth,
            transformOrigin: "50% 50%",
        });
    }

    // Function to hide plane
    // ACCEPTS no values
    // RETURNS no values
    function hidePlane(){
        // Get Plane Object
        var plane = $('.sponsor_plane');

        plane.css({'display': 'none'});
    }

    // Function to crash plane
    // ACCEPTS no values
    // RETURNS no values
    function crashPlane(){
        // Get Plane Object
        var plane = $('.sponsor_plane');

        // Get dimensions
        var screenWidth = $('body').width();
        var planeWidth = plane.width();

        // Setup TimeLine
        var timel = new TimelineMax({
            repeat: -1
        });

        timel.to(plane, 2.5,{
            ease: 'linear',
            left: screenWidth + planeWidth,
            top: '50vh',
            rotation: 90,
            transformOrigin: "50% 50%",
            onComplete: hidePlane
        });

    }

    // Start main processing here
    setTimeout(function(){
        cloudWiggle();
        planeMove();

        $('.sponsor_plane').on('click', function(event){
            crashPlane();
        });

    }, 1000);
</script>
</body>

</html>