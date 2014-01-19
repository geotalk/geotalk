<?php
// header.php

require_once("connect.php");
require("functions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>Geotalk</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">


  <link rel="apple-touch-icon" href="touch-icon-iphone.png" /> 
<link rel="apple-touch-icon" sizes="76x76" href="touch-icon-ipad.png" /> 
<link rel="apple-touch-icon" sizes="120x120" href="touch-icon-iphone-retina.png" />
<link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad-retina.png" />

  <!-- Stylesheets -->
  <link href="style/bootstrap.css" rel="stylesheet">
  <!-- Font awesome icon -->
  <link rel="stylesheet" href="style/font-awesome.css"> 
  <!-- jQuery UI -->
  <link rel="stylesheet" href="style/jquery-ui.css"> 
  
  <!-- prettyPhoto -->
  <link rel="stylesheet" href="style/prettyPhoto.css">   
  <!-- Star rating -->
  <link rel="stylesheet" href="style/rateit.css">
  
  <!-- CLEditor -->
  <link rel="stylesheet" href="style/jquery.cleditor.css"> 
  <!-- Uniform -->
  <link rel="stylesheet" href="style/uniform.default.css"> 
  <!-- Bootstrap toggle -->
  <link rel="stylesheet" href="style/bootstrap-toggle-buttons.css">
  <!-- Main stylesheet -->
  <link href="style/style.css" rel="stylesheet">
  <!-- Widgets stylesheet -->
  <link href="style/widgets.css" rel="stylesheet">   
  
  <link type="text/css" href="./css/jquery.ibutton.css" rel="stylesheet" media="all" />

  
  
  <!-- Responsive style (from Bootstrap) -->
  <link href="style/bootstrap-responsive.css" rel="stylesheet">
  
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <!-- HTML5 Support for IE -->
  <!--[if lt IE 9]>
  <script src="js/html5shim.js"></script>
  <![endif]-->

  <!-- Favicon -->
  <link rel="shortcut icon" href="favicon.ico">
</head>

<body class="<?php echo preg_replace("/[^a-z]+/i", "", pathinfo ($_SERVER["SCRIPT_NAME"], PATHINFO_FILENAME)) ?>">
<div style="display:none" id="holder">


</div>

<!-- Header starts -->
  <header>
    <div class="container-fluid">
      <div class="row-fluid">

        <div>
          <!-- Buttons -->
          <ul class="nav nav-pills pull-right">

            <li class="dropdown dropdown-big">
              <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                <i class="fa fa-bars" style="margin-right: 1px;"></i> <span> Menu </span>   
              </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="btn" href="/">
                      <i class="fa fa-home"> </i> <span> Home  </span>
                    </a>
                  </li>
                  <li>
                    <a class="btn" href="heatmap.php">
                      <i class="fa fa-map-marker"></i> <span> Heatmap </span>   
                    </a>
                  </li> 
                  <li>
                    <a class="btn" href="wordcloud.php">
                      <i class="fa fa-cloud"> </i> <span> Word Cloud  </span>
                    </a>
                  </li>
                  <li>
                    <a class="btn" href="profile.php">
                      <i class="fa fa-user"> </i> <span> Me  </span>
                    </a>
                  </li>                                  
                </ul>
            </li>

          </ul>

          <div class="pull-left">
            <div style="float:left; background-image:URL(logo.png); background-size:contain; background-repeat:no-repeat; background-position:left center; height:50px; width:40px"></div>
          <h1 style="height:50px;  padding:0; line-height:50px; padding-left:10px; float:left;">Geotalk</h1>
		  </div>

          <div class="clearfix"></div>
        </div>

      </div>
    </div>
  </header>

<!-- Header ends -->

<!-- Main content starts -->

<div class="content">