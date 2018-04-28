<html>

<!--Menu page in the BII summer event LiveRES application-->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#7F56C6">
    <meta charset="UTF-8">

    <title>Menu</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="manifest" href="manifest.json">
</head>
<body id="menu">
    
<!--Include header-->
<?php include('partials/_header.php') ?>

<!--Primary page container-->
<section class="main_container">
    <div class="menu_inner">
        <div class="menu_title">Menu</div>
        <div class="menu_text">
            <div class="menu_coarse">
                <p class="coarse_name">Starter</p>
                <p class="menu_item">Picnic Hamper</p>
                <p class="item_description">Mini gala pie, coronation chicken frittata, smoked salmon rillettes with pickled asparagus and curd.</p>
                <p class="menu_item">Greek Salad</p>
                <p class="item_description">Feta parfait, grilled snake beans with Inca tomatoes, compressed cucumber, olive granola with basil.</p>
            </div>
            <div class="menu_coarse">
                <p class="coarse_name">Main Course</p>
                <p class="menu_item">Beef &amp; Onion</p>
                <p class="item_description">Pot Roasted Beef, sticky glazed shallots, horseradish fondant, watercress and fennel salad.</p>
                <p class="menu_item">Pearl Barley & Spelt</p>
                <p class="item_description">Crispy barley and spelt cake, salted baked beets, miso crusted Aubergine with fresh curd and a smoked dressing.</p>
            </div>
            <div class="menu_coarse">
                <p class="coarse_name">Dessert Canapes</p>
                <p class="menu_item">Toasted Pecan Brownie</p>
                <p class="item_description">Salted caramel.</p>
                <p class="menu_item">Elderflower Mascarpone Tart</p>
                <p class="item_description">Muddled strawberries</p>
                <p class="menu_item">Homemade Éclairs</p>
                <p class="item_description">Lemon posset cream</p>
            </div>
            <div class="menu_coarse">
                <p class="coarse_name">Wine</p>
                <p class="menu_item">Red</p>
                <p class="item_description">Dead Man’s Dice Malbec, Mendoza.</p>
                <p class="menu_item">White</p>
                <p class="item_description">Lazy Bones Sauvignon Blanc Semillon </p>
                <p class="coarse_name">Wine provided courtesy of</p>
                <img src="http://img2.email2inbox.co.uk/2017/bii/crown_cellars.jpeg" alt="Crown Cellars">
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