/**
 * ------------------------------------------------
 * Jorden Powley - Main jQuery Functions
 * ------------------------------------------------
 * @requires - jQuery
 */

// ------------------------------------------------
// ----------------On Ready Function---------------
// ------------------------------------------------
$(document).ready(function(){
    /**
     * Hamburger menu functionality
     */
    $('.hamburger_container').on('click', function(event){
        event.preventDefault();
        event.stopPropagation();

        // Toggle the active class on the navigation container
        $('.navigation_container').toggleClass('active');
    });
});