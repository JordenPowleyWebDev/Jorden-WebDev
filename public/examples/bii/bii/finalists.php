<html>

<!--Finalists page in the BII summer event LiveRES application-->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#7F56C6">
    <meta charset="UTF-8">

    <title>Finalists</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="manifest" href="manifest.json">
</head>
<body id="finalists">
    
<!--Include header-->
<?php include('partials/_header.php') ?>

<!--Primary page container-->
<section class="main_container">
    <div class="finalists_inner">
        <div class="finalists_title">
            Licensee of the Year<br> Award Finalists:
        </div>

        <!--Awaiting Mark Higgs-->
        <div class="finalist">
            <img class="finalist_hex" src="http://img2.email2inbox.co.uk/2017/bii/mark_higgs.png" alt="Mark Higgs">
            <div class="finalist_name">Mark Higgs</div>
            <div class="finalist_location">Castle Inn, Edgehill,<br>Banbury, Warwickshire </div>
            <div class="finalist_bio">
                Mark took over the Castle Inn at Edgehill in October of 2013. 
                Since then Mark and his team have worked hard to develop and modernise what was a bit of a ‘spit and sawdust’ pub. 
                The pub is steeped in history, not only because it’s a castle but it also overlooks the historic Edgehill Civil War battle ground. 
                The Castle Inn offers its customers accommodation, event space as well as good food and wine.
            </div>
        </div>
        <div class="finalist">
            <img class="finalist_hex" src="http://img2.email2inbox.co.uk/2017/bii/jennifer_kuhn.png" alt="Jennifer Kuhn">
            <div class="finalist_name">Jennifer Kuhn</div>
            <div class="finalist_location">The Windsor Fenchurch,<br>London</div>
            <div class="finalist_bio">
                Jennifer started out in the industry back in her hometown of Plymouth in a busy Yates' kitchen, 
                as a humble plate garnisher! 
                She has managed the Windsor Fenchurch for the last ten years and has been part of the many changes to the pub throughout this time, 
                including a move to partial weekend opening and catching some of the valuable tourist trade in the City. 
            </div>
        </div>
        <div class="finalist">
            <img class="finalist_hex" src="http://img2.email2inbox.co.uk/2017/bii/clive_price.png" alt="Clive Price">
            <div class="finalist_name">Clive Price</div>
            <div class="finalist_location">Bletchingly Arms,<br>Redhill, Surrey</div>
            <div class="finalist_bio">
                Clive made his debut in the industry at the tender age of 16 as a kitchen porter at Thorpe Park. 
                After several years of experience Clive founded Barons Pub Company from scratch and now has seven pubs under his belt. 
                Each are friendly local pubs, open to all for any occasion. 
            </div>
        </div>
        <div class="finalist">
            <img class="finalist_hex" src="http://img2.email2inbox.co.uk/2017/bii/mark_thornhill.png" alt="Mark Thornhill">
            <div class="finalist_name">Mark Thornhill</div>
            <div class="finalist_location">The Kings Head,<br>Hursley, Hampshire </div>
            <div class="finalist_bio">
                Mark and his wife Penny took over The Kings Head just under three years ago. 
                The Kings Head is an historic old Georgian Inn with a few quirky and luxury touches here and there, 
                located in the beautiful village of Hursley south of Winchester. 
                Their approach centres on friendly service, exceptional attention to detail and sourcing locally where they can.
            </div>
        </div>
        <div class="finalist">
            <img class="finalist_hex" src="http://img2.email2inbox.co.uk/2017/bii/tim_tomlinson.png" alt="Tim Tomlinson">
            <div class="finalist_name">Tim Tomlinson </div>
            <div class="finalist_location">Merchants 1688,<br>Lancaster, Lancashire</div>
            <div class="finalist_bio">
                Tim began his working life in a somewhat different industry: Steel. 
                Having family ties to the industry and a love of real Ale, 
                he swapped the factory for Firkins and brought his first pub. 
                Tim brought Merchants 1688 ten years ago; a historic building the Merchants is set in the rock under Lancaster Castle and is Grade II listed. 
                The Merchants focuses on pub dining, in a relaxed friendly atmosphere, 
                with a great range of cask ale and of course, wine.  
            </div>
        </div>
        <div class="finalist">
            <img class="finalist_hex" src="http://img2.email2inbox.co.uk/2017/bii/chantelle_tupman.png" alt="Chantelle Tupman-John">
            <div class="finalist_name">Chantelle Tupman-John</div>
            <div class="finalist_location">The Waggon Inn,<br>Uppermill, Lancashire</div>
            <div class="finalist_bio">
                As a tenant with Frederick Robinson Chantelle took over The Waggon Inn in May of 2013. 
                The Waggon is a small pub set in the heart of Saddleworth which prides itself on providing an unrivalled experience from the moment the customer walks through the door to the moment they leave. 
                As a lifelong resident of Saddleworth Chantelle knew The Waggon had potential, 
                refurbishing and modernising it she has made it the success it is today.
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