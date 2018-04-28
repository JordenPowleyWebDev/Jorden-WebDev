<?php

$delegates = file_get_contents('guests.json');
$delegates = json_decode($delegates, true);

?>

<html>

<!--Attendees page in the BII summer event LiveRES application-->
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
<body id="attendees">
    
<!--Include header-->
<?php include('partials/_header.php') ?>

<!--Primary content container-->
<section class="main_container grad_background">
    <div class="attendees_inner">
        <div class="search_container">
            <input type="text" id="search" name="search" placeholder="Search By Surname">
        </div>
        <table>
            <thead>
                <tr>
                    <th>Table</th>
                    <th>Surname</th>
                    <th>First Name</th>
                    <th class="clearfix"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $ROW_AMOUNT = 50;
                    foreach($delegates['PEOPLE'] as $delegate){
                        echo '<tr>';
                        echo '<td class="table_number">' . $delegate["TABLE_NUMBER"] . '</td>';
                        echo '<td class="firstname">' . $delegate['FIRSTNAME'] . '</td>';
                        echo '<td class="surname">' . $delegate['SURNAME'] . '</td>';
                        echo '<td class="clearfix"></td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
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

// Function to adjust table field dependent on search on
// ACCEPTS no values
// RETURNS no values
$("#search").on("keyup", function() {
    // Get value from search box
    var value = $(this).val().toUpperCase();
    var tr    = $('table tr.data');

    // FOREACH table row NOT in thead
    $("table tbody tr").each(function(index) {
        // Check if rows have been returned
        if (index != 0) {
            $row = $(this);

            // Get surname and table name from row
            var surname = $row.children('.surname').text();
            var table = $row.children('.table_number').text();

            // Transform variables
            surname = surname.toUpperCase();
            table = table.toUpperCase();

            // If search does not match a surname
            if (surname.indexOf(value) != 0) {
                $(this).hide();
            } else {
                // Show row if a matching surname has been found
                $(this).show();
            }
        }
    });
    $('html,body').animate({
            scrollTop: $('body').offset().top
    }, 500);
});

</script>

</body>

</html>