<?php

/**
 * ------------------------------------------------------------
 * Jorden WebDev - Route Example Process
 * ------------------------------------------------------------
 * @desc - Routes to an example site within this directory
 * ------------------------------------------------------------
 */

// ------------------------------------------------------------
// -----------------------Global Variables---------------------
// ------------------------------------------------------------

// ------------------------------------------------------------
// ----------------------Process Functions---------------------
// ------------------------------------------------------------

/**
 * redirect();
 * @desc - Redirect to specified location
 * @param {String} $location        - Location to be redirected to
 */

 function redirect($location){
    header('Location: ' . $location);
    die();
 }

// ------------------------------------------------------------
// ---------------------Start Process Here---------------------
// ------------------------------------------------------------

// Ensure that the correct GET param has been set
if(!isset($_GET['example']) || empty($_GET['example']) || !array_key_exists('example', $_GET) || !isset($_GET['view']) || empty($_GET['view']) || !array_key_exists('view', $_GET)){
    // Example OR view param are not set -> Redirect
    redirect("/");
} else{
    // Example AND view param have been set -> Check param is within accepted array
    $example = urldecode($_GET['example']);
    $view = $_GET['view'];

    // Site exists -> See what view is required
    if($view === "mobile"){
        // Redirect within a mobile view
        redirect("../mobile.php?page=" . urlencode($example));
    } else{ 
        // Redirect to site
        redirect($example);
    }

}

?>