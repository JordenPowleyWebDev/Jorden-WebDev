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

    <!--Hacks for IE/Edge-->
    <!--[if !IE 6]><!-->
        <style>
        thead{
            position: relative !important;
        }
        </style>
    <!--<![endif]-->

    <!--[if gte IE 7]>
    <style>
        thead{
            position: relative !important;
        }
        </style>
    <![endif]-->

    <!--[if lte IE 6]>
        <style>
        thead{
            position: relative !important;
        }
        </style>
    <![endif]-->

</head>
<body id="attendees">

<div class="grad_background" style="width: 100vw; max-width: 1024px; height: 100vh; display: block; position: fixed; top: 0; left: 50%; transform: translateX(-50%);"></div>

<!--Include header-->
<?php include('partials/_header.php') ?>

<!--Table data-->
<section class="table_data">
    <?php
        // For All Tables
        foreach($tables as $table){
            
            echo '<div id="table-number" class="table-' . $table[0]['TABLE_NUMBER'] . '" data-table="' . $table[0]['TABLE_NUMBER'] . '">';

            // For All Delegate
            foreach($table as $delegate){
                echo '<span data-table="' . $delegate["TABLE_NUMBER"] . '" data-firstname="' . $delegate["FIRSTNAME"] . '" data-surname="' . $delegate["SURNAME"] . '" data-company="' . $delegate["COMPANY"] . '"></span>';
            }

            echo '</div>';
        }
    ?>
</section>

<!--Primary content container-->
<section class="main_container">
    <div class="attendees_inner">
        <div class="search_container">
            <input type="text" id="search" name="search" placeholder="Search By Surname">
        </div>
        <table>
            <thead>
                <tr>
                    <th>Table</th>
                    <th>First Name</th>
                    <th>Surname</th>
                    <th class="clearfix"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $ROW_AMOUNT = 50;
                    foreach($delegates['PEOPLE'] as $delegate){
                        echo '<tr class="data" data-table="' . $delegate["TABLE_NUMBER"] . '">';
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

    // First Row Fix
    var firstRow = $('table tbody tr:first-child');
    var firstRowSurname = $(firstRow).find('td.surname').text();
    // If search does not match a surname
    if (firstRowSurname.indexOf(value) != 0) {
        $(firstRow).hide();
    } else {
        // Show row if a matching surname has been found
        $(firstRow).show();
    }

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

// Detect when search box is focused.
$('#search').on('focus', function(event){
  // Shrink header logo
  $('.static_logo').css({
    'height' : '45px'
  });
  // Raise search area
  $('.attendees_inner').css({
    'margin-top' : '10px'
  });
  // Hide footer nav
  $('footer').css({
    'opacity' : '0',
    'height' : '0'
  });
});
$('#search').on('focusout', function(event){
  // Grow header logo
  $('.static_logo').css({
      'height' : '95px'
  });
  // Lower search area
  $('.attendees_inner').css({
    'margin-top' : '50px'
  });
  // Show footer nav
  $('footer').css({
    'opacity' : '1',
    'height' : '70px'
  });
});

// Function to open table drop down
// ACCEPTS table -> (int)
// RETURNS no values
function dropDownTable(table){

    $('.table_hex_middle').html(table);

    // Empty overlay table
    $('.overlay_table tbody').empty();

    // Foreach span within this hex
    var tableToFind = 'div.table-' + table + '';
    var allSpans = $(tableToFind).find('span');

    // For each delegate span
    $(allSpans).each(function(key, element){
        // Get data from span
        var firstname = $(element).data('firstname');
        var surname = $(element).data('surname');
        var company = $(element).data('company');

        // Setup row
        var row = '<tr>';
        row += '<td>' + firstname + ' ' + surname + '</td>';
        row += '<td>' + company + '</td>';
        row += '<td class="clearfix"></td>';
        row += '</tr>';

        // Append row to table
        $('.overlay_table tbody').append(row);
    });

    // Animate overlay
    TweenMax.to($('.table_overlay'), 0.5, {
        ease: Power3.easeIn,
        top: '0vh'
    });
}

// Detect click on table row
$('tbody tr').on('click', function(event){
    event.stopPropagation();
    
    // Get table number and drop down table info
    var table = $(this).data('table');
    dropDownTable(table);
    // Shrink header logo
    $('.static_logo').css({
        'height' : '45px'
    });
});

</script>

</body>

</html>
