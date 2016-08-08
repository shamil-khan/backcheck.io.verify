<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7 lt-ie10"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8 lt-ie10"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>Proton UI - Intro</title>
        <meta name="description" content="Page Description">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="../styles/bootstrap.css">
        

        <!-- Page-specific Plugin CSS: -->
        <link rel="stylesheet" href="../styles/vendor/select2/select2.css">


        <!-- Proton CSS: -->
        <link rel="stylesheet" href="../styles/proton.css">
        <link rel="stylesheet" href="../styles/vendor/animate.css">

        <!-- adds CSS media query support to IE8   -->
        <!--[if lt IE 9]>
            <script src="..///cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
            <script src="../scripts/vendor/respond.min.js"></script>
        <![endif]-->

        <!-- Fonts CSS: -->
        <link rel="stylesheet" href="../styles/font-awesome.css" type="text/css" />
        <link rel="stylesheet" href="../styles/font-titillium.css" type="text/css" />

        <!-- Common Scripts: -->
        <script>
        (function () {
          var js;
          if (typeof JSON !== 'undefined' && 'querySelector' in document && 'addEventListener' in window) {
            js = 'http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js';
          } else {
            js = 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js';
          }
          document.write('<script src="' + js + '"><\/script>');
        }());
        </script>
        <script src="../scripts/vendor/modernizr.js"></script>
        <script src="../scripts/vendor/jquery.cookie.js"></script>
    </head>

        <body>
            
            <script>
                var theme = $.cookie('protonTheme') || 'default';
                $('body').removeClass (function (index, css) {
                    return (css.match (/\btheme-\S+/g) || []).join(' ');
                });
                if (theme !== 'default') $('body').addClass(theme);
            </script>
            <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->
            
            
        <nav class="main-menu" data-step='2' data-intro='This is the extendable Main Navigation Menu.' data-position='right'>
            <ul>
                <li>
                    <a href=".">
                        <i class="icon-home nav-icon"></i>
                        <span class="nav-text">
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="has-subnav">
                    <a href="javascript:;">
                        <i class="icon-laptop nav-icon"></i>
                        <span class="nav-text">
                            UI Components
                        </span>
                        <i class="icon-angle-right"></i>
                    </a>
                    <ul>
                        <li>
                            <a class="subnav-text" href="ui-components-general.html">
                                General
                            </a>
                        </li>
                        <li>
                            <a class="subnav-text" href="ui-components-buttons.html">
                                Buttons
                            </a>
                        </li>
                        <li>
                            <a class="subnav-text" href="ui-components-tabs-accordions.html">
                                Tabs &amp; Accordions
                            </a>
                        </li>
                        <li>
                            <a class="subnav-text" href="ui-components-sliders.html">
                                Sliders
                            </a>
                        </li>
                        <li>
                            <a class="subnav-text" href="ui-components-grid.html">
                                Grid
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="has-subnav">
                    <a href="javascript:;">
                        <i class="icon-list nav-icon"></i>
                        <span class="nav-text">
                            Forms
                        </span>
                        <i class="icon-angle-right"></i>
                    </a>
                    <ul>
                        <li>
                            <a class="subnav-text" href="forms-form-components.html">
                                Form Componenets<span class="label label-warning label-new">Update</span>
                            </a>
                        </li>
                        <li>
                            <a class="subnav-text" href="forms-masked-input-fields.html">
                                Masked Input Fields
                            </a>
                        </li>
                        <li>
                            <a class="subnav-text" href="forms-autotab-input-fields.html">
                                Autotab Input Fields
                            </a>
                        </li>
                        <li>
                            <a class="subnav-text" href="forms-validation.html">
                                Form Validation
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="has-subnav">
                    <a href="javascript:;">
                        <i class="icon-folder-open nav-icon"></i>
                        <span class="nav-text">
                            Pages
                        </span>
                        <i class="icon-angle-right"></i>
                    </a>
                    <ul>
                        <li>
                            <a class="subnav-text" href="intro.html">
                                Intro Page<span class="label label-danger label-new">New</span>
                            </a>
                        </li>
                        <li>
                            <a class="subnav-text" href="image-gallery-uploader.html">
                                Image Gallery Uploader
                            </a>
                        </li>
                        <li>
                            <a class="subnav-text" href="calendar.html">
                                Calendar
                            </a>
                        </li>
                        <li>
                            <a class="subnav-text" href="user-profile.html">
                                User Profile
                            </a>
                        </li>
                        <li>
                            <a class="subnav-text" href="advanced-search.html">
                                Advanced Search<span class="label label-danger label-new">New</span>
                            </a>
                        </li>
                        <li>
                            <a class="subnav-text" href="session-timeout.html">
                                Session Timeout<span class="label label-danger label-new">New</span>
                            </a>
                        </li>
                        <li>
                            <a class="subnav-text" href="login.html">
                                Login Page
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="graphs-and-statistics.html">
                        <i class="icon-bar-chart nav-icon"></i>
                        <span class="nav-text">
                            Graphs and Statistics<span class="label label-warning label-new">Update</span>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="typography-and-icons.html">
                        <i class="icon-font nav-icon"></i>
                        <span class="nav-text">
                            Typography and Icons
                        </span>
                    </a>
                </li>
                <li>
                    <a href="tables.html">
                        <i class="icon-table nav-icon"></i>
                        <span class="nav-text">
                            Tables
                        </span>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="icon-map-marker nav-icon"></i>
                        <span class="nav-text">
                            Maps
                        </span>
                    </a>
                </li>
                <li class="has-subnav">
                    <a href="javascript:;">
                        <i class="icon-warning-sign nav-icon"></i>
                        <span class="nav-text">
                            Error Pages
                        </span>
                        <i class="icon-angle-right"></i>
                    </a>
                    <ul>
                        <li>
                            <a class="subnav-text" href="400-bad-request-error.html">
                                400 Bad Request
                            </a>
                        </li>
                        <li>
                            <a class="subnav-text" href="401-unauthorized-error.html">
                                401 Unauthorized
                            </a>
                        </li>
                        <li>
                            <a class="subnav-text" href="403-forbidden-error.html">
                                403 Forbidden
                            </a>
                        </li>
                        <li>
                            <a class="subnav-text" href="404-page-not-found-error.html">
                                404 Page Not Found
                            </a>
                        </li>
                        <li>
                            <a class="subnav-text" href="500-internal-server-error.html">
                                500 Internal Server Error
                            </a>
                        </li>
                        <li>
                            <a class="subnav-text" href="503-service-unavailable-error.html">
                                503 Service Unavailable
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="documentation.html">
                        <i class="icon-info-sign nav-icon"></i>
                        <span class="nav-text">
                            Documentation
                        </span>
                    </a>
                </li>
            </ul>

            <ul class="logout">
                <li>
                    <a href="login.html">
                        <i class="icon-off nav-icon"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>  
            </ul>
        </nav>
            
            
            <section class="sidebar extended">
                <script>
                    if ($.cookie('protonSidebar') == 'retracted') {
                        $('.sidebar').removeClass('extended').addClass('retracted');
                        $('.wrapper').removeClass('retracted').addClass('extended');
                    }
                    if ($.cookie('protonSidebar') == 'extended') {
                        $('.wrapper').removeClass('extended').addClass('retracted');
                        $('.sidebar').removeClass('retracted').addClass('extended');
                    }
                </script>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="clearfix" data-intro='Welcome to Proton CMS Admin Panel!' data-position='right'>
                            <img src="images/proton-logo.png" alt="proton-logo">
                            <h5>
                                <span class="title">
                                    Proton
                                </span>
                                <span class="subtitle">
                                    CMS ADMIN PANEL
                                </span>
                            </h5>
                        </div>
                    </div>
                    <div class="panel-body" data-step='3' data-intro='You can add new categories or search for a specific category here.' data-position='right'>
                        <div class="title">
                            <i class="icon-shopping-cart"></i>
                            <span>
                                CATEGORIES
                            </span>
                            <a href="javascript:;" class="add">
                                <i class="icon-plus-sign"></i>
                                <span>
                                    ADD NEW
                                </span>
                            </a>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-default btn-search" type="button"><i class="icon-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body tree-body" data-step='4' data-intro='The multi-level scrollable tree allows you to quickly reach a specific section.' data-position='right'>
                        <div class="scrollable">
                            <div id="proton-tree"></div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-handle">
                    <i class="icon-ellipsis-horizontal"></i>
                    <i class="icon-ellipsis-vertical"></i>
                </div>
            </section>

            <section class="wrapper retracted scrollable">
                
                <script>
                    if (!($('body').is('.dashboard-page') || $('body').is('.login-page'))){
                        if ($.cookie('protonSidebar') == 'retracted') {
                            $('.wrapper').removeClass('retracted').addClass('extended');
                        }
                        if ($.cookie('protonSidebar') == 'extended') {
                            $('.wrapper').removeClass('extended').addClass('retracted');
                        }
                    }
                </script>
                
                <nav class="user-menu">
                    <a href="javascript:;" class="main-menu-access">
                        <i class="icon-proton-logo"></i>
                        <i class="icon-reorder"></i>
                    </a>
                    <section class="user-menu-wrapper" data-step='6' data-intro='The user menu allows you to read your messages, notification or to change the Proton color theme.' data-position='left'>
                        <a href="javascript:;" data-expand=".theme-view" class="view-menu-access">
                            <i class="icon-eye-open"></i>
                        </a>
                        <a href="javascript:;" data-expand=".messages-view" class="messages-access">
                            <i class="icon-envelope-alt"></i>
                        </a>
                        <a href="javascript:;" data-expand=".notifications-view" class="notifications-access unread">
                            <i class="icon-comment-alt"></i>
                            <div class="menu-counter">6</div>
                        </a>
                    </section>

                    <div class="panel panel-default nav-view theme-view">
                        <div class="arrow user-menu-arrow"></div>
                        <div class="panel-heading">
                            <i class="icon-eye-open"></i>
                            <span>Color Scheme</span>
                            <a href="javascript:;" class="close-user-menu"><i class="icon-remove"></i></a>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item" data-theme="default">
                                <a href="javascript:;">
                                    <i><b class="dark"></b></i>
                                    <div class="text-holder">
                                        <span class="title-text">
                                            Dark
                                        </span>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item" data-theme="theme-light">
                                <a href="javascript:;">
                                    <i><b></b></i>
                                    <div class="text-holder">
                                        <span class="title-text">
                                            Light
                                        </span>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item" data-theme="theme-pastel">
                                <a href="javascript:;">
                                    <i><b class="pastel"></b></i>
                                    <div class="text-holder">
                                        <span class="title-text">
                                            Pastel Green
                                        </span>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item" data-theme="theme-pastel-marine">
                                <a href="javascript:;">
                                    <i><b class="pastel-marine"></b></i>
                                    <div class="text-holder">
                                        <span class="title-text">
                                            Pastel Marine
                                        </span>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item" data-theme="theme-terminal">
                                <a href="javascript:;">
                                    <i><b class="terminal"></b></i>
                                    <div class="text-holder">
                                        <span class="title-text">
                                            Terminal
                                        </span>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item" data-theme="theme-rio">
                                <a href="javascript:;">
                                    <i><b class="rio"></b></i>
                                    <div class="text-holder">
                                        <span class="title-text">
                                            Rio
                                        </span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="panel panel-default nav-view messages-view">
                        <div class="arrow user-menu-arrow"></div>
                        <div class="panel-heading">
                            <i class="icon-envelope-alt"></i>
                            <span>Messages</span>
                            <a href="javascript:;" class="close-user-menu"><i class="icon-remove"></i></a>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <i><img src="images/user-icons/user1.jpg" alt="User Icon"></i>
                                <div class="text-holder">
                                    <span class="title-text">
                                        Nunc Cenenatis:
                                    </span>
                                    <span class="description-text">
                                        Hi, can you meet me at the office tomorrow morning?
                                    </span>
                                </div>
                                <span class="time-ago">
                                    3 mins ago
                                </span>
                            </li>
                            <li class="list-group-item">
                                <i><img src="images/user-icons/user5.jpg" alt="User Icon"></i>
                                <div class="text-holder">
                                    <span class="title-text">
                                        Prasent Neque:
                                    </span>
                                    <span class="description-text">
                                        Just a quick question: do you know the balance on the adsense account?
                                    </span>
                                </div>
                                <span class="time-ago">
                                    17 mins ago
                                </span>
                            </li>
                            <li class="list-group-item">
                                <i><img src="images/user-icons/user2.jpg" alt="User Icon"></i>
                                <div class="text-holder">
                                    <span class="title-text">
                                        Flor Demoa:
                                    </span>
                                    <span class="description-text">
                                        Hey, we're going surfing tomorrow. Feel free to join in.
                                    </span>
                                </div>
                                <span class="time-ago">
                                    3 hrs ago
                                </span>
                            </li>
                        </ul>
                    </div>

                    <div class="panel panel-default nav-view notifications-view">
                        <div class="arrow user-menu-arrow"></div>
                        <div class="panel-heading">
                            <i class="icon-comment-alt"></i>
                            <span>Notifications</span>
                            <a href="javascript:;" class="close-user-menu"><i class="icon-remove"></i></a>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <i><img src="images/user-icons/user1.jpg" alt="User Icon"></i>
                                <div class="text-holder">
                                    <span class="title-text">
                                        Nunc Cenenatis
                                    </span>
                                    <span class="description-text">
                                        likes your website.
                                    </span>
                                </div>
                                <span class="time-ago">
                                    32 mins ago
                                </span>
                            </li>
                            <li class="list-group-item">
                                <i><img src="images/user-icons/user2.jpg" alt="User Icon"></i>
                                <div class="text-holder">
                                    <span class="title-text">
                                        Flor Demoa
                                    </span>
                                    <span class="description-text">
                                        wrote a new post.
                                    </span>
                                </div>
                                <span class="time-ago">
                                    3 hrs ago
                                </span>
                            </li>
                            <li class="list-group-item">
                                <i><img src="images/user-icons/user4.jpg" alt="User Icon"></i>
                                <div class="text-holder">
                                    <span class="title-text">
                                        Nunc Neque
                                    </span>
                                    <span class="description-text">
                                        wrote a new post.
                                    </span>
                                </div>
                                <span class="time-ago">
                                    57 mins ago
                                </span>
                            </li>
                            <li class="list-group-item">
                                <i><img src="images/user-icons/user2.jpg" alt="User Icon"></i>
                                <div class="text-holder">
                                    <span class="title-text">
                                        Flor Demoa
                                    </span>
                                    <span class="description-text">
                                        submitted a new ticket.
                                    </span>
                                </div>
                                <span class="time-ago">
                                    1.5 hrs ago
                                </span>
                            </li>
                            <li class="list-group-item">
                                <i><img src="images/user-icons/user1.jpg" alt="User Icon"></i>
                                <div class="text-holder">
                                    <span class="title-text">
                                        Nunc Cenenatis
                                    </span>
                                    <span class="description-text">
                                        wrote a new post.
                                    </span>
                                </div>
                                <span class="time-ago">
                                    3 hrs ago
                                </span>
                            </li>
                        </ul>
                    </div>
                </nav>
                
                <ol class="breadcrumb breadcrumb-nav" data-step='5' data-intro='The breadcrumbs provide another easy way to navigate.' data-position='bottom'>
                    <li><a href="."><i class="icon-home"></i></a></li>
                    <li class="active">
                        <a class="bread-page-title" data-toggle="dropdown" href="#"></a>
                        <ul class="dropdown-menu dropdown-menu-arrow" role="menu">
                        </ul>
                    </li>
                </ol>
                <div class="row">
                    <div style="max-width:1000px;" class="col-lg-12">
                    <div id="top" class="panel panel-default panel-block panel-title-block" data-step='7' data-intro="The title bar shows you the page you're currently on as well as additional page description." data-position='bottom'>
                        <div class="panel-heading">
                            <div>
                                <i class="icon-edit"></i>
                                <h1>
                                    <span class="page-title"></span>
                                    <small>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit...
                                    </small>
                                </h1>
                            </div>
                        </div>
                    </div>
                           
                    <div class="panel panel-default panel-block" data-step='8' data-intro="We hope you enjoy using Proton. Thank you for checking it out!" data-position='left'>
                        <div class="list-group">
                            <div class="list-group-item">
                                <h4 class="section-title">Getting Started</h4>
                                <p>
                                    Proton is a <span class="text-bold">fully responsive mobile first Admin Template</span> based on Bootstrap 3. It features a <span class="text-bold">highly flexible multi-column content structure</span> built using the best Html5 and CSS3 have to offer, while also staying <span class="text-bold">compatible down to Internet Explorer 8.</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section>


            

            
            <script src="../scripts/bootstrap.min.js"></script>

            <!-- Proton base scripts: -->
            
            <script src="../scripts/main.js"></script>
            <script src="../scripts/proton/common.js"></script>
            <script src="../scripts/proton/main-nav.js"></script>
            <script src="../scripts/proton/user-nav.js"></script>
            


            <!-- Page-specific scripts: -->
            <script src="../scripts/proton/sidebar.js"></script>
            <script src="../scripts/proton/intro.js"></script>
            <!-- jsTree -->
            <script src="../scripts/vendor/jquery.jstree.js"></script>
            
            <!-- Intro JS -->
            <!-- https://github.com/usablica/intro.js -->
            <script src="../scripts/vendor/intro.min.js"></script>
        </body>
</html>
