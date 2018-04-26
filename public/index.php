<!DOCTYPE html>
<!--[if lte IE 6]><html class="preIE7 preIE8 preIE9"><![endif]-->
<!--[if IE 7]><html class="preIE8 preIE9"><![endif]-->
<!--[if IE 8]><html class="preIE9"><![endif]-->
<!--[if gte IE 9]><!--><html><!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <meta name="author" content="Jorden Powley">
    <meta name="description" content="Jorden Powley - Web Developer. This is an online portfolio.">
    <meta name="keywords" content="powley, jorden, web, developer, portfolio, php, css, html, js, jquery, git">

    <title>Jorden Powley</title>

    <link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon">
    <link href="https://fonts.googleapis.com/css?family=Lato:300|Raleway:300" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css" type="text/css">
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script src="/js/main.js" type="text/javascript"></script>
</head>
<body>

    <div class="header_bar left_bar"></div>
    <div class="header_bar right_bar"></div>
    <div class="header_bar lower_bar">
        <div class="location_labels dark_blue_text no_flicker" id="lower_label"></div>
    </div>
    <header class="header_bar">
        <div class="location_labels dark_blue_text no_flicker" id="upper_label"></div>
        <?php include "partials/_navigation.php"; ?>
    </header>

<div class="body_container">
    <?php include "partials/_home.php"; ?>
    <?php include "partials/_bio.php"; ?>
    <?php include "partials/_experience.php"; ?>
    <?php include "partials/_tech.php"; ?>
    <?php include "partials/_work.php"; ?>
    <?php include "partials/_contact.php"; ?>
</div>
</body>
</html>