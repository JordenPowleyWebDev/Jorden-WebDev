/**
 * ------------------------------------------------
 * Jorden Powley - Main jQuery Functions
 * ------------------------------------------------
 * @requires - jQuery
 */

// ------------------------------------------------
// ----------------Global Variables----------------
// ------------------------------------------------
var originalScreenWidth = $(window).width();
var originalScreenHeight = $(window).height();
var screenHeight = originalScreenHeight;
var screenWidth = originalScreenWidth;
var sectionTitles = [];

var viewportUpper = (screenHeight / 100) * 25;
var viewportLower = (screenHeight / 100) * 75;

var activeID;
var activePage;

// ------------------------------------------------
// ----------------On Ready Function---------------
// ------------------------------------------------
$(document).ready(function(){
    // ------------------------------------------------
    // -----------------Generic Events-----------------
    // ------------------------------------------------

    // Hamburger menu functionality
    $('.hamburger_container').on('click', function(event){
        event.preventDefault();
        event.stopPropagation();

        // Toggle the active class on the navigation container
        $('.navigation_container').toggleClass('active');
    });

    // Detect click on a navigation item
    $('.nav_link').on('click', function(event){
        event.stopPropagation();
        event.preventDefault();

        // Call function
        navigate($(this));
    });

    // Detect screen resize and call function
    $(window).resize(function(event){
        // Call function
        screenDimensions();
    });

    // Detect page scroll
    $(window).scroll(function(event){
        // Call event
        currentActivePage();
    });

    // Get all sections
    $('section').each(function(index, element){
        // Get title from element
        var title = $(element).data('title');
        var name = $(element).attr('id');

        sectionTitles[index] = title;
    });

    currentActivePage();
});

// ------------------------------------------------
// ----------------Generic Functions---------------
// ------------------------------------------------

/**
 * screenDimensions()
 * @desc - Calculates the window wwidth and height
 */
function screenDimensions(){
    // Calculate dimensions
    screenWidth = $(window).width();
    screenHeight = $(window).height();

    // Calc viewport limits
    viewportUpper = (screenHeight / 100) * 25;
    viewportLower = (screenHeight / 100) * 75;
}

/**
 * currentActivePage()
 * @desc - Calculates the current active section
 */
function currentActivePage(){
    // Loop through each section
    $('section').each(function(index, element){
        // calculate the difference between the section and the viewport
        var difference = $(element).offset().top - $(window).scrollTop();

        // Check if element is in the bounding area
        if((difference >= viewportUpper) && (difference <= viewportLower)){
            // Element in in bounding area -> SET as current element
            activePage = $(element).attr('id');
            activeID = index;

            // Get prev and next pages from the array
            if(index === (sectionTitles.length - 1)){
                // Last section on the page -> Empty lower label and fill upper label
                $('#lower_label').empty();
                $('#upper_label').html(sectionTitles[index + 1]);
            } else if(index === 0){
                // First element on the page
                $('#lower_label').html(sectionTitles[index - 1]);
                $('#upper_label').empty();
            } else {
                // Middle element
                $('#lower_label').html(sectionTitles[index + 1]);
                $('#upper_label').html(sectionTitles[index - 1]);
            }
        }
    });
}

// ------------------------------------------------
// --------------Navigation Functions--------------
// ------------------------------------------------

/**
 * navigate()
 * @desc - Navigates to a nav items relevant section
 * @param {Object} navItem      - Nav item the event occurred
 */
function navigate(navItem){
    // Get the target section fromn the nav item
    var target = $(navItem).attr('href');

    $('html, body').animate({
        scrollTop: $(target).offset().top - 80
    }, 1500);
}