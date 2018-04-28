<html>

<!--Sponsors page in the BII summer event LiveRES application-->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#7F56C6">
    <meta charset="UTF-8">

    <title>Our Sponsors</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="manifest" href="manifest.json">
</head>
<body id="sponsors">
    
<!--Include header-->
<?php include('partials/_header.php') ?>

<!--Primary page container-->
<section class="main_container">
    <div class="sponsors_outer">
        <div class="sponsors_title">Our Sponsors:</div>
        <div class="sponsors_main">
            <div class="lrg_box"><img class="sponsors_lrg" src="http://img2.email2inbox.co.uk/2017/bii/sky_logo.png" alt="Sky"></div>
            <div class="lrg_box"><img class="sponsors_lrg" src="http://img2.email2inbox.co.uk/2017/bii/carlsberg_logo.png" alt="Carlsberg"></div>
            <div class="lrg_box"><img class="sponsors_lrg" src="http://img2.email2inbox.co.uk/2017/bii/crown_cellars_logo.png" alt="Crown Cellars"></div>
            <div class="lrg_box"><img class="sponsors_lrg" src="http://img2.email2inbox.co.uk/2017/bii/fullers_logo.png" alt="Fullers"></div>
            <div class="lrg_box"><img class="sponsors_lrg" src="http://img2.email2inbox.co.uk/2017/bii/wadworth_logo.png" alt="Wadworth"></div>
            <div class="lrg_box"><img class="sponsors_lrg" src="http://img2.email2inbox.co.uk/2017/bii/ucc_logo.png" alt="UCC"></div>
            <div class="lrg_box"><img class="sponsors_lrg" src="http://img2.email2inbox.co.uk/2017/bii/old_mout_logo.png" alt="Old Mout"></div>
            <div class="lrg_box"><img class="sponsors_lrg" src="http://img2.email2inbox.co.uk/2017/bii/jagermeister_logo.png" alt="Jagermeister"></div>
            <div class="lrg_box"><img class="sponsors_lrg" src="http://img2.email2inbox.co.uk/2017/bii/britvic_logo.png" alt="Britvic"></div>
            <div class="lrg_box"><img class="sponsors_lrg" src="http://img2.email2inbox.co.uk/2017/bii/hildon_logo.png" alt="Hildon Water"></div>
            <div class="lrg_box"><img class="sponsors_lrg" src="http://img2.email2inbox.co.uk/2017/bii/pernod_logo.png" alt="Pernod Ricard"></div>
            <div class="lrg_box"><img class="sponsors_lrg" src="http://img2.email2inbox.co.uk/2017/bii/liveres.png" alt="LiveRES" style="filter: invert(100%); -webkit-filter: invert(100%);"></div>
            <div class="clearfix"></div>
        </div>
        <div class="sponsors_text">
            <div class="sponsors_title">
                We would also like to offer our thanks to the companies who have supported the Summer Event:
            </div>
            <p>
                Roslyns, PXL Insurance, Venners, Marston’s, Everards, Charles Wells, Diageo, Ei Group, Stars Pubs and Bars, Shepherd Neame, Ram Pub Company, WH Brakspear & Sons, S A Brain, Punch Taverns, Training Information Centre, CPL Training, Daniel Thwaites, Admiral Taverns, BT Sport, Greene King, Frederic Robinson, Wadworth, HIT Training, British Beer and Pub Association, BII London Regional Council, Innovation Licensed Retail, Poppleston Allen, BII North West North Wales Regional Council, The Phoenix Pub Group, Charnwood Training, Essex Training, BII Yorkshire Regional Council, BII Scotland Regional Council, The Licensed Trade Charity, CMS Pub Accountancy, BII South West Regional Council, Molson Coors, The Association of Licensed Multiple Retailers, Sherrards, Beds and Bars, RS Sales, Polaris Solutions, Stonegate, BIIAB, Hawthorn Leisure, Oxford Partnership, Butcome, BII South East Regional Council, Barons Pub Company, Drake and Morgan, The Waggon Inn
            </p>
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