<?php

/**
 * ------------------------------------------------------------
 * Jorden WebDev - Work Example Page
 * ------------------------------------------------------------
 * @desc - Includes a work example JSON file and dynamically 
 * generates the example links
 * ------------------------------------------------------------
 */

$workExamples = file_get_contents("../work_examples.json");
$workExamples = json_decode($workExamples, true);

?>

<section id="work_section" data-title="Work">
    <div class="right_section pale_grey_back title_block">
        <h3 class="title dark_blue_text">Work</h3>
    </div>
    <div class="left_section dark_blue_back text_block">
        <div class="mobile_outer">
            <div class="mobile_inner">
                <?php
                // FOREACH work example
                foreach($workExamples as $example){
                    // Build link button
                    $button;
                    if($example['DISPLAY'] === "DESK"){
                        // Desktop page
                        $button = '<a href="' . $example['URL'] . '" class="work_tile transition" target="_blank">' . $example['TITLE'] . '</a>';
                    } else{
                        // Mobile view page
                        $url = 'processes/route_example.php?example=' . urlencode($example['URL']) . '&view=mobile';
                        $button = '<a href="' . $url . '" class="work_tile transition" target="_blank">' . $example['TITLE'] . '</a>';
                    }

                    // Print button
                    echo $button;
                }
                ?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</section>          