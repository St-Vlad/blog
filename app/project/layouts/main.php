<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <title>Blog - Canvas - A Free Website Template by Donny Burnside</title>

    <link media="all" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link media="all" type="text/css" href="<?php echo "/app/project/src/css/font-awesome.min.css";?>" rel="stylesheet">
    <link media="all" type="text/css" href="<?php echo "/app/project/src/css/core.css";?>" rel="stylesheet">
    <link media="all" type="text/css" href="<?php echo "/app/project/src/css/skins/orange.css";?>" rel="stylesheet">
    <link media="all" type="text/css" href="<?php echo "/app/project/src/css/custom.css";?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body class="blog" itemscope itemtype="http://schema.org/Blog">

<div id="masthead">

    <div id="site-header" role="banner">
        <div class="container">
            <div class="row">

                <div id="branding">
                    <a class="logo" href="index.html">Canvas</a>
                </div> <!-- #branding -->

                <nav id="main-menu" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
                    <ul class="horizontal-navigation">
                        <li class="menu-home" itemprop="url"><a href="/" title="Головна сторінка" itemprop="name">Головна</a></li>
                        <?php if(isset($_SESSION['user_id'])):?>
                            <li class="menu" itemprop="url"><a href="/logout" title="Вийти" itemprop="name">Вийти</a></li>
                        <?php else:?>
                            <li class="menu" itemprop="url"><a href="/login" title="Увійти" itemprop="name">Увійти</a></li>
                        <?php endif;?>
                    </ul>
                </nav> <!-- #main-menu -->

            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- #site-header -->

    <div id="page-title">
        <div class="container">
            <div class="row">
                <h1 class="entry-title" itemprop="headline">Blog</h1>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- #page-title -->

</div> <!-- #masthead -->

<main id="content" role="main">

    <div class="section">
        <div class="container">
            <div class="row">

                <div class="three-quarters-block">
                    <div class="content">
                        <!--render view-->
                        <?= $content?>
                        <!--render view-->

                    </div> <!-- .content -->
                </div> <!-- .three-quarters-block -->
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .section -->

</main> <!-- #content -->
<footer id="footer" role="contentinfo">
    <div class="container">
        <div class="row">

            <div class="copyright">&copy; Canvas 2015</div>
            <div class="attribution">Web Design by <a href="http://www.donnyburnside.com" title="Web Design by Donny Burnside" target="_blank">Donny Burnside</a>.</div>

        </div> <!-- .row -->
    </div> <!-- .container -->
</footer> <!-- #footer -->
<!-- Scripts -->
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>