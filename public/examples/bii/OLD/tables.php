<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$delegates = file_get_contents('guests.json');
$delegates = json_decode($delegates, true);

$tables = array();
$prevNumber = 1;
$table = array();

foreach($delegates['PEOPLE'] as $delegate){
    if($delegate["TABLE_NUMBER"] == $prevNumber){
        array_push($table, $delegate);
    } else{
        $prevNumber = $delegate["TABLE_NUMBER"];
        array_push($tables, $table);
        $table = array();
        array_push($table, $delegate);
    }
}

array_push($tables, $table);

?>

<html>

<!--Tables page in the BII summer event LiveRES application-->
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
<body id="tables">
    
<!--Include header-->
<?php include('partials/_header.php') ?>

<!--Primary page container-->
<section class="main_container grad_background">
    <div class="blockbuster_outer">
        <?php
            $TABLE_MAX = sizeof($tables);
            $tileCount = 1;
            $even = true;

            /*for($i = 1; $i <= $TABLE_MAX; $i++){
                // Start row off
                if($tileCount === 1){
                    if($even === true){
                        echo '<div class="hex_row even">';
                    } else{
                        echo '<div class="hex_row odd">';
                    }
                }

                echo '<div class="hex" data-table="' . $i . '">';
                echo '<div class="hex_top"></div>';
                echo '<div class="hex_middle">' . $i . '</div>';
                echo '<div class="hex_bottom"></div>';
                echo '<div class="table-data"></div>';
                echo '</div>';

                if(($tileCount == 3) && ($even === false)){
                    $tileCount = 1;
                    $even = true;
                    echo '<div class="clearfix"></div>';
                    echo '</div>';
                } else if(($tileCount == 4) && ($even === true)){
                    $tileCount = 1;
                    $even = false;
                    echo '<div class="clearfix"></div>';
                    echo '</div>';
                } else{
                    $tileCount++;
                }
            }*/

            foreach($tables as $key => $table){
                // Start row off
                if($tileCount === 1){
                    if($even === true){
                        echo '<div class="hex_row even">';
                    } else{
                        echo '<div class="hex_row odd">';
                    }
                }

                echo '<div class="hex" data-table="' . ($key + 1) . '">';
                echo '<div class="hex_top"></div>';
                echo '<div class="hex_middle">' . ($key + 1) . '</div>';
                echo '<div class="hex_bottom"></div>';
                echo '<div class="table-data">';
                foreach($table as $delegate){
                    echo '<span class="delegate" data-firstname="' . $delegate['FIRSTNAME'] . '" data-surname="' . $delegate['SURNAME'] . '" data-company="' . $delegate['COMPANY'] . '" data-title="' . $delegate['JOB_TITLE'] . '"></span>';
                }
                echo '</div>';
                echo '</div>';

                if(($tileCount == 3) && ($even === false)){
                    $tileCount = 1;
                    $even = true;
                    echo '<div class="clearfix"></div>';
                    echo '</div>';
                } else if(($tileCount == 4) && ($even === true)){
                    $tileCount = 1;
                    $even = false;
                    echo '<div class="clearfix"></div>';
                    echo '</div>';
                } else{
                    $tileCount++;
                }
            }

            // Remove After Testing
            foreach($tables as $key => $table){
                // Start row off
                if($tileCount === 1){
                    if($even === true){
                        echo '<div class="hex_row even">';
                    } else{
                        echo '<div class="hex_row odd">';
                    }
                }

                echo '<div class="hex" data-table="' . ($key + 1) . '">';
                echo '<div class="hex_top"></div>';
                echo '<div class="hex_middle">' . ($key + 1) . '</div>';
                echo '<div class="hex_bottom"></div>';
                echo '<div class="table-data">';
                foreach($table as $delegate){
                    echo '<span class="delegate" data-firstname="' . $delegate['FIRSTNAME'] . '" data-surname="' . $delegate['SURNAME'] . '" data-company="' . $delegate['COMPANY'] . '" data-title="' . $delegate['JOB_TITLE'] . '"></span>';
                }
                echo '</div>';
                echo '</div>';

                if(($tileCount == 3) && ($even === false)){
                    $tileCount = 1;
                    $even = true;
                    echo '<div class="clearfix"></div>';
                    echo '</div>';
                } else if(($tileCount == 4) && ($even === true)){
                    $tileCount = 1;
                    $even = false;
                    echo '<div class="clearfix"></div>';
                    echo '</div>';
                } else{
                    $tileCount++;
                }
            }
            foreach($tables as $key => $table){
                // Start row off
                if($tileCount === 1){
                    if($even === true){
                        echo '<div class="hex_row even">';
                    } else{
                        echo '<div class="hex_row odd">';
                    }
                }

                echo '<div class="hex" data-table="' . ($key + 1) . '">';
                echo '<div class="hex_top"></div>';
                echo '<div class="hex_middle">' . ($key + 1) . '</div>';
                echo '<div class="hex_bottom"></div>';
                echo '<div class="table-data">';
                foreach($table as $delegate){
                    echo '<span class="delegate" data-firstname="' . $delegate['FIRSTNAME'] . '" data-surname="' . $delegate['SURNAME'] . '" data-company="' . $delegate['COMPANY'] . '" data-title="' . $delegate['JOB_TITLE'] . '"></span>';
                }
                echo '</div>';
                echo '</div>';

                if(($tileCount == 3) && ($even === false)){
                    $tileCount = 1;
                    $even = true;
                    echo '<div class="clearfix"></div>';
                    echo '</div>';
                } else if(($tileCount == 4) && ($even === true)){
                    $tileCount = 1;
                    $even = false;
                    echo '<div class="clearfix"></div>';
                    echo '</div>';
                } else{
                    $tileCount++;
                }
            }
            
        ?>
    </div>
    <div class="clearfix"></div>
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
    var screenWidth = $('body').width();
    var upperBoundary;
    var lowerBoundary = ($('footer').offset().top - $(window).scrollTop()) - 100;

    // Determine screen widths
    if(screenWidth <= 374){
        upperBoundary = 120;
    } else if((screenWidth >= 375) && (screenWidth <= 413)){
        upperBoundary = 120;
    } else if(screenWidth >= 414){
        upperBoundary = 120;
    }

    // Function to check hexagon position
    // ACCEPTS hexagon Object
    // RETURNS
    function checkPosition(row){
        var position = $(row).offset();
        var top = position.top - $(window).scrollTop();

        // IF above the header boundary
        if(top < upperBoundary){
            // Calc difference for smooth gradient
            var difference = upperBoundary - top;
            if((difference > 0) && (difference <= 100)){
                // Calc opacity
                var opacity = 1 - (difference / 100);
                // Set opacity
                $(row).css({
                    'opacity': opacity
                });
            } else if(difference > 100){
                // If hex is out the boundary area set as 0 opacity
                $(row).css({
                    'opacity': 0
                });
            }
        }

        // IF in the central location
        if(/*(top < lowerBoundary) &&*/ (top >= upperBoundary)){
            // Set opacity as 1
            $(row).css({
                'opacity': 1
            });
        }
        
        // IF below the footer boundary
        // if(top >= lowerBoundary){
        //     // Calc differance for smooth gradient
        //     var difference = top - lowerBoundary;
        //     if((difference > 0) && (difference <= 100)){
        //         // Calc opacity
        //         var opacity = 1 - (difference / 100);
        //         // Set opacity
        //         $(row).css({
        //             'opacity': opacity
        //         });
        //     } else if (difference > 100){
        //         // If hex is out the boundary area set as 0 opacity
        //         $(row).css({
        //             'opacity': 0
        //         });
        //     }
        // }
    }

    // Set correct hexagons transparent on load
    $('.hex_row').each(function(index, element){
        // Check position
        checkPosition(element);
    });

    // Detect scroll event
    $(window).on('scroll', function(event){
        // For each hexagon
        $('.hex_row').each(function(index, element){
            // Check position
            checkPosition(element);
        });
    });

    // Function to prevent scroll cascade on mobile
    // ACCEPTS event 
    function preventDefault(e) {
        if (event.currentTarget.allowDefault) {
            return;
        }
        e.preventDefault();
    }

    // Detect when screen is resized and adjusted fading boundaries
    $(window).resize(function(event){
        lowerBoundary = ($('footer').offset().top - $(window).scrollTop()) - 100;

        $('.hex_row').each(function(index, element){
            // Check position
            checkPosition(element);
        });
    });

</script>

</body>

</html>