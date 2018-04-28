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
var originalRatio = originalScreenWidth / originalScreenHeight;

var screenHeight = originalScreenHeight;
var screenWidth = originalScreenWidth;
var sectionTitles = [];
var sectionIDs = [];

var viewportUpper = (screenHeight / 100) * 40;
var viewportMid = (screenHeight / 100) * 50;
var viewportLower = (screenHeight / 100) * 60;

var activeID;
var activePage;
var sectionFoundLoad = false;

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
        sectionIDs[index] = name;
    });

    currentActivePage();

    // Detect click on a header label
    $(".location_labels.visible").on('click', function(event){
        event.preventDefault();
        event.stopPropagation();

        // Get ID from the elements data tag
        var target = $(this).data('section');
        
        $('html, body').animate({
            scrollTop: $('#' + target).offset().top - 80
        }, 1500);
    });
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
    viewportUpper = (screenHeight / 100) * 40;
    viewportMid = (screenHeight / 100) * 50;
    viewportLower = (screenHeight / 100) * 60;

    // Calculate the new ratio
    var newRatio = screenWidth / screenHeight;

    // See if new ratio is within 10% of the original
    var lowerPerc = originalRatio * 0.9;
    var upperPerc = originalRatio * 1.1;

    if((lowerPerc <= newRatio) && (newRatio <= upperPerc)){
        // Ratio changed back -> Open overlay
        closeOverlay();

    } else{
        // Ratio changed back
        openOverlay();
    }
}

/**
 * currentActivePage()
 * @desc - Calculates the current active section
 */
function currentActivePage(){
    // Loop through each section
    $('section').each(function(index, element){
        // Calculate the difference between the section and the viewport
        var difference = ($(element).offset().top + ($(element).height() / 2)) - $(window).scrollTop();

        // Check if element is in the bounding area
        if ((difference >= viewportUpper) && (difference < viewportLower)){
            // Element in in bounding area -> SET as current element
            activePage = $(element).attr('id');
            activeID = index;
            sectionFoundLoad = true;

            // Get prev and next pages from the array
            if(index === (sectionTitles.length - 1)){
                // Last section on the page -> Empty lower label and fill upper label
                $('#lower_label').removeClass('visible');
                $('#upper_label').html("Prev: " + sectionTitles[index - 1]);
                $('#upper_label').data('section', sectionIDs[index - 1]);
                $('#upper_label').addClass('visible');
            } else if(index === 0){
                // First element on the page
                $('#lower_label').removeClass('visible');
                $('#upper_label').removeClass('visible');
            } else {
                // Middle element
                $('#lower_label').html("Next: " + sectionTitles[index + 1]);
                $('#lower_label').data('section', sectionIDs[index + 1]);
                $('#lower_label').addClass('visible');
                $('#upper_label').html("Prev: " + sectionTitles[index - 1]);
                $('#upper_label').data('section', sectionIDs[index - 1]);
                $('#upper_label').addClass('visible');
            }
        } else if ((difference >= 80) && (difference < viewportLower) && ($(element).attr('id') === "hero_section")) {
            // Hero section -> hide labels
            $('#lower_label').removeClass('visible');
            $('#upper_label').removeClass('visible');
        } else if ((difference >= 80) && (difference < viewportLower) && ($(element).attr('id') === "contact_section")){
            // Contact section
            $('#lower_label').removeClass('visible');
            $('#upper_label').html("Prev: " + sectionTitles[index - 1]);
            $('#upper_label').data('section', sectionIDs[index - 1]);
            $('#upper_label').addClass('visible');
        }
    });

    // See if a section was found on load
    if (sectionFoundLoad !== true) {
        // No section found -> re-calc
        $('section').each(function (index, element) {
            // Calculate the difference between the section and the viewport
            var difference = $(element).offset().top - $(window).scrollTop();

            altUpper = (screenHeight / 100) * 20;
            altLower = (screenHeight / 100) * 80;

            // Check if element is in the bounding area
            if ((difference >= altUpper) && (difference < altLower)) {
                // Element in in bounding area -> SET as current element
                activePage = $(element).attr('id');
                activeID = index;
                sectionFoundLoad = true;

                // Get prev and next pages from the array
                if (index === (sectionTitles.length - 1)) {
                    // Last section on the page -> Empty lower label and fill upper label
                    $('#lower_label').removeClass('visible');
                    $('#upper_label').html("Prev: " + sectionTitles[index - 1]);
                    $('#upper_label').data('section', sectionIDs[index - 1]);
                    $('#upper_label').addClass('visible');
                } else if (index === 0) {
                    // First element on the page
                    $('#lower_label').removeClass('visible');
                    $('#upper_label').removeClass('visible');
                } else {
                    // Middle element
                    $('#lower_label').html("Next: " + sectionTitles[index + 1]);
                    $('#lower_label').data('section', sectionIDs[index + 1]);
                    $('#lower_label').addClass('visible');
                    $('#upper_label').html("Prev: " + sectionTitles[index - 1]);
                    $('#upper_label').data('section', sectionIDs[index - 1]);
                    $('#upper_label').addClass('visible');
                }
            } else if ((difference >= 80) && (difference < altLower) && ($(element).attr('id') === "hero_section")) {
                // Hero section -> hide labels
                $('#lower_label').removeClass('visible');
                $('#upper_label').removeClass('visible');
            } else if ((difference >= 80) && (difference < altLower) && ($(element).attr('id') === "contact_section")) {
                // Contact section
                $('#lower_label').removeClass('visible');
                $('#upper_label').html("Prev: " + sectionTitles[index - 1]);
                $('#upper_label').data('section', sectionIDs[index - 1]);
                $('#upper_label').addClass('visible');
            }
        });
    }
}

/**
 * displayLabel()
 * @desc - Fades in and fades out a position label
 * @param {Object} label        - Label to be animated
 * @param {String} animation    - Animation need [IN, OUT, BOTH]
 * @param {String} text         - Text for a label (Optional)
 */
function displayLabel(label, animation, text = undefined){
    // Parse which animation is needed
    if (animation === "IN"){
        // Insert text
        changeText($(label), text);
        
        // Execute animation
        TweenMax.to($(label), 0.5, {
            left: '40px',
            // opacity: 1,
            ease: 'ease-in'
        });
    } else if (animation === "OUT"){
        // Execute animation
        TweenMax.to($(label), 0.5, {
            left: '10px',
            // opacity: 0,
            ease: 'ease-in',
            onComplete: changeText($(label))
        });
    }
}

/**
 * changeText()
 * @desc - Changes the text in a label on animation completion
 * @param {Object} label        - Label to be animated
 * @param {String} text         - Text for a label (Optional)
 */
function changeText(label, text = undefined){
    // See if text is empty or undefined
    if(text === undefined){
        // Remove text from label
        console.log("Remove text");
        $(label).empty();
    } else{
        // Insert text
        console.log(text);
        $('#upper_label').html(text);
    }
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

    // Check if the target is to go to an anchor link
    if (target.indexOf('#') > -1){
        // Anchor link is target -> Scroll
        $('html, body').animate({
            scrollTop: $(target).offset().top - 80
        }, 1500);   
    } else{
        // None anchor link - Redirect
        window.location.replace(target);
    }
}

// ------------------------------------------------
// ---------------Overlay Functions----------------
// ------------------------------------------------

/**
 * openOverlay()
 * @desc - Opens the overlay after a screen ratio change
 */
function openOverlay(){
    $('#resizing_overlay').addClass('active');
}

/**
 * closeOverlay()
 * @desc - Closes the overlay after a screen ratio change
 */
function closeOverlay() {
    $('#resizing_overlay').removeClass('active');
}